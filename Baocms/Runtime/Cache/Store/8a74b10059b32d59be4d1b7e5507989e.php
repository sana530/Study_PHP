<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title>商家管理中心-<?php echo ($CONFIG["site"]["title"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
        <link rel="stylesheet" href="/static/default/wap/css/store.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<script src="/static/default/wap/js/js_sdk20170302.js"></script>


        <script src="/static/default/wap/js/dingwei.js"></script>
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
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			订座订单管理
		</div>
		<div class="top-share">
			<a href="#" id="cate-btn"></a>
		</div>
	</header>

    
   <div class="line xiaoqu-search">
		<form method="post"  action="<?php echo U('booking/index');?>" id="form1" class="form1">
			<div class="form-group">
				<div class="field">
					<div class="input-group">
						<span class="addbtn"><button type="button" class="button icon-search"></button></span>
                        <input type="hidden" value='<?php echo ($status); ?>' name='status'>
						<input type="text" class="input" name="order_no" size="50" value="<?php echo ($order_id); ?>" placeholder="订单编号"  />
						<span class="addbtn"><button type="submit" class="button">搜索</button></span>
					</div>
				</div>
			</div>
		</form>
	</div>
  
<style>
.xiaoqu-search { margin-top:2rem;}
.list-media-x { margin-top: 0.0rem;}
ul { padding-left: 0px;}
</style>

<!-- 筛选TAB -->
<ul id="shangjia_tab">
        <li style="width: 25%;"><a href="<?php echo U('booking/index',array('status'=>'3'));?>" <?php if(empty($status) || $status == 3): ?>class="on"<?php endif; ?>>未消费</a></li>
        <li style="width: 25%;"><a href="<?php echo U('booking/index',array('status'=>'4'));?>" <?php if($status == 4): ?>class="on"<?php endif; ?>>已消费</a></li>
        <li style="width: 25%;"><a href="<?php echo U('booking/index',array('status'=>'2'));?>" <?php if($status == 2): ?>class="on"<?php endif; ?>>未支付</a></li>
        <li style="width: 25%;"><a href="<?php echo U('booking/index',array('status'=>'1'));?>" <?php if($status == 1): ?>class="on"<?php endif; ?>>已退款</a></li>
</ul>

<div class="list-media-x" id="list-media">
	<ul>
<div class="blank-10 bg"></div>
<?php if(is_array($list)): foreach($list as $key=>$var): ?><li class="line ">
      <dt><a class="x10">订单号:<?php echo ($var["order_id"]); ?></a><a class="x2 text-right">
      
      <?php if($var['status'] == 1): ?>已支付
      <?php elseif($var[status] == 2): ?>已消费 
      <?php elseif($var[status] == -1): ?>已退款
      <?php else: ?>未支付<?php endif; ?> 
      
      
      </a></dt>
        
      <dd class="zhong">
         <div class="12">
            <p class="text-small">预计人数:<?php echo ($var['ding_num']); ?></p>
            <p class="text-small">
               <span class="text-dot1 margin-right">支付定金：<span class="text-dot"><?php echo round($var['amount']/100,2);?>NZD</span></span>
            </p>
            
            <p class="text-small">
               <span class="text-dot1 margin-right">预约时间:<?php echo ($var['ding_date']); ?>   <?php echo ($var['ding_time']); ?></span>
            </p>

            
         </div>
      </dd>
         
         
      <dt>
         <div class="x12">
           <span class="margin-right">预订人姓名：<?php echo ($var["name"]); ?>手机：<?php echo ($var["mobile"]); ?> </span>
         </div>
      </dt> 
      <?php if(empty($status) || $status == 3 || $status == 4): ?><dl>
         <p class="text-left padding-top x8"><a class="text-smal text-dot1" style=" font-size:12px; letter-spacing:0px;">
         创建时间：<?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></a></p>
         <p class="text-right padding-top x4"> 
         <a href="<?php echo U('booking/detail',array('order_id'=>$var['order_id']));?>" class="button button-small bg-dot">查看详情</a>
         </p>
       </dl>
       <?php else: ?>
       
       <dl>
         <p class="text-left padding-top x12"><a class="text-smal text-dot1" style=" font-size:12px; letter-spacing:0px;">创建时间：<?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></a></p>
       </dl><?php endif; ?>  
       
    </li>
 
    <div class="blank-10 bg"></div><?php endforeach; endif; ?>   
  </ul>
</div> 

<div class="blank-20"></div>
<div class="container login-open">
<h5 style="text-align:center"><?php echo ($page); ?><!--分页代码不要忘记加--> </h5>
</div>		

    <footer class="foot-fixed">
	
     <a class="foot-item <?php if(($act) == "store"): ?>active<?php endif; ?>" href="<?php echo U('/store');?>">		
            	<span class="icon  icon-th"></span>			
                <span class="foot-label">首页</span>
            </a>	

			<a class="foot-item <?php if(($ctl) == "booking"): ?>active<?php endif; ?>" href="<?php echo U('store/booking/index');?>">			
            <span class="icon icon-check-square-o"></span>			
            <span class="foot-label">订单</span>		
            </a>	

            <a class="foot-item <?php if(($ctl) == "bookingmenu"): ?>active<?php endif; ?>" href="<?php echo U('store/bookingmenu/index');?>">			
            <span class="icon icon-clone"></span>			
            <span class="foot-label">菜品</span>		
            </a>	
            		
            <a class="foot-item <?php if(($ctl) == "bookingcate"): ?>active<?php endif; ?>" href="<?php echo U('store/bookingcate/index');?>">		
            	<span class="icon icon-bars"></span>			
            <span class="foot-label">分类</span>		
            </a>		
          
           <a class="foot-item <?php if(($ctl) == "setting"): ?>active<?php endif; ?>" href="<?php echo U('store/booking/setting');?>">		
    	    <span class="icon icon-gears"></span>		
        	<span class="foot-label">设置</span>		
        </a>

            </footer>	
           <iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
          </body>
      </html>