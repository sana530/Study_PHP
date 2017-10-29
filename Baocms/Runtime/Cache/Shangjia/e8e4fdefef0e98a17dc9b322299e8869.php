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
        <li><a href="#">结算</a> > <a href="">资金记录</a> > <a>商家资金</a></li>
    </ul>
</div>

<div class="tuan_content">
    <form method="post" action="<?php echo U('money/shopmoney');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">
             开始时间:<input type="text" placeholder="点击选择开始时间" class="radius3 tuan_topser"  name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'});"/>
            结束时间:<input type="text"  placeholder="点击选择结束时间" class="radius3 tuan_topser"  name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'});"/> 
            
            类型:<select name="st" class="seleFl w80">
                        <option value="999">请选择类型</option>
                        <option <?php if(($st) == "1"): ?>selected="selected"<?php endif; ?>  value="1">团购订单</option>
                        <option <?php if(($st) == "2"): ?>selected="selected"<?php endif; ?>  value="2">订餐订单</option>
                        <option <?php if(($st) == "3"): ?>selected="selected"<?php endif; ?>  value="3">订座订单</option>
                        <option <?php if(($st) == "4"): ?>selected="selected"<?php endif; ?>  value="4">购物订单</option>
                        <option <?php if(($st) == "5"): ?>selected="selected"<?php endif; ?>  value="5">优惠买单订单</option>
                 </select>
                    
                          
            <input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/>
            </div>
        </div>
    </div>
    </form>

    <div class="tuanfabu_tab">
   <ul>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'finance')): ?>on<?php endif; ?>"><a href="<?php echo U('money/finance');?>">财务中心</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'shopmoney')): ?>on<?php endif; ?>"><a href="<?php echo U('money/shopmoney');?>">商家资金</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('money/index');?>">商户资金日志</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'tjmonth')): ?>on<?php endif; ?>"><a href="<?php echo U('money/tjmonth');?>">月统计明细</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'tjday')): ?>on<?php endif; ?>"><a href="<?php echo U('money/tjday');?>">日结算趋势</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'tixianlog')): ?>on<?php endif; ?>"><a href="<?php echo U('money/tixianlog');?>">提现日志</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'money') AND ($act == 'tixian')): ?>on<?php endif; ?>"><a href="<?php echo U('money/tixian');?>">申请提现</a></li>
  </ul>
</div>

    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#eee;">
            <td>编号</td>
            <td>资金</td>
            <td>类型</td>
            <td>原始订单</td>
            <td>说明</td>
            <td>日期</td>
        </tr>
        <!--<tr style="background-color:#FFF0F0;">
            <td colspan="6">总计:<?php echo round($shop_money_sum/100,2);?>NZD</td>
        </tr>-->
        
        <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                <td><?php echo ($var['money_id']); ?></td>
                <td>&#36;<?php echo round($var['money']/100,2);?>NZD</td>
                <td>
                <?php if($var['type'] == 'tuan'): ?>抢购
                <?php elseif($var['type'] == 'goods'): ?>购物
                <?php elseif($var['type'] == 'ele'): ?>订餐
                <?php elseif($var['type'] == 'breaks'): ?>优惠买单
                <?php elseif($var['type'] == 'booking'): ?>订座
                <?php elseif($var['type'] == 'hotel'): ?>酒店
                <?php else: ?>未知类型<?php endif; ?></td>

                <td><?php echo ($var["order_id"]); ?></td>       

                <td><?php echo ($var["intro"]); ?></td>

                <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>

                

            </tr><?php endforeach; endif; ?>

    </table>

    <div class="paging">

        <?php echo ($page); ?>

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