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
	<body>   <header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('life/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		<?php echo ($cate["cate_name"]); ?>
	</div>
    <div class="top-search" style="display:none;">
			<form method="post" action="<?php echo U('life/search');?>">
				<input name="keyword" placeholder="输入关键字"  />
				<button type="submit" class="icon-search"></button> 
			</form>
	</div>
	<div class="top-share">
        <a id="search-btn" href="javascript:void(0);"><i class="icon-search"></i></a> 
		<a href="<?php echo U('life/fabu',array('cat'=>$_GET['cat']));?>" class="share-btn"><i class="icon-pencil-square-o"></i></a>
	</div>
</header>

<script type="text/javascript">
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
		$("#search-bar li").each(function(e){
			$(this).click(function(){
				if($(this).hasClass("on")){
					$(this).parent().find("li").removeClass("on");
					$(this).removeClass("on");
					$(".serch-bar-mask").hide();
				}
				else{
					$(this).parent().find("li").removeClass("on");
					$(this).addClass("on");
					$(".serch-bar-mask").show();
				}
				$(".serch-bar-mask .serch-bar-mask-list").each(function(i){
					
					if(e==i){
						$(this).parent().find(".serch-bar-mask-list").hide();
						$(this).show();
					}
					else{
						$(this).hide();
					}
					$(this).find("li").click(function(){
						$(this).parent().find("li").removeClass("on");
						$(this).addClass("on");
					});
				});
			});
		});
	});
	</script>  
    




