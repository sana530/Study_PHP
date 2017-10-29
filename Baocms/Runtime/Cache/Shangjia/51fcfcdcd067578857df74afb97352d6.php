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
<script type="text/javascript" language="javascript">

	$(document).ready(function(){
		$('#load td').mouseover(function(){
			$(this).find('img.refresh').show();
		})
		$('#load td').mouseout(function(){
			$(this).find('img.refresh').hide();
		})
		$('.refresh').click(function(){
			var val = $(this).attr('val');
			var img = '<img src=__TMPL__statics/images/loading2.gif />';
			var span = $(this).parent();
			var btime = '<?php echo ($btime); ?>';
			var etime = '<?php echo ($etime); ?>';
			var pre_btime = '<?php echo ($pre_btime); ?>';
			var pre_etime = '<?php echo ($pre_etime); ?>';
			$.post('<?php echo U("eleorder/delivery_count");?>',{did:val,btime:btime,etime:etime},function(result){
				if(result.status = 'success'){
					span.html(img);
					setTimeout(function(){
						if(pre_btime && pre_etime){
							var str = '<span style=color:#999999;>'+pre_btime+'至'+pre_etime+'</span>';
							span.html(str+'<span style=color:#078e10;>他共配送'+result.count+'单商品!</span>');
						}else{
							span.html('<span style=color:#078e10;>他共配送'+result.count+'单商品!</span>');
						}
						
					},1000)
				}else{
					span.html(img);
					setTimeout(function(){
						span.html(result.message);
					},1000)
				}
				
			},'json')
			
		})
	})

</script>
<div class="sjgl_lead">
    <ul>
        <li><a href="#">其他</a> > <a href="">外卖设置</a> > <a>确认订单</a></li>
    </ul>
</div>
<div class="tuan_content">
    <form method="post" action="<?php echo U('eleorder/count');?>">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            开始时间：<input type="text" class="radius3 tuan_topser"  name="bg_date" value="" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            结束时间：<input type="text" class="radius3 tuan_topser"  name="end_date" value="" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"/>
            <input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"/>
        </div>
    </div>
    </form>
    <div class="tuanfabu_tab">
        <ul>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/whole');?>">全部订单</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/index');?>">确认订单</a></li>
            <li class="tuanfabu_tabli tabli_change"><a href="<?php echo U('eleorder/wait');?>">已确认订单</a></li>
            <li class="tuanfabu_tabli tabli_change  on"><a href="<?php echo U('eleorder/count');?>">配送员订单统计</a></li>
        </ul>
    </div> 
    <table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#eee;">
            <td>配送编号</td>
			<td>原始订单ID</td>
            <td>购买人信息</td>
            <td>配送员信息</td>
            <td>状态</td>
            <td>下单时间</td>
        </tr>
        <?php $shop = D('Shop'); ?>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><tr id="load">
                <td><?php echo ($var["order_id"]); ?></td>
                <td><?php echo ($var["type_order_id"]); ?></td>
                <td><?php echo ($var["user_name"]); ?>&nbsp;|&nbsp;<?php echo ($var["user_mobile"]); ?>&nbsp;|&nbsp;<?php echo ($var["user_addr"]); ?></td>
                <td><?php if(($var["delivery_id"]) == "0"): ?><span style="color:#FF0000;">该订单还未被接单!</span>
                	<?php else: ?>
                        <?php echo ($var["user_name"]); ?>&nbsp;|&nbsp;<?php echo ($var["user_mobile"]); ?>&nbsp;<span><img src="__TMPL__statics/images/refresh.gif" style="vertical-align:middle;display:none;cursor:pointer;" class="refresh" val="<?php echo ($var["delivery_id"]); ?>" /></span><?php endif; ?></td>
                <td>
                	<?php if(($var["status"]) == "0"): ?><span style="color:#FF0000;">货到付款</span><?php endif; ?>
                    <?php if(($var["status"]) == "1"): ?>已付款<?php endif; ?>
                    <?php if(($var["status"]) == "2"): ?><span style="color:#FF0000;">配送中</span><?php endif; ?>
                    <?php if(($var["status"]) == "8"): ?><span style="color:#006600;">已完成</span><?php endif; ?>
                </td>
                <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>
                
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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