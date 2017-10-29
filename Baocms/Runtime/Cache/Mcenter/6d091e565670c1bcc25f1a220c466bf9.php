<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?>会员中心</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/mcenter.css"/>
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,mcenter.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
	</head>
	<body>
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('tuancode/index');?>"><i class="icon-angle-left"></i></a>
	</div>
		<div class="top-title">
			我的团购券
		</div>
	<div class="top-signed">
		<?php if($msg_day > 0): ?><a href="<?php echo U('mcenter/message/index');?>">
<i class="icon-envelope"></i>
<span class="badge bg-red jiaofei"><?php echo ($msg_day); ?></span>
</a>
<?php else: ?>
    <?php if(empty($sign_day)): ?><a href="<?php echo U('mobile/sign/signed');?>" class="top-addr icon-plus" style="width: 100px !important;"> 签到领积分</a>
    <?php else: ?>
    <a href="<?php echo U('mobile/passport/logout');?>" class="top-addr icon-sign-out"></a><?php endif; endif; ?>
	</div>
</header>
<div class="panel-list" style="background: #FBFBFB;">
	<ul><li><a href="javascript:;">消费码：<em style="font-size:16px; font-weight:bold; color:#F00 "><?php echo ($detail['code']); ?></em></a></li></ul>
</div>

 <div class="container">           
	<div class="padding-large">
          
          
            <img width="100%" src="__ROOT__/attachs/<?php echo ($file); ?>" />
            <p>
                 <?php if(($detail["price"]) != "0"): ?>该抢购券价值为: <span class="text-dot"><?php echo round($detail['price']/100,2);?> NZD</span><?php else: ?>该抢购券为到付券只作为服务预定！需要额外到店支付相关费用才可以进行消费！<?php endif; ?>
            </p>
	</div>
</div>

<div class="container text-center">
		         
                <?php $code_ids = D('TuanCode') -> where('order_id ='.$detail['order_id']) -> find(); $order = $code_ids['order_id']; ?> 
                  
              <a class="button  bg-blue" href="<?php echo U('mcenter/tuan/detail',array('order_id'=>$order));?>">订单详情</a>  
              <?php if($detail['is_sms'] == 0): ?><a  target="x-frame"  class="button bg-dot" href="<?php echo U('mcenter/tuancode/sms',array('code_id'=>$detail['code_id']));?>">发送到手机</a> 
              <?php else: ?>
              <a class="button bg-gray" href="Javascript: void(0)">已发送</a><?php endif; ?>
                          
                 
	</div>



<div class="blank-20"></div>
 <footer class="foot-fixed">
  <?php if($ctl == 'member'): ?><a class="foot-item  <?php if($ctl == 'member'): ?>active<?php endif; ?>" href="<?php echo u('mobile/index/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">首页</span>
    </a>
  <?php else: ?>
  <a class="foot-item" href="<?php echo u('member/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">个人首页</span>
    </a><?php endif; ?>
    
    <a class="foot-item " href="<?php echo LinkTo('mobile/life/release');?>">			
    <span class="icon icon-plus"></span><span class="foot-label">发布</span></a>
    
     <a class="foot-item  <?php if(($ctl == 'tuancode')): ?>active<?php endif; ?>" href="<?php echo u('tuancode/index');?>">			
    <span class="icon icon-folder"></span><span class="foot-label">抢购劵</span></a>
    
    
    
    <a class="foot-item  <?php if(($ctl == 'message') ||($act == 'xiaoxizhongxin')): ?>active<?php endif; ?>" href="<?php echo u('message/index');?>">			
    <span class="icon icon-volume-up"></span><span class="foot-label">消息</span></a>
    
    <a class="foot-item  <?php if(($ctl == 'money') || ($ctl == 'logs') || ($ctl == 'cash') ||($act == 'zijinguanli')): ?>active<?php endif; ?>" href="<?php echo u('information/index');?>">			
    <span class="icon icon-gear"></span><span class="foot-label">设置</span></a>
    
   
    </footer>


<iframe id="x-frame" name="x-frame" style="display:none;">
</iframe>
</body>
</html>