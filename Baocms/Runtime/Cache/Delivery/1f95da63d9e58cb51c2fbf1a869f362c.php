<?php if (!defined('THINK_PATH')) exit();?><title>配送快递记录</title>
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
<link rel="stylesheet" href="/static/default/wap/css/delivery.css">


 

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('delivery/index/money');?>" ><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			配送快递记录
		</div>
	<div class="top-signed">
		<a href="<?php echo U('delivery/login/logout');?>">退出</a>
	</div>
</header>



<ul id="shangjia_tab">
        <li style="width: 50%;"><a href="<?php echo U('index/lists',array('id'=>$rdv['id']));?>" >物流订单</a></li>
        <li style="width: 50%;"><a href="<?php echo U('index/expresslists',array('id'=>$rdv['id']));?>" class="on">快递订单</a></li>
</ul>


<!-- 筛选TAB -->

<div class="line tab-bar">
	<div class="button-toolbar">
		<div class="button-group">
			<a class="block button bg-dot active" href="#">快递订单列表，共(<?php echo ($count); ?>)条</a>
		</div>
	</div>
</div>


<div class="container1">
<div class="list-media-x" id="list-media">
	<ul>

<?php if(is_array($list)): foreach($list as $key=>$var): ?><li class="line padding">
        <div class="x12">
            <p class="text-small">订单号:<?php echo ($var["express_id"]); ?> &nbsp;&nbsp;|&nbsp;&nbsp;
            状态：<?php if(($var["status"]) == "0"): ?><span style="color:#f6b300;">未处理</span><?php endif; ?>
                 <?php if(($var["status"]) == "1"): ?><span style="color:#f6b300;">已接单</span><?php endif; ?>
                 <?php if(($var["status"]) == "2"): ?><span style="color:#ff0000;">已完成</span><?php endif; ?>
                       

            <p class="text-small">寄件人信息：<?php echo ($var["from_name"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($var["from_addr"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($var["from_mobile"]); ?></p>
            <p class="text-small">收件人信息：<?php echo ($var["to_name"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($var["to_addr"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($var["to_mobile"]); ?></p>
            <p class="text-small">寄件时间：<?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></p>


</div>
</li>
<div class="blank-10 bg"></div><?php endforeach; endif; ?>

 
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