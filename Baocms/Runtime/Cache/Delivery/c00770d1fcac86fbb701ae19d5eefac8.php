<?php if (!defined('THINK_PATH')) exit();?><title>物流抢单配送中心</title>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	
		<link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>

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
<style>
#shangjia_tab {border-bottom: 0.00rem #dedede solid !important;}
</style>
<link rel="stylesheet" href="/static/default/wap/css/delivery.css">

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back" style="display:none;">
		<a class="top-addr" href="<?php echo U('mobile/index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			物流抢单配送中心
		</div>
	<div class="top-signed">
		<a href="<?php echo U('delivery/login/logout');?>">退出</a>
	</div>
</header>
<?php if($open_express == '1' ): ?><ul id="shangjia_tab">
        <li style="width: 50%;"><a href="<?php echo U('index/index');?>" class="on">物流抢单</a></li>
        <li style="width: 50%;"><a href="<?php echo U('index/express');?>">众包快递</a></li>
</ul>
<?php else: ?>
<ul id="shangjia_tab">
        <li style="width: 100%;"><a href="<?php echo U('index/index');?>" class="on">物流抢单</a></li>
</ul><?php endif; ?>

<div class="index-top">
	<div class="top-a">
		<div class="user">	
		
			<div class="info">	
				<p>欢迎（<?php echo ($rdv["name"]); ?>），<?php echo ($rdv["id"]); ?>号配送员</p>	
				<p><span>您还有<?php echo ($ing); ?>单未配送，<a href="<?php echo U('lists/index',array('ss'=>2));?>">快去配送吧&gt;&gt;</a></span></p>	
                 <p>
					<span>今日配送：<?php echo ($today_p); ?>单</span>
					<span>今日完成：<?php echo ($today_ok); ?>单</span>
					<span>总计完成：<?php echo ($all_ok); ?>单</span>
				</p>
			</div>	
		</div>	

	</div>
	

    
   

<div class="blank-10 bg"></div>

<div class="panel-list">
<ul>
<li><a href="<?php echo U('lists/index',array('ss'=>0));?>">抢新单：网站目前有（<?php echo ($new); ?>）单待抢配！<i class="icon-angle-right"></i></a></li>
<li><a href="<?php echo U('lists/index',array('ss'=>2));?>"></span>配送中:您目前有（<?php echo ($ing); ?>）单在配送中！<i class="icon-angle-right"></i></a></li>
<li><a href="<?php echo U('lists/index',array('ss'=>8));?>"></span>您已完成:（<?php echo ($ed); ?>）单<i class="icon-angle-right"></i></a></li>
</ul>
</div>
	
	

</div>



	<style>
	.foot-fixed .foot-item { width: 25%;}
	</style>
    
    <footer class="foot-fixed">		
    <a class="foot-item   <?php if(($act == 'index') AND ($ctl == 'index')): ?>active<?php endif; ?>" href="<?php echo U('delivery/index/index');?>">		
    	<span class="icon icon-home"></span>		
        	<span class="foot-label">首页</span>		
            </a>
            		
            <?php if($open_express == '1' ): ?><a class="foot-item  <?php if(($ctl == 'lists') AND ($act != 'express')): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>0));?>">		
            <span class="icon icon-cloud-download"></span><span class="foot-label">订单配送</span></a>		
            
            <a class="foot-item <?php if(($act) == "express"): ?>active<?php endif; ?>" href="<?php echo U('lists/express',array('ss'=>0));?>">			
            <span class="icon icon-truck"></span><span class="foot-label">众包快递</span></a>	
            
            <a class="foot-item <?php if(($act) == "money"): ?>active<?php endif; ?>" href="<?php echo U('index/money');?>">			
            <span class="icon icon-database"></span><span class="foot-label">资金管理</span></a>
            
            <?php else: ?>
            
            
            <a class="foot-item <?php if(($ss) == "0"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>0));?>">		
            <span class="icon icon-cloud-download"></span><span class="foot-label">抢新单</span></a>		
            
            <a class="foot-item <?php if(($ss) == "2"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>2));?>">			
            <span class="icon icon-truck"></span><span class="foot-label">配送中</span></a>	
            
            <a class="foot-item <?php if(($ss) == "8"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>8));?>">			
            <span class="icon icon-check-square"></span><span class="foot-label">已完成</span></a><?php endif; ?>
            	
            
          
            
            </footer>	
            
            	<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
                </body>
                
                </html>