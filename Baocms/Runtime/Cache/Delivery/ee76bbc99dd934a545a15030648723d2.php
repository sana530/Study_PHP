<?php if (!defined('THINK_PATH')) exit();?><title>物流配送中心</title>

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
<script src = "/themes/default/Mobile/statics/js/jquery-1.7.1.min.js" ></script>
<script src="/themes/default/Mobile/statics/js/layer/layer.js"></script>

 

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('delivery/index/express');?>" ><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			快递众包
		</div>
	<div class="top-signed">
		<a href="<?php echo U('delivery/login/logout');?>">退出</a>
	</div>
</header>



<ul id="shangjia_tab">
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/express',array('ss'=>0));?>" <?php if(($ss) == "0"): ?>class="on"<?php endif; ?>>抢快递</a></li>
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/express',array('ss'=>1));?>"<?php if(($ss) == "1"): ?>class="on"<?php endif; ?>>配送中</a></li>
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/express',array('ss'=>2));?>"<?php if(($ss) == "2"): ?>class="on"<?php endif; ?>>已完成</a></li>
</ul>


<!-- 筛选TAB -->

<div class="line tab-bar">
	<div class="button-toolbar">
		<div class="button-group">
			<a class="block button bg-dot active" href="#">订单列表
             <?php if(($ss) == "0"): ?>抢快递<?php endif; ?>
            <?php if(($ss) == "1"): ?>配送中<?php endif; ?>
            <?php if(($ss) == "2"): ?>已完成<?php endif; ?>
            </a>
		</div>
	</div>
</div>







<div class="container1">

<div class="list-media-x" id="list-media">

	<ul>



<?php if(is_array($rdv)): $i = 0; $__LIST__ = $rdv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li class="line padding">

        <div class="x12">

            <p class="text-small">快递编号:<?php echo ($r["express_id"]); ?> <a class="icon icon-send radius-little " style=" color:#F00; padding:0px 5px;"> 距离<?php echo ($r["d"]); ?></a>

           </p>



 
			<p class="text-small"><?php echo ($r["title"]); ?></p> 
            <p class="text-small">下单时间： <?php echo (date('Y-m-d H:i:s',$r["create_time"])); ?></p> 
            <div class="blank-10"></div>
            <p class="text-small">寄件人：<?php echo ($r["from_name"]); ?>  <?php echo ($r["from_mobile"]); ?></p>
            <p class="text-small">地址：<?php echo ($r["to_addr"]); ?> </p>
            <div class="blank-10"></div>
            <p class="text-small1">收件人：<?php echo ($r["to_name"]); ?>  <?php echo ($r["to_mobile"]); ?></p>
            <p class="text-small1">地址：<?php echo ($r["to_addr"]); ?> </p>

            

            




<div class="blank-10"></div>

<p class="text-right padding-top">




<?php if(($r["status"]) == "0"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">抢单中</a><?php endif; ?>
<?php if(($r["status"]) == "1"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">配送中</a><?php endif; ?>
<?php if(($r["status"]) == "2"): ?><a href="javascript:void(0);" class="button button-small bg-gray">已完成</a><?php endif; ?> 







<?php if(($r["status"]) == "0"): ?><a href="javascript:void(0);" val="<?php echo ($r["express_id"]); ?>" class="button button-small bg-dot qiang_btn">抢单</a><?php endif; ?>
<?php if(($r["status"]) == "1"): ?><a href="javascript:void(0);" val="<?php echo ($r["express_id"]); ?>" class="button button-small bg-dot ok_btn">确认完成</a><?php endif; ?>



</p>

          </p>
        </div>
    </li>

    <div class="blank-10 bg"></div><?php endforeach; endif; else: echo "" ;endif; ?><!--循环结束-->

 <script type="text/javascript" language="javascript">
                $(document).ready(function () {
                    $('.qiang_btn').click(function () {
                        var id = $(this).attr('val');
                        $.post('<?php echo U("lists/qiang");?>', {express_id: id}, function (result) {
                            if (result.status == 'success') {
                                layer.msg(result.message);
                                setTimeout(function () {
                                    location.reload(true);
                                    window.location.href = "<?php echo U('lists/express',array('ss'=>1));?>";
                                }, 1500);
                            } else {
                                layer.msg(result.message);
                            }
                        }, 'json');
                    })

                    $('.ok_btn').click(function () {
                        var id = $(this).attr('val');
                        $.post('<?php echo U("lists/express_ok");?>', {express_id: id}, function (result) {
                            if (result.status == 'success') {
                                layer.msg(result.message, {icon: 6});
                                setTimeout(function () {
                                    //location.reload(true);
                                    window.location.href = "<?php echo U('lists/express',array('ss'=>2));?>";
                                }, 1500);
                            } else {
                                layer.msg(result.message);
                            }
                        }, 'json');
                    })
                })

            </script>





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