<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$item): ?><li>	<a class="item line" href="<?php echo U('ele/shop',array('shop_id'=>$item['shop_id']));?>">
		<div class="x3">
			<img src="__ROOT__/attachs/<?php echo ($shops[$item['shop_id']]['photo']); ?>">
		</div>
		<div class="x9">
				<h5><?php echo ($item['shop_name']); ?>
					<?php if(($item["is_pay"]) == "1"): ?><span class="fu">付</span><?php endif; ?>
					<?php if(($item["is_fan"]) == "1"): ?><span class="fan">返</span><?php endif; ?>
					 <span class="pei">配</span>
					<?php if(($item["is_new"]) == "1"): ?><span class="jian">减</span><?php endif; ?>
				</h5>				<p class="des-star">
					<span class="ui-starbar"><span style="width:<?php echo round($shops[$item['shop_id']]['score']*2,2);?>%"></span></span>
					<span class="float-right"><?php echo ($item["d"]); ?></span>
				</p>
				<p class="des-addr"><i class="mui-icon mui-icon-location"></i><?php echo ($shops[$item['shop_id']]['addr']); ?></p>
		</div>	</a>
</li><?php endforeach; endif; ?>