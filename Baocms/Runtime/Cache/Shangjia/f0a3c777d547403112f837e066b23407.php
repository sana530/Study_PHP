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
        <li><a href="#">结算</a> > <a href="">提现申请</a> > <a>提现</a></li>
    </ul>
</div>
<style>
.tabnr_change.show p.magin-top{ margin:10px 50px}
.tabnr_change.show .money_tixian{ margin:20px 50px;}
</style>
<script type="text/javascript" src="/themes/default/Pchome/statics/js/jquery.qrcode.min.js"></script><!--二维码-->
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
    <div class="tabnr_change  show">
        <p class="magin-top">
		电脑端已经停止提现，提现请登录手机端提现，网址：<a href="<?php echo ($CONFIG["site"]["host"]); ?>/store"><?php echo ($CONFIG["site"]["host"]); ?>/store</a> 
        </p>
        <div class="money_tixian"  id="money_tixian">
        <p class="magin-sao">手机扫一扫</p>
        </div>
    </div> 
     <script type="text/javascript">
          $(function () {
             var str = "<?php echo ($CONFIG["site"]["host"]); ?>/store";
             $("#money_tixian").empty();
             $('#money_tixian').qrcode(str);
           })
     </script>

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