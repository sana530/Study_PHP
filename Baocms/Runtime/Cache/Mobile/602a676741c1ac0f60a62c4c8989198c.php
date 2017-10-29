<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $index = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index ;?><li class="line">
        <a title="<?php echo ($item["weidian_name"]); ?>" href="<?php echo U('mart/lists',array('id'=>$item['id']));?>">
			<div class="x3">
				<img src="__ROOT__/attachs/<?php echo ($item["pic"]); ?>">
			</div>
			<div class="x9">
				<div class="t-box">
					<h5><?php echo bao_msubstr($item['weidian_name'],0,10,false);?> <span class="tag bg-sub float-right"><?php echo ($item["d"]); ?></span></h5>
				</div>
				<p>类型：<?php echo ($weidiancates[$item['cate_id']]['cate_name']); ?></p>
				<p class="addr text-gray" title="<?php echo ($item["addr"]); ?>"><span class="site"><?php echo ($item['addr']); ?></span></p>
			</div>
		</a>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>