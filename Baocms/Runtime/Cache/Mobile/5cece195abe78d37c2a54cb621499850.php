<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($mobile_title)): echo ($mobile_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
        <meta name="keywords" content="<?php echo ($mobile_keywords); ?>" />
        <meta name="description" content="<?php echo ($mobile_description); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<link rel="stylesheet" href="/static/default/wap/css/base.css?V=1">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css?V=4"/>
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
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('life/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		发布<?php echo ($cate["cate_name"]); ?>
	</div>
</header>



<form class="fabu-form" method="post"  target="x-frame" action="<?php echo U('life/fabu',array('cat'=>$cate['cate_id']));?>">

<div class="blank-10"></div>

 <div class="Upload-img-box">
   <div class="Upload-btn"><input type="file" id="fileToUpload" name="fileToUpload" data-role="none">上传图片</div>
   <div class="Upload-img">
   <div class="list-img loading" style="display:none;"><img src=""></div>
   <div class="list-img jq_photo" style="display:none;"></div>
  </div>
</div>
                    <script type="text/javascript" src="/static/default/wap/js/ajaxfileupload.js"></script>
                    <script>
                        function ajaxupload() {
                            $(".loading").show();
                            $.ajaxFileUpload({
                                url: '<?php echo U("app/upload/upload",array("model"=>"life"));?>',
                                type: 'post',
                                fileElementId: 'fileToUpload',
                                dataType: 'text',
                                secureuri: false, //一般设置为false
                                success: function (data, status) {
                                    $(".loading").hide();
                                    var str = '<img src="__ROOT__/attachs/' + data + '"><input type="hidden" name="data[photo]" value="' + data + '" />';
                                    $(".jq_photo").show().html(str);
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
                            $(document).on("click", ".photo img", function () {
                                $(this).parent().remove();
                            });
                        });
                    </script>


<div class="blank-10 bg border-top"></div>


<div class="row">

	<div class="line">

		<span class="x3">标题</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>" />

		</span>

	</div>

</div>



<?php if(!empty($cate['text1'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["text1"]); ?></span>

		<span class="x9">

			<input type="text" class="text-input" name="data[text1]" value="<?php echo (($detail["text1"])?($detail["text1"]):''); ?>" />

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['text2'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["text2"]); ?></span>

		<span class="x9">

			<input type="text" class="text-input" name="data[text2]" value="<?php echo (($detail["text2"])?($detail["text2"]):''); ?>" />

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['text3'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["text3"]); ?></span>

		<span class="x9">

			<input type="text" class="text-input" name="data[text3]" value="<?php echo (($detail["text3"])?($detail["text3"]):''); ?>" />

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['num1'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["num1"]); ?></span>

		<span class="x9">

			<input type="text" class="text-input" name="data[num1]" value="<?php echo (($detail["num1"])?($detail["num1"]):''); ?>" />

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['num2'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["num2"]); ?></span>

		<span class="x9">

			<input type="text" class="text-input" name="data[num2]" value="<?php echo (($detail["num2"])?($detail["num2"]):''); ?>" />

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['select1'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["select1"]); ?></span>

		<span class="x9">

			<select name="data[select1]" class="text-select">

				<?php if(is_array($attrs["select1"])): foreach($attrs["select1"] as $key=>$item): ?><option value="<?php echo ($item["attr_id"]); ?>" <?php if(($detail["select1"]) == $item["attr_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($item["attr_name"]); ?></option><?php endforeach; endif; ?>

			</select>

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['select2'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["select2"]); ?></span>

		<span class="x9">

			<select name="data[select2]" class="text-select">

				<?php if(is_array($attrs["select2"])): foreach($attrs["select2"] as $key=>$item): ?><option value="<?php echo ($item["attr_id"]); ?>" <?php if(($detail["select2"]) == $item["attr_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($item["attr_name"]); ?></option><?php endforeach; endif; ?>

			</select>

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['select3'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["select3"]); ?></span>

		<span class="x9">

			<select name="data[select3]" class="text-select">

				<?php if(is_array($attrs["select3"])): foreach($attrs["select3"] as $key=>$item): ?><option value="<?php echo ($item["attr_id"]); ?>" <?php if(($detail["select3"]) == $item["attr_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($item["attr_name"]); ?></option><?php endforeach; endif; ?>

			</select>

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['select4'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["select4"]); ?></span>

		<span class="x9">

			<select name="data[select4]" class="text-select">

				<?php if(is_array($attrs["select4"])): foreach($attrs["select4"] as $key=>$item): ?><option value="<?php echo ($item["attr_id"]); ?>" <?php if(($detail["select4"]) == $item["attr_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($item["attr_name"]); ?></option><?php endforeach; endif; ?>

			</select>

		</span>

	</div>

</div><?php endif; ?>

<?php if(!empty($cate['select5'])): ?><div class="row">

	<div class="line">

		<span class="x3"><?php echo ($cate["select5"]); ?></span>

		<span class="x9">

			<select name="data[select4]" class="text-select">

				<?php if(is_array($attrs["select5"])): foreach($attrs["select5"] as $key=>$item): ?><option value="<?php echo ($item["attr_id"]); ?>" <?php if(($detail["select5"]) == $item["attr_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($item["attr_name"]); ?></option><?php endforeach; endif; ?>

			</select>

		</span>

	</div>

</div><?php endif; ?>

<div class="row" style="display:none">

	<div class="line">
		<span class="x3">地域</span>
		<span class="x4"><input name="data[area_name]" class="field text-select" id="locality"></span>
		<span class="x5"><input name="data[business_name]" class="field text-select" id="sublocality_level_1"></span>
		<span>经度：</span><input type="text" name="data[lng]" id="lng"/>
		<span>纬度：</span><input type="text" name="data[lat]" id="lat"/>
	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">联系人</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[contact]" value="<?php echo (($detail["contact"])?($detail["contact"]):''); ?>" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">电话</span>

		<span class="x9">

			<input type="text" class="text-input" name="data[mobile]" value="<?php echo (($detail["mobile"])?($detail["mobile"]):''); ?>" />

		</span>

	</div>

</div>

<div class="row">

	<div class="line">

		<span class="x3">所在区域</span>

		<span class="x9">

		<input id="addr" type="text" class="text-input" name="data[addr]" value="<?php echo (($detail["addr"])?($detail["addr"]):''); ?>">

		<input type="hidden" name="data[lng]" id="lng"/><input type="hidden" name="data[lat]" id="lat"/>

	</span>

	</div>

</div>


<div class="line padding border-bottom">	
        <div id="login-input">
			<div class="life-infor-float" >
				<div class="life-infor-float" >
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&libraries=places&callback=initAutocomplete" async defer></script>
					<div id="allmap" style="width: 100%; height:300px;"></div>
					<script type="text/javascript">
                        var autocomplete;
                        var geolocation;
                        var map;
                        var marker;
                        var infowindow;
                        var geocoder;
                        var markersArray = [];
                        var componentForm = {sublocality_level_1:'long_name', locality: 'long_name'};
                        function initAutocomplete() {
                            geocoder = new google.maps.Geocoder();
                            autocomplete = new google.maps.places.Autocomplete((document.getElementById('addr')),{types: ['geocode']});
                            autocomplete.addListener('place_changed', fillInAddress);
                            geolocate();
                        }
                        function fillInAddress() {
                            geocoder.geocode(
                                { address: autocomplete.getPlace().formatted_address },    //設定地址的字串
                                function(results, status) {
                                    if (status == google.maps.GeocoderStatus.OK) {
                                        geolocation = results[0].geometry.location;
                                        map = new google.maps.Map(document.getElementById("allmap"), { center: geolocation, zoom: 15 });
                                        google.maps.event.addListener(map, 'click', function (event) { placeMarker(event.latLng); });
                                        document.getElementById("sublocality_level_1").value = "";
                                        document.getElementById('locality').value = "";
                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                            for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                                var addressType = results[0].address_components[i].types[j];
                                                if (componentForm[addressType]) {
                                                    var val = results[0].address_components[i][componentForm[addressType]];
                                                    document.getElementById(addressType).value = val;
                                                }
                                            }
                                        }
                                        placeMarker(geolocation, autocomplete.getPlace().formatted_address);
                                    }
                                }
                            );
                        }
                        function geolocate() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    geolocation = { lat: position.coords.latitude, lng: position.coords.longitude };
                                    map = new google.maps.Map(document.getElementById("allmap"), { zoom: 13, center: geolocation });
                                    google.maps.event.addListener(map, 'click', function (event) { placeMarker(event.latLng); });
                                });
                            }
                        }
                        function placeMarker(location, address) {
                            //clearOverlays
                            if (markersArray && markersArray.length > 0) {
                                for (var i = 0; i < markersArray.length; i++) { markersArray[i].setMap(null); }
                                markersArray.length = 0;
                            }
                            if (infowindow) { infowindow.close(); }

                            marker = new google.maps.Marker({position: location, map: map});
                            markersArray.push(marker);
                            if (geocoder) {
                                geocoder.geocode({ 'location': location }, function (results, status) {
                                    if (status == google.maps.GeocoderStatus.OK && results[0]) {
                                        if (!address) { address =  results[0].formatted_address;	}
                                        var message = "<b>座標:</b>" + results[0].geometry.location.lat() + " , " + results[0].geometry.location.lng() + "<br />" + "<b>地址:</b>" + address;
                                        infowindow = new google.maps.InfoWindow({content: message, size: new google.maps.Size(50, 50)});
                                        infowindow.open(map, marker);
                                        document.getElementById("lng").value = results[0].geometry.location.lng();
                                        document.getElementById("lat").value = results[0].geometry.location.lat();
                                        document.getElementById("addr").value = address;
                                        document.getElementById("sublocality_level_1").value = "";
                                        document.getElementById('locality').value = "";
                                        for (var i = 0; i < results[0].address_components.length; i++) {
                                            for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                                var addressType = results[0].address_components[i].types[j];
                                                if (componentForm[addressType]) {
                                                    var val = results[0].address_components[i][componentForm[addressType]];
                                                    document.getElementById(addressType).value = val;
                                                }
                                            }
                                        }
                                    } else {
                                        alert("Geocoder failed due to: " + status);
                                    }
                                });
                            }
                        }
					</script>
				</div>
			</div>
		</div>
                    
	</div>
    
    




<div class="padding">

	<div class="line">

		<span class="x3">详细说明</span>

	</div>

</div>

<div class="line">

	<div class="container">

		<textarea rows="5" name="details" class="text-area" placeholder="请输入内容"></textarea>

	</div>

</div>



	<div class="container">

		<div class="blank-30"></div>

		<button  type="submit" class="button button-block button-big bg-dot">发布信息</button>

		<div class="blank-30"></div>

	</div>

		

</form>

	



<script>
    if(is_kingkr_obj()){document.getElementById("app_link").style.display = "none";}
</script>
<style>
.footer-search{padding:15px;background:#fff;border-bottom:thin solid #eee;padding-bottom:5px}
</style>
<div class="footer">
    <a href="http://pay.1stopbuild.com/app.apk" id="app_link">APP</a> &nbsp;  &nbsp;
    <?php if(!empty($is_shop)): ?><a href="<?php echo U('store/index/index');?>" title="管理商家">管理商家</a>   &nbsp; &nbsp; 
    <?php else: ?>
    <a href="<?php echo U('mcenter/apply/index');?>" title="商家入驻">商家入驻</a>   &nbsp; &nbsp;<?php endif; ?>
    城市:<a class="button button-small text-yellow" href="<?php echo U('city/index');?>"  title="<?php echo bao_msubstr($city_chinese_name,0,20,false);?>"><?php echo bao_msubstr($city_chinese_name,0,20,false);?></a>
</div>

<div class="blank-20"></div>
<?php if($CONFIG[other][footer] == 1): ?><footer class="foot-fixed">
<a class="foot-item <?php if(($ctl) == "index"): ?>active<?php endif; ?>"  href="<?php echo U('index/index');?>">		
<span class="icon icon-home"></span>
<span class="foot-label">首页</span>
</a>



<a class="foot-item <?php if(($ctl) == "nearby"): ?>active<?php endif; ?>" href="<?php echo U('shop/index');?>">

<span class="icon icon-diamond"></span><span class="foot-label">附近商家</span></a>


<a class="foot-item <?php if(($ctl) == "life"): ?>active<?php endif; ?>" href="<?php echo U('life/index');?>">

<span class="icon icon-paw"></span><span class="foot-label">同城信息</span></a>


<a class="foot-item <?php if(($ctl) == "near"): ?>active<?php endif; ?>" href="<?php echo U('tieba/index');?>">

<span class="icon icon-comments-o"></span><span class="foot-label">贴吧</span></a>




<!--<a class="foot-item <?php if(($ctl) == "mall"): ?>active<?php endif; ?>" href="<?php echo U('mall/index');?>">

<span class="icon icon-map-marker"></span><span class="foot-label">商城</span></a>-->



<a class="foot-item <?php if(($ctl) == "mcenter"): ?>active<?php endif; ?>" href="<?php echo U('mcenter/index/index');?>">			

<span class="icon icon-user"></span><span class="foot-label">我的</span></a>



<!--<a class="foot-item <?php if(($ctl) == "biz"): ?>active<?php endif; ?>" href="<?php echo U('index/more');?>">

<span class="icon icon-ellipsis-h"></span><span class="foot-label">更多</span></a>-->







</footer>

<?php else: endif; ?>



<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>

<script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__'; var BAO_SURL = '<?php echo ($CONFIG['site']['host']); ?>__SELF__'</script>
<script>
$(function(){
	var newurl = BAO_SURL.replace(/\?\S+/,'');
	var stitle = "<?php echo ($config['title']); ?>"; 
	var sdesc = "<?php echo ($config['title']); ?>"; 
	//alert(stitle);
	var surl = newurl+'?fuid=<?php echo getuid();?>';	
	var catchpic = $('img');
	var lcatchpic = "<?php echo ($CONFIG['site']['host']); ?>" + $('img').eq(0).attr("src");
	$('img').each(function(){
		if($(this).width() >= 60){
			lcatchpic = $(this).attr("src");
			if(lcatchpic.indexOf("http://") < 0){
				lcatchpic = "<?php echo ($CONFIG['site']['host']); ?>" + lcatchpic;
			}
			return false;
		};
	});
	
	var spic = "<?php echo ($CONFIG['site']['host']); ?>"+BAO_PUBLIC+'/img/logo.jpg';
	if(catchpic.length > 0){
		spic = lcatchpic;
		
	}
})	
</script>	 

</body>

</html>