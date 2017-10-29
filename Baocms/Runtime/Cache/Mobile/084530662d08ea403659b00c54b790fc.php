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
<script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
<script src="__TMPL__statics/js/jscookie.js"></script>
<script src="/static/default/wap/js/jquery.event.drag-1.5.min.js"></script>
<script src="/static/default/wap/js/jquery.touchSlider.js"></script>
<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('booking/detail',array('shop_id'=>$detail['shop_id']));?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			在线订座
		</div>
		<div class="top-signed">
		</div>
</header> 
    
    
<div class="page-center-box">
    <form method="post" id="ding_form">
	<div class="seatYuyue_slct mb10">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th>人数</th>
                <td colspan="2"><div class="int_box seatYuyue_num_show"><input id="ding_num" name="ding_num" type="text" value="<?php echo ($ding_num); ?>"><em class="linkIco"></em></div></td>
            </tr>
            <tr>
                <th>时间</th>
                <td><input  type="text" name="ding_date" id="ding_date" value="<?php echo ($ding_date); ?>" onFocus="WdatePicker({dateFmt: 'yyyy-MM-dd',minDate:'%y-%M-{%d}'});" placeholder="日期"></td>
                <td width="80"><div class="int_box seatYuyue_time_show "><input id="ding_time" name="ding_time" type="text" value="<?php echo ($ding_time); ?>" placeholder="时间"><em class="linkIco"></em></div></td>
            </tr>
        </table>
    </div>
    <div class="seatYuyue_name border_t border_b">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><input type="text" id="name" value="<?php echo ($name); ?>" name="name" placeholder="请输入您的姓名"></td>
                <td class="box"><label><span class="radioBox_int on"><input name="sex" <?php if($sex == 1): ?>checked="checked"<?php endif; ?> value="1" type="radio"></span>先生</label><label><span class="radioBox_int ml10"><input type="radio" <?php if($sex == 2): ?>checked="checked"<?php endif; ?> name="sex" value="2" ></span>女士</label></td>
            </tr>
        </table>
        <script>
            $(document).ready(function() {
                $(".seatYuyue_name .radioBox_int").click(function(){
                    $(this).parents(".seatYuyue_name").find(".radioBox_int").removeClass("on");
                    $(this).addClass("on");
                });
            });
        </script>
    </div>
        <input type="text" id="mobile" name="mobile" value="<?php echo ($mobile); ?>" class="seatYuyue_int border_b mb10" placeholder="请输入您的手机号码">
        <input type="text" id="note" name="note" value="<?php echo ($note); ?>" class="seatYuyue_int border_t border_b" placeholder="备注：请填写您的需求，我们会尽量安排。"> 
    <div class="seatYuyue_room border_t border_b mt10">
        <ul>
            <input id="ding_type" type="hidden" name="ding_type" value="<?php echo (($ding_type)?($ding_type):0); ?>"/>
            <li class="list">
                <div class="box <?php if($ding_type == 0): ?>on<?php endif; ?>" rel="0"><big>订大厅</big><small class="black9"></small><em class="ico"></em></div>
            </li>
            <li class="list">
                <div class="box <?php if($ding_type == 1): ?>on<?php endif; ?>" rel="1"><big>订包厢</big><small class="black9"></small><em class="ico"></em></div>
            </li>
        </ul>
    	<div class="clear"></div>
        <script>
            $(document).ready(function() {
                $(".seatYuyue_room .box").click(function(){
                    $(".seatYuyue_room .box").removeClass("on");
                    $(this).addClass("on");
                    $("#ding_type").val($(this).attr('rel'));
                });
            });
        </script>
    </div>
    </form>
    <?php if($dingmenus): ?><div class="seatYuyue_menu border_b mt10 mb10">
            <div class="title border_t border_b">菜单</div>
            <ul>
                <?php if(is_array($dingmenus)): foreach($dingmenus as $key=>$item): ?><li class="list"><span class="name"><?php echo ($item['menu_name']); ?></span><span class="num black9">$<?php echo round($item['ding_price']/100,1);?></span><span class="num black9">x<?php echo ($item["cart_num"]); ?></span><span class="black9 right">$<?php echo round($item['total_price']/100,1);?></span></li><?php endforeach; endif; ?>
            </ul>
        </div><?php endif; ?>
</div> 
<footer style="z-index:10;">
    <div style="width:auto; padding:0.35rem 0.6rem; float:none; background:#fff;">
        <input type="button" value="立即预约" id="sub_btn" class="long_btn <?php if(empty($dingmenus)): ?>seatYuyue_show<?php else: ?>cart_btn<?php endif; ?> bgcl1">
    </div>
