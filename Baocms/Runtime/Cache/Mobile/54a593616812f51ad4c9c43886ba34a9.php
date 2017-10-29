<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($mobile_title)): echo ($mobile_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
        <meta name="keywords" content="<?php echo ($mobile_keywords); ?>" />
        <meta name="description" content="<?php echo ($mobile_description); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<link rel="stylesheet" href="/static/default/wap/css/base.css?V=1">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css?V=3"/>
		<link rel="stylesheet" href="/static/default/wap/css/intel.css" />
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
	    <script src="/static/default/wap/js/mobile_common.js"></script>
        <script src="/static/default/wap/js/iscroll-probe.js"></script>
		<script src="/static/default/wap/js/js_sdk20170302.js"></script>
		<script src="/static/default/wap/js/intel.js"></script>
        
        
		 <script>
            function bd_encrypt(gg_lat, gg_lon)   // 百度地图测距偏差 问题修复
            {
                /*var x_pi = 3.14159265358979324 * 3000.0 / 180.0;
                var x = gg_lon;
                var y = gg_lat;
                var z = Math.sqrt(x * x + y * y) + 0.00002 * Math.sin(y * x_pi);
                var theta = Math.atan2(y, x) + 0.000003 * Math.cos(x * x_pi);
                var bd_lon = z * Math.cos(theta) + 0.0065;
                var bd_lat = z * Math.sin(theta) + 0.006;*/
                dingwei('<?php echo U("mobile/index/dingwei",array("t"=>$nowtime,"lat"=>"llaatt","lng"=>"llnngg"));?>', gg_lat, gg_lon);
            }
            navigator.geolocation.getCurrentPosition(function (position) {
                bd_encrypt(position.coords.latitude, position.coords.longitude);
            });
        
        </script>
        
        
	</head>
	<body>
<style>.line{overflow:visible;}</style>
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo ($backurl); ?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			找回密码
		</div>
		<div class="top-share">
			<a href="<?php echo U('passport/register');?>">注册</a>
		</div>
	</header>


<div class="line tab-bar">
	<div class="button-toolbar">
		<div class="button-group">
			<a class="block button <?php if($way == 2): ?>bg-dot active<?php endif; ?>" href="<?php echo U('passport/forget',array('way'=>2));?>">通过手机</a>
			<a class="block button <?php if($way == 1): ?>bg-dot active<?php endif; ?>" href="<?php echo U('passport/forget',array('way'=>1));?>">通过邮箱</a>
		</div>
	</div>
</div>
<form action="<?php echo U('passport/newpwd');?>" method="post" target="x-frame">
	<?php if($way == 2): ?><div class="line padding border-bottom" style="display:none;">
		<span class="x3 text-gray">用户名</span>
		<span class="x8"><input type="text" name="account" id="account" class="text-input" placeholder="请输入用户名"></span>
	</div>
    
	<div class="line padding border-bottom">
		<span class="x3 text-gray">输入手机</span>
		<span class="x5"><input type="text" name="mobile" id="mobile" class="text-input"></span>
		<span class="x4"><a class="button button-small bg-dot" id="jq_send" href="javascript:void(0);">获取验证码</a></span>
	</div>
	
    
	<div class="line padding border-bottom">
		<span class="x3 text-gray">验证码</span>
		<span class="x5"><input type="text" name="scode" id="scode" class="text-input" placeholder="验证码"></span>
		<span class="x4"><em class="text-small text-gray">手机收到的验证码<em></span>
	</div>

	<div class="container">
		<div class="blank-30"></div>
		<p><span class="text-dot">小提示：</span>  请输入您认证过的手机号码，点击“<strong>获取新密码</strong>”按钮后系统会将新密码发送到您的认证手机上。</p>
	</div>
    
    
    <?php elseif($way == 1): ?> 
    
    
    
    <div class="line padding border-bottom">
		<span class="x3 text-gray">邮箱</span>
		<span class="x8"><input type="text" name="email" id="email" class="text-input" placeholder="请输入邮箱"></span>
	</div>
    <div class="line padding border-bottom" style="display:none;">
		<span class="x3 text-gray">用户名</span>
		<span class="x8"><input type="text" name="account" id="account" class="text-input" placeholder="请输入用户名"></span>
	</div>
    
    <div class="line padding border-bottom">
		<span class="x3 text-gray">验证码</span>
		<span class="x5"><input type="text" name="yzm" id="yzm" class="text-input" placeholder="验证码"></span>
		<span class="x4"><a href="javascript:void(0);" class="baott_yzm_getA" rel="bao_yzm_code"><img style="height:36px;" id="bao_yzm_code"  src="__ROOT__/index.php?g=app&m=verify&a=index&mt=<?php echo time();?>" /> </a></span>
	</div><?php endif; ?>
	<div class="container">
		<div class="blank-30"></div>
        <input type="hidden" name="way" id="way" value="<?php echo ($way); ?>" />
		<button class="button button-big button-block bg-dot">获取新密码</button>
		<div class="blank-30"></div>
	</div>
</form>
<script>
    $("#mobile").intlTelInput({
        utilsScript: "/static/default/wap/js/utils.js"
    });
</script>
<script type="text/javascript">
 var mobile_timeout;
        var mobile_count = 100;
        var mobile_lock = 0;
        $(function () {
            $("#jq_send").click(function () {
                if (mobile_lock == 0) {
                    mobile_lock = 1;
                    $.ajax({
                        url: '<?php echo U("passport/findsms");?>',
                        data: 'mobile=' + $("#mobile").val() + '&country=' + $("#country").val(),
                        type: 'post',
                        success: function (data) {
                            if (data == 1) {
                                mobile_count = 60;
                                BtnCount();
                            } else {
                                mobile_lock = 0;
                                alert(data);
                            }
                        }
                    });
                }
            });
        });
	BtnCount = function () {
		if (mobile_count == 0) {
			$('#jq_send').html("重新发送");
			mobile_lock = 0;
			clearTimeout(mobile_timeout);
		}
		else {
			mobile_count--;
			$('#jq_send').html("重新发送(" + mobile_count.toString() + ")秒");
			mobile_timeout = setTimeout(BtnCount, 1000);
		}
	};
	//获取验证码图片的
	 $(document).ready(function (e) {
            $(document).on('click', '.yzm_code', function () {
                $("#" + $(this).attr('rel')).attr('src', BAO_ROOT + '/index.php?g=app&m=verify&a=index&mt=' + Math.random());
            });
        });



</script>       



            
            	<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
                </body>
                
                </html>