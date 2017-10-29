<?php
class ScanAction extends CommonAction
{
    /*显示扫描二维码登录页面*/
    public function login() {

        $key = $this->_get('key');
        $backurl = ($this->_get('backurl'))? base64_decode($this->_get('backurl')) : 'http://'.$_SERVER['HTTP_HOST'];

        //检查是否有授权密钥，以及密钥是否仍在生效
        $checkkey = D('Scanloginkey')->checkkey($key,$backurl);
        if ($checkkey['error'] != 0) {
            $this->error($checkkey['errormsg']);
        }
        $domain = empty($checkkey['domain']) ? $_SERVER['HTTP_HOST'] : $checkkey['domain'];

        $now = time();
        $scanlogin = D('Scanlogin');
        //删除数据库中过期的未被扫描的记录
        $map['application_time'] = array('LT', $now-3600);
        $map['user_id'] = array('EQ', 0);
        $encryption = D('Passport')->encryption("login||".rand(100,999)."||".time());
        $scanlogin->where($map)->delete();

        //插入一条待扫描记录
        $data = array('token'=>$encryption,
            'application_time'=>$now,
            'key'=>$key,
            'backurl'=>$backurl
            );
        $scanlogin->data($data)->add();

        //生成二维码图片
        $token = 'http://'.$_SERVER['HTTP_HOST'].'/mobile/scan/loginact/token/'.$encryption;
        $token_img = baoQrCode('scan_login_'.$encryption,$token);
        $token_url = "<img src='http://".$_SERVER['HTTP_HOST']."/attachs/".$token_img."' style='width:20%; margin-left:40%; margin-top:30px;'>";

        //模板分配及显示
        $this->assign('token_url', $token_url);
        $this->assign('encryption', $encryption);
        $this->assign('backurl', $backurl);
        $this->assign('domain', $domain);
        $this->display();

    }

    /*扫描登陆二维码页面，1stPay PC端异步轮回查询扫描状态*/
    public function logincheck(){

        $now = time();
        $token = ($this->_post('token')) ? $this->_post('token') : NULL;
        if ($token) {

            //查询缓存中是否存在相应token的缓存
            if (!(S('scan_login_'.$token))) {
                die(json_encode(array('content'=>'Not scan yet.', 'error'=>-1)));
            }

            //对token进行解密并验证
            $scanlogin = D('Scanlogin');
            $token_array = explode("||", D('Passport')->encryption($token, 1));
            if (sizeof($token_array) != 3) {
                $scanlogin->where(array('token'=>$token))->delete();
                die(json_encode(array('content'=>'Hacking Attempt!', 'error'=>1)));
            }
            if ((intval($token_array[2]) + 180) < $now) {
                $scanlogin->data(array('error'=>2))->where(array('token'=>$token))->save();
                die(json_encode(array('content'=>'QRcode Expired!', 'error'=>2)));
            }

            //得到扫描登陆相关信息
            $scan = $scanlogin->where(array('token'=>$token))->find();
            $user_id = $scan['user_id'];
            if ($user_id) {
                $closed = D('Users')->where(array('user_id'=>$user_id))->getField('closed');
                if (($closed == NULL) || ($closed != 0)) {
                    $scanlogin->data(array('error'=>3))->where(array('token'=>$token))->save();
                    die(json_encode(array('content'=>'您的用户状态不正常，请联系1stPay客服', 'error'=>3)));
                }
                S('scan_login_'.$token, NULL);  //清除相应缓存
                $scanlogin->data(array('error'=>0))->where(array('token'=>$token))->save();
                die(json_encode(array('content'=>'Successful!', 'error'=>0)));
            }

        }
    }

    /*扫描设备扫描后*/
    public function loginact(){

        $user_id = getUid();
        if (empty($user_id)) {
            cookie('backurl',$_SERVER['REQUEST_URI']);
            header("Location: " . u("mobile/passport/login"));
            exit;
        }
        $now = time();
        $token = ($this->_get('token'))? $this->_get('token') : NULL;
        $scanlogin = D('Scanlogin');

        if ($token) {

            $token_array = explode("||", D('Passport')->encryption($token, 1));		//token解密
            (sizeof($token_array) != 3) && die(json_encode(array('content'=>'Hacking Attempt!', 'error'=>1)));
            if ((intval($token_array[2]) + 180) < $now) {
                $this->error('二维码过期，请重新尝试');
            }
            $scan = $scanlogin->where(array('token'=>$token))->find();
            if ($scan) {
                //判断二维码是否被扫描过
                ($scan['user_id'] !=0 && $scan['user_id'] != '') && $this->error('该二维码已被使用过');
                //更新表，将扫描者user_id写入
                $scanlogin->data(array('user_id'=>$user_id))->where(array('token'=>$token))->save();
                //写缓存文件，作为被扫描设备异步轮询查询条件
                S('scan_login_'.$token,$token,200);
                //登陆成功，返回用户个人页面
                $this->success('登陆成功', U('mobile/index/index'));
            }

        } else {

            $this->error('缺少token信息');

        }

    }

    /*查询用户信息API*/
    public function getinfo() {

        //检查是否有授权密钥，以及密钥是否仍在生效
        $key = $this->_get('key');
        $checkkey = D('Scanloginkey')->checkkey($key);
        if ($checkkey['error'] != 0) {
            $this->error($checkkey['errormsg']);
        }
        //检查是否有token值，以及是否有相关记录
        $token = $this->_get('token');
        if (empty($token)) {
            die(json_encode(array('content'=>'缺少token信息', 'error'=>1)));
        }
        $scan = D('Scanlogin')->where(array('token'=>$token))->find();
        if (!$scan) {
            die(json_encode(array('content'=>'没有相关信息或信息已过期', 'error'=>1)));
        }
        if ($scan['error'] != 0) {
            if ($scan['error'] == -1) {
                $errormsg = '未被扫描';
            } elseif ($scan['error'] == 2) {
                $errormsg = '二维码已过期';
            } elseif ($scan['error'] == 3) {
                $errormsg = '用户信息状态不正常';
            }
            die(json_encode(array('content'=>$errormsg, 'error'=>1, 'status'=>$scan['error'])));
        }

        //取得用户相关信息, 并传出
        $data = D('Users')->field('account,nickname,user_id')->where(array('user_id'=>$scan['user_id']))->find();
        $data['user_id'] = D('Crypter')->encrypt($data['user_id']);
        die(json_encode(array('data'=>$data,'content'=>'成功', 'error'=>0, 'status'=>$scan['error'])));

    }

}