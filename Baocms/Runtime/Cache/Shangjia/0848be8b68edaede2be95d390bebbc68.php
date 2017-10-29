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
        <li><a href="#">商家管理</a> > <a href="">商城</a> > <a>捡货单</a></li>
    </ul>
</div>
<div class="tuan_content">
    
    <form method="post" action="<?php echo U('order/index');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">
            开始时间：<input type="text"  placeholder="输入开始时间" class="radius3 seleFl"  name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            结束时间：<input type="text"   placeholder="输入结束时间" class="radius3 seleFl"   name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            订单编号：<input type="text"  placeholder="输入订单编号"  name="keyword" value="<?php echo ($keyword); ?>" class="radius3 seleFl" />
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
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#eee;">
            <td>ID</td>
            <td>捡货单</td>
            <td>创建时间</td>
            <td>创建IP</td>
            <td>查看详情</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$item): ?><tr>
                <td> <?php echo ($item["pick_id"]); ?></td>
                <td><?php echo ($item["name"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$item["create_time"])); ?></td>
                <td><?php echo ($item["create_ip"]); ?></td>
                <td>                        
                    <a href="<?php echo U('order/pickdetail',array('pick_id'=>$item['pick_id']));?>">打印捡货单</a>
                    <a href="<?php echo U('order/send',array('pick_id'=>$item['pick_id']));?>">打印配送单</a>
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