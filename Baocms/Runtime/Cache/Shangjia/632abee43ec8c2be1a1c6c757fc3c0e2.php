<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商家管理中心-<?php echo ($CONFIG["site"]["title"]); ?></title>
<meta name="description" content="<?php echo ($CONFIG["site"]["title"]); ?>商户中心" />
<meta name="keywords" content="<?php echo ($CONFIG["site"]["title"]); ?>商户中心" />
<link href="__TMPL__statics/css/newstyle.css" rel="stylesheet" type="text/css" />
 <link href="__PUBLIC__/js/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>
var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';
</script>
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/jquery-ui.min.js"></script>
<script src="__PUBLIC__/js/web.js"></script>
<script src="__PUBLIC__/js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/static/default/webuploader/webuploader.css">
<script src="/static/default/webuploader/webuploader.min.js"></script>

</head>

<body>
<iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
<script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
<div class="sjgl_lead">
    <ul>
        <li><a href="#">Mall</a> > <a href="">订单</a> > <a>已退款订单</a></li>
    </ul>
</div>
<div class="tuan_content">
    <form method="post" action="<?php echo U('order/refunded');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">
            开始时间:<input type="text"  placeholder="输入开始时间" class="radius3 seleFl"  name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            结束时间:<input type="text"   placeholder="输入结束时间" class="radius3 seleFl"   name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            订单编号:<input type="text"  placeholder="输入订单编号" name="keyword" value="<?php echo ($keyword); ?>" class="radius3 seleFl" />
            <input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/>
            </div>
        </div>
    </div>
    </form>
     <!--全局-->
<style>
.is_agent{background-color: #ff5000;font-size: 12px;color:#fff; margin-left:3px;padding: 3px; border-radius: 2px;line-height: 12px;display: inline-block;}
</style>
<div class="tuanfabu_tab">
  <ul>
  <?php if($ding['is_pei'] != 0): ?><li class="tuanfabu_tabli <?php if(($ctl) == "goods"): ?>on<?php endif; ?>"><a href="<?php echo U('goods/index');?>">商品列表</a></li>
    <li class="tuanfabu_tabli <?php if(($ctl != 'goods') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('order/index');?>">全部订单</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "wait"): ?>on<?php endif; ?>"><a href="<?php echo U('order/wait');?>">已付款</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "wait2"): ?>on<?php endif; ?>"><a href="<?php echo U('order/wait2');?>">货到付款</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "picks"): ?>on<?php endif; ?>"><a href="<?php echo U('order/picks');?>">捡货单</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "delivery"): ?>on<?php endif; ?>"><a href="<?php echo U('order/delivery');?>">待确认</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "wait_refunded"): ?>on<?php endif; ?>"><a href="<?php echo U('order/wait_refunded');?>">待退款</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "refunded"): ?>on<?php endif; ?>"><a href="<?php echo U('order/refunded');?>">已退款</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "over"): ?>on<?php endif; ?>"><a href="<?php echo U('order/over');?>">已完成</a></li>
  <?php else: ?>
    <li class="tuanfabu_tabli <?php if(($ctl) == "goods"): ?>on<?php endif; ?>"><a href="<?php echo U('goods/index');?>">商品列表</a></li>
    <li class="tuanfabu_tabli <?php if(($ctl != 'goods') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('order/index');?>">全部订单【配】</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "delivery"): ?>on<?php endif; ?>"><a href="<?php echo U('order/delivery');?>">待确认【配】</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "wait_refunded"): ?>on<?php endif; ?>"><a href="<?php echo U('order/wait_refunded');?>">待退款【配】</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "refunded"): ?>on<?php endif; ?>"><a href="<?php echo U('order/refunded');?>">已退款【配】</a></li>
    <li class="tuanfabu_tabli <?php if(($act) == "count"): ?>on<?php endif; ?>"><a href="<?php echo U('order/count');?>">订单统计【配】</a></li><?php endif; ?>
</ul>
</div> 





<!--引入导航-->    
<div class="blank-20"></div>
     <table class="tuan_table3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#F9F9F9;">
            <td width="350">详情</td>
            <td>单价</td>
            <td>数量</td>
            <td>总价</td>
            <td>买家姓名</td>
            <td>状态</td>
            <td>实付金额</td>
     </table>
     <div class="blank-10"></div>
        <form  target="baocms_frm" method="post">
        
