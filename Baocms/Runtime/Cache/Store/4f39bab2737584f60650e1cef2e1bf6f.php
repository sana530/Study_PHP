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
<link rel="stylesheet" type="text/css" href="/static/default/webuploader/webuploader.css">
<script src="/static/default/webuploader/webuploader.min.js"></script>
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo u('mart/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">添加商品</div>
	<div class="top-share">
		<a href="<?php echo u('mart/goodscate');?>" class="top-addr icon-plus"> 分类</a>
	</div>
</header>
<style>
	.shuxing{width: 20px; height: 20px;margin-bottom: 10px;}
	.Upload-img .jq_photo_more span.resporse_photo, .Upload-img .moreToUpload_img{margin:0 5px 5px 0; float:left; z-index:3;}
	.Upload-img .jq_photo_more span.resporse_photo img, .Upload-img .jq_uploads_img img{width:100%;margin-bottom:3px;}
	.Upload-img .jq_photo_more span.resporse_photo a.resporse_a, .Upload-img .jq_uploads_img .moreToUpload_img a{ font-size:12px; color:#FFF;margin-right: 0px;bottom:0;width:45px;height:20px;line-height:20px;text-align:center;background: #06c1ae;padding: 0 10px;}
	.fabu-form .form-content {border: none;resize: none;width: 100%;height: 80px;padding: 10px;font-size: 12px;}
	.fabu-form .form-content1 {border: none;resize: none;width: 100%;height: 150px;padding: 10px;font-size: 12px;}

</style>
<form class="fabu-form" method="post" target="x-frame" action="<?php echo U('goods/create');?>">
	<div class="blank-10"></div>
	<div class="blank-10"></div>
	<div class="Upload-img-box">
		<div id="fileToUpload">
			添加商品主图
		</div>
		<div class="Upload-img">
			<div class="list-img loading">
				<img src="<?php echo config_img($detail['photo']);?>">
			</div>
			<div class="list-img jq_photo" style="display:none;">
			</div>
		</div>
	</div>
	<script>
        var width_good = '<?php echo thumbSize($CONFIG[attachs][goods][thumb],0);?>';
        var height_good = '<?php echo thumbSize($CONFIG[attachs][goods][thumb],1);?>';
        var uploader = WebUploader.create({
            auto: true,
            swf: '/static/default/webuploader/Uploader.swf',
            server: '<?php echo U("app/upload/uploadify",array("model"=>"goods"));?>',
            pick: '#fileToUpload',
            resize: true,
            compress : {width:width_good,height:height_good,quality:60,allowMagnify: false,crop: true}//裁剪
        });
        uploader.on( 'beforeFileQueued', function( file ) {
            $(".loading").show();
            if(file.size > 1024000){
                uploader.option( 'compress', {
                    width:width_good,//这里裁剪长度
                    quality:60
                });
            }
        });
        uploader.on( 'uploadSuccess', function( file,resporse) {
            $(".loading").hide();
            var str = '<img src="/attachs/'+resporse._raw+'"><input type="hidden" name="data[photo]" value="' + resporse._raw + '" />';
            $(".jq_photo").show().html(str);
        });
        uploader.on( 'uploadError', function( file ) {
            alert('上传出错');
        });
        $(document).ready(function () {
            $(document).on("click", ".photo img", function () {
                $(this).parent().remove();
            });
        });
	</script>

	<div class="blank-30"></div>

	<div class="Upload-img-box">
		<div id="moreToUpload">添加更多图片</div>
		<div class="blank-10"></div>
		<div class="Upload-img">
			<div class="list-img loading_photo" style="display:none;">

			</div>
			<div class="list-img jq_photo_photo" style="display:none;">
			</div>
			<div class="jq_photo_more">
			</div>
			<div class="jq_uploads_img">
				<?php if(is_array($photos)): foreach($photos as $key=>$item): ?><div class="moreToUpload_img  x3">
						<img src="<?php echo config_img($item['photo']);?>">
						<a href="javascript:void(0);">取消</a>
					</div><?php endforeach; endif; ?>
			</div>
		</div>
	</div>
	<script>
        var width_goods_pic = '<?php echo thumbSize($CONFIG[attachs][goods][thumb],0);?>';
        var height_goods_pic = '<?php echo thumbSize($CONFIG[attachs][goods][thumb],1);?>';
        var uploader = WebUploader.create({
            auto: true,
            swf: '/static/default/webuploader/Uploader.swf',
            server: '<?php echo U("app/upload/uploadify",array("model"=>"goods"));?>',
            pick: '#moreToUpload',
            fileNumberLimit:10,
            resize: true,
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,png',
                mimeTypes: 'image/*'
            },
            compress:{width:width_goods_pic,height:height_goods_pic,quality:80,allowMagnify: false,crop: true}
        });

        uploader.on( 'beforeFileQueued', function( file ) {
            $(".loading_photo").show();
            if(file.size > 1024000){
                uploader.option( 'compress', {
                    width:width_goods_pic,
                    quality:60
                });
            }
        });
        uploader.on('uploadSuccess', function( file,resporse) {console.log(resporse._raw);console.log(file)
            $(".loading_photo").hide();
            var str = '<span class="resporse_photo x3"><img src="/attachs/' + resporse._raw + '">  <input type="hidden" name="photos[]" value="' + resporse._raw + '" /><a class="resporse_a" href="javascript:void(0);">取消</a> </span>';
            $(".jq_photo_more").append(str);
        });
        uploader.on( 'uploadError', function( file ) {
            alert('上传出错');
        });
        $(document).ready(function () {
            $(document).on("click", ".jq_uploads_img a", function () {
                $(this).parent().remove();
            });
            $(document).on("click", ".jq_photo_more a", function () {
                $(this).parent().remove();
            });
        });
	</script>
	<div class="blank-10"></div>

	<div class="blank-10 bg border-top"></div>
	<div class="row">
		<div class="line">
			<span class="x3">商品名称:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[title]" placeholder="不超过20个字" />
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商品简介:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[intro]" placeholder="不超过30个字" />
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商品规格:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[guige]" placeholder="如件、条、份、卷、张、kg等"  />
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商品库存:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[num]" placeholder="请填上数目"  />
			</span>
		</div>
	</div>
	<!--二开开始-->
	<div class="row" style="display:none;">
		<div class="line">
			<span class="x3">是否免运费:</span>
			<span class="x9">
			<label><span>免运费</span>
			<input style="width: 20px; height: 20px;" type="radio" name="data[is_reight]" value="0" <?php if(($detail["is_reight"]) == "0"): ?>checked="checked"<?php endif; ?> >
			</label>
			<label><span style="margin-left: 20px;">不免运费</span>
			<input style="width: 20px; height: 20px;" type="radio" name="data[is_reight]" value="1" <?php if(($detail["is_reight"]) == "1"): ?>checked="checked"<?php endif; ?>>
			</label>
			</span>
		</div>
	</div>
	<div class="row" style="display:none;">
		<div class="line">
			<span class="x3">商品重量:</span>
			<span class="x9">
			<input type="text" placeholder="不支持小数点" class="text-input" name="data[weight]" />
			</span>
		</div>
	</div>
	<div class="row" style="display:none;">
		<div class = "line">
			<span class="x3">运费模板:</span>
			<span class="x9">
			<select id="kuaidi_id" name="data[kuaidi_id]" class="text-select">
				<option value="0" selected="selected">请选择</option>
				<?php if(is_array($kuaidi)): foreach($kuaidi as $key=>$var): ?><option value="<?php echo ($var["id"]); ?>"  <?php if(($var["id"]) == $detail["kuaidi_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			</span>
		</div>
	</div>
	<!--二开结束-->
	<div class="row">
		<div class="line">
			<span class="x3">商品分类:</span>
			<span class="x4">
			<select name="parent_id" id="parent_id" class="text-select">
				<option value="0" selected="selected">请选择</option>
				<?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>" <?php if(($var["cate_id"]) == $parent_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endif; endforeach; endif; ?>
			</select>
			</span>
			<span class="x5">
			<select name="data[cate_id]" id="cate_id" class="text-select">
				<option value="0">请选择分类...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): if(($var["cate_id"]) == $parent_id): if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var2["cate_name"]); ?></option>
										<?php if(is_array($cates)): foreach($cates as $key=>$var3): if(($var3["parent_id"]) == $var2["cate_id"]): ?><option  value="<?php echo ($var3["cate_id"]); ?>"  <?php if(($var3["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> >&nbsp;&nbsp;-<?php echo ($var3["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; endif; endif; endforeach; endif; ?>
			</select>
			</span>
			<script>
                $(document).ready(function (e) {
                    $("#parent_id").change(function () {
                        var url = '<?php echo U("goods/child",array("parent_id"=>"0000"));?>';
                        if ($(this).val() > 0) {
                            var url2 = url.replace('0000', $(this).val());
                            $.get(url2, function (data) {
                                $("#cate_id").html(data);
                            }, 'html');
                        }
                    });
                });
			</script>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商家分类：</span>
			<span class="x5">
			<select id="shopcate_id" name="data[shopcate_id]" class="text-select">
				<option value="0" selected="selected">请选择</option>
				<?php if(is_array($autocates)): foreach($autocates as $key=>$var): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $detail["shopcate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endforeach; endif; ?>
			</select>
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<div class="blank-10"></div>
			<span class="x3">属性:</span>
			<span class="x9">
				<label style="width:50%; float:left;"><span>认证商家:</span><input class="shuxing" type="checkbox" name="data[is_vs1]" value="1" /></label>
				<label style="width:50%; float:left;"><span style="margin-left: 20px;">正品保证:</span><input class="shuxing" type="checkbox" name="data[is_vs2]" value="1" /></label>
				<label style="width:50%; float:left;"><span style="margin-left: 0px;">假一赔十:</span><input class="shuxing" type="checkbox" name="data[is_vs3]" value="1" /></label>
				<label style="width:50%; float:left;"><span style="margin-left: 20px;">当日送达:</span><input class="shuxing" type="checkbox" name="data[is_vs4]" value="1" /></label>
				<label style="width:50%; float:left;"><span style="margin-left: 14px;">免运费:</span><input class="shuxing" type="checkbox" name="data[is_vs5]" value="1" /></label>
				<label style="width:50%; float:left;"><span style="margin-left: 20px;">货到付款:</span><input class="shuxing" type="checkbox" name="data[is_vs6]" value="1" /></label>

		</span>
		</div>
	</div>

	<div class="row">
		<div class="line">
			<span class="x3">市场价格:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[price]" />
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商城价格:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[mall_price]" />
			</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">代理商价格:</span>
			<span class="x9"><input type="text" class="text-input" name="data[is_agent_price]"/></span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">可使用积分:</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[use_integral]" placeholder="100分抵$1,若商品为$1,则不高于100分"  value="<?php echo (($detail["use_integral"])?($detail["use_integral"]):''); ?>" />
			</span>
		</div>
	</div>

	<!--添加详情-->
	<div class="row">
		<div class="line">
			<span class="x3">购买须知</span>
			<span class="x9">
					<textarea rows="5" name="data[instructions]" id="data_instructions" class="text-area" placeholder="请输入内容"></textarea>
				</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">商品详情</span>
			<span class="x9">
					<textarea rows="5"  id="data_details" name="data[details]" class="text-area" placeholder="请输入内容"></textarea>
				</span>
		</div>
	</div>
	<!--下面是时间-->
	<div class="blank-10" bg>
	</div>
	<div class="blank-20">
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">过期时间：</span>
			<span class="x9">
			<input type="text" class="text-input line-input datepicker" id="svctime1" name="data[end_date]" size="30" readonly="readonly" value="<?php echo ($detail['end_date']); ?>" placeholder="选择过期时间" />
			</span>
		</div>
		<div class="blank-20">
		</div>
	</div>

	<div class="blank-10 bg">
	</div>
	<div class="container">
		<div class="blank-30">
		</div>
		<button type="submit" class="button button-block button-big bg-dot">发布商品</button>
		<div class="blank-30">
		</div>
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