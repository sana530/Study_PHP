<?php if (!defined('THINK_PATH')) exit();?><div class="loginPop">
    <div class="loginTit">
        <span class="bao_closed"></span>
        登陆
    </div>
    <form id="login_frm"  action="<?php echo U('passport/login2');?>" method="post" target="baocms_frm">
    <div class="loginLog">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td><input type="text"  name="account" id="account" placeholder="手机号/用户名" class="loginInput" />
                    <div class="posTips"></div></td>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" placeholder="密码"  class="loginInput2" /></td>
            </tr>
            <tr>
                <td><input type="text" name="yzm" placeholder="验证码"   class="loginInput2 loginInput4" />
                    <img id="bao_img_code1" src="__ROOT__/index.php?g=app&m=verify&a=index&mt=<?php echo time();?>" /><em>
                    <a rel="bao_img_code1" class="yzm_code" href="javascript:void(0);">换一张</a></em>
                </td>
            </tr>
            <tr>
                <td><span><a href="<?php echo U('passport/forget',array('way'=>2));?>" target="_blank">忘记密码</a></span></td>
            </tr>
            <tr>
                <td><span><a class="" href="<?php echo U('passport/scanlogin');?>" target="_self">1stpay扫一扫登陆</a></span></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="登录" class="loginTipsbtn" /></td>
            </tr>
        </table>
    </div>
          </form>
          
          <div class="oauth-wrapper">
            <h3 class="title-wrapper"><span class="title">用合作网站账号登录</span></h3>
            <div class="oauth cf">
                <!--<a class="oauth__link oauth__link&#45;&#45;qq" href="<?php echo U('passport/qqlogin');?>" target="_blank"></a>-->
                <a class="oauth__link oauth__link--weixin" href="<?php echo U('passport/wxlogin');?>" target="_blank"
                   style="background: url(__ROOT__/themes/default/Pchome/statics/images/tp_43.png); width:32px; height:31px; "></a>
                <!--<a class="oauth__link oauth__link&#45;&#45;weibo" href="<?php echo U('passport/wblogin');?>" target="_blank"></a>-->
            </div>
        </div>
</div>