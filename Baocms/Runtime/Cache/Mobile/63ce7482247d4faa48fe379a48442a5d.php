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
<script src="/static/default/wap/other/roll.js"></script>
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		同城信息
	</div>
	<div class="top-search" style="display:none;">
		<form method="post" action="<?php echo U('life/search');?>">
			<input name="keyword" placeholder="输入信息的关键字"  />
			<button type="submit" class="icon-search"></button> 
		</form>
	</div>
	<div class="top-signed">
		<a id="search-btn" href="javascript:void(0);"><i class="icon-search"></i></a>
	</div>
</header>
<div id="index-cate" class="index-cate">
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
			$("#index-cate .cate-more").click(function(){
				$(this).parent().children().find(".more-content").toggle();
				if($(this).hasClass("active")){
					$(this).removeClass("active");
					$(this).children().find("span").html("展开更多");
				}
				else{
					$(this).addClass("active");
					$(this).children().find("span").html("点击收起");
				}
			});
		});
	</script>
    
    
  

    <ul class="cate-wrap bbOnepx">
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>3));?>" tongji_tag="m_home_job_new">
                <span class="cate-img" id="job"><img src="/static/default/wap/image/life/life_cate_1.png" /></span>
                <span class="cate-desc">招聘</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>2));?>" tongji_tag="m_home_house_new">
                <span class="cate-img" id="house"><img src="/static/default/wap/image/life/life_cate_2.png" /></span>
                <span class="cate-desc">房产</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>1));?>" tongji_tag="m_home_car_new">
                <span class="cate-img" id="car"><img src="/static/default/wap/image/life/life_cate_3.png" /></span>
                <span class="cate-desc">二手车</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>1));?>" tongji_tag="m_home_sale_new">
                <span class="cate-img" id="sale"><img src="/static/default/wap/image/life/life_cate_4.png" /></span>
                <span class="cate-desc">二手</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>6));?>" tongji_tag="m_home_jianzhi_new">
                <span class="cate-img" id="jianzhi"><img src="/static/default/wap/image/life/life_cate_5.png" /></span>
                <span class="cate-desc">兼职</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>10));?>" tongji_tag="m_home_pets_new">
                <span class="cate-img" id="pets"><img src="/static/default/wap/image/life/life_cate_6.png" /></span>
                <span class="cate-desc">宠物</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>9));?>" tongji_tag="m_home_shenghuo_new">
                <span class="cate-img" id="jiazheng"><img src="/static/default/wap/image/life/life_cate_7.png" /></span>
                <span class="cate-desc">家政</span>
            </a>
        </li>
        <li>
            <a class="icon2" href="<?php echo U('life/channel',array('channel'=>8));?>" tongji_tag="m_home_bendishenghuo_new">
                <span class="cate-img" id="shenghuo"><img src="/static/default/wap/image/life/life_cate_8.png" /></span>
                <span class="cate-desc">本地</span>
            </a>
        </li>
    </ul>
    <div class="blank-10 bg"></div>
    
	<div class="tie-ding">
		<ul>
		<?php  $cache = cache(array('type'=>'File','expire'=> 600)); $token = md5("Life,closed=0 AND audit=1 AND  city_id=$city_id,create_time desc,0,5,600,,"); if(!$items= $cache->get($token)){ $items = D("Life")->where("closed=0 AND audit=1 AND  city_id=$city_id")->order("create_time desc")->limit("0,5")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li><em class="tag bg-dot">推荐</em><a href="<?php echo U('life/detail',array('life_id'=>$item['life_id']));?>"><?php echo bao_msubstr($item['title'],0,30,false);?></a><span class="icon-angle-right"></span></li> <?php endforeach; ?>
		</ul>
	</div>
    
    <div class="blank-10 bg"></div>
	<?php $ii = 0; ?>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i; $ii++; ?>
	<ul>
		<li class="cate-name">
			<a href="<?php echo U('life/channel',array('channel'=>$key));?>">
				<img src="/static/default/wap/image/life/cate-<?php echo ($ii); ?>.png" />
				<span><?php echo ($arr['channel']); ?></span>
				<span class="float-right text-gray"><i class="icon-angle-right"></i></span>
			</a>
		</li>
		<li class="cate-list">
			<?php $on=false;$num=count($arr['cate']); ?>
			<?php if(is_array($arr['cate'])): $i = 0; $__LIST__ = $arr['cate'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i; if($key < 12): ?><a href="<?php echo U('life/lists',array('cat'=>$cate['cate_id']));?>"><?php echo ($cate["cate_name"]); ?></a>
				<?php else: ?>
					<?php if(!$on): ?><span class="more-content" style="display:none;">
						<?php $on=true; endif; ?>
					<a href="<?php echo U('life/lists',array('cat'=>$cate['cate_id']));?>"><?php echo ($cate["cate_name"]); ?></a>
					<?php if(count($arr['cate']) == $key+1): ?></span><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
		</li>
		<?php if(($key > 12) AND ($num > 12)): ?><li class="cate-more"><a href="javascript:;"><span>展开更多</span><i class="down icon-angle-down"></i><i class="up icon-angle-up"></i></a></li><?php endif; ?>
		<li class="blank-10 bg"></li>
	</ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="mall-cart">
		<a href="<?php echo u('life/release');?>">
		<div class="round radius-circle"><div class="badge-corner"><i class="icon-pencil-square-o"></i></div></div>
		</a>
	</div>
    
    
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