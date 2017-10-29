<?php if (!defined('THINK_PATH')) exit(); $arr = array(); ?>
<?php if(is_array($lifecate)): foreach($lifecate as $key=>$item): $arr[$item['cate_id']] = $item['channel_id']; endforeach; endif; ?>
<?php if(is_array($list)): foreach($list as $key=>$var): $chl = $arr[$var['cate_id']]; ?>
	
	<!-- 二手 -->
	<?php if($chl == 1): ?><li class="mod-1">
		<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>">
			<img class="pic flex" src="__ROOT__/attachs/<?php echo (($var["photo"])?($var["photo"]):'default.jpg'); ?>" />
			<div class="des flex">
				<h4>
					<?php echo ($var['title']); ?>
	                <?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
                    <?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
				</h4>
				<p><?php echo ($var["addr"]); ?> / <?php echo formatTime($var['create_time']);?></p>
				<?php if(!empty($cate['num2'])): ?><p><em><?php echo (($var["num2"])?($var["num2"]):'面议'); ?></em> <?php if(!empty($var['num2'])): ?><i><?php echo ($cate["unit2"]); ?></i><?php endif; ?></p><?php endif; ?>
			</div>
		</a>
	</li><?php endif; ?>
	
	<!-- 车辆 -->
	<?php if($chl == 2): if(!in_array(($var["cate_id"]), explode(',',"28,31,33,37"))): ?><li class="mod-1">
		<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>">
			<img class="pic flex" src="__ROOT__/attachs/<?php echo (($var["photo"])?($var["photo"]):'default.jpg'); ?>" />
			<div class="des flex">
				<h4>
					<?php echo ($var['title']); ?>
	                <?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
                    <?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
				</h4>
				<p><?php echo ($var["addr"]); ?> / <?php echo formatTime($var['create_time']);?></p>
				<?php if(!empty($cate['num2'])): ?><p><em><?php echo (($var["num2"])?($var["num2"]):'面议'); ?></em> <?php if(!empty($var['num2'])): ?><i><?php echo ($cate["unit2"]); ?></i><?php endif; ?></p><?php endif; ?>
			</div>
		</a>
	</li>
	<?php else: ?>
	<li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; endif; ?>
	
	<!-- 求职 -->
	<?php if($chl == 3): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; ?>
	
	
	<!-- 交友 -->
	<?php if($chl == 4): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><span class="mui-icon mui-icon-chatbubble"></span></a>
		</div>
	</li><?php endif; ?>
	
	<!-- 房屋 -->
	<?php if($chl == 5): ?><li class="mod-1">
		<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>">
			<img class="pic flex" src="__ROOT__/attachs/<?php echo (($var["photo"])?($var["photo"]):'default.jpg'); ?>" />
			<div class="des flex">
				<h4>
					<?php echo ($var['title']); ?>
	                <?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
                    <?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
				</h4>
				<p><?php echo ($var["addr"]); ?> / <?php echo formatTime($var['create_time']);?></p>
				<?php if(!empty($cate['num2'])): ?><p><em><?php echo (($var["num2"])?($var["num2"]):'面议'); ?></em> <?php if(!empty($var['num2'])): ?><i><?php echo ($cate["unit2"]); ?></i><?php endif; ?></p><?php endif; ?>
			</div>
		</a>
	</li><?php endif; ?>
	
	<!-- 培训 -->
	<?php if($chl == 6): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; ?>
	
	<!-- 招聘 -->
	<?php if($chl == 7): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; ?>
	
	<!-- 服务 -->
	<?php if($chl == 8): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; ?>
	
	<!-- 兼职 -->
	<?php if($chl == 9): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; ?>
	
	<!-- 宠物 -->
	<?php if($chl == 10): ?><li class="mod-2">
		<div class="des flex">
			<h4>
				<a href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>"><?php echo ($var['title']); ?></a>
				<?php if(($var["top_date"]) > $today): ?><span>顶</span><?php endif; ?>
				<?php if(($var["urgent_date"]) > $today): ?><span>急</span><?php endif; ?>
			</h4>
			<p><?php echo ($var["addr"]); ?> </p>
			<p>联系人:<?php echo ($var["contact"]); ?> / <?php echo formatTime($var['create_time']);?></p>
		</div>
		<div class="tel flex">
			<a href="tel:<?php echo ($var["mobile"]); ?>"><span class="mui-icon mui-icon-phone"></span></a>
		</div>
	</li><?php endif; endforeach; endif; ?>