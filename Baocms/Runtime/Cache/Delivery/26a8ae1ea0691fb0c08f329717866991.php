<?php if (!defined('THINK_PATH')) exit();?><title>物流配送中心</title>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	
		<link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>

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
<link rel="stylesheet" href="/static/default/wap/css/delivery.css">
<script src = "/themes/default/Mobile/statics/js/jquery-1.7.1.min.js" ></script>
<script src="/themes/default/Mobile/statics/js/layer/layer.js"></script>

<style>
.table th {border-bottom:2px dashed #ddd;}
.table th, .table td {font-size: 12px;padding:5px;}
</style>


<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('delivery/index/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			订单列表
		</div>
	<div class="top-signed">
		<a href="<?php echo U('delivery/login/logout');?>">退出</a>
	</div>
</header>



<ul id="shangjia_tab">
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/index',array('ss'=>0));?>" <?php if(($ss) == "0"): ?>class="on"<?php endif; ?>>抢新单</a></li>
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/index',array('ss'=>2));?>"<?php if(($ss) == "2"): ?>class="on"<?php endif; ?>>配送中</a></li>
        <li style="width: 33.3333367%;"><a href="<?php echo U('lists/index',array('ss'=>8));?>"<?php if(($ss) == "8"): ?>class="on"<?php endif; ?>>已完成</a></li>
</ul>

<!-- 筛选TAB -->

<div class="line tab-bar">
	<div class="button-toolbar">
		<div class="button-group">
			<a class="block button bg-dot active" href="#">订单列表
             <?php if(($ss) == "0"): ?>抢单中<?php endif; ?>
            <?php if(($ss) == "2"): ?>配送中<?php endif; ?>
            <?php if(($ss) == "8"): ?>已完成<?php endif; ?>
            </a>
		</div>
	</div>
</div>


<div class="container1">
<div class="list-media-x" id="list-media">
	<ul>
<?php $a=1; ?>
<?php if(is_array($rdv)): $i = 0; $__LIST__ = $rdv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li class="line padding">
        <div class="x12">
            <p class="text-small">配送ID:<?php echo ($r["order_id"]); ?>             
              <?php if(($r["type"]) == "0"): ?>（商城，订单id：<?php echo ($r["type_order_id"]); ?>）<?php endif; ?>
              <?php if(($r["type"]) == "1"): ?>（外卖，订单id：<?php echo ($r["type_order_id"]); ?>）<?php endif; ?><a class="icon icon-send radius-little " style=" color:#F00; padding:0px 5px;"> 距离<?php echo ($r["d"]); ?></a>
           </p>

                          <!--PHP代码开始--><?php if($r['type'] == 0){ $o = D('Order'); $res = $o -> where('order_id ='.$r['type_order_id']) -> find(); $t = 0; $o2 = D('OrderGoods'); $res2 = $o2 -> where('order_id ='.$res['order_id']) -> select(); $o3 = D('Goods'); foreach($res2 as $key => $val){ $v = $o3->where('goods_id ='.$val['goods_id'])->getField('title'); $res2[$key]['t'] = $v ; } }elseif($r['type'] == 1){ $o = D('EleOrder'); $res = $o -> where('order_id ='.$r['type_order_id']) -> find(); $t = 1; $o2 = D('EleOrderProduct'); $res2 = $o2 -> where('order_id ='.$res['order_id']) ->select(); $o3 = D('EleProduct'); foreach($res2 as $key => $val){ $v = $o3->where('product_id ='.$val['product_id'])->getField('product_name'); $res2[$key]['t'] = $v; } } ?> <!--PHP代码结束-->

                                   


<!--商品循环开始-->
<div class="blank-10"></div>
<table class="table">
	<tbody><tr>
		<th>商品信息</th>
		<th>单价</th>
		<th>数量</th>
	</tr>
    <?php if(is_array($res2)): $i = 0; $__LIST__ = $res2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res2): $mod = ($i % 2 );++$i;?><tr>  
		<td><?php echo bao_msubstr($res2['t'],0,18,false);?></td>
		<td>$<?php echo round(($res2['total_price']/$res2['num'])/100,2); ?></td>
		<td> x<?php echo ($res2["num"]); ?></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>                   
</tbody></table>
<div class="blank-10"></div>
<!--商品循环结束-->
          

<p class="text-small">下单时间： <?php echo (date('Y-m-d H:i:s',$res["create_time"])); ?> </p> 
<!--规定时间开始-->            
 				<?php $delivery_time = $ex[$r['shop_id']]['delivery_time']*60; $end_time = $r['update_time'] + $delivery_time; $cha = $end_time - $nowtime; $endge_time = date('Y/m/d H:i:s',$end_time); ?>

<script type="text/javascript" language="javascript">
                        setInterval(function () {
                            var end_time = "<?php echo ($endge_time); ?>";
                            var EndTime = new Date(end_time); //截止时间 前端路上
                            var NowTime = new Date();
                            var t = EndTime.getTime() - NowTime.getTime();
                            var d = Math.floor(t / 1000 / 60 / 60 / 24);
                            var h = Math.floor(t / 1000 / 60 / 60 % 24);
                            var m = Math.floor(t / 1000 / 60 % 60);
                            var s = Math.floor(t / 1000 % 60);
                            if (d < 10) {
                                $('#t<?php echo ($a); ?>').children('#t_d').html('0' + d);
                            } else {
                                $('#t<?php echo ($a); ?>').children('#t_d').html(d);
                            }
                            if (h < 10) {
                                $('#t<?php echo ($a); ?>').children('#t_h').html('0' + h);
                            } else {
                                $('#t<?php echo ($a); ?>').children('#t_h').html(h);
                            }
                            if (m < 10) {
                                $('#t<?php echo ($a); ?>').children('#t_m').html('0' + m);
                            } else {
                                $('#t<?php echo ($a); ?>').children('#t_m').html(m);
                            }
                            if (s < 10) {
                                $('#t<?php echo ($a); ?>').children('#t_s').html('0' + s);
                            } else {
                                $('#t<?php echo ($a); ?>').children('#t_s').html(s);
                            }
                        }, 1000);
                    </script>
       
                        <?php if($r["status"] == 2): if($cha < 0): ?><span class="text-small">已超出商家规定时间</span>
                                <?php else: ?>
                                
                            <span class="text-small spxq_qgTime" id="t<?php echo ($a); ?>">
                                    <span class="spxq_qgTimezt spxq_qgTimejx">距商家规定时间还有：</span>
                                    <span id="t_d">00</span>:
                                    <span id="t_h">00</span>:
                                    <span id="t_m">00</span>:
                                    <span id="t_s">00</span>
                                </span><?php endif; endif; ?>       

<div class="blank-10"></div>
<p class="text-right padding-top">
<a href="javascript:void(0);" rel="mine_yiyuan_allnum_mask_<?php echo ($r["order_id"]); ?>" class="mine_yiyuan_btn button button-small bg-blue">配送地址</a> 


<?php if(($r["type"]) == "0"): ?><!--如果是商城-->
	<?php if(($res["is_daofu"]) == "1"): ?><!--如果是商城-->
     <?php $need_pay = $res['total_price'] - $res['use_integral'] - $res['mobile_fan']; ?>
    <a href="javascript:void(0);" class="button button-small bg-green">到付：$<?php echo round($need_pay/100,2);?></a>  
    <?php else: ?>
    <a href="javascript:void(0);" class="button button-small bg-green">总计：$<?php echo round($res['need_pay']/100,2);?></a><?php endif; ?>
<?php else: ?>
<a href="javascript:void(0);" class="button button-small bg-green">总计：$<?php echo round($res['need_pay']/100,2);?></a><?php endif; ?>



        
<?php if(($r["status"]) == "0"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">抢单中</a><?php endif; ?>
<?php if(($r["status"]) == "2"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">配送中</a><?php endif; ?>
<?php if(($r["status"]) == "8"): ?><a href="javascript:void(0);" class="button button-small bg-gray">已完成</a><?php endif; ?> 

<?php if(($t) == "0"): if(($res["is_daofu"]) == "1"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">货到付款</a><?php endif; endif; ?>
<?php if(($t) == "1"): if(($res["is_pay"]) == "0"): ?><a href="javascript:void(0);" class="button button-small bg-yellow">货到付款</a><?php endif; endif; ?>

<?php if(($r["status"]) == "0"): ?><a href="javascript:void(0);" val="<?php echo ($r["order_id"]); ?>" class="button button-small bg-dot qiang_btn">抢单</a><?php endif; ?>
<?php if(($r["status"]) == "1"): ?><a href="javascript:void(0);" val="<?php echo ($r["order_id"]); ?>" class="button button-small bg-dot qiang_btn">抢单</a><?php endif; ?>
<?php if(($r["status"]) == "2"): ?><a href="javascript:void(0);" val="<?php echo ($r["order_id"]); ?>" class="button button-small bg-dot ok_btn">确认完成</a><?php endif; ?> 

</p>

          </p>
        </div>
    </li>
    <div class="blank-10 bg"></div>
<?php $a++; endforeach; endif; else: echo "" ;endif; ?><!--循环结束-->

  </ul>
</div> 
</div> 


<!--点击弹出-->

<?php if(is_array($rdv)): $i = 0; $__LIST__ = $rdv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><div class="mine_yiyuan_allnum_mask mine_yiyuan_allnum_mask_<?php echo ($r["order_id"]); ?>">
        <div class="cont">
            <a href="javascript:void(0);" rel="mine_yiyuan_allnum_mask_<?php echo ($r["order_id"]); ?>" class="closs">×</a>
            <div class="title">配送地址详情</div>
            <div class="num">
            <table class="table">
                <div class="blank-10"></div>
                <a class="text-small button-block">商家名称：<?php echo ($r["shop_name"]); ?>-  <?php echo ($r["shop_mobile"]); ?></a>
                <a class="text-small button-block">商家地址：<?php echo ($r["shop_addr"]); ?> </a>
                <div class="blank-10 bg"></div>
                <a class="text-small1 button-block">买家地址：<?php echo ($r["user_addr"]); ?> </a>
                <a class="text-small1 button-block">买家姓名：<?php echo ($r["user_name"]); ?> </a>
                <a class="text-small1 button-block">买家手机：<?php echo ($r["user_mobile"]); ?></a>
                
                <?php if(($r["type"]) == "1"): ?><!--如果是商城-->
				<a class="text-small1 button-block">订单留言：<?php echo ($r["message"]); ?></a><?php endif; ?>


           </table>
            </div>
            <input type="button" value="确定" rel="mine_yiyuan_allnum_mask_<?php echo ($r["order_id"]); ?>"  class="btn" >
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<script>
    $(document).ready(function () {
        /*一元抢购查看所有号码*/
        $(".mine_yiyuan_btn").click(function () {
            $("."+$(this).attr('rel')).show();
        });
        $(".mine_yiyuan_allnum_mask").find(".closs").click(function () {
            $("."+$(this).attr('rel')).hide();
        });
        $(".mine_yiyuan_allnum_mask").find(".btn").click(function () {
            $("."+$(this).attr('rel')).hide();
        });
        /*一元抢购查看所有号码*/

    });
</script>



  <script type="text/javascript" language="javascript">
   		$(document).ready(function(){
			$('.qiang_btn').click(function(){
				var id = $(this).attr('val');
				$.post('<?php echo U("lists/handle");?>',{order_id:id},function(result){
					if(result.status == 'success'){
						layer.msg(result.message,{icon:6});
						setTimeout(function(){
							location.reload(true);
						},3000);
					}else{
						layer.msg(result.message);
					}
				},'json');
			})

            $('.ok_btn').click(function(){
			    var id = $(this).attr('val');
				$.post('<?php echo U("set_ok");?>',{order_id:id},function(result){
					if(result.status == 'success'){
						layer.msg(result.message,{icon:6});
						setTimeout(function(){
							location.reload(true);
						},3000);
					}else{
						layer.msg(result.message);
					}
				},'json');
			})
		})
   </script>

	<style>
	.foot-fixed .foot-item { width: 25%;}
	</style>
    
    <footer class="foot-fixed">		
    <a class="foot-item   <?php if(($act == 'index') AND ($ctl == 'index')): ?>active<?php endif; ?>" href="<?php echo U('delivery/index/index');?>">		
    	<span class="icon icon-home"></span>		
        	<span class="foot-label">首页</span>		
            </a>
            		
            <?php if($open_express == '1' ): ?><a class="foot-item  <?php if(($ctl == 'lists') AND ($act != 'express')): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>0));?>">		
            <span class="icon icon-cloud-download"></span><span class="foot-label">订单配送</span></a>		
            
            <a class="foot-item <?php if(($act) == "express"): ?>active<?php endif; ?>" href="<?php echo U('lists/express',array('ss'=>0));?>">			
            <span class="icon icon-truck"></span><span class="foot-label">众包快递</span></a>	
            
            <a class="foot-item <?php if(($act) == "money"): ?>active<?php endif; ?>" href="<?php echo U('index/money');?>">			
            <span class="icon icon-database"></span><span class="foot-label">资金管理</span></a>
            
            <?php else: ?>
            
            
            <a class="foot-item <?php if(($ss) == "0"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>0));?>">		
            <span class="icon icon-cloud-download"></span><span class="foot-label">抢新单</span></a>		
            
            <a class="foot-item <?php if(($ss) == "2"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>2));?>">			
            <span class="icon icon-truck"></span><span class="foot-label">配送中</span></a>	
            
            <a class="foot-item <?php if(($ss) == "8"): ?>active<?php endif; ?>" href="<?php echo U('lists/index',array('ss'=>8));?>">			
            <span class="icon icon-check-square"></span><span class="foot-label">已完成</span></a><?php endif; ?>
            	
            
          
            
            </footer>	
            
            	<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
                </body>
                
                </html>