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
<div class="tuan_content">
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="width: 150px;">商品名称</td>
                <td style="width: 60px;">数量</td>
                <td style="width: 60px;">单价</td>
                <td style="width: 60px;">总价</td>
                <td style="width: 100px;">货到付款</td>
                <td style="width: 100px;">是否缺货</td>
        </tr>
        <?php if(is_array($goods)): foreach($goods as $key=>$good): ?><tr class="no">
                            <td><?php echo ($products[$good['goods_id']]['title']); ?></td>
                            <td><?php echo ($good["num"]); ?></td>
                            <td><?php echo round($good['price']/100,2);?></td>
                            <td><?php echo round($good['total_price']/100,2);?></td>
                            <td>
                        	<?php if(($good["is_daofu"]) == "1"): ?><font style="color: red;">货到付款</font><?php else: ?>在线支付<?php endif; ?>
                            </td>
                            <td></td>
                        </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="8"> <input type="button"  onclick="window.print();" value=" 打 印 " /></td>
        </tr>
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