<?php if(is_array($list)): foreach($list as $key=>$order): ?><table  class="tuan_table1"  width="100%" border="0">
  <tr class="tr_left_2">
    <td class="left10" colspan="5">
    订单ID:<span class="mallorder_jg"><?php echo ($order["order_id"]); ?></span>
    <span class="td_top_1">交易时间:<?php echo (date('Y-m-d H:i:s',$order["create_time"])); ?>
        <span class="td_top_1">
        
        <?php if(!empty($order['addr_id'])): ?>收货地址:
   <?php echo ($areas[$addrs[$order['addr_id']]['area_id']]['area_name']); ?>--
   <?php echo ($business[$addrs[$order['addr_id']]['business_id']]['business_name']); ?>--
   <?php echo ($addrs[$order['addr_id']]['addr']); ?>--
   <?php echo ($addrs[$order['addr_id']]['name']); ?>--
   <?php echo ($addrs[$order['addr_id']]['mobile']); ?></span><?php endif; ?>
       </span>
    </td>
  </tr>
  <tr>
    <td class="td_left_1"> 
    
    <?php if(is_array($goods)): foreach($goods as $key=>$good): if(($good["order_id"]) == $order["order_id"]): ?><table  class="tuan_table2" width="100%" border="0">
      <tr class="tr_left_1">
      
        <td class="left1">
        
        <!--商品展示开始-->
        <div class="index__production___yfP3y" >
        <a class="index__pic___TScfk" ><img src="<?php echo config_img($products[$good['goods_id']]['photo']);?>" ></a>
        <div class="index__infos___A6XLq" >
            <p ><a href="<?php echo u('pchome/mall/detail',array('goods_id'=>$products[$good['goods_id']]['goods_id']));?>" target="_blank" ><span><?php echo ($products[$good['goods_id']]['title']); ?></span></a></p>
          <span></span>
        	</div>
		</div>
       <!--商品展示END-->
        </td>
        <td class="left2">&#36;<?php echo round($good['price']/100,2);?></td>
        <td class="left3"><?php echo ($good['num']); ?></td>
        <td class="left4">&#36;<?php echo round($good['total_price']/100,2);?></td>
        <td class="left5"> 
            <?php if($order['status'] != 0 && $order['is_daofu'] != 0): echo ($goodtypes[$good['status']]); endif; ?>
        </td>
      </tr>
     
    </table><?php endif; endforeach; endif; ?>
    
    </td>
     <td class="left6" width="9%">
        <?php echo ($users[$order['user_id']]['account']); ?>
        <?php if(!empty($users[$order['user_id']]['is_agent'])): ?><a class="is_agent">代理商</a><?php endif; ?>
        <?php if(($order["is_mobile"]) == "1"): ?><br/><img src="/themes/default/Shangjia/statics/images/mobile.png" /><?php endif; ?>
        <?php if(!empty($order['message'])): ?><br/><a class="href"><?php echo ($order['message']); ?></a><?php endif; ?>
    </td>
    <td class="left7" width="8%">
        <?php echo ($types[$order['status']]); ?><br/>
        <?php if(($order["is_daofu"]) == "1"): ?>货到付款<br/><?php endif; ?>
        <?php if(($order["is_print"]) == "1"): ?>已打印<br/><?php endif; ?> 
        <a class="href" href="<?php echo U('order/detail',array('order_id'=>$order['order_id'],'type'=>wait));?>">订单详情</a>
     </td>
    <td class="left8"width="10%">
    <span>&#36;<?php echo round($order['need_pay']/100,2);?></span><br/>
    <span>含配送费:&#36;<?php echo round($order['express_price']/100,2);?></span><br/>
    </td>
  </tr>
 
</table>
<br/><?php endforeach; endif; ?>
    <?php echo ($page); ?>
</div>


<script>
function require() {
      var url = "{U('order1/checkNotify')}";
        　　
      $.get(url,null,function(data) {
        　　　　　　
            // 如果获得的数据不为空，则显示提醒
           if ($.trim(data) != '') {

               // 这里写提醒的方式
        　　　　alert('您有新订单来了，还在测试');
           }
      });

      // 每三秒请求一次
      setTimeout('require()',3000);
}
</script>
<!--<body onload="javascript:return require();">-->
</html>