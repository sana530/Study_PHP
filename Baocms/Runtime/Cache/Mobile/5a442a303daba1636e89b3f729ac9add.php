<?php if (!defined('THINK_PATH')) exit(); $mobile_title = $detail['shop_name'].'订座首页'; ?>
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
<script src="/static/default/wap/other/roll.js"></script>
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('booking/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			<?php echo ($detail["shop_name"]); ?>
		</div>
		<div class="top-signed">
		</div>
	</header>
    <?php $i = 2; ?>
<?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Hotel,shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Hotel")->where("shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $is_hotel = $item; $i++; ?> <?php endforeach; ?>
<?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Ele,shop_id = {$detail['shop_id']} AND audit = 1,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Ele")->where("shop_id = {$detail['shop_id']} AND audit = 1")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ($item['is_delivery'] == 1) && ($i++); $is_ele = $item; $i++; ?> <?php endforeach; ?>
<?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Booking,shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Booking")->where("shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $is_booking = $item; $i++; ?> <?php endforeach; ?>
<?php $width = 100/$i; $action = strtolower(ACTION_NAME); ?>
<ul id="shangjia_tab">
    <li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('shop/detail',array('shop_id'=>$detail['shop_id']));?>" <?php if(($ctl == 'shop') AND ($action == 'detail')): ?>class="on"<?php endif; ?>>首页</a>
    </li>
    <?php if(!empty($is_hotel)): ?><li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('hotel/detail',array('hotel_id'=>$is_hotel['hotel_id']));?>" <?php if(($ctl == 'hotel') AND ($action == 'detail')): ?>class="on"<?php endif; ?>>酒店</a>
    </li><?php endif; ?>
    <?php if(!empty($is_ele)): ?><li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('ele/shop',array('shop_id'=>$detail['shop_id']));?>" <?php if(($ctl == 'ele') AND ($action == 'shop') AND ($is_delivery == '0')): ?>class="on"<?php endif; ?>>美食</a>
    </li><?php endif; ?>
    <?php if((!empty($is_ele)) AND ($is_ele['is_delivery'] == 1)): ?><li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('ele/shop',array('shop_id'=>$detail['shop_id'],'delivery'=>1));?>" <?php if(($ctl == 'ele') AND ($action == 'shop') AND ($is_delivery == '1')): ?>class="on"<?php endif; ?>>外送</a>
    </li><?php endif; ?>
    <?php if(!empty($is_booking)): ?><li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('booking/detail',array('shop_id'=>$detail['shop_id']));?>" <?php if(($ctl == 'booking') AND ($action == 'detail')): ?>class="on"<?php endif; ?>>订座</a>
    </li><?php endif; ?>
    <li style="width:<?php echo ($width); ?>%;">
        <a href="<?php echo U('shop/dianping',array('shop_id'=>$detail['shop_id']));?>" <?php if(($ctl == 'shop') AND ($action == 'dianping')): ?>class="on"<?php endif; ?>>评价</a>
    </li>
</ul>

    <div class="tuan-detail have-header">
    <div class="line banner">	
        <div id="focus" class="focus">
            <div class="hd"><ul></ul></div>
            <div class="bd">
                <ul>
                    <?php if(is_array($photos)): foreach($photos as $key=>$item): ?><li><a><img src="<?php echo config_img($item['photo']);?>" /></a></li><?php endforeach; endif; ?>
                </ul>
            </div>

        </div>
    		<div class="title">
				<h1><?php echo bao_Msubstr($detail['shop_name'],0,48,false);?>  </h1>
				<p><?php echo bao_Msubstr($detail['addr'],0,88,false);?></p>
			</div>
		</div>
</div>            
  

	<script type="text/javascript">
		TouchSlide({ 
			slideCell:"#focus",
			titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
			mainCell:".bd ul", 
			effect:"left", 
			autoPlay:true,//自动播放
			autoPage:true, //自动分页
			switchLoad:"_src" //切换加载，真实图片路径为"_src" 
		});
	</script>


	<!--小区广告结束-->

	<div class="tuan-detail">
        <div class="line info">
			<div class="x12">
                <span class="mr10">口味：<?php echo ($detail["kw_score"]); ?></span>
                <span class="mr10">环境：<?php echo ($detail["hj_score"]); ?></span>
                <span class="mr10">服务：<?php echo ($detail["fw_score"]); ?></span>
                <a href="<?php echo U('booking/ding',array('shop_id'=>$detail['shop_id']));?>" class="button button-small bg-blue float-right">在线订座</a>
			</div> 
		</div>
		<div class="blank-10 bg"></div>
        
        <div class="padding border-bottom">
            <div class="line">
                <span class="x2 text-gray">地址：</span>
                <span class="x10"><?php echo ($detail["addr"]); ?></span>
            </div>
        </div>
        <div class="padding border-bottom">
            <div class="line">
                <span class="x2 text-gray">导航：</span>
                <span class="x10">
                    <a href="<?php echo U('shop/gps',array('shop_id'=>$detail['shop_id']));?>">地图导航到这去</a>
                    <i class="icon-angle-right text-gray float-right"></i>
                </span>
            </div>
        </div>
        <div class="padding border-bottom">
            <div class="line">
                <span class="x2 text-gray">点评：</span>
                <span class="x10">
                    <a href="<?php echo U('booking/dianping',array('shop_id'=>$detail['shop_id']));?>"><em class="text-dot margin-small-right"><?php echo ($detail["comments"]); ?></em>条用户点评
                    <i class="icon-angle-right text-gray float-right"></i>
                </span>
            </div>
        </div>
        <div class="padding border-bottom">
            <div class="line">
                <span class="x2 text-gray">电话：</span>
                <span class="x10">
                    <a href="tel:<?php echo ($detail["tel"]); ?>"><?php echo ($detail["tel"]); ?></a>
                </span>
            </div>
        </div>
        <div class="padding border-bottom">
            <div class="line">
                <span class="x2 text-gray">营业：</span>
                <span class="x10">
                    <?php echo ($detail["stime"]); ?>-<?php echo ($detail["ltime"]); ?>营业，饮料区不接受预订
                </span>
            </div>
        </div>
        
        <?php if($coupon_list): ?><div class="blank-10 bg"></div>
            <div id="coupon-list" class="coupon-list">
            	<?php if(is_array($coupon_list)): foreach($coupon_list as $key=>$item): ?><a href="<?php echo U('coupon/detail',array('coupon_id'=>$item['coupon_id']));?>" class="item">	
                        <div class="line">
                            <div class="x5"><img class="pic" src="<?php echo config_img($item['photo']);?>" style="width:90%"></div>
                            <div class="x7">
                                <h3><?php echo bao_msubstr($item['title'],0,14,false);?></h3>
                                <p class="intro"><?php echo bao_msubstr($item['intro'],0,28,false);?></p>
                                <p class="info">
                                    <span class="float-left">已下载：<em class="text-yellow"><?php echo ($item["downloads"]); ?></em> 次</span>	
                                    <span class="float-right">剩余：<em class="text-yellow"><?php echo ($item["num"]); ?></em> 张</span>
                                </p>
                            </div>
                        </div>
                    </a><?php endforeach; endif; ?>
            </div><?php endif; ?>
		<?php if($menus): ?><div class="blank-10 bg"></div>
            <div class="padding border-bottom">
                <div class="line">
                    <span class="x4 text-gray">本店特色菜</span>
                    <span class="x8 text-right" >
                        <a href="<?php echo U('booking/menu',array('shop_id'=>$detail['shop_id']));?>">更多特色菜&nbsp; </a>
                        <i class="icon-angle-right text-gray float-right"></i>
                    </span>
                </div>
            </div>
            <div class="line padding" id="divButtons" style="text-align: center">
                <?php if(is_array($menus)): foreach($menus as $key=>$item): ?><input type="button" class="button button-small bg-yellow margin-top" value="<?php echo ($item["menu_name"]); ?>"> &nbsp;<?php endforeach; endif; ?>
            </div><?php endif; ?>
       </div> 
        <footer class="footer-cart">
            <div class="btn-long"><a href="<?php echo U('booking/ding',array('shop_id'=>$detail['shop_id']));?>">在线订座</a></div>
        </footer>
    
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