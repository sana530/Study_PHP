<?php if (!defined('THINK_PATH')) exit();?> <?php if(is_array($list)): foreach($list as $key=>$item): ?><div class="line padding border-bottom">
		<div class="x12">
			<p><a class="title" href="<?php echo U('express/detail',array('express_id'=>$item['express_id']));?>">标题：<?php echo ($item["title"]); ?>&nbsp;&nbsp; ID:(<?php echo ($item["express_id"]); ?>)</a></p>
            <p class="text-gray" style="font-size:12px">收件人：<?php echo ($item["to_name"]); ?> &nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ($item["to_mobile"]); ?>(收)</p>
            <p class="text-gray" style="font-size:12px">收件人地址：<?php echo ($item["to_addr"]); ?></p>
            <p class="text-gray" style="font-size:12px">发布时间：<?php echo (date('Y-m-d H:i:s',$item["create_time"])); ?> </p>
		</div>
	</div>
	<div class="line padding text-right">
		<span class="x12"> 
        <a class="button button-small bg-dot" href="<?php echo U('express/detail',array('express_id'=>$item['express_id']));?>">查看详情</a>
        <a class="button button-small bg-gray" href="<?php echo U('express/delete',array('express_id'=>$item['express_id']));?>">删除</a>
        <?php if($item["status"] == 0): ?><a class="button button-small bg-dot" href="<?php echo U('express/edit',array('express_id'=>$item['express_id']));?>">编辑</a><?php endif; ?>

        <?php if($item["status"] == 0): ?><a class="button button-small bg-gray">未处理</a>
        <?php elseif($item["status"] == 1): ?>
        <a class="button button-small bg-blue">配送中</a>
        <?php elseif($item["status"] == 2): ?>
        <a class="button button-small bg-dot">已完成</a>
        <?php else: ?>
        <a class="button button-small bg-gray">已拒收</a><?php endif; ?>
        
        </span>
	</div>
	<div class="blank-10 bg"></div><?php endforeach; endif; ?>