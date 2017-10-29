<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,<?php echo ($ctl); ?>.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
        <script src="__TMPL__statics/js/baocms.js?v=20150801"></script>
        
		<script>
            function bd_encrypt(gg_lat, gg_lon)   
            {
			    /*var x_pi = 3.14159265358979324 * 3000.0 / 180.0;
                var  x = gg_lon;
                var y = gg_lat;  
                var  z = Math.sqrt(x * x + y * y) + 0.00002 * Math.sin(y * x_pi);  
                var  theta = Math.atan2(y, x) + 0.000003 * Math.cos(x * x_pi);  
                var bd_lon = z * Math.cos(theta) + 0.0065;  
                var  bd_lat = z * Math.sin(theta) + 0.006; */

				var page =  "/mobile/near/dingwei/lat/"+gg_lat+"/lng/"+gg_lon+".html";
				$.get(page, function (data) {
					if(data == '1'){
						$.get("/mobile/near/address.html", function (data) {
							if(data!=''){
								$("#local-addr").html(data);
							}else{
								$("#local-addr").html("暂时没获取到位置信息");
							}
						}, 'html');
					}
				}, 'html');
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
			智慧小区
		</div>
		<div class="top-share">
			<a href="javascript:void(0);" id="cate-btn"><i class="icon-bars"></i></a>
		</div>
	</header>
    
<!--定位开始-
<div class="line">
		<div class="blank-10"></div>
		<div class="padding">
			<i class="icon-map-marker"></i> <span id="local-addr"></span> (<a href="javascript:reset();" class="text-gray" id="local-reset">重新定位</a>)
		</div>
	</div>

<!--定位结束-->	
    <div class="serch-bar-mask" id="cate_menu" style="display:none;top:50px;">
		<div class="serch-bar-mask-list">
			<ul>
            <li><a <?php if($area_id == null): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('community/index',array('change'=>1));?>">All</a></li>
            <?php if(is_array($areas)): $index = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($index % 2 );++$index; if($var['city_id'] == $city_id){ ?>
                <li <?php if($index%3 == 2): ?>class="area_spe"<?php endif; ?> ><a <?php if($var["area_id"] == $area_id): ?>class="on"<?php endif; ?>  href="<?php echo LinkTo('community/index',array('area'=>$var['area_id'],'change'=>1));?>"><?php echo ($var["area_name"]); ?></a></li>
                <?php } endforeach; endif; else: echo "" ;endif; ?>
            
			</ul>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$("#cate-btn").click(function () {
				$("#cate_menu").toggle();
			});
			
			$("#cate_menu ul li a").click(function () {
				$("#cate_menu").toggle();
			});

		});
	</script>
	
	<div class="line xiaoqu-search">
		<form method="post"  action="<?php echo U('community/index',array('change'=>1));?>" id="form1" class="form1">
			<div class="form-group">
				<div class="field">
					<div class="input-group">
						<span class="addbtn"><button type="button" class="button icon-search"></button></span>
						<input type="text" class="input" name="keyword" size="50" value="<?php echo ($keyword); ?>" placeholder="输入小区名"  />
						<span class="addbtn"><button type="submit" class="button">Search</button></span>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<div class="xiaoqu-list">
		<ul id="xiaoqu-list"></ul>  
	</div>

    <script>
		$(document).ready(function () {
			loaddata('<?php echo ($nextpage); ?>', $("#xiaoqu-list"), true);
		});
    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&callback=initMap"></script>
	<script>
		$(document).ready(function () {
			TouchSlide({ 
				slideCell:"#focus",
				titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
				mainCell:".bd", 
				effect:"left", 
				autoPlay:false,//自动播放
				autoPage:true, //自动分页
			});
			$("#search-btn").click(function(){
				if($(".top-search").css("display")=='block'){
					$(".top-search").hide();
					$(".top-title").show(200);
				}
				else{
					$(".top-search").show();
					$(".top-title").hide(200);
				}
			});
			
		});
        function initMap() {
            var addr = $("#local-addr").html();
            $("#local-addr").html("定位中……");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {lat: position.coords.latitude,lng: position.coords.longitude};
                    var map = new google.maps.Map(document.getElementById('allmap'), {center: pos,zoom: 14});
                    var geocoder = new google.maps.Geocoder();
                    var coordsss = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    var marker = new google.maps.Marker({position: coordsss});

                    marker.setMap(map);
                    google.maps.event.addListener(marker,'click',function() {map.setZoom(15); map.setCenter(marker.getPosition());});
                    geocoder.geocode({'latLng': coordsss }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results) {
                                $("#local-addr").html(results[0].formatted_address);
                            }
                        }
                        else {
                            alert("Reverse Geocoding failed because: " + status);
                        }
                    });
                });
            }
        }
	</script>
    
		
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