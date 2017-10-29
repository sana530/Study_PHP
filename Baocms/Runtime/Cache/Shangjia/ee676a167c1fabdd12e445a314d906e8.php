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
<style>
.is_agent{background-color: #ff5000;font-size: 12px;color:#fff; margin-left:3px;padding: 3px; border-radius: 2px;line-height: 12px;display: inline-block;}
</style>
<div class="sjgl_lead">
    <ul>
       <li><a href="<?php echo U('order/index');?>">商城</a> > <a href="<?php echo U('order/wait');?>">订单列表</a> >订单详情</li>
    </ul>
</div>


<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">订单详情</div>
             <div class="right tuan_topfb_r">
                <a class="radius3 sjgl_an tuan_topbt" target="main_frm" href="<?php echo U('order/detail',array('order_id'=>$detail['order_id']));?>">刷新订单状态</a>
                <a class="radius3 sjgl_an tuan_topbt" target="main_frm" href="<?php echo U('order/wait');?>">返回订单列表</a>
            </div>
        </div>
    </div> 
    
    <div class="tabnr_change show">
    	
    	<table class="order_goods_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="120"><p class="tuanfabu_t">订单编号:</p></td><td>
                <div class="tuanfabu_nr">
                	<?php echo ($detail["order_id"]); ?>&nbsp;&nbsp;
                    下单账户:<?php echo ($users['nickname']); ?>【<?php echo ($users['user_id']); ?>】
                    <?php if(!empty($users['is_agent'])): ?><a class="is_agent">代理商</a><?php endif; ?>
                    下单时间:<?php echo (date('Y-m-d H:i',$detail["create_time"])); ?>
                </div></td>
            </tr>
            
             <tr>
                <td width="120"><p class="tuanfabu_t">费用明细:</p></td>
                <td>
                <div class="tuanfabu_nr">
                订单金额 &#36; <?php echo round($detail['total_price']/100,2);?> NZD &nbsp;&nbsp;
                
                配送费用:<?php if(empty($detail['express_price'])): ?>免邮&nbsp;&nbsp;
                        <?php else: ?>
                        &#36; <?php echo round($detail['express_price']/100,2);?> NZD&nbsp;&nbsp;<?php endif; ?>
               <?php if(!empty($detail['use_integral'])): ?>积分抵现: &#36;  <?php echo round($detail['use_integral']/100,2);?> NZD&nbsp;&nbsp;<?php endif; ?>
               <?php if(!empty($detail['mobile_fan'])): ?>手机下单立减: &#36; <?php echo round($detail['mobile_fan']/100,2);?> NZD&nbsp;&nbsp;<?php endif; ?>
               <a style="color:#F00">实际支付: &#36; <?php echo round($detail['need_pay']/100,2);?> NZD&nbsp;&nbsp;</a>
               </div>
               </td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">收货地址:</p></td><td><div class="tuanfabu_nr">
                <?php echo ($areas[$addrs['area_id']]['area_name']); ?>
  				<?php echo ($business[$addrs['business_id']]['business_name']); ?>
                <?php echo ($addrs['name']); ?>
                <?php echo ($addrs["mobile"]); ?>
                <?php echo ($addrs["addr"]); ?> 
                </div></td>
            </tr>
        </table>

        <div style="margin-top:10px;"></div>
        <table class="order_goods_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        	
            <tr class="order_goods_table_tr">
                <td><p class="tuanfabu_nr">标题</p></td>
                <td><div class="tuanfabu_nr">缩略图</div></td>
                <td <p class="tuanfabu_nr">单价</p></td>
                <td><p class="tuanfabu_nr">数量</p></td>
                <td><p class="tuanfabu_nr">总价</p></td>
                <td><p class="tuanfabu_nr">备注</p></td>
            </tr>
           <?php if(is_array($ordergoods)): foreach($ordergoods as $key=>$item): ?><tr>
                    <td><p class="tuanfabu_nr"><?php echo ($goods[$item['goods_id']]['title']); ?></p></td>
                    <td><div class="tuanfabu_nr">
                    <img style="margin: 10px auto; width:60px;" src="<?php echo config_img($goods[$item['goods_id']]['photo']);?>" /></div></td>
                    <td><p class="tuanfabu_nr"> <?php echo round($item['price']/100,2);?>NZD</p></td>
                    <td><p class="tuanfabu_nr"><?php echo ($item["num"]); ?></p></td>
                    <td><p class="tuanfabu_nr"><?php echo round($item['total_price']/100,2);?> NZD</p></td>
                    <td <p class="tuanfabu_nr">备注</p></td>
                </tr><?php endforeach; endif; ?>  
            <tr>
            	<td colspan="6" class="tuanfabu_t"> 订单总价 : <?php echo round($detail[need_pay]/100,2);?>NZD &nbsp;&nbsp; 运费:  <?php echo round($detail[express_price]/100,2);?>NZD &nbsp;&nbsp;&nbsp; </td>
            </tr>

        </table>

            <div class="tuanfabu_an">
                <?php if(($detail["is_daofu"]) == "0"): if(($detail["status"]) == "0"): ?><a class="radius3 sjgl_an tuan_topbt">待付款</a>
                    <?php else: ?>
                    <a class="radius3 sjgl_an tuan_topbt"><?php echo ($types[$detail['status']]); ?></a><?php endif; ?>
                <?php else: ?>
                    <?php if(($detail["status"]) == "0"): ?><a class="radius3 sjgl_an tuan_topbt">货到付款</a>
                    <?php else: ?>
                    <a class="radius3 sjgl_an tuan_topbt"><?php echo ($types[$detail['status']]); ?></a><?php endif; endif; ?>
            </div>
      
    </div> 
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