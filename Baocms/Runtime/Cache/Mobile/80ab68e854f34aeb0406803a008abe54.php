<?php if (!defined('THINK_PATH')) exit();?>
    <?php if(is_array($lifes)): foreach($lifes as $key=>$item): ?><div class="container1" onclick="location='<?php echo U('life/detail',array('life_id'=>$item['life_id']));?>'">
		<img class="x2" src="<?php echo config_img($item['photo']);?>">
		<div class="des x8">
			<h5><?php echo ($item["title"]); ?></h5>
			<p class="intro">描述：<?php echo msubstr($item['contact'],0,20);?></p>
			<p class="info">联系电话：<?php echo ($item["mobile"]); ?> </p>
		</div>
		<div class="des x2">
			<div class="intro2" style="width: auto; padding:0 3px;"><?php echo ($item["d"]); ?></div>
		</div>
	</div><?php endforeach; endif; ?>