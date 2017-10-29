<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?>会员中心</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/mcenter.css"/>
		<link rel="stylesheet" href="/static/default/wap/css/intel.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/intel.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,mcenter.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
	</head>
	<body>

<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('mcenter/member/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		发布快递
	</div>
</header>


<form method="post" id="fa-from"  target="x-frame" action="<?php echo U('express/create');?>"   >
	
	<div class="line padding border-bottom">
		<div class="x3">
			标题:
		</div>
		<div class="x9">
			 <input data-role="none" class="text-input" type="text" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>"  >
		</div>
	</div>
    <div class="blank-20 bg"></div>
    <div class="line padding border-bottom">
		<div class="x4">
			寄件人姓名:
		</div>
		<div class="x8">
			 <input data-role="none" class="text-input" type="text" name="data[from_name]" value="<?php if($MEMBER["nickname"] != null): echo ($MEMBER["nickname"]); ?> <?php else: endif; ?>" >
		</div>
	</div>
    <div class="line padding border-bottom">
		<div class="x4">
			寄件人地址:
		</div>
		<div class="x8">
			 <input id="from_addr" data-role="none" class="text-input" type="text" name="data[from_addr]" value="<?php if(!empty($useraddr)): if(is_array($useraddr)): foreach($useraddr as $key=>$item): echo ($item["addr"]); endforeach; endif; ?>
<?php else: endif; ?>"  >
		</div>
	</div>
    <div class="line padding border-bottom">
		<div class="x4">
			寄件人手机:
		</div>
		<div class="x8">
			 <input data-role="none" class="text-input" type="text" name="data[from_mobile]" value="<?php if($MEMBER["mobile"] != null): echo ($MEMBER["mobile"]); ?> <?php else: endif; ?>"  >
		</div>
	</div>
    
    <div class="blank-20 bg"></div>
    
    <div class="line padding border-bottom">
		<div class="x4">
			收件人姓名:
		</div>
		<div class="x8">
			 <input data-role="none" class="text-input" type="text" name="data[to_name]" value="<?php echo (($detail["to_name"])?($detail["to_name"]):''); ?>"  >
		</div>
	</div>
    <div class="line padding border-bottom">
		<div class="x4">
			收件人地址:
		</div>
		<div class="x8">
			 <input id="to_addr" data-role="none" class="text-input" type="text" name="data[to_addr]" value="<?php echo (($detail["to_addr"])?($detail["to_addr"]):''); ?>"  >
		</div>
	</div>
    <div class="line padding border-bottom">
		<div class="x4">
			收件人手机:
		</div>
		<div class="x8">
			 <input data-role="none" class="text-input" type="text" name="data[to_mobile]" value="<?php echo (($detail["to_mobile"])?($detail["to_mobile"]):''); ?>"  >
		</div>
	</div>
    
    <div class="blank-20 bg"></div>
    <div class="line padding border-bottom">
		
        <div class="life-infor-float" >
                            <div class="life-infor-float" >
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&libraries=places&callback=initAutocomplete" async defer></script>
                                <div id="allmap" style="width: 100%; height:300px;"></div>
								<script type="text/javascript">
                                    var autocomplete;
                                    function initAutocomplete() {
                                        new google.maps.places.Autocomplete((document.getElementById('to_addr')),{types: ['geocode']});
                                        autocomplete = new google.maps.places.Autocomplete((document.getElementById('from_addr')),{types: ['geocode']});
                                        autocomplete.addListener('place_changed', fillInAddress);
                                        geolocate();
                                    }

                                    function fillInAddress() {
                                        var place = autocomplete.getPlace();
                                        var geocoder = new google.maps.Geocoder();  //定義一個Geocoder物件
                                        geocoder.geocode(
                                            { address: place.formatted_address },    //設定地址的字串
                                            function(results, status) {    //callback function
                                                if (status == google.maps.GeocoderStatus.OK) {    //判斷狀態
                                                    var myCenter = results[0].geometry.location;
                                                    var map = new google.maps.Map(document.getElementById("allmap"), {center: myCenter, zoom: 15});
                                                    var marker = new google.maps.Marker({position: myCenter});
                                                    marker.setMap(map);
                                                    google.maps.event.addListener(marker,'click',function() {map.setZoom(15); map.setCenter(marker.getPosition());});
                                                }
                                            }
                                        );
                                    }
                                    function geolocate() {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function(position) {
                                                var geolocation = {lat: position.coords.latitude, lng: position.coords.longitude};
                                                var circle = new google.maps.Circle({center: geolocation,radius: position.coords.accuracy});
                                                new google.maps.Map(document.getElementById('allmap'), {center: geolocation,zoom: 13,mapTypeId: 'roadmap'});
                                                autocomplete.setBounds(circle.getBounds());
                                            });
                                        }
                                    }
								</script>
                            </div>
                        </div>
                    
	</div>

	
    
	

    <div class="blank-30"></div>
    <div class="container"><button id="submit-post" class="button button-block button-big bg-dot">发布快递</button></div>
	<div class="blank-30"></div>
	<script>
		$('#submit-post').click(function(){
            if(confirm('快递费用为<?php echo ($delivery_price); ?>')){
                $('#fa-from').submit();
            }
            return false;
		})
	</script>
</form>
<div class="blank-20"></div>
 <footer class="foot-fixed">
  <?php if($ctl == 'member'): ?><a class="foot-item  <?php if($ctl == 'member'): ?>active<?php endif; ?>" href="<?php echo u('mobile/index/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">首页</span>
    </a>
  <?php else: ?>
  <a class="foot-item" href="<?php echo u('member/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">用户首页</span>
    </a><?php endif; ?>
    
    <a class="foot-item " href="<?php echo LinkTo('mobile/life/release');?>">			
    <span class="icon icon-plus"></span><span class="foot-label">发布</span></a>
    
     <a class="foot-item  <?php if(($ctl == 'tuancode')): ?>active<?php endif; ?>" href="<?php echo u('tuancode/index');?>">			
    <span class="icon icon-folder"></span><span class="foot-label">抢购劵</span></a>
    
    
    
    <a class="foot-item  <?php if(($ctl == 'message') ||($act == 'xiaoxizhongxin')): ?>active<?php endif; ?>" href="<?php echo u('message/index');?>">			
    <span class="icon icon-volume-up"></span><span class="foot-label">消息</span></a>
    
    <a class="foot-item  <?php if(($ctl == 'money') || ($ctl == 'logs') || ($ctl == 'cash') ||($act == 'zijinguanli')): ?>active<?php endif; ?>" href="<?php echo u('information/index');?>">			
    <span class="icon icon-gear"></span><span class="foot-label">设置</span></a>
    
   
    </footer>


<iframe id="x-frame" name="x-frame" style="display:none;">
</iframe>
</body>
</html>