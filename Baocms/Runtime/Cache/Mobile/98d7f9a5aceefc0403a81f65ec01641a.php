<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$var): ?><li>
  	<?php if($var[bsti] == 0){ ?>

	<a class="item line ele_order_now" href="javascript:void(0);" shop-id="<?php echo ($var['shop_id']); ?>" is-delivery="<?php echo ($var['is_delivery']); ?>">
		<div class="x3">
			<img src="<?php echo config_img($shops[$var['shop_id']]['photo']);?>">
		</div>
		<div class="x9">
			<h5><?php echo ($var['shop_name']); ?>
				<?php if(($var["is_pay"]) == "1"): ?><span class="fu">付</span><?php endif; ?>
				<?php if(($var["is_fan"]) == "1"): ?><span class="fan">返</span><?php endif; ?>
				<?php if(($var["is_delivery"]) == "1"): ?><span class="pei">送</span><?php endif; ?>
				 <span class="pei" style="display:none;">配</span>
				<?php if(($var["is_new"]) == "1"): ?><span class="jian">减</span><?php endif; ?>
			</h5>
			<p class="des-star">
				<span class="ui-starbar"><span style="width:<?php echo round($shops[$var['shop_id']]['score']*2,2);?>%"></span></span>
				<span class="float-right"><?php echo ($var["d"]); ?></span>
			</p>
			<p class="des-addr"><i class="mui-icon mui-icon-location"></i><?php echo ($shops[$var['shop_id']]['addr']); ?></p>
		</div>
	</a>

	<?php }else{ ?>
           
   	<a class="item line" href="javascript:;" style="background: #FBFAFA;">
		<div class="x3">
			<img src="<?php echo config_img($shops[$var['shop_id']]['photo']);?>">
		</div>
		<div class="x9">
			<h5><?php echo ($var['shop_name']); ?><b style="margin-left:5px; color:#F00; font-weight:normal;">(休息中)</b>
				<?php if(($var["is_pay"]) == "1"): ?><span class="fu">付</span><?php endif; ?>
				<?php if(($var["is_fan"]) == "1"): ?><span class="fan">返</span><?php endif; ?>
				<?php if(($var["is_delivery"]) == "1"): ?><span class="pei">送</span><?php endif; ?>
				<span class="pei" style="display:none;">配</span>
				<?php if(($var["is_new"]) == "1"): ?><span class="jian">减</span><?php endif; ?>
			</h5>				<p class="des-star">
				<span class="ui-starbar"><span style="width:<?php echo round($shops[$var['shop_id']]['score']*2,2);?>%"></span></span>
				<span class="float-right"><?php echo ($var["d"]); ?></span>
			</p>
			<p class="des-addr"><i class="mui-icon mui-icon-location"></i><?php echo ($shops[$var['shop_id']]['addr']); ?></p>
		</div>
	</a>

   <?php } ?>
</li><?php endforeach; endif; ?>
<!--立即下单弹出层-->
<div class="seatYuyue_sclt_mask">
	<div class="maskOne">
		<div class="title">立即下单 <a href="javascript:;" class="close fr"></a></div>
		<div class="cont">
			<div class="btn_box">
				<a id="pick_up_btn" href="" class="pub_btn">到店取餐</a>
				<a id="order_btn" href="" class="pub_btn bgcl1">点我送餐</a>
			</div>
		</div>
	</div>
	<div class="mask_bg"></div>
</div>
<script>
    $(document).ready(function() {

        $(".ele_order_now").click(function(){
            if ($(this).attr('is-delivery') == 1) {
                $(".seatYuyue_sclt_mask .btn_box a#pick_up_btn").attr('href', '<?php echo ($host); ?>/mobile/ele/shop/shop_id/'+$(this).attr('shop-id')+'.html');
                $(".seatYuyue_sclt_mask .btn_box a#order_btn").attr('href', '<?php echo ($host); ?>/mobile/ele/shop/shop_id/'+$(this).attr('shop-id')+'/delivery/1.html');
                $(".seat_yuyue_mask").show();
                $(".seatYuyue_sclt_mask .maskOne").show();
                $(".seatYuyue_sclt_mask .mask_bg").show();
            } else {
                location.href = '<?php echo ($host); ?>/mobile/ele/shop/shop_id/'+$(this).attr('shop-id')+'.html';
            }
        });
        $(".maskOne .close").click(function(){
            $(".maskOne").hide();
            $(".mask_bg").hide();
        });

    });
</script>
<!--立即下单弹出层end-->