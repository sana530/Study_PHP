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
        <li><a href="#">其他</a> > <a href="">外卖设置</a> > <a>确认订单</a></li>
    </ul>
</div>
<div class="tuan_content">
    <form method="post" action="<?php echo U('eleorder/wait');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            开始时间：<input type="text" class="radius3 tuan_topser"  name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            结束时间：<input type="text" class="radius3 tuan_topser"  name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            订单编号：<input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="radius3 tuan_topser" />
            <input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/>
        </div>
    </div>
    </form>
    <div class="tuanfabu_tab">
        <ul>
             <?php if($ding['is_pei'] != 0): ?><li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('ele/index');?>">外卖营业状态</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/index');?>">确认订单</a></li>
            <li class="tuanfabu_tabli tabli_change on" ><a href="<?php echo U('eleorder/wait');?>">配送中的订单</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/over');?>">已完成订单</a></li>
           
            <?php else: ?>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/whole');?>">全部订单</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/index');?>">确认订单</a></li>
            <li class="tuanfabu_tabli tabli_change  on"><a href="<?php echo U('eleorder/wait');?>">已确认订单</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/count');?>">配送员订单统计</a></li><?php endif; ?>
        </ul>
    </div> 
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#eee;">
            <td>订单ID</td>
            <td>总价值（含送餐费）</td>
            <td>结算价格</td>
            <td>数量</td>
            <td>客户</td>  
            <td>配送状态</td>
            <td>是否自取</td>
            <td>菜品</td>
            <td>下单时间</td>
            <td>状态</td>
        </tr>
         <?php $dv = D('Delivery'); $dvo = D('DeliveryOrder'); $shop = D('Shop'); $is_pei = $shop -> where('shop_id ='.$var['shop_id']) -> getField('is_pei'); ?>
        <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                <td><?php echo ($var["order_id"]); ?></td>
                <td><?php echo round($var['total_price']/100,2);?></td>
                <td><?php if(($var["is_pay"]) == "1"): echo round($var['total_price']/100,2); else: ?>餐到付款<?php endif; ?></td>
                <td><?php echo ($var["num"]); ?></td>
                <td>
                    <?php echo ($areas[$addrs[$var['addr_id']]['area_id']]['area_name']); ?>、
                    <?php echo ($business[$addrs[$var['addr_id']]['business_id']]['business_name']); ?>、
                    <?php echo ($addrs[$var['addr_id']]['addr']); ?>
                    <?php echo ($addrs[$var['addr_id']]['name']); ?>
                    <?php echo ($addrs[$var['addr_id']]['mobile']); ?>
                </td>
                <!--配送员状态开始-->
                <td>
                
                <?php $delivery_id = D('DeliveryOrder')->where('type_order_id ='.$var['order_id'].' and type =1')->getField('delivery_id'); $delivery_user = D('Delivery')->where($delivery_id)->find(); $is_pei = D('DeliveryOrder')->where('type_order_id ='.$var['order_id'].' and type =1')->find(); $delivery_status = $is_pei['status']; ?>
                <?php if(!empty($delivery_id)): ?>配送员：<span style="color:#00ae19;text-decoration:underline;cursor:pointer;" id="is_pei<?php echo ($var["order_id"]); ?>"><?php echo ($delivery_user['first_name']); ?></span>
                    <script type="text/javascript">
                    $('#is_pei<?php echo ($var["order_id"]); ?>').mouseover(function(){
						var n = '<?php echo ($delivery_user["first_name"]); ?>';
						var m = '<?php echo ($delivery_user["mobile"]); ?>';
						layer.tips('配送员姓名：'+n+'<br>电话：'+m+'',$(this),{
						 tips: [2, '#7a7a7a']
						});
					})
						
					
                    </script>
                <?php else: ?>
                	<span style="color:#FF0000;">商家自主配送</span><?php endif; ?>
                </td>
                <!--配送员状态结束-->
                <td>
                    <span style="color:#FF0000;"><?php echo ($deliverytypes[$var['is_delivery']]); ?></span>
                </td>
                <td>
                <?php if(is_array($goods)): foreach($goods as $key=>$good): if($good['order_id'] == $var['order_id']): ?><p>
                            <?php echo ($products[$good['product_id']]['product_name']); ?>：<?php echo ($good["num"]); ?>份
                        </p><?php endif; endforeach; endif; ?>
                </td>
                <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>
                <td>
               <?php if(!empty($delivery_id)): if($delivery_status == 0): ?><a>货到付款</a>
                    <?php elseif($delivery_status == 2): ?> 
                    <a>配送中</a> 
                    <?php elseif($delivery_status == 8): ?> 
                    <a mini='confirm' href="<?php echo U('eleorder/send',array('order_id'=>$var['order_id']));?>">完成配送</a>
                    <?php elseif($delivery_status == 1): ?> 
                    <a>已付款</a> 
                    <?php else: endif; ?>
                <?php else: ?>
                	<a mini='confirm' href="<?php echo U('eleorder/send',array('order_id'=>$var['order_id']));?>">完成配送</a><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
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