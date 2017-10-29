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
	<body>    
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('ele/cart');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			订单设定
		</div>
	</header>

	<script src="<?php echo U('app/datas/cab',array('name'=>'cityareas'));?>"></script>  <!-- 获取下拉 -->
    
    <script>
    	$(document).ready(function(){
			//添加收货地址
			$('.add_addr').click(function(){
				var index = layer.open({
					type: 1,
					title:'新增收货地址',
					skin: 'layer-ext-demo', //加上边框
					area: ['90%', '340px'], //宽高
					content: '<div class="form-x form-auto"><div class="line margin-top"><div class="x2 label"><label>联系人</label></div><div class="x10 field"><input type="text" class="input input-auto" id="name" name="name" size="10"  value=""></div></div>   <div class="line margin-top"><div class="x2 label"><label>地区</label></div><div class="x10 field form-inline"><select id="city_id" name="city_id"  class="input margin-small-right input-auto"><option value="0">请选择...</option></select><select id="area_id" name="area_id" class="input  margin-small-right input-auto"><option value="0">请选择...</option></select><select id="business_id" name="business_id" class="input input-auto"><option value="0">请选择...</option></select></div></div><div class="line margin-top"><div class="x2 label"><label>手机</label></div><div class="x10 field"><input type="text" class="input input-auto" name="mobile" id="mobile" value=""></div></div><div class="line margin-top"><div class="x2 label"><label>地址</label></div><div class="x10 field"><input type="text" class="input input-auto" size="25" name="addr" id="addr" value="" /></div></div><div class="line margin-top"><div class="x10 float-right"><input class="button bg-dot addr_post" type="submit" value="添加地址" /></div></div></div>'
				});

				get_option();
				$('.layui-layer-content').css('padding','15px');
				
				$('.addr_post').click(function(){
					var name = $('#name').val();
					var city_id = $('#city_id').val();
					var area_id = $('#area_id').val();
					var business_id = $('#business_id').val();
					var mobile = $('#mobile').val();
					var addr = $('#addr').val();
					
					$.post('<?php echo U("mobile/addr/add_addr");?>',{name:name,city_id:city_id,area_id:area_id,business_id:business_id,mobile:mobile,addr:addr},function(result){										
						if(result.status == 'success'){
							layer.msg(result.msg,{icon:1});
							setTimeout(function(){
								location.reload(true);
							},2000);
						}else{
							layer.msg(result.msg,{icon:2});
						}														
					},'json');
				})
			});

			//修改
			$('.edit_addr').click(function(){
				var val = $(this).attr('val');
				var a = $(this).attr('a');
				var b = $(this).attr('b');
				var c = $(this).attr('c');
				var n = $(this).attr('n');
				var m = $(this).attr('m');
				var addr = $(this).attr('addr');
				var index = layer.open({
					type: 1,
					title:'修改收货地址',
					skin: 'layer-ext-demo', //加上边框
					area: ['90%', '340px'], //宽高
					content: '<div class="form-x form-auto"><div class="line margin-top"><div class="x2 label"><label>联系人</label></div><div class="x10 field"><input type="text" class="input input-auto" id="name" name="name" size="10"  value="'+n+'"></div></div>   <div class="line margin-top"><div class="x2 label"><label>地区</label></div><div class="x10 field form-inline"><select id="city_ids" name="city_id"  class="input margin-small-right input-auto"><option value="0">请选择...</option></select><select id="area_ids" name="area_id" class="input  margin-small-right input-auto"><option value="0">请选择...</option></select><select id="business_ids" name="business_id" class="input input-auto"><option value="0">请选择...</option></select></div></div><div class="line margin-top"><div class="x2 label"><label>手机</label></div><div class="x10 field"><input type="text" class="input input-auto" name="mobile" id="mobile" value="'+m+'"></div></div><div class="line margin-top"><div class="x2 label"><label>地址</label></div><div class="x10 field"><input type="text" class="input input-auto" size="25" name="addr" id="addr" value="'+addr+'" /></div></div><div class="line margin-top"><div class="x10 float-right"><input class="button bg-yellow edit_post" type="submit" value="立即修改"  val="'+val+'" /></div></div></div>'
				});
				$('.layui-layer-content').css('padding','15px');
				get_option();
				changeCAB(c,a,b);
				$('.edit_post').click(function(){
					var addr_id = $(this).attr('val');
					var name = $('#name').val();
					var city_id = $('#city_ids').val();
					var area_id = $('#area_ids').val();
					var business_id = $('#business_ids').val();
					var mobile = $('#mobile').val();
					var addr = $('#addr').val();
					$.post('<?php echo U("mobile/addr/edit_addr");?>',{name:name,city_id:city_id,area_id:area_id,business_id:business_id,mobile:mobile,addr:addr,addr_id:addr_id},function(result){										
						if(result.status == 'success'){
							layer.msg(result.msg,{icon:1});
							setTimeout(function(){
								location.reload(true);
							},2000);
						}else{
							layer.msg(result.msg,{icon:2});
						}														
					},'json');
				})
			})
			$("#pay-method li").click(function(){
				var code = $(this).attr("data-rel");
				$("#code").val(code);
				$("#pay-method li").each(function(){
					$(this).removeClass("active");
				});
				$(this).addClass("active");
			});
			
		});
    </script>
