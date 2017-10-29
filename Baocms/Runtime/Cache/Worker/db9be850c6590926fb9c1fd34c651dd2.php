<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title>店员管理中心-<?php echo ($CONFIG["site"]["sitename"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
        <link rel="stylesheet" href="/static/default/wap/css/worker.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>       
		<script src="/static/default/wap/js/js_sdk20170302.js"></script>
	</head>
	<body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
<script>
	wx.config({
	debug: false,
	appId: "<?php echo ($sign["appId"]); ?>",
	timestamp: <?php echo ($sign["timestamp"]); ?>,
	nonceStr: "<?php echo ($sign["nonceStr"]); ?>",
	signature: "<?php echo ($sign["signature"]); ?>",
	jsApiList: [
		'chooseImage',
		'previewImage',
		'uploadImage',
		'scanQRCode',
	]
	});
	
$(function(){
	$('#makebtn').click(function(){
		
		//$(this).attr("disabled",true);
		wx.scanQRCode({
			needResult: 1, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
			scanType: ["qrCode"], // 可以指定扫二维码还是一维码，默认二者都有
			success: function (res) {
					var snstr = res.resultStr; 
					$.post("<?php echo U('worker/weixin/tuan');?>",{snstr:snstr},function(data){
						alert(data.info);
						//alert("请等待商家审核通过!");
					},'json');	
			}
		});
	})
})	
</script>

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back" style="display:none;">
        <a class="top-addr" href="<?php echo U('mobile/index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			员工验证中心
		</div>
	<div class="top-signed">
    <?php if($is_weixin): ?><a id="makebtn" ><i class="icon-qrcode"></i></a>
	<?php else: ?>
    <a href="<?php echo U('passport/logout');?>"><i class="icon-sign-out"></i></a><?php endif; ?>
	</div>
</header>

<div class="container">
		<div class="line detail-base">
			<div class="x4">
				<div class="pic">
                <!--<i class="icon-qrcode"></i>-->	
					<img src="<?php echo config_img($SHOP['logo']);?>">	
                </div>
			</div>
			<div class="x8">
				<h1>欢迎您：<?php echo ($worker["name"]); ?> </h1>
				<p>您管理的店铺：<?php echo ($SHOP["shop_name"]); ?></p>
                <p class="text-small">您的电话：<?php echo ($worker["mobile"]); ?></p>
                <p class="text-small">您的职务：<?php echo ($worker["work"]); ?></p>
			</div>
			
		</div>
       </div>
<div class="blank-10 bg"></div>
<div class="panel-list">
	<ul>
        <li class="app_show">
            <a onclick="qrcode(0)">
                <span class="icon-qrcode  "></span>
                扫一扫
                <i class="icon-angle-right"></i>
            </a>
        </li>

        <?php if($worker['tuan'] == 1): ?><li>
            <a href="<?php echo U('worker/tuan/used');?>"><span class="icon-tags"></span>抢购劵验证
            <font>
                <?php if($counts['tuan_order_code_is_used'] > 0): ?>待消费<?php echo ($counts['tuan_order_code_is_used']); ?>人，<?php endif; ?>
                <?php if($counts['tuan'] > 0): ?>共<?php echo ($counts['tuan']); ?>单<?php endif; ?>
                <?php if($counts['tuan_audit'] > 0): ?>，待审核<b><?php echo ($counts['tuan_audit']); ?></b>单<?php endif; ?>
            </font>
            <i class="icon-angle-right"></i></a>
        </li><?php endif; ?>

        <?php if($worker['coupon'] == 1): ?><li>
            <a href="<?php echo U('worker/coupon/index');?>"><span class="icon-key"></span>优惠劵验证
                <?php if($counts['coupon_is_used'] > 0): ?><font>待核销<b><?php echo ($counts['coupon_is_used']); ?></b>人</font><?php endif; ?>
            <i class="icon-angle-right"></i></a>
        </li><?php endif; ?>

        <?php if($worker['is_job'] == 1): ?><li>
            <a href="<?php echo U('worker/nearwork/index');?>"><span class="icon-github"></span>人才招聘中心
                <font>
                    <?php if($counts['work'] > 0): echo ($counts['work']); ?>条招聘<?php endif; ?>
                    <?php if($counts['work_audit'] > 0): ?>，<b><?php echo ($counts['work_audit']); ?></b>条待审核<?php endif; ?>
                </font>
            <i class="icon-angle-right"></i></a>
        </li><?php endif; ?>

        <?php if($worker['is_yuyue'] == 1): ?><li><a href="<?php echo U('yuyue/index');?>"><span class="icon-phone-square"></span>预约管理
            <font>
            <?php if($counts['shopyuyue_one'] > 0): echo ($counts['shopyuyue_one']); ?>条预约<?php endif; ?>
            <?php if($counts['shopyuyue_eight'] > 0): ?>，<b><?php echo ($counts['shopyuyue_eight']); ?></b>条待确认<?php endif; ?>
        </font>
            <i class="icon-angle-right"></i></a>
        </li><?php endif; ?>

        <?php if($worker['is_news'] == 1): ?><li><a href="<?php echo U('news/index');?>"><span class="icon-newspaper-o"></span>文章管理
            <font>
            <?php if($counts['news'] > 0): echo ($counts['news']); ?>篇文章<?php endif; ?>
            <?php if($counts['news_autit'] > 0): ?>，<b><?php echo ($counts['news_autit']); ?></b>篇待审核<?php endif; ?>
            </font>
            <i class="icon-angle-right"></i></a></li><?php endif; ?>

        <?php if($worker['is_dianping'] == 1): ?><li><a href="<?php echo U('worker/dianping/index');?>"><span class="icon-random"></span>商家点评管理<i class="icon-angle-right"></i></a></li><?php endif; ?>

        <li>
			<a href="<?php echo U('message/index');?>">
				<span class="icon-envelope"></span>店员通知
                <font>
                <?php if($msg_day > 0): ?>最新<?php echo ($msg_day); ?>条消息<?php endif; ?>
                </font>
				<i class="icon-angle-right"></i>
			</a>
		</li>

	</ul>
</div>
<div class="blank-10"></div>
<div class="container text-center">
		<a class="button button-block button-big bg-dot" href="<?php echo U('worker/passport/logout');?>">注销登录</a>
</div>
<div class="blank-20"></div>
	<style>

	.foot-fixed .foot-item { width: 25%;}

	</style>

    

    <footer class="foot-fixed">		

    <a class="foot-item <?php if(($ctl == 'index') AND ($act != 'more')): ?>active<?php endif; ?>" href="<?php echo U('index/index');?>">		

    	<span class="icon icon-home"></span>		

        	<span class="foot-label">首页</span>		

            </a>		

            

            <a class="foot-item <?php if(($ctl) == "tuan"): ?>active<?php endif; ?>" href="<?php echo U('tuan/used');?>">		

            	<span class="icon icon-tags"></span>			

                <span class="foot-label">抢购劵</span>		</a>		

            

            <a class="foot-item <?php if(($ctl) == "coupon"): ?>active<?php endif; ?>" href="<?php echo U('coupon/index');?>">			

            <span class="icon icon-key"></span>			

            <span class="foot-label">优惠劵</span>		</a>	

            

              <a class="foot-item <?php if(($ctl) == "dianping"): ?>active<?php endif; ?>" href="<?php echo U('worker/dianping/index');?>">			

            <span class="icon icon-user"></span>			

            <span class="foot-label">点评管理</span>		</a>	

            

          

            

            </footer>	

            

            	<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>

                </body>

                

                </html>