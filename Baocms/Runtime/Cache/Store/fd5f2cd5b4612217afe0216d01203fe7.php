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
<link href="/static/default/wap/other/jquery-ui.css" rel="stylesheet">
<script src="/static/default/wap/other/jquery-ui.js"></script>
<script type="text/javascript" src="/themes/default/Mobile/statics/js/ajaxfileupload.js"></script>
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			商户认证中心
		</div>
	<div class="top-signed">
	</div>
</header>
<style>
.Upload-img-box{ padding:0.1rem 0.1rem 0px; font-size:0;}
.Upload-btn{ height:34px; width:100px; border-radius:3px; color:#fff; font-size:0.14rem; line-height:34px; position:relative; text-align:center; padding-left:0.2rem; background:#2fbdaa url(/themes/default/Mobile/statics/img/upload.png) no-repeat 0.08rem center;}
.Upload-btn input{ opacity:0; filter:alpha(opacity=0); width:100%; height:100%; position:absolute; left:0; top:0;}
.Upload-img{ overflow:hidden; height:auto;}
.Upload-img .list-img{ width:100px; height:100px; float:left; padding-right:0.1rem; padding-top:0.1rem; background:url(/themes/default/Mobile/statics/img/longding1.gif) no-repeat 0.25rem 0.35rem; background-size:0.5rem 0.5rem;}
.Upload-img .list-img img{ width:100%; height:100%;}
</style>
<div class="blank-10 bg"></div>
<?php if(empty($shop_audit)): ?><form class="fabu-form" method="post"  target="x-frame" action="<?php echo U('audit/index');?>">



<div class="blank-10"></div>

<div class="container">
<div class="Upload-img-box">
    <div class="Upload-btn"><input type="file" id="fileToUpload" name="fileToUpload" >上传营业执照</div>
        <div class="Upload-img" id="jq_imgs">
    </div>
</div>

<script>
                    function ajaxupload() {
                        $.ajaxFileUpload({
                            url: '<?php echo U("app/upload/upload",array("model"=>"tieba"));?>',
                            type: 'post',
                            fileElementId: 'fileToUpload',
                            dataType: 'text',
                            secureuri: false, //一般设置为false
                            success: function (data, status) {
								var str = '<div class="list-img"><img width="200" height="100" src="__ROOT__/attachs/' + data + '">  <input type="hidden" name="photos[]" value="' + data + '" />  <a href="javascript:void(0);">取消</a></div>';
                                $("#jq_imgs").append(str);
                                $("#fileToUpload").unbind('change');
                                $("#fileToUpload").change(function () {
                                    ajaxupload();
                                });
                            }
                        });
                    }

                    $(document).ready(function () {
                        $("#fileToUpload").change(function () {
                            ajaxupload();
                        });
                        $(document).on("click", "#jq_imgs a", function () {
                            $(this).parent().remove();
                        });
                    });
                </script>





<div class="blank-10"></div>
<div class="row">
	<div class="line">
		<span class="x3">企业名称：</span>
		<span class="x9">
			<input type="text" class="text-input" name="data[name]" value="<?php echo (($detail["name"])?($detail["name"]):''); ?>" />
		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">注册号：</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[zhucehao]" value="<?php echo (($detail["zhucehao"])?($detail["zhucehao"]):''); ?>" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">营业地址：</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[addr]" value="<?php echo (($detail["addr"])?($detail["addr"]):''); ?>" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">营业期限：</span>

		<span class="x9">

         <input type="text" class="text-input line-input datepicker" id="svctime" name="data[end_date]" size="30"  readonly="readonly"  value="<?php echo ($detail['end_date']); ?>" placeholder="选择营业期限" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">组织机构代码证：</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[zuzhidaima]" value="<?php echo (($detail["zuzhidaima"])?($detail["zuzhidaima"]):''); ?>" />

		</span>

	</div>

</div>



<div class="row">

	<div class="line">

		<span class="x3">员工姓名：</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[user_name]" value="<?php echo (($detail["user_name"])?($detail["user_name"]):''); ?>" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">员工手机：</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[mobile]" value="<?php echo (($detail["mobile"])?($detail["mobile"]):''); ?>" />

		</span>

	</div>

</div>



	<div class="container">

		<div class="blank-30"></div>

		<button  type="submit" class="button button-block button-big bg-dot">添加认证信息</button>

		<div class="blank-30"></div>

	</div>

</form>



	
<script>

		jQuery(function($){

			$.datepicker.regional['zh-CN'] = {

				closeText: '关闭',

				prevText: '&#x3c;上月',

				nextText: '下月&#x3e;',

				currentText: '今天',

				monthNames: ['一月','二月','三月','四月','五月','六月',

				'七月','八月','九月','十月','十一月','十二月'],

				monthNamesShort: ['一','二','三','四','五','六',

				'七','八','九','十','十一','十二'],

				dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],

				dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],

				dayNamesMin: ['日','一','二','三','四','五','六'],

				weekHeader: '周',

				dateFormat: 'yy-mm-dd',

				firstDay: 1,

				isRTL: false,

				showMonthAfterYear: true,

				yearSuffix: '年'};

			$.datepicker.setDefaults($.datepicker.regional['zh-CN']);

		});

		$(function() {

			$( ".datepicker" ).datepicker();

		});

	</script>

<?php else: ?>



<div class="container">

		<div class="line" style="padding:10px">

	

			<div class="x12">

            

             <?php if($shop_audit['audit'] == 0): ?><h1>未审核 <a class="button button-small bg-dot" href="<?php echo U('audit/edit',array('audit_id'=>$shop_audit['audit_id']));?>">编辑</a></h1>

             <?php else: ?>

             <a class="button button-block button-big bg-gray text-center">已审核无法编辑</a><?php endif; ?>

			</div>

			

		</div>

       </div>

<div class="blank-10 bg"></div><?php endif; ?>





    

    <footer class="foot-fixed">

           <a class="foot-item <?php if(($ctl == 'index') AND ($act != 'more')): ?>active<?php endif; ?>" href="<?php echo U('index/index');?>">		
    	    <span class="icon icon-home"></span>		
        	<span class="foot-label">首页</span>		
            </a>

            <a class="foot-item <?php if(($ctl) == "tuan"): ?>active<?php endif; ?>" href="<?php echo U('store/tuan/index');?>">		
            	<span class="icon icon-plus"></span>			
                <span class="foot-label">抢购</span>
            </a>		
            
           <a class="foot-item <?php if(($ctl) == "mart"): ?>active<?php endif; ?>" href="<?php echo U('store/mart/index');?>">		
            	<span class="icon icon-recycle"></span>			
                <span class="foot-label">微店</span>
            </a>
            
            <a class="foot-item <?php if(($ctl) == "money"): ?>active<?php endif; ?>" href="<?php echo U('store/money/index');?>">		
            	<span class="icon icon-calendar"></span>			
                <span class="foot-label">结算</span>
            </a>
            
            <a class="foot-item <?php if(($ctl) == "dianping"): ?>active<?php endif; ?>" href="<?php echo U('store/dianping/index');?>">		
            	<span class="icon icon-commenting-o"></span>			
                <span class="foot-label">点评</span>
            </a>

            </footer>	
            <iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
        </body>
 </html>