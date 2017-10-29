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

        <li><a href="#">商家管理</a> > <a href="">分店管理</a> > <a>分店列表</a></li>

    </ul>

</div>

<div class="tuan_content">

    <form method="post" action="<?php echo U('branch/index');?>">

    <div class="radius5 tuan_top">

        <div class="tuan_top_t">

            <div class="left tuan_topser_l">分店名称或者地址：<input type="text" class="radius3 tuan_topser"  name="keyword" value="<?php echo ($keyword); ?>"/><input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/></div>

            <div class="right tuan_topfb_r"><a class="radius3 sjgl_an tuan_topbt" target="main_frm" href="<?php echo U('branch/create');?>">添加分店+</a></div>

        </div>

    </div>

    </form>

     <div class="tuanfabu_tab">
   <ul>
     <li class="tuanfabu_tabli <?php if(($ctl == 'shop') AND ($act == 'about')): ?>on<?php endif; ?>"><a href="<?php echo U('shop/about');?>">店铺文字资料</a></li>
     <!--<li class="tuanfabu_tabli <?php if(($ctl == 'shop') AND ($act == 'service')): ?>on<?php endif; ?>"><a href="<?php echo U('shop/service');?>">其他设置</a></li>-->
     <li class="tuanfabu_tabli <?php if(($ctl == 'shop') AND ($act == 'image')): ?>on<?php endif; ?>"><a href="<?php echo U('shop/image');?>">店铺形象图</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'photo') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('photo/index');?>">店铺环境图</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'audit') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('audit/index');?>">认证管理</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'branch') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('branch/index');?>">分店设置</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'shopyouhui') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('shopyouhui/index');?>">买单设置</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'breaks') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('breaks/index');?>">买单订单</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'worker') AND ($act == 'index')): ?>on<?php endif; ?>"><a href="<?php echo U('worker/index');?>">员工管理</a></li>
     <li class="tuanfabu_tabli <?php if(($ctl == 'shop') AND ($act == 'grade')): ?>on<?php endif; ?>"><a href="<?php echo U('shop/grade');?>">商家等级</a></li>
  </ul>
</div>
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr style="background-color:#eee;">

            <td>分店名称</td>

            <td>城市</td>

            <td>地区</td>

            <td>商圈</td>

            <td>地址</td>

            <td>分数</td>

            <td>创建时间</td>

            <td>操作</td>

        </tr>

        <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>

                <td><?php echo ($var["name"]); ?></td>

                <td><?php echo ($city[$var['city_id']]['name']); ?></td>

                <td><?php echo ($area[$var['area_id']]['area_name']); ?></td>

                <td><?php echo ($business[$var['business_id']]['business_name']); ?></td>

                <td><?php echo ($var["addr"]); ?></td>

                <td><?php echo ($var["score"]); ?></td>

                <td><?php echo (date('Y-m-d H:i',$var["create_time"])); ?></td>

                <td>

                <a href="<?php echo U('branch/edit',array('branch_id'=>$var['branch_id']));?>">编辑</a>

                <a mini='confirm' href="<?php echo U('branch/delete',array('branch_id'=>$var['branch_id']));?>">删除</a>

                <a href="<?php echo U('branch/manage',array('branch_id'=>$var['branch_id']));?>">设置口令</a>

                <a target="_blank" href="<?php echo U('pchome/check/index',array('shop_id'=>$var['shop_id'],'branch_id'=>$var['branch_id']));?>">管理地址</a>

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