<div id="filter2" class="filter2">
    <ul class="tab clearfix">
      <li class="item">
        <a href="javascript:void(0);">
        <?php if(!empty($area)): ?><span id="str_b_node" style="color:#f60;"><?php echo ($areass[$area]['area_name']); ?></span>
        <?php else: ?>
        <span id="str_b_node">地区</span><?php endif; ?>
        <em></em>
        </a>
      </li>
      <li class="item">
        <a href="javascript:void(0);">
        <?php if(!empty($s1)): ?><span id="str_b_node" style="color:#f60;"><?php echo bao_msubstr($attrs['select1'][$s1]['attr_name'],0,3,false);?></span>
        <?php else: ?>
        <span id="str_b_node"><?php echo ($cate['select1']); ?></span><?php endif; ?>
      
        <em></em>
        </a>
      </li>
      <?php if(!empty($cate['select2'])): ?><li class="item">
        <a href="javascript:void(0);"> 
        <?php if(!empty($s2)): ?><span id="str_b_node" style="color:#f60;"><?php echo bao_msubstr($attrs['select2'][$s2]['attr_name'],0,3,false);?></span>
        <?php else: ?>
        <span id="str_b_node"><?php echo ($cate['select2']); ?></span><?php endif; ?><em></em>
        </a>
      </li><?php endif; ?>
      
      <?php if(!empty($cate['select3'])): ?><li class="item">
        <a href="javascript:void(0);"> 
        <?php if(!empty($s3)): ?><span id="str_b_node" style="color:#f60;"><?php echo bao_msubstr($attrs['select3'][$s3]['attr_name'],0,3,false);?></span>
        <?php else: ?>
        <span id="str_b_node"><?php echo ($cate['select3']); ?></span><?php endif; ?><em></em>
        </a>
      </li><?php endif; ?>
      
       <?php if(!empty($cate['select4'])): ?><li class="item">
        <a href="javascript:void(0);">
        <?php if(!empty($s4)): ?><span id="str_b_node" style="color:#f60;"><?php echo bao_msubstr($attrs['select4'][$s4]['attr_name'],0,3,false);?></span>
        <?php else: ?>
        <span id="str_b_node"><?php echo ($cate['select4']); ?></span><?php endif; ?><em></em>
        </a>
      </li><?php endif; ?>
      
       <?php if(!empty($cate['select5'])): ?><li class="item">
        <a href="javascript:void(0);"> 
        <?php if(!empty($s5)): ?><span id="str_b_node" style="color:#f60;"><?php echo bao_msubstr($attrs['select5'][$s5]['attr_name'],0,3,false);?></span>
        <?php else: ?>
        <span id="str_b_node"><?php echo ($cate['select5']); ?></span><?php endif; ?><em></em>
        </a>
      </li><?php endif; ?>
    </ul>
   
    <div class="inner" style=" display:none">
        <ul>
       <li><a href="<?php echo LinkTo('life/lists',$linkArr,array('area'=>0));?>">全部地区</a></li>
			<?php if(is_array($areas)): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ae): $mod = ($i % 2 );++$i; if($ae['city_id'] == $city_id){ ?>
				<li><a <?php if($area == $ae['area_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('area'=>$ae['area_id']));?>"><?php echo ($ae["area_name"]); ?></a></li>
                 <?php } endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
     <div class="inner" style=" display:none">
        <ul>
       <li class="on"><a href="<?php echo LinkTo('life/lists',$linkArr,array('s1'=>0));?>">全部</a></li>
			<?php if(is_array($attrs['select1'])): $i = 0; $__LIST__ = $attrs['select1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select1): $mod = ($i % 2 );++$i;?><li><a <?php if($s1 == $select1['attr_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('s1'=>$select1['attr_id']));?>"><?php echo ($select1['attr_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
     <div class="inner" style=" display:none">
        <ul>
      <li class="on"><a href="<?php echo LinkTo('life/lists',$linkArr,array('s2'=>0));?>">全部</a></li>
			<?php if(is_array($attrs['select2'])): $i = 0; $__LIST__ = $attrs['select2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select2): $mod = ($i % 2 );++$i;?><li><a <?php if($s2 == $select2['attr_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('s2'=>$select2['attr_id']));?>"><?php echo ($select2['attr_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
     <div class="inner" style=" display:none">
        <ul>
      <li class="on"><a href="<?php echo LinkTo('life/lists',$linkArr,array('s3'=>0));?>">全部</a></li>
			 <?php if(is_array($attrs['select3'])): $i = 0; $__LIST__ = $attrs['select3'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select3): $mod = ($i % 2 );++$i;?><li><a <?php if($s3 == $select3['attr_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('s3'=>$select3['attr_id']));?>"><?php echo ($select3['attr_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
     <div class="inner" style=" display:none">
        <ul>
      <li class="on"><a href="<?php echo LinkTo('life/lists',$linkArr,array('s4'=>0));?>">全部</a></li>
			 <?php if(is_array($attrs['select4'])): $i = 0; $__LIST__ = $attrs['select4'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select4): $mod = ($i % 2 );++$i;?><li><a <?php if($s4 == $select4['attr_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('s4'=>$select4['attr_id']));?>"><?php echo ($select4['attr_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
     <div class="inner" style=" display:none">
        <ul>
      <li class="on"><a href="<?php echo LinkTo('life/lists',$linkArr,array('s5'=>0));?>">全部</a></li>
			 <?php if(is_array($attrs['select5'])): $i = 0; $__LIST__ = $attrs['select5'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select5): $mod = ($i % 2 );++$i;?><li><a <?php if($s5 == $select5['attr_id']): ?>style="color:red;"<?php endif; ?> href="<?php echo LinkTo('life/lists',$linkArr,array('s5'=>$select5['attr_id']));?>"><?php echo ($select5['attr_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    
   
      
      <div id="parent_container" class="inner_parent" style="display:none;">
        <div class="innercontent"></div>
      </div>
      <div id="inner_container" class="inner_child" style="display:none;">
        <div class="innercontent"></div>
      </div>
    
</div>
<!--end-->    

<div id="fullbg" class="fullbg" style="display: none; height: 250px;">
<i class="pull2"></i>
</div>



<div class="life-list" id="life-list"></div>
<script>
	$(document).ready(function () {
		showFilter({ibox:'filter2',content1:'parent_container',content2:'inner_container',fullbg:'fullbg'});
		loaddata('<?php echo ($nextpage); ?>', $("#life-list"), true);
	});
</script>

<div class="mall-cart">
		<a href="<?php echo U('mobile/life/release');?>">
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