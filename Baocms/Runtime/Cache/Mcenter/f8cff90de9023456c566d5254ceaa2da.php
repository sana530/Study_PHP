<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?>会员中心</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/mcenter.css"/>
		<link rel="stylesheet" href="/static/default/wap/css/intel.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/intel.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,mcenter.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
	</head>
	<body>
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('information/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			修改头像
		</div>
	<div class="top-signed">
		<?php if($msg_day > 0): ?><a href="<?php echo U('mcenter/message/index');?>">
<i class="icon-envelope"></i>
<span class="badge bg-red jiaofei"><?php echo ($msg_day); ?></span>
</a>
<?php else: ?>
    <?php if(empty($sign_day)): ?><a href="<?php echo U('mobile/sign/signed');?>" class="top-addr icon-plus" style="width: 100px !important;"> 签到领积分</a>
    <?php else: ?>
    <a href="<?php echo U('mobile/passport/logout');?>" class="top-addr icon-sign-out"></a><?php endif; endif; ?>
	</div>
</header>
<div class="container">
	<div class="blank-10"></div>
	<p>当前头像</p>
	<img class="txt txt-big radius-circle bg-green" src="__ROOT__/attachs/<?php echo (($MEMBER["face"])?($MEMBER["face"]):'default.jpg'); ?>" />
	<div class="blank-20"></div>
	<div class="form-group">
		<div class="field">
			<a class="button input-file"  href="javascript:void(0);">新头像<input size="100" id="fileToUpload" accept="image/*" name="fileToUpload" type="file" /></a>
			<p class="text-gray text-small">图片建议大小为300X300像素，形状为正方形。</p>
		</div>
	</div>
	<span id="images"></span>
</div>
<script src="/static/default/wap/other/upload.js"></script>
<script>
	var i = 0;
	function ajaxupload(data) {
		if(i == 0){
			$.ajaxFileUpload({
				url: '<?php echo U("app/upload/upload",array("model"=>"face"));?>',
				type: 'post',
				fileElementId: 'fileToUpload',
				dataType: 'text',
				secureuri: false, //一般设置为false
				success: function (data, status) {
					var str = '<div class="blank-10 border-bottom"></div>         <div class="blank-10"></div>    <div class="list-img"><img style="width:150px;height:150px;" src="__ROOT__/attachs/' + data + '">                <input type="hidden" name="photos[]" id="photos" value="' + data + '" />          <div class="blank-10 border-bottom"><a href="javascript:void(0);" class="button button-block button-big bg-dot text-center">立即使用</a></div>';
					$("#images").html(str);
					$("#fileToUpload").unbind('change');
					$("#fileToUpload").change(function () {
						ajaxupload();
					});
				}
			});
		}
		
	}


	$(document).ready(function () {
		$("#fileToUpload").change(function () {
			ajaxupload();
		});
		$(document).on("click", "#images a", function () {
			var avatar = ($('#photos').val());
			$.post('<?php echo U("information/upload_face");?>',{avatar:avatar},function(result){
				if(result.status='success'){
					layer.msg(result.message,{icon:1});
					setTimeout(function(){
						location.href = '<?php echo U("index/index");?>';
					},1000)
				}else{
					layer.msg(result.message,{icon:2});
				}
			},'json');
		});

	});

</script>
<div class="blank-20"></div>
 <footer class="foot-fixed">
  <?php if($ctl == 'member'): ?><a class="foot-item  <?php if($ctl == 'member'): ?>active<?php endif; ?>" href="<?php echo u('mobile/index/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">首页</span>
    </a>
  <?php else: ?>
  <a class="foot-item" href="<?php echo u('member/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">用户首页</span>
    </a><?php endif; ?>
    
    <a class="foot-item " href="<?php echo LinkTo('mobile/life/release');?>">			
    <span class="icon icon-plus"></span><span class="foot-label">发布</span></a>
    
     <a class="foot-item  <?php if(($ctl == 'tuancode')): ?>active<?php endif; ?>" href="<?php echo u('tuancode/index');?>">			
    <span class="icon icon-folder"></span><span class="foot-label">抢购劵</span></a>
    
    
    
    <a class="foot-item  <?php if(($ctl == 'message') ||($act == 'xiaoxizhongxin')): ?>active<?php endif; ?>" href="<?php echo u('message/index');?>">			
    <span class="icon icon-volume-up"></span><span class="foot-label">消息</span></a>
    
    <a class="foot-item  <?php if(($ctl == 'money') || ($ctl == 'logs') || ($ctl == 'cash') ||($act == 'zijinguanli')): ?>active<?php endif; ?>" href="<?php echo u('information/index');?>">			
    <span class="icon icon-gear"></span><span class="foot-label">设置</span></a>
    
   
    </footer>


<iframe id="x-frame" name="x-frame" style="display:none;">
</iframe>
</body>
</html>