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
<script src="__PUBLIC__/js/highcharts/highcharts.js"></script>
<style>
.sy_c1Li {width: 1000px;}
.sy_content { padding: 20px 0 40px 20px;}
.tuan_topser_2016 span.red, .tuan_topser_l {font-size: 18px;}
.tuan_topser_l strong.green, .tuan_topser_l a{ font-size:16px;}
.tuan_table td { font-size:14px;}
.tuan_topser_2016 span.red{ color:#F00}
.tuan_topser_2016{color: #000;line-height: 30px;text-indent: 15px; font-size:18px;}
.tuan_table td span.red{ color:#F00; font-size:14px;}
</style>
<div class="sjgl_lead">
	<ul>
		<li><a href="#">商家中心首页</a>
		</li>
	</ul>
</div>
<div class="sy_content">
	<div class="radius5 tuan_top">
		<div class="tuan_top_t">
			<div class="left tuan_topser_l">
				欢迎使用<strong class="green"><?php echo ($config["site"]["title"]); ?>商户中心</strong> , 为您的营销插上翅膀!	
				<?php if(empty($MEMBER['email'])): ?><i class="icon-remove red"></i> 您还没有通过邮箱认证，<a target="_blank" href="<?php echo u('member/set/email');?>">立刻认证</a><?php endif; ?>
				<?php if(empty($MEMBER['mobile'])): ?><i class="icon-remove red"></i> 您还没有通过手机认证，<a target="_blank" href="<?php echo u('member/set/mobile');?>">立刻认证</a><?php endif; ?>
			</div>
		</div>
        <div class="tuan_top_t">
			<div class="left tuan_topser_2016">
				您管理的店铺：<?php echo ($SHOP["shop_name"]); ?>
				<?php if($counts['money'] > 0): ?>您总收入：<?php echo round($counts['money']/100,2);?>NZD，<?php endif; ?>
                当前余额：<span class="red"><?php echo round($MEMBER['gold']/100,2);?></span>NZD。
                <?php if(!empty($MEMBER['frozen'])): ?>冻结金：<?php echo round($MEMBER['frozen']/100,2);?>NZD。<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="sy_c1">
		<ul>
			<li class="left sy_c1Li">
			<table class="tuan_table" width="100%" border="1" cellspacing="0" cellpadding="0">
			<tbody>
			<tr style="background-color:#eee;">
				<td>项目</td>
				<td>总数据</td>
				<td>今日数据</td>
				<td width="70">操作</td>
			</tr>
			<tr>
			</tr>
			<tr>
				<td>抢购</td>
				<td>
					<?php echo ($counts['tuan']); ?>条抢购，<span class="red"><?php echo ($counts['tuan_audit']); ?></span>条待审核,总<?php echo ($counts['tuan_order']); ?>订单
				</td>
				<td>
					今日<span class="red"><?php echo ($counts['totay_tuan_order']); ?></span>单 ，<?php echo ($counts['tuan_order_code_is_used']); ?>单未验证 <?php echo ($counts['tuan_order_code_status']); ?>单退款中
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('tuan/index');?>">详情</a>
				</td>
			</tr>
			<tr>
				<td>优惠劵</td>
				<td>
					<?php echo ($counts['coupon']); ?>条优惠劵，<span class="red"><?php echo ($counts['coupon_audit']); ?></span>条待审核
				</td>
				<td>
					今日<span class="red"><?php echo ($counts['totay_coupon_download']); ?></span>人下载，总下载：<?php echo ($counts['coupon_download']); ?>次，<?php echo ($counts['coupon_is_used']); ?>人未验证。
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('coupon/index');?>">详情</a>
				</td>
			</tr>
			<?php if($open_mall == '1' ): if(!empty($wd)): ?><!--如果商户开通商城-->
			<tr>
				<td>商城</td>
				<td>
					<?php echo ($counts['goods']); ?>个商品，<span class="red"><?php echo ($counts['goods_audit']); ?></span>个待审核，总<?php echo ($counts['goods_order']); ?>个商城订单
				</td>
				<td>
					今日<span class="red"><?php echo ($counts['totay_goods_order']); ?></span>人下单，正在配送<?php echo ($counts['goods_order_two']); ?>单，已完成<?php echo ($counts['goods_order_three']); ?>单
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('order/index');?>">详情</a>
				</td>
			</tr><?php endif; endif; ?>
			<?php if(!empty($waimai)): ?><!--如果商户开通外卖-->
			<tr>
				<td>外卖</td>
				<td>
					<?php echo ($counts['ele']); ?>条外卖，<span class="red"><?php echo ($counts['ele_audit']); ?></span>菜品未审核
				</td>
				<td>
					今日<span class="red"><?php echo ($counts['totay_ele_order']); ?></span>人点餐，<?php echo ($counts['ele_order']); ?>总外卖订单<br/>
					<?php echo ($counts['totay_ele_order']); ?>单等待处理，<?php echo ($counts['totay_ele_order']); ?>单配送中，<?php echo ($counts['totay_ele_order']); ?>单配送完成。
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('order/index');?>">详情</a>
				</td>
			</tr><?php endif; ?>
            
            <tr>
				<td>酒店</td>
				<td>
					总<?php echo ($counts['hotel_room']); ?>房间
				</td>
				<td>
					今日订单<span class="red"><?php echo ($counts['totay_hotel_order']); ?></span>单。
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('hotel/index');?>">详情</a>
				</td>
			</tr>
            
            <tr>
				<td>订座</td>
				<td>
					总<?php echo ($counts['booking_menu']); ?>菜单
				</td>
				<td>
					今日订座订单<span class="red"><?php echo ($counts['totay_booking_order']); ?></span>单。
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('booking/index');?>">详情</a>
				</td>
			</tr>
            
			
			<?php if($ding['is_biz'] != 0): ?><!--如果后台开通黄页-->
			<tr>
				<td>黄页</td>
				<td>
					共<?php echo ($counts['biz']); ?>条黄页信息，<span class="red"><?php echo ($counts['biz_audit']); ?></span>条未审核
				</td>
				<td>
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('pois/index');?>">详情</a>
				</td>
			</tr><?php endif; ?>
			<tr>
				<td>粉丝</td>
				<td>
					总<?php echo ($counts['favorites']); ?>粉丝
				</td>
				<td>
					今日新增粉丝<span class="red"><?php echo ($counts['totay_favorites']); ?></span>条
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('order/index');?>">详情</a>
				</td>
			</tr>
			<tr>
				<td>评价</td>
				<td>
					<?php if($open_mall == '1' ): ?>商城<?php echo ($counts['goods_dianping']); ?>条评价，<?php endif; ?>外卖<?php echo ($counts['ele_dianping']); ?>条评价<br/>
                    抢购
					<?php echo ($counts['tuan_dianping']); ?>条评价
				</td>
				<td>
					<?php if($open_mall == '1' ): ?>今日商城<span class="red"><?php echo ($counts['totay_goods_dianping']); ?></span>条评价，<?php endif; ?>今日外卖<span class="red"><?php echo ($counts['totay_ele_dianping']); ?></span>条评价<br/>
                	今日抢购
					<span class="red"><?php echo ($counts['totay_tuan_dianping']); ?></span>条评价
				</td>
				<td>
					<a target="main_frm" href="<?php echo U('dianping/index');?>">详情</a>
				</td>
			</tr>
			
			</tbody>
			</table>
			</li>
		</ul>
	</div>
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