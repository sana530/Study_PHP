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
        <li><a href="#">商家</a> > <a href="">财务管理</a> </li>
    </ul>
</div>
<style>
.tuan_table td span{ font-size:14px;}
.tuan_table td p{ font-size:18px;}
.tuan_table td p span.red{ font-size:26px; color:#F00; font-weight:bold}
.tuan_table td li a{ font-size:16px;}
</style>
<div class="tuan_content">
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
            <td colspan="5"><span>商铺名称：<?php echo ($SHOP["shop_name"]); ?>&nbsp;&nbsp;&nbsp;商铺ID：（<?php echo ($SHOP["shop_id"]); ?>） &nbsp;&nbsp;&nbsp;
            商铺类别：<?php echo ($shopcates[$SHOP['cate_id']]['cate_name']); ?></span> </td>
        </tr>
         <tr style="background-color:#FFF0F0;">
            <td colspan="5">
            
            <p>
               <?php if($counts['money'] > 0): ?>您总收入：<?php echo round($counts['money']/100,2);?>NZD，<?php endif; ?>
               当前余额：<span class="red"><?php echo round($MEMBER['gold']/100,2);?></span>NZD。
               <?php if(!empty($MEMBER['frozen'])): ?>冻结金：<?php echo round($MEMBER['frozen']/100,2);?>NZD。<?php endif; ?>
        </p>
         </td>
       </tr>
        
      <tr>
         <td colspan="5"><li><a>今日总收入：<?php echo round($counts['money_day']/100,2);?>NZD，昨日总收入：<?php echo round($counts['money_day_yesterday']/100,2);?>NZD。</a></li></td>
      </tr>
      <tr>
         <td colspan="5"><li><a>今日商城收入：<?php echo round($counts['money_day_goods']/100,2);?>NZD，昨日商城收入：<?php echo round($counts['money_day_goods_yesterday']/100,2);?>NZD。</a></li>

</td>
      </tr>
      <tr>
         <td colspan="5"><li><a>今日团购收入：<?php echo round($counts['money_day_tuan']/100,2);?>NZD，昨日团购收入：<?php echo round($counts['money_day_tuan_yesterday']/100,2);?>NZD。</a></li></td>
      </tr>
      <tr>
     
</td>    <td colspan="5"><li><a>今日外卖收入：<?php echo round($counts['money_day_ele']/100,2);?>NZD，昨日外卖收入：<?php echo round($counts['money_day_ele_yesterday']/100,2);?>NZD。</a></li>
      </tr>
      <tr>
     
</td>    <td colspan="5"><li><a>今日酒店收入：<?php echo round($counts['money_day_hotel']/100,2);?>NZD，昨日酒店收入：<?php echo round($counts['money_day_hotel_yesterday']/100,2);?>NZD。</a></li>
      </tr>
      
       <tr>
     
</td>    <td colspan="5"><li><a>今日订座收入：<?php echo round($counts['money_day_booking']/100,2);?>NZD，昨日订座收入：<?php echo round($counts['money_day_booking_yesterday']/100,2);?>NZD。</a></li>

    <tr style="background-color:#FFF0F0;"><td colspan="5"> <p>单项总收入列表</p></td></tr>
    
   <tr>
   	  <td colspan="5"><li><a>商城（总）：<?php echo round($counts['money_goods']/100,2);?>NZD。</a></li></td> 
   </tr>
   <tr>
   	  <td colspan="5"><li><a>团购（总）：<?php echo round($counts['money_tuan']/100,2);?>NZD。</a></li></td> 
   </tr>
   <tr>
   	  <td colspan="5"><li><a>外卖（总）：<?php echo round($counts['money_ele']/100,2);?>NZD。</a></li></td> 
   </tr>
   <tr>
   	  <td colspan="5"><li><a>商城（总）：<?php echo round($counts['money_goods']/100,2);?>NZD。</a></li></td> 
   </tr>
   <tr>
   	  <td colspan="5"><li><a>订座（总）：<?php echo round($counts['money_booking']/100,2);?>NZD。</a></li></td> 
   </tr>
   
   <tr>
   	  <td colspan="5"><li><a>酒店（总）：<?php echo round($counts['money_hotel']/100,2);?>NZD。</a></li></td> 
   </tr>
 </table>
<div class="paging"> </div>
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