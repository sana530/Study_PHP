<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$item): ?><li class="line tuan-card">
			<div class="x8">
				<div class="card-l">
					<p>名称:<?php echo bao_Msubstr($coupon[$item['coupon_id']]['title'],0,16,false);?></p>
					<p>密码:<em class="text-yellow margin-right"><?php echo ($item["code"]); ?></i></em>
						<?php if(($item['is_used'] == 0) or ($coupon[$item['coupon_id']]['expire_date'] > $today) ): if($item['is_used'] == 1): ?>已使用<?php else: ?><span class="text-green">未使用</span><?php endif; ?>
							<p>满:&#36;<?php echo round($coupon[$item['coupon_id']]['full_price']/100,2);?>NZD <a class="margin-left text-dot">减:&#36;<?php echo round($coupon[$item['coupon_id']]['reduce_price']/100,2);?>NZD </a> </p>
						<?php else: ?>
					   		已过期   <a class="margin-left text-dot"  href="<?php echo u('coupon/coupondel',array('download_id'=>$item['download_id']));?>">删除</a><?php endif; ?>
					</p>
				</div>

			</div>
			<div class="x4">
				<div class="card-r">
					<a href="<?php echo U('coupon/weixin',array('download_id'=>$item['download_id']));?>">
						<img src="/static/default/pc/image/wx.png" />
						<p>点击查看二维码</p>
					</a>
				</div>
			</div>
		</li>
	<div class="blank-10 bg"></div><?php endforeach; endif; ?>