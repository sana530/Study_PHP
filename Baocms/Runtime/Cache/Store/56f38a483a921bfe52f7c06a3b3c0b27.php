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
		<a class="top-addr" href="<?php echo U('store/ele/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		订座基本配置
	</div>
</header>

<style>
.fabu-form .form-content {border: none;resize: none;width: 100%;height: 80px;padding: 10px;font-size: 12px;}
.fabu-form .form-content1 {border: none;resize: none;width: 100%;height: 150px;padding: 10px;font-size: 12px;}
.radio{ width:20px; height:20px; margin:0 5px;} 
</style>

<form class="fabu-form" method="post"  target="x-frame" action="<?php echo U('booking/setting');?>">

<div class="blank-10 bg border-top"></div>
<div class="row">
	<div class="line">
		<span class="x3">通知手机：</span>
		<span class="x9">
			<input type="text" class="text-input" name="data[mobile]" value="<?php echo (($detail["mobile"])?($detail["mobile"]):''); ?>" />
		</span>
	</div>
</div>

<div class="row">
	<div class="line">
		<span class="x3">定金：</span>
		<span class="x9">
			<input type="text" class="text-input" name="data[money]" value="<?php echo round($detail['money']/100,2);?>" />
		</span>
	</div>
</div>

<div class="row">
	<div class="line">
		<span class="x3">相隔时间：</span>
		<span class="x9">
			<input type="text" class="text-input" name="data[bao_time]" value="<?php echo ($detail["bao_time"]); ?>" />
		</span>
	</div>
</div>


<div class="row">
	<div class="line">
		<span class="x3">营业时间：</span>
		<span class="x4">
			<select name="data[start_time]" id="data[start_time]" class="text-select">
				<option value="0" selected="selected">请选择</option>
				<?php foreach($cfg as $key=>$val){?>
                            <option value="<?php echo ($key); ?>" <?php if($key == $detail['start_time']) echo 'selected="selected"';?> ><?php echo ($val); ?></option>
                            <?php }?>
			</select>
		</span>
        <span class="x5">
			<select  name="data[end_time]" id="data[end_time]" class="text-select">
				<?php foreach($cfg as $key=>$val){?>
                            <option value="<?php echo ($key); ?>" <?php if($key == $detail['end_time']) echo 'selected="selected"';?> ><?php echo ($val); ?></option>
                 <?php }?>
			</select>
		</span>

	</div>
</div>




 <div class="row">
    <div class="line">
       <span class="x3">包厢有位：</span>
       <span class="x9">
       <label><input class="radio" type="radio" <?php if($detail['is_bao'] == 1) echo 'checked="checked"';?>  name="data[is_bao]" id="data[is_bao]" value="1"/>有</label>
       <label><input class="radio"  type="radio" <?php if($detail['is_bao'] == 0) echo 'checked="checked"';?>  name="data[is_bao]" id="data[is_bao]" value="0"/>无</label>
       </span>
    </div>
 </div>
 
  <div class="row">
    <div class="line">
       <span class="x3">大厅有位：</span>
       <span class="x9">
       <label><input class="radio"  type="radio" <?php if($detail['is_ting'] == 1) echo 'checked="checked"';?>  name="data[is_ting]" id="data[is_ting]" value="1"/>有</label>
       <label><input  class="radio" type="radio" <?php if($detail['is_ting'] == 0) echo 'checked="checked"';?>  name="data[is_ting]" id="data[is_ting]" value="0"/>无</label>
       </span>
    </div>
 </div>
 

             
   
<div class="container">
                <div class="blank-30"></div>
                <button type="submit" class="button button-block button-big bg-dot">确认修改</button>
                <div class="blank-30"></div>
            </div>

</form>


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