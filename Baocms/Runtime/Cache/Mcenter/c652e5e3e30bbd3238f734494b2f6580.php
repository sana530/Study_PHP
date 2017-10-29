<?php if (!defined('THINK_PATH')) exit();?>
<div class="blank-10 bg"></div>
<?php if(is_array($list)): foreach($list as $key=>$item): ?><!-- 循环 -->
    <li class="line ">
    	 <dt><a class="x3">订单ID：<?php echo ($item["order_id"]); ?></a><a class="x9 text-right">下单日期：<?php echo (date('Y-m-d,H:i:s',$item["create_time"])); ?></a></dt>
  <dd class="zhong">
        <div class="x3">
            <a href="<?php echo U('mcenter/tuan/detail',array('order_id'=>$item['order_id']));?>"><img style="width:90%;" src="__ROOT__/attachs/<?php echo ($tuans[$item['tuan_id']]['photo']); ?>"></a>
        </div>
        <div class="x9">
            <p><a href="<?php echo U('mcenter/tuan/detail',array('order_id'=>$item['order_id']));?>"><?php echo bao_Msubstr($tuans[$item['tuan_id']]['title'],0,16);?></a> </p>
            <p class="text-small">
            <?php if($item['use_integral'] > 0): ?><span class="text-dot1 margin-right">使用积分：<span class="text-dot"><?php echo ($item['use_integral']); ?> 抵现：<?php echo round($item['use_integral']/100,2);?>NZD</span><?php endif; ?>
			</p>
            
            <p class="text-small">
            <?php if($item['mobile_fan'] > 0): ?><span class="text-dot1 margin-right">手机下单立减：<span class="text-dot"><?php echo round($item['mobile_fan']/100,2);?>NZD</span><?php endif; ?>
			</p>
         </div>
      </dd>
      <!--信息-->  
      
      <?php if($item['status'] == -1): ?><dt><div class="x12"><p class="text-small">您选择的到店支付。</p></div></dt> 
      <!--信息end--> 
      <?php else: ?>
      <dt>
         <div class="x12">
          <p class="text-small">总价：<?php echo round($item['total_price']/100,2);?>NZD
           <?php if($item['use_integral'] > 0): ?>- 积分抵现：<?php echo round($item['use_integral']/100,2);?>NZD（消耗<?php echo ($item['use_integral']); ?>积分）<?php endif; ?>
           <?php if($item['mobile_fan'] > 0): ?>-手机优惠：<?php echo round($item['mobile_fan']/100,2);?>NZD<?php endif; ?>
           =实付金额：<a class="text-dot"><?php echo round($item['need_pay']/100,2);?></a>NZD
           </p>
         </div>
      </dt> 
      <!--信息end--><?php endif; ?>
      
      <dl>
      <p class="text-right padding-top">
      
      <?php $tc = D('TuanCode'); $rtc = $tc -> where('order_id ='.$item['order_id']) -> find(); ?>
      
      <?php if(($item["status"]) == "-1"): ?><a class="button button-small bg-blue">到店付</a>
      <a href="<?php echo U('tuan/delete',array('order_id'=>$item['order_id']));?>" class="button button-small bg-dot">取消抢购</a>
      <?php if(($rtc["is_used"]) == "1"): if(($item["is_dianping"]) == "0"): ?><a href="<?php echo U('tuan/dianping',array('order_id'=>$item['order_id']));?>" class="button button-small bg-yellow">点评</a><?php endif; ?>
          <?php else: ?>
           <a class="button button-small bg-blue" href="javascript:void(0)">未验证</a><?php endif; endif; ?>        
                
      <?php if($item['status'] == 0): ?><a class="button button-small bg-dot" href="<?php echo U('mobile/tuan/pay',array('order_id'=>$item['order_id']));?>">付款</a><?php endif; ?>
      
      <?php if(($item["status"]) == "1"): ?><a class="button button-small bg-dot">已付款</a>
      <?php if(($rtc["is_used"]) == "1"): if(($item["is_dianping"]) == "0"): ?><a href="<?php echo U('tuan/dianping',array('order_id'=>$item['order_id']));?>" class="button button-small bg-yellow">点评</a><?php endif; ?>
          <?php else: ?>
           <a class="button button-small bg-blue" href="javascript:void(0)">未消费</a><?php endif; endif; ?>
      
      <?php if(($item["status"]) == "3"): ?><a class="button button-small bg-blue">正在退款</a><?php endif; ?>
      <?php if(($item["status"]) == "4"): ?><a class="button button-small bg-gray">已退款</a><?php endif; ?>
      
      <a href="<?php echo U('mcenter/tuan/detail',array('order_id'=>$item['order_id']));?>" class="button button-small bg-blue">查看详情</a>
            
	</p>
      
      
      </dl>
    </li>
    <!-- 循环 -->
    <div class="blank-10 bg"></div><?php endforeach; endif; ?>