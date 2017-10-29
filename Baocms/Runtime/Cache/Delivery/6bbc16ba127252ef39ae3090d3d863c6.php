<?php if (!defined('THINK_PATH')) exit();?><title>资金管理中心</title>
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
.index-top .top-a {background: #989898;}
#shangjia_tab {border-bottom: 0.00rem #dedede solid !important;}
</style>
<link rel="stylesheet" href="/static/default/wap/css/delivery.css">

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('mobile/index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			资金管理中心
		</div>
	<div class="top-signed">
		<a href="<?php echo U('delivery/login/logout');?>">退出</a>
	</div>
</header>

<style>
.index-top {margin-top: 0rem;}
</style>

<div class="index-top">
	<div class="top-a">
		<div class="user">	
		
			<div class="info">	
				<p>欢迎：（<?php echo ($rdv["name"]); ?>），id（<?php echo ($rdv["id"]); ?>）</p>	
                <p>手机：<?php echo ($rdv["mobile"]); ?></p>	
				<p>您一共配送：<?php echo ($statistics); ?>单，单价<?php echo ($price); ?>NZD一单，一共收入<?php echo ($total); ?>NZD</p>	
               
                
			</div>	
		</div>	

	</div>
	

    
  

<div class="blank-10 bg"></div>

<div class="panel-list">
<ul>
<li><a href="<?php echo U('lists',array('id'=>$rdv['id']));?>">我的配送详情<i class="icon-angle-right"></i></a></li>
<li><a href="#">申请提现（余额：<?php echo ($total); ?>NZD），请联系管理员<i class="icon-angle-right"></i></a></li>
<li><a href="<?php echo U('delivery/login/logout');?>">退出系统<i class="icon-angle-right"></i></a></li>
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