</footer>
<script>
    $(document).ready(function(){
        $("#sub_btn").click(function(){
            var note = $("#note").val();
            var mobile = $("#mobile").val();
            var name = $("#name").val();
            var ding_date = $("#ding_date").val();
            var ding_time = $("#ding_time").val();
            var ding_num = $("#ding_num").val();
            var ding_type = $("#ding_type").val();
            var sex = $('input[name="sex"]:checked').val();
            SetCookie('note',note);
            SetCookie('mobile',mobile);
            SetCookie('name',name);
            SetCookie('sex',sex);
            SetCookie('ding_date',ding_date);
            SetCookie('ding_time',ding_time);
            SetCookie('ding_num',ding_num);
            SetCookie('ding_type',ding_type);
        })
        
        $("#order_btn").click(function(){
            var url = "<?php echo U('booking/orderCreate',array('shop_id'=>$detail['shop_id']));?>";
            var ding_form = $("#ding_form").serialize();
            var is_app = "<?php echo ($is_app); ?>";
            $.post(url, ding_form, function (data) {
                if (data.status == 'login') {
                    setTimeout(function () {
                        if (!is_app) {
                            window.location.href = "<?php echo U('mobile/passport/login');?>";
                        } else {
                            <?php if ($is_android){?>
                            window.jsObj.goLogin();
                            <?php }else{?>
                             goload();
                            <?php }?>
                        }
                    }, 1000)
                } else if (data.status == 'success') {
                    layer.msg(data.msg);
                     var link = "<?php echo U('booking/pay',array('order_id'=>oooo));?>";
                    setTimeout(function () {
                        window.location.href = link.replace('oooo', data.order_id);
                    }, 1000);
                } else {
                    layer.msg(data.msg);
                }
            }, 'json')
        })
        
        $(".cart_btn").click(function(){
            var url = "<?php echo U('booking/orderCreate',array('shop_id'=>$detail['shop_id']));?>";
            var ding_form = $("#ding_form").serialize();
            $.post(url, ding_form, function (data) {
                if (data.status == 'login') {
                    ajaxLogin();
                } else if (data.status == 'success') {
                    layer.msg(data.msg);
                     var link = "<?php echo U('booking/pay',array('order_id'=>oooo));?>";
                    setTimeout(function () {
                        window.location.href = link.replace('oooo', data.order_id);
                    }, 1000);
                } else {
                    layer.msg(data.msg);
                }
            }, 'json')
        })
        function SetCookie(name, value){
                var Days = 30; 
                var exp = new Date();    
                exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
                document.cookie = name + "=" + value + ";expires=" + exp.toGMTString() +";path=/";
            }
            
            
    })
</script>    
<!--立即预约弹出层-->
<div class="seatYuyue_sclt_mask">
    <div class="maskOne">
    	<div class="title">立即预约 <a href="javascript:;" class="close fr"></a></div>
        <div class="cont">
            <p class="font_size14 font_line24"><?php echo ($detail["shop_name"]); ?>&nbsp;&nbsp;<?php echo ($detail["orders"]); ?>人已定！</p>
            <div class="btn_box">
                <a href="<?php echo U('booking/menu',array('shop_id'=>$detail['shop_id']));?>" class="pub_btn">在线点菜</a>
                <a id="order_btn" href="javascript:void(0);" class="pub_btn bgcl1">直接下单</a>
            </div>
        </div>
    </div>
    <div class="mask_bg"></div>
</div>
<script>
	$(document).ready(function() {
		$(".seatYuyue_show").click(function(){
			$(".seatYuyue_sclt_mask .maskOne").show();
			$(".seatYuyue_sclt_mask .mask_bg").show();
		});
		
		$(".seatYuyue_num_show").click(function(){
			$(".seatYuyue_num_mask .maskOne").show();
			$(".seatYuyue_num_mask .mask_bg").show();
		});
		$(".seatYuyue_num_mask .list").click(function(){
			$(".seatYuyue_num_show input").val($(this).html());
			$(".seatYuyue_num_mask .maskOne").hide();
			$(".seatYuyue_num_mask .mask_bg").hide();
		});
		
		$(".seatYuyue_time_show").click(function(){
			$(".seatYuyue_time_mask .maskOne").show();
			$(".seatYuyue_time_mask .mask_bg").show();
		});
		$(".seatYuyue_time_mask .list").click(function(){
			$(".seatYuyue_time_show input").val($(this).html());
			$(".seatYuyue_time_mask .maskOne").hide();
			$(".seatYuyue_time_mask .mask_bg").hide();
		});
		
		$(".maskOne .close").click(function(){
			$(".maskOne").hide();
			$(".mask_bg").hide();
		});
	});
</script>
<!--立即预约弹出层end-->

<!--选择人数弹出层-->
<div class="seatYuyue_num_mask">
    <div class="maskOne">
    	<div class="title">选择人数 <a href="javascript:void(0);" class="close fr"></a></div>
        <div class="cont">
            <ul>
                <?php if(is_array($room)): $i = 0; $__LIST__ = $room;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="list"><?php echo ($item); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
    	    </ul>
        </div>
    </div>
    <div class="mask_bg"></div>
</div>
<!--选择人数弹出层end--
<!--选择时间弹出层-->
<div class="seatYuyue_time_mask">
    <div class="maskOne">
    	<div class="title">选择时间 <a href="javascript:;" class="close fr"></a></div>
        <div class="cont">
            <ul>
                <?php if(is_array($cfg)): $i = 0; $__LIST__ = $cfg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="list"><?php echo ($item); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
    	    </ul>
        </div>
    </div>
    <div class="mask_bg"></div>
</div>
<!--选择时间弹出层end-->
<!--立即预约弹出层end-->
</body>
</html>