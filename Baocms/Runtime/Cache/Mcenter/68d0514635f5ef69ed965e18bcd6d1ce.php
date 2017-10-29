<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?>会员中心</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/mcenter.css"/>
		<link rel="stylesheet" href="/static/default/wap/css/intel.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/intel.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,mcenter.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
	</head>
	<body> 
<link rel="stylesheet" href="/static/default/wap/css/housekeeping.css"/>  
	<link href="/static/default/wap/other/jquery-ui.css" rel="stylesheet" />
	<script src="/static/default/wap/other/jquery-ui.js"></script> 
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			提现申请
		</div>
	</header>

 <!-- 筛选TAB -->
<style>ul{ padding-left:0px;}</style>
<ul id="shangjia_tab">
		<li style="width:33.3333333367%;"><a href="<?php echo U('mcenter/money/index');?>">余额充值</a></li>
        <li style="width:33.3333333367%;"><a href="<?php echo U('mcenter/cash/index');?>" class="on">申请提现</a></li>
        <li style="width:33.3333333367%;"><a href="<?php echo U('mcenter/logs/moneylogs');?>" >日志管理</a></li>
</ul>
<div class="blank-40 bg"></div>

<!-- 筛选TAB -->
<div class="line tab-bar">
	<div class="button-toolbar">
		<div class="button-group">
			<a class="block button bg-dot active">申请提现</a>
			<a class="block button <?php if(($aready) == "1"): ?>bg-dot active<?php endif; ?>" href="<?php echo LinkTo('/mcenter/cash/cashlog');?>">提现记录</a>
		</div>
	</div>
</div>

    <div class="line padding border-bottom">
        <span class="x12 text-gray">当前用户：<?php echo ($MEMBER['account']); ?>（<?php echo ($MEMBER['nickname']); ?>）</span>
		<span class="x12 text-gray">您当前余额：<?php echo ($money); ?>NZD</span>
	</div>

    <form action="<?php echo U('/mcenter/cash');?>" method="post" target="x-frame">
	<div class="line padding border-bottom">
		<span class="x3 text-gray">提现金额：</span>
		<span class="x5"><input type="text" name="money" id="money" class="text-input" ></span>
		<span class="x4"><em class="text-small text-gray">
        <?php if(!empty($cash_money)): ?>单笔最少<?php echo ($cash_money); ?>NZD<br/><?php endif; ?>
        <?php if(!empty($cash_money_big)): ?>单笔最多<?php echo ($cash_money_big); ?>NZD<?php endif; ?>
        
        <em></span>
	</div>
	<div class="line padding border-bottom">
		<span class="x3 text-gray">开户银行：</span>
		<span class="x9"><input type="text" name="bank_name" id="bank_name" class="text-input"  value="<?php echo ($info["bank_name"]); ?>"  placeholder="请输入开户银行" ></span>

	</div>
    <div class="line padding border-bottom">
		<span class="x3 text-gray">银行账号：</span>
		<span class="x9"><input type="text" name="bank_num" id="bank_num" class="text-input"  value="<?php echo ($info["bank_num"]); ?>"   placeholder="请输入银行账户" ></span>

	</div>
    <div class="line padding border-bottom">
		<span class="x3 text-gray">具体支行：</span>
		<span class="x9"><input type="text" name="bank_branch" id="bank_branch" class="text-input"   value="<?php echo ($info["bank_branch"]); ?>"  placeholder="请输入具体支行名字" ></span>

	</div>
    <div class="line padding border-bottom">
		<span class="x3 text-gray">开户名：</span>
		<span class="x9"><input type="text" name="bank_realname" id="bank_realname" class="text-input"  value="<?php echo ($info["bank_realname"]); ?>"  placeholder="输入开户名" ></span>

	</div>
    
	<div class="container">
		<div class="blank-30"></div>
		<p><span class="text-dot">小提示：</span> 请您认真填写!</p>
	</div>
	<div class="container">
		<div class="blank-30"></div>
            <?php if(($money) == "0"): ?><button class="button button-big button-block bg-gray">您的余额不足</button>                                     
            <?php else: ?>
            <button class="button button-big button-block bg-dot">确认申请</button><?php endif; ?>   
		
		<div class="blank-30"></div>
	</div>
</form>


	
<div class="blank-20"></div>
 <footer class="foot-fixed">
  <?php if($ctl == 'member'): ?><a class="foot-item  <?php if($ctl == 'member'): ?>active<?php endif; ?>" href="<?php echo u('mobile/index/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">首页</span>
    </a>
  <?php else: ?>
  <a class="foot-item" href="<?php echo u('member/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">用户首页</span>
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