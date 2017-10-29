<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$item): ?><a class="item" href="<?php echo U('booking/detail',array('shop_id'=>$item['shop_id']));?>">	
		<img class="pic" src="<?php echo config_img($item['photo']);?>">	
		<div class="des">	
			<h5><?php echo ($item["shop_name"]); ?>	<span class="distance"><?php echo ($item["d"]); ?></span>	</h5>	
			<div class="info">	
                <span class="ui-starbar"><span style="width:<?php echo round($item['score']*20,1);?>%"></span></span>
                <span class="shopyouhui"><?php echo ($item["comments"]); ?>评价</span>
            </div>	
			<span class="addr">	地址：<?php echo ($item['addr']); ?></span>
		</div>	
	</a><?php endforeach; endif; ?>