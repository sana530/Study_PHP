<?php if (!defined('THINK_PATH')) exit();?>	<?php if(is_array($list)): foreach($list as $key=>$item): ?><li>
		<h5><a href="<?php echo U('biz/detail',array('pois_id'=>$item['pois_id']));?>"><?php echo ($item["name"]); ?></a><span> <i class="icon-map-marker"></i> (<?php echo ($item["d"]); ?>)</span></h5>
		<p>地址:<?php echo ($item["address"]); ?> </p>
		<p class="tel">
		<?php if(!empty($item[telephone])): ?>电话<a href="tel:<?php echo ($item["telephone"]); ?>"><?php echo ($item["telephone"]); ?></a><?php else: ?>暂无联系方式<?php endif; ?>
        <?php if($item['status'] == 1): ?><a class="text-dot" href="<?php echo U('biz/yuyue',array('pois_id'=>$item['pois_id']));?>"><i class="icon-tty"></i> 我要预约</a>
		<?php elseif($item['status'] == 0): ?>
			<a class="" target="x-frame" href="<?php echo U('biz/claim',array('pois_id'=>$item['pois_id']));?>"><i class="icon-street-view"></i> 我要认领</a>
		<?php elseif($item['status'] == -1): ?>
			<a class="text-gray"><i class="icon-tint"></i> 认领中</a><?php endif; ?>
		</p>

	</li><?php endforeach; endif; ?>