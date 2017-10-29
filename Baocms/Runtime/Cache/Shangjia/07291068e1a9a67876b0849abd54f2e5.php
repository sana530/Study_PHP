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
<div class="sjgl_lead">
    <ul>
        <li><a href="#">其他</a> > <a href="">餐饮设置</a> > <a>菜单管理</a></li>
    </ul>
</div>
<div class="tuan_content">
    <form method="post" action="<?php echo U('eleproduct/index');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            菜品名称：<input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="radius3 tuan_topser" />
            <input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/>
            <div class="right tuan_topfb_r"><a class="radius3 sjgl_an tuan_topbt" target="main_frm" href="<?php echo U('eleproduct/create');?>">添加菜品+</a></div>
        </div>
    </div>
    </form>
    <div class="tuanfabu_tab">
        <ul>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('elecate/index');?>">菜系分类</a></li>
            <li class="tuanfabu_tabli tabli_change on"><a href="<?php echo U('eleproduct/index');?>">菜单管理</a></li>
        </ul>
    </div>
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#eee;">
            <td>菜名</td>
            <td>分类</td>
            <td>缩略图</td>
            <td>价格</td>
            <td>是否新品</td>
            <td>是否热门</td>
            <td>是否推荐</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                <td><?php echo ($var["product_name"]); ?></td>
                <td><?php echo ($cates[$var['cate_id']]['cate_name']); ?></td>
                <td><img src="__ROOT__/attachs/<?php echo ($var["photo"]); ?>" width="60" height="60" class="w80" style="margin: 10px auto;" /></td>
                <td><?php echo round($var['price']/100,2);?></td>
                <td><?php if(($var["is_new"]) == "1"): ?>新品<?php else: ?>无<?php endif; ?></td>
            <td>
            <?php if(($var["is_hot"]) == "1"): ?>热门<?php else: ?>无<?php endif; ?>
            </td>
            <td>
            <?php if(($var["is_tuijian"]) == "1"): ?>推荐<?php else: ?>无<?php endif; ?>
            </td>
            <td>
                <a href="<?php echo U('eleproduct/edit',array('product_id'=>$var['product_id']));?>">编辑</a>
                <a mini='confirm' href="<?php echo U('eleproduct/delete',array('product_id'=>$var['product_id']));?>">删除</a>
            </td>
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