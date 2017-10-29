<?php if (!defined('THINK_PATH')) exit(); $seo_title = $detail['title']; ?>
<!DOCTYPE html>
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

<style>
.icon-angle-right{ float:right; font-size:20px;}
.layui-layer-molv .layui-layer-title { background-color: #F8F8F8;border-bottom: 1px solid #eee; color: #333;}
.global .banner .global_focus p {line-height: inherit !important;border-bottom: none !important; padding: 0;}
</style> 

 
	<header class="top-fixed bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('coupon/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			优惠劵详情
		</div>
		<div class="top-search" style="display:none;">
			<form method="post" action="<?php echo U('coupon/index');?>">
				<input name="keyword" placeholder="输入优惠劵的关键字"  />
				<button type="submit" class="icon-search"></button> 
			</form>
		</div>
		<div class="top-signed">
			<a id="search-btn" href="javascript:void(0);"><i class="icon-search"></i></a>
		</div>
	</header>  
	 <script>
		$(function(){
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
	</script>
	
	<div class="hd-detail">
		<div class="detail-pic">
			<img src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>"/>
			<p><?php echo ($detail["title"]); ?></p>
		</div>
		
		<div class="detail-ctrl">
			<span><em><?php echo ($detail["downloads"]); ?></em>人已成功领取</span>
            <?php $mobile = substr_replace($MEMBER['mobile'],'****',3,4); ?>
            
            <!--如果有绑定手机号-->
            <?php if(empty($MEMBER['mobile'])): ?><a class="btn-sign float-right" id="bind_mobile" href="javascript:void(0);">绑定手机后领取</a>	
            <?php else: ?>
            <a class="btn-sign float-right"  href="<?php echo U('coupon/download',array('coupon_id'=>$detail['coupon_id']));?>">立刻领取</a><?php endif; ?>
				
            
		</div>
		<div class="blank-10 bg"></div>
		<div class="detail-info">
			<h1>优惠劵详情</h1>
            <p>满减说明:满&#36;<?php echo round($detail['full_price']/100,2);?>NZD&nbsp;&nbsp;减&#36;<?php echo round($detail['reduce_price']/100,2);?>NZD</p>
            <p>可领数量:<?php echo ($detail["num"]); ?>张</p>
            <p>单人可领:<?php echo ($detail["limit_num"]); ?>张</p>
            <p>剩余数量:<?php echo ($detail['num']); ?>张</p>
            <p>有效期限:<?php echo ($detail["expire_date"]); ?></p>
			<p>浏览次数:<?php echo ($detail["views"]); ?>次</p>
			<p>使用方式:出示优惠券号码，<?php echo ($shop["shop_name"]); ?>商城下单抵现，有效期限:<?php echo ($detail["expire_date"]); ?>，请领取后及时使用！</p>
		</div>
		<div class="blank-10 bg"></div>
		<div class="detail-info">
			<h1>优惠简介</h1>
			<p><?php echo ($detail["intro"]); ?></p>
		</div>
		<div class="blank-10 bg"></div>
		<div class="detail-info">
			<h1>商家信息</h1>
			<p>提供商家:<a href="<?php echo U('shop/detail',array('shop_id'=>$detail['shop_id']));?>"><?php echo ($shop["shop_name"]); ?></a></p>
			<?php if($ex['near'] != null): ?><p>提供店铺:<?php echo ($ex["near"]); ?></p><?php endif; ?>
			<p>联系电话:<a href="tel:<?php echo ($shop["tel"]); ?>"><?php echo ($shop["tel"]); ?></a></p>
			<p>商家地址:<?php echo ($shop["addr"]); ?></p>
			<p>位置导航:<a href="<?php echo U('shop/gps',array('shop_id'=>$detail['shop_id']));?>">到这里去</a></p>
		</div>
        <div class="blank-10 bg"></div>
		<div class="detail-info">
			<h1>优惠劵详情</h1>
			<div class="global">
                <div class="line banner">	
                    <div id="focus" class="global_focus">
                     <?php echo ($detail["details"]); ?>       
                    </div>
                </div>
        	</div>
        </div>
        <div class="blank-10"></div>
		<div class="blank-10 bg"></div>
		<div class="detail-con">
			<div class="con-hd">使用指南</div>
			<div class="con-bd">
				<img src="/static/default/wap/image/coupon/method.png" />
			</div>
		</div>		
	</div>


<script>

	$('#bind_mobile').click(function(){
		check_user_mobile('<?php echo U("mobile/tuan/tuan_sendsms");?>','<?php echo U("mobile/tuan/tuan_mobile");?>');
	})
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