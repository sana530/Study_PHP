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
<style>
ul{ padding-left:0px;}
li {list-style: none;}
.container { margin-top:3rem;}
.container2 {margin: 0 auto; }
.coupon-list .item {  padding: 5px 0px 0px 5px;}
.coupon-list .item .intro { height: initial;}
.panel-head { background-color: #fff;}
p, .p {margin-bottom: 0px; }
</style>
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('shop/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			<?php echo ($detail["shop_name"]); ?>
		</div>
		<div  class="top-share">
			<button class="share-button" data-theme="slide-top">分享</button>
		</div>
	</header>
	  
	<div class="share-content">
		<!--MOB SHARE BEGIN-->
		<div class="-mob-share-ui -mob-share-ui-theme" style="display: none">
			<ul class="-mob-share-list">
				<li class="-mob-share-weixin"><p>微信</p></li>
				<li class="-mob-share-facebook"><p>Facebook</p></li>
				<li class="-mob-share-twitter"><p>Twitter</p></li>
				<li class="-mob-share-linkedin"><p>LinkedIn</p></li>
				<li class="-mob-share-douban"><p>豆瓣网</p></li>
			</ul>
			<div class="-mob-share-close">取消</div>
		</div>
		
		<div class="-mob-share-ui-bg"></div>
		
		<script>
			// 同一网页下只能有一种分享效果，否则会冲突
			// 所以这里把ui节点先复制起来，点其中一个效果时将之前的删除
			var ui = getElementsByClassName( "-mob-share-ui" )[0];
			var uiTemplate = ui.cloneNode( true );
			var uiCurrent = ui;
	
			var buttons = getElementsByClassName("share-button" );
			for( var i = 0, len = buttons.length; i < len; i++ ) {
				var btn = buttons[ i ];
				btn.onclick = function() {
					if( uiCurrent ) {
						uiCurrent.parentNode.removeChild( uiCurrent );
					}
					uiCurrent = uiTemplate.cloneNode( true );
					var dataTheme = this.getAttribute( "data-theme" );
					var theme = "-mob-share-ui-theme-" + this.getAttribute( "data-theme" );
					addClass( uiCurrent, theme );
					if( dataTheme === "slide-left" || dataTheme === "slide-right" ) {
						getElementsByClassName( "-mob-share-close", uiCurrent )[0].style.display = "none";
					}
					document.body.appendChild( uiCurrent );
					mobShare.ui.init();
					mobShare.ui.open();
				};
			}
	
			function getElementsByClassName( classname, main ) {
				var main = main || document;
				if( main.getElementsByClassName ) {
					return main.getElementsByClassName( classname );
				}
				var a = [];
				var re = new RegExp( '(^| )' + classname + '( |$)' );
				var els = main.getElementsByTagName( "*" );
				for( var i = 0, j = els.length; i < j; i++ ) {
					if( re.test( els[i].className ) ) {
						a.push( els[i] );
					}
				}
				return a;
			};
	
			function hasClass( ele, cls ) {
				return ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
			}
	
			function addClass( ele, cls ) {
				if (!hasClass(ele, cls)) {
					ele.className += " " + cls;
				}
			}
		</script>
		
		<script id="-mob-share" src="https://f1.webshare.mob.com/code/mob-share.js?appkey=5bda9710bb57"></script> <!-- 5bda9710bb57 -->
		<!--MOB SHARE END-->
	</div>

 	<?php if(!empty($detail['panorama_url'])): ?><div class="panorama_url">
            <iframe src="<?php echo ($detail["panorama_url"]); ?>" width="100%" height="600"></iframe>
        </div><?php endif; ?>
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
 
 	<script>
		var news = new fz.Scroll('.scroller-news', {
			scrollY: false,
			scrollX: true
		});
		news.scrollToElement("li:nth-child(1)", 120, true, true);
		
		$(document).ready(function () {
			$("#share-box").hide();
			$("#share-btn").click(function () {
				$("#share-box").toggle();
				$('html,body').animate({scrollTop:0}, 'slow');
			});
			$("#mui-card-close").click(function () {
				$("#share-box").hide();
			});
		});
	</script>

	<div class="container">
		<div class="line detail-base">
			<div class="x4">
				<div class="pic">
					<a href="<?php echo U('shop/pic',array('shop_id'=>$detail['shop_id']));?>">
                    
                    <img src="<?php echo config_img($detail['photo']);?>" /></a> 				<?php if(!empty($pic)): ?><span class="album"><?php echo ($pic); ?></span>
                    <?php else: endif; ?>
				</div>
			</div>
			<div class="x5">
				<h1><?php echo ($detail["shop_name"]); ?></h1>
				<p><span class="ui-starbar"><span style="width:<?php echo round($detail['score']*2,2);?>%"></span></span></p>
				<p>浏览量: <?php echo ($detail["view"]); ?> 次</p>
				<p class="text-small"><span class="text-yellow"><?php echo ($ex["business_time"]); ?> </span></p>
			</div>
			<div class="x3">
				<?php if(($detail["niu_date"]) > $today): ?><p class="text-center"><img src="/static/default/wap/image/shop/icon-cx.png" /></p><?php endif; ?>
				<div class="blank-10"></div>
				<p class="text-center"><a class="text-dot" href="#ping">商铺评价</a></p>
				<p class="text-small text-center">( <em class="text-yellow"><?php echo ($totalnum); ?></em>人评价 )</p>
                <?php if($detail['is_renzheng'] == 1): ?><p class="text-small text-center"><em class="text-yellow">该商家已认证</em></p><?php endif; ?>
                <?php if($detail['recognition'] == 0): ?><p class="text-small text-center"><em class="text-yellow"><a href="<?php echo U('shop/recognition',array('shop_id'=>$detail['shop_id']));?>">我要认领</a></em></p><?php endif; ?>
			</div>
		</div>
    </div>
		<div class="blank-10 bg"></div>

	<div class="container2">
		<div class="line detail-contact">
			<div class="x9">
				<p class="addr"><i class="icon icon-map-marker"></i> <?php echo ($detail["addr"]); ?> </p>
				<p class="margin-top"><i class="icon icon-phone"></i> 
                <?php if(!empty($detail['tel'])): ?><a class="text-large" href="tel:<?php echo ($detail["tel"]); ?>"><?php echo ($detail["tel"]); ?></a>
                <?php else: ?>
                <a class="text-large">暂无联系方式</a><!--该商家暂无联系方式--><?php endif; ?>
                </p>
			</div>
			<div class="x3">
				<a class="favor" href="<?php echo U('shop/favorites',array('shop_id'=>$detail['shop_id']));?>">
					<div class="txt radius-circle bg-green"><i class="icon-heart"></i></div>
					<p>关注该商家</p>
					<p class="text-small">粉丝<em class="text-yellow"><?php echo ($favnum); ?></em>人</p>
				</a>
			</div>
		</div>
		
        
        <?php $sb = D('ShopBranch');$rsb = $sb -> where('shop_id ='.$detail['shop_id']) -> count(); ?>
        <?php if(!empty($rsb)): ?><div class="list-link detail-link radius-none">
		    <a href="<?php echo U('shop/branch/',array('shop_id'=>$detail['shop_id']));?>">
				<span class="txt txt-little radius-little bg-yellow">店</span> 查看另外<?php echo ($rsb); ?>家分店
				<span class="float-right icon-angle-right"></span>
			</a>
           </div>
        <?php else: ?>
       <!--该商家无分店--><?php endif; ?>
   	</div>
	<div class="blank-10 bg"></div>

	<?php if(!empty($shopyouhui)): ?><div class="container2" style="margin:10px;">
		<div class="form-button"><a  href="<?php echo U('shop/breaks',array('shop_id'=>$detail['shop_id']));?>" class="button button-block button-big bg-dot text-center" type="submit">优惠买单</a></div>
	</div><?php endif; ?>
            
        
	<div class="container2">
        <div class="list-link detail-link radius-none">
			<div class="line border-bottom">
				<div class="x6 border-right text-center">
					<a href="<?php echo U('shop/gps',array('shop_id'=>$detail['shop_id']));?>"><i class="icon icon-send"></i> 导航到这去</a>
				</div>
				<div class="x6 text-center">
					<a href="<?php echo U('shop/qrcode',array('shop_id'=>$detail['shop_id']));?>"><i class="icon icon-qrcode"></i> 二维码名片</a>
				</div>
			</div>
			<!--团购数据开始-->
		    <?php if(!empty($tuan)): ?><a href="<?php echo U('shop/tuan',array('shop_id'=>$detail['shop_id']));?>">
				   	<span class="txt txt-little radius-little bg-green">团</span> 去逛逛商家抢购
			    	<span class="float-right icon-angle-right"></span>
			    </a>
				<ul>
				<?php if(is_array($tuan)): $index = 0; $__LIST__ = $tuan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index;?><li class="list border-bottom">
						<a class="line" href="<?php echo U('tuan/detail',array('tuan_id'=>$item['tuan_id']));?>" >
							<div class="container1">
								<img class="x3" src="<?php echo config_img($item['photo']);?>" />
								<div class="des x9">
									<h5><?php echo ($item["title"]); ?></h5>
									<p class="info">
										<span class="now-price">$ <?php echo round($item['tuan_price']/100,2);?></span> <del>$ <?php echo round($item['price']/100,2);?></del>
										<span class="text-little float-right badge bg-yellow margin-small-top padding-right">立省<?php echo round($item['price']/100 - $item['tuan_price']/100,2);?>NZD</span>
									</p>
								</div>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="blank-10 bg"></div><?php endif; ?>
			<!--团购数据结束-->

			<!--优惠券数据开始-->
			<?php if(!empty($coupon)): ?><a href="<?php echo U('shop/coupon',array('coupon'=>$detail['coupon_id']));?>">
				    <span class="txt txt-little radius-little bg-red">劵</span> 商家优惠券下载
				    <span class="float-right icon-angle-right"></span>
			    </a>
				<div class="coupon-list">
				<?php if(is_array($coupon)): $index = 0; $__LIST__ = $coupon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index;?><a href="<?php echo U('coupon/detail',array('coupon_id'=>$item['coupon_id']));?>" class="item">
						<div class="line">
							<div class="x4"><img class="pic" src="__ROOT__/attachs/<?php echo (($item["photo"])?($item["photo"]):'default.jpg'); ?>"  style="width:90%"></div>
							<div class="x8">
								<h3><?php echo ($item['title']); ?></h3>
								<p class="intro"><?php echo ($item['intro']); ?></p>
								<p class="info">
									<span class="float-left">下载：<em class="text-yellow"><?php echo ($item["downloads"]); ?></em>人</span>
									<span class="float-right">有效期至：<em class="text-yellow"><?php echo ($item['expire_date']); ?></em></span>
								</p>
							</div>
						</div>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="blank-10 bg"></div><?php endif; ?>            
            <!--优惠劵数据结束-->

			<!--商品数据开始-->
			<?php if(!empty($goods)): ?><a href="<?php echo U('mart/lists',array('id'=>$weidian_id));?>">
					<span class="txt txt-little radius-little bg-yellow">商</span> 去逛逛商家微店
					<span class="float-right icon-angle-right"></span>
				</a>
				<ul class="item-list">
				<?php if(is_array($goods)): $index = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index;?><li class="border-bottom">
						<a href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>" class="line">
							<img class="x3" src="<?php echo config_img($item['photo']);?>" />
							<div class="x9" style="margin-top:0.3rem; padding: 0 5px;"><h5><?php echo bao_msubstr($item['title'],0,18);?></h5>

								<?php if(!empty($item['mobile_fan'])): ?><p class="desc">手机下单立减 <span style="color:#F00; font-size:12px;"><?php echo round($item['mobile_fan']/100,2);?></span> NZD</p>
									<?php else: ?>
									<p class="desc"><?php echo bao_msubstr($item['intro'],0,26);?></p><?php endif; ?>

								<p class="info"><span>&#36;<?php echo round($item['mall_price']/100,2);?></span><del>&#36;<?php echo round($item['price']/100,2);?></del>
									<em>已售<?php echo ($item["sold_num"]); ?></em>
									<?php $shopids = D('Shop')->where('shop_id ='.$item['shop_id'])->find(); $is_renzheng = $shopids['is_renzheng']; ?>
									<?php if($is_renzheng == 1): ?><em class="is_renzheng">认证</em><?php endif; ?>
								</p>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="blank-10 bg"></div><?php endif; ?>
			<!--商品数据结束-->

			<!--招聘信息开始-->
			<?php if(!empty($work)): ?><div class="blank-10 bg"></div>
            <div class="panel-head"><b>商家招聘信息</b></div>
            <?php $i=0; ?>	
            <?php if(is_array($work)): $index = 0; $__LIST__ = $work;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index;?><!--循环输出的一条数据-->
            <?php $i++; ?>	
            <a href="<?php echo U('nearwork/detail',array('work_id'=>$item['work_id']));?>">
				 <span class="txt txt-little radius-little bg-yellow"><?php echo ($i); ?></span> 
                 <?php echo bao_msubstr($item['title'],0,12,false);?>
                 <em style="color:#999; font-size:12px;">
                 <?php if(!empty($item['money1'])): ?>月薪：<?php echo ($item["money1"]); endif; ?>
                 <?php if(!empty($item['money2'])): ?>-<?php echo ($item["money2"]); ?> &nbsp;<?php endif; ?>
                 <?php if(!empty($item['num'])): ?>需：<?php echo ($item["num"]); ?>人<?php endif; ?>
                 </em>
				 <span class="float-right icon-angle-right"></span>
			</a><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="blank-10 bg"></div><?php endif; ?>
			<!--招聘信息结束-->

            <?php if(!empty($huodong)): ?><a href="<?php echo U('mobile/huodong/index',array('activity_id'=>$activity_id['activity_id']));?>">
				    <span class="txt txt-little radius-little bg-red">活</span> 商家近期活动
				    <span class="float-right icon-angle-right"></span>
			    </a><?php endif; ?>
                       
			<a href="<?php echo U('shop/book',array('shop_id'=>$detail['shop_id']));?>">
				<span class="txt txt-little radius-little bg-blue">约</span> 预约去消费
				<span class="float-right icon-angle-right"></span>
			</a>

			<a href="<?php echo U('shop/news',array('shop_id'=>$detail['shop_id']));?>">
				<span class="txt txt-little radius-little bg-blue">闻</span> 商家新闻
				<span class="float-right icon-angle-right"></span>
			</a>

			<a href="<?php echo U('shop/life',array('shop_id'=>$detail['shop_id']));?>">
				<span class="txt txt-little radius-little bg-blue">类</span> 商家分类信息
				<span class="float-right icon-angle-right"></span>
			</a>
		</div>
	</div>
	<div class="blank-10 bg"></div>

	<div class="container2">
		<div class="panel detail-intro radius-none">
			<div class="panel-head">商家介绍</div>
			<div class="panel-body">
				<?php echo cleanhtml($ex['details']);?>
				<?php if(($detail["niu_date"]) > $today): ?><span class="niu"><img src="/static/default/wap/image/shop/icon-niu.png" /></span><?php endif; ?>
			</div>
		</div>
	</div>
	<div class="blank-10 bg"></div>
		
        
     
	<div class="container2">
        <div class="panel detail-intro radius-none">
			<div class="panel-head">附近抢购</div>
		    <div class="main-tuan" id="main-tuan" style="padding:0 10px;">
				<?php if(is_array($tuans)): $i = 0; $__LIST__ = $tuans;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
					<a class="line" href="<?php echo U('tuan/detail',array('tuan_id'=>$item['tuan_id']));?>" >
						<div class="container1">
							<img class="x4" src="<?php echo config_img($item['photo']);?>" />
							<div class="des x8">
								<h5><?php echo ($item["title"]); ?></h5>
								<p class="intro">
									<?php echo msubstr($item['intro'],0,20);?>
								</p>
								<p class="info">
									<span>$ <em><?php echo round($item['tuan_price']/100,2);?></em></span> <del>$ <?php echo round($item['price']/100,2);?></del>
									<span class="text-little float-right badge bg-yellow margin-small-top padding-right">立省<?php echo round($item['price']/100 - $item['tuan_price']/100,2);?>NZD</span>
								</p>
							</div>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	<div class="blank-10"></div>



<?php if(empty($detail['panorama_url'])): ?><script>
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
	var newurl = BAO_SURL.replace(/?S+/,'');
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

</html><?php endif; ?>
<!--客服代码-->  
<?php if(!empty($detail['service']) and $detail['service_audit'] == 1): echo ($detail["service"]); endif; ?>