<style>
.icon-angle-right{ float:right; font-size:20px;}
.layui-layer-molv .layui-layer-title { background-color: #F8F8F8; border-bottom: 1px solid #eee;color: #333;}
.divButtons{ width:50%;display: initial;padding:0px;}.text-area { width: 100%;border: thin solid #eee;resize: none; margin-top:10px; :}
</style>    

	<form class="pay-form" action="<?php echo U('ele/pay2',array('order_id'=>$order['order_id']));?>" method="post"  target="x-frame">
		<div class="row">
			<span class="float-left">订餐总费用：</span>
			<span class="float-right">$ <?php echo round($order['total_price']/100,2);?>
            <?php if(!empty($order['logistics'])): ?>（含配送费：<?php echo round($order['logistics']/100,2);?>NZD）<?php endif; ?></span>
		</div>
		<hr />
	<?php if($order['is_delivery'] == 1): ?><div class="row">
			<span class="float-left">请选择收货地址</span>
			<!--<span class="float-right"><a class="text-dot add_addr" href="javascript:void(0);" >新增收货地址</a></span>-->
		</div>
		<hr />
        
        
        
		<?php if(!empty($useraddr)): if(is_array($useraddr)): foreach($useraddr as $key=>$item): ?><div class="row">
        <span class="x10">
			<input type="radio" name="addr_id" id="addr_id" value="<?php echo ($item['addr_id']); ?>" <?php if(($item["is_default"]) == "1"): ?>checked="checked"<?php endif; ?> />
			<?php echo ($item["name"]); ?> <?php echo ($item["mobile"]); ?> <a class="text-dot edit_addr" href="#" val="<?php echo ($item["addr_id"]); ?>" a="<?php echo ($item["area_id"]); ?>" b="<?php echo ($item["business_id"]); ?>" c="<?php echo ($item["city_id"]); ?>" n="<?php echo ($item["name"]); ?>" m="<?php echo ($item["mobile"]); ?>" addr="<?php echo ($item["addr"]); ?>">修改地址</a>
            <p onclick="location='<?php echo U("mcenter/addrs/index",array('type'=>1,'order_id'=>$order['order_id']));?>'"><?php echo ($citys[$item['city_id']]['name']); ?> <?php echo ($areas[$item['area_id']]['area_name']); ?> <?php echo ($business[$item['business_id']]['business_name']); ?> <?php echo ($item["addr"]); ?></p>
         </span>
          <span class="x2" onclick="location='<?php echo U("mcenter/addrs/index",array('type'=>1,'order_id'=>$order['order_id']));?>'"><i class="icon-angle-right padding-top"></i></span>
		</div><?php endforeach; endif; ?>
		<?php else: ?>
		<div class="row">
			您还没有设置收货地址，赶紧添加一个吧！ <a class="text-dot add_addr" href="javascript:void(0);" >新增收货地址</a>
		</div><?php endif; endif; ?>
		
        
        <hr />
		<div class="row"  onclick="location='<?php echo U("mobile/ele/message",array('order_id'=>$order['order_id']));?>'">
			<span class="float-left">备注：<?php if(!empty($order['message'])): echo bao_msubstr($order['message'],0,12,false); endif; ?></span>
			<span class="float-right"> <i class="icon-angle-right"></i></span>
		</div>
        
       <!--填写END-->

		<ul id="pay-method" class="pay-method">
			<?php if(is_array($payment)): foreach($payment as $key=>$var): ?><li data-rel="<?php echo ($var["code"]); ?>" class="media media-x payment">
				<a class="float-left"  href="javascript:;">
					<img src="/static/default/wap/image/pay/<?php echo ($var["mobile_logo"]); ?>">
				</a>
				<div class="media-body">
					<div class="line">
						<div class="x10">
						<?php echo ($var["name"]); ?><p>推荐已安装<?php echo ($var["name"]); echo ($var["id"]); ?>客户端的用户使用</p>
						</div>
						<div class="x2">
							<span class="radio txt txt-small radius-circle bg-green"><i class="icon-check"></i></span>
						</div>
					</div>
				</div>
			</li><?php endforeach; endif; ?>
			<?php if($order['is_delivery'] == 0): ?><li data-rel="wait" class="media media-x payment">
				<a class="float-left" href="javascript:;">
					<img src="/static/default/wap/image/pay/dao.png">
				</a>
				<div class="media-body">
					<div class="line">
						<div class="x10">
						货到付款<p>如果您没有网银，可以到店付</p>
						</div>
						<div class="x2">
							<span class="radio txt txt-small radius-circle bg-green"><i class="icon-check"></i></span>
						</div>
					</div>
				</div>
			</li><?php endif; ?>
		</ul>
		<input id="code" type="hidden" name="code" value="" />
		
		<div class="text-center padding-left padding-right margin-large-top">
			<button type="submit" class="button button-big button-block bg-yellow  submit">提交订单</button>
		</div>
		
		<div class="blank-20"></div>
	</form>
</div>
    
 	<script>
		<?php if(($mobile_open) == "0"): ?>$('.submit').click(function(){
			check_user_mobile('<?php echo U("mobile/tuan/tuan_sendsms");?>','<?php echo U("mobile/tuan/tuan_mobile");?>');
			return false;
		});
    	check_user_mobile('<?php echo U("mobile/tuan/tuan_sendsms");?>','<?php echo U("mobile/tuan/tuan_mobile");?>');
		$('#mobile_btn').click(function(){
			check_user_mobile('<?php echo U("mobile/tuan/tuan_sendsms");?>','<?php echo U("mobile/tuan/tuan_mobile");?>');
		});<?php endif; ?>
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