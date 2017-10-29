<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo ($CONFIG["site"]["title"]); ?>管理后台</title>
        <meta name="description" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <meta name="keywords" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <!-- <link href="__TMPL__statics/css/index.css" rel="stylesheet" type="text/css" /> -->
        <link href="__TMPL__statics/css/style.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/land.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/pub.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/main.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/js/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__'; </script>
        <script src="__PUBLIC__/js/jquery.js"></script>
        <script src="__PUBLIC__/js/jquery-ui.min.js"></script>
        <script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
        <script src="/Public/js/layer/layer.js"></script>
        <script src="__PUBLIC__/js/admin.js?v=20150409"></script>
    </head>
    
    
    </head>
<style type="text/css">
#ie9-warning{ background:#F00; height:38px; line-height:38px; padding:10px;
position:absolute;top:0;left:0;font-size:12px;color:#fff;width:97%;text-align:left; z-index:9999999;}
#ie6-warning a {text-decoration:none; color:#fff !important;}
</style>

<!--[if lte IE 9]>
<div id="ie9-warning">您正在使用 Internet Explorer 9以下的版本，请用谷歌浏览器访问后台、部分浏览器可以开启极速模式访问！不懂点击这里！ <a href="http://www.fengmiyuanma.com/10478.html" target="_blank">查看为什么？</a>
</div>
<script type="text/javascript">
function position_fixed(el, eltop, elleft){  
       // check if this is IE6  
       if(!window.XMLHttpRequest)  
              window.onscroll = function(){  
                     el.style.top = (document.documentElement.scrollTop + eltop)+"px";  
                     el.style.left = (document.documentElement.scrollLeft + elleft)+"px";  
       }  
       else el.style.position = "fixed";  
}
       position_fixed(document.getElementById("ie9-warning"),0, 0);
</script>
<![endif]-->


    <body>
         <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
   <div class="main">
<div class="mainBt">
    <ul>
        <li class="li1">设置</li>
        <li class="li2">基本设置</li>
        <li class="li2 li3">积分设置</li>
    </ul>
</div>
<style>
.profit {text-align: center;color: #333;font-weight: bold; background: #F5F5FB;}
.lfTdBt{width:180px;}
</style>
<p class="attention"><span>注意：消费抵扣积分比例不要经常修改，出现的错误概不负责！</span></p>
<form  target="baocms_frm" action="<?php echo U('setting/integral');?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
               <tr>
                    <td class="lfTdBt">消费积分：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[gouwu]" value="<?php echo (($CONFIG["integral"]["gouwu"])?($CONFIG["integral"]["gouwu"]):'0'); ?>" class="scAddTextName w150" />
                        <code>
                            一块钱反多少积分,比如填写1块钱就返1积分
                            （后面积分抵扣的时候100积分等于1块钱）填写0则关闭积分，此设置适用于团购和购物，外卖以及订座
                        </code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">消费抵扣积分比例：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[buy]" value="<?php echo (($CONFIG["integral"]["buy"])?($CONFIG["integral"]["buy"]):'0'); ?>" class="scAddTextName w150" />
                        <code>不要经常改动！这里是用户下单时候积分抵扣比例，请按照要求填写，0位100:1,10为10:1,100为1：1，只能填写0,10,100，不能填写其他数字，切记 </code>
                    </td>
                </tr>
              
                <tr>
                 <td class="lfTdBt">返还商家比例：</td>
                 <td class="rgTdBt">
                 <input type="text" name="data[return_integral]" value="<?php echo ($CONFIG["integral"]["return_integral"]); ?>" class="scAddTextName w150" />%
                    <code>首先开启上面那个才会有效，这里就是说开启返还给商家后，的比例是什么百分比，建议80%就填写10就行，就是100积分返还给商家80积分。</code>
                  </td>
			    </tr>
                
                <tr>
                 <td class="lfTdBt">积分兑换频道返还商家：</td>
                 <td class="rgTdBt">
                 <label><input type="radio" name="data[return]" <?php if(($CONFIG["integral"]["return"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"/>开启</label>
                 <label><input type="radio" name="data[return]" <?php if(($CONFIG["integral"]["return"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"/>关闭</label>
                    <code>用户在前台积分兑换频道兑换积分后，积分是否返现给商家，开启就返，不开启默认网站回收。</code>
                  </td>
			    </tr>
                
                 <tr>
                 <td class="lfTdBt">抢购积分返还商家：</td>
                 <td class="rgTdBt">
                 <label><input type="radio" name="data[tuan_return_integral]" <?php if(($CONFIG["integral"]["tuan_return_integral"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"/>开启</label>
                 <label><input type="radio" name="data[tuan_return_integral]" <?php if(($CONFIG["integral"]["tuan_return_integral"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"/>关闭</label>
                    <code>抢购验证的时候积分是否返还给商家账户，必须开启积分返还才会生效，返还比例<a style="color:#F00"><?php echo ($CONFIG["integral"]["return_integral"]); ?>%</a>。</code>
                  </td>
			    </tr>
                
                <tr>
                 <td class="lfTdBt">商城积分返还商家：</td>
                 <td class="rgTdBt">
                 <label><input type="radio" name="data[mall_return_integral]" <?php if(($CONFIG["integral"]["mall_return_integral"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"/>开启</label>
                 <label><input type="radio" name="data[mall_return_integral]" <?php if(($CONFIG["integral"]["mall_return_integral"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"/>关闭</label>
                    <code>用户商城确认收货后返还给商家积分，必须开启积分返还才会生效，返还比例<a style="color:#F00"><?php echo ($CONFIG["integral"]["return_integral"]); ?>%</a>。</code>
                  </td>
			    </tr>
                 <?php $config = D('Setting')->fetchAll(); $integral_buy = $config['integral']['buy']; ?>
                <tr><td class="rgTdBt profit" colspan = "2"> 下面是积分兑换控制开关，这里控制的的是会员中心兑换比例，<a style="color:#F00"> <?php if($integral_buy == 0): ?>当前积分使用比例100:1
                    <?php elseif($integral_buy == 10): ?>
                    	当前积分使用比例10:1
                    <?php elseif($integral_buy == 100): ?>
                    	当前积分使用比例1:1
                    <?php else: ?>
                    	错误，不合法的积分比例设置<?php endif; ?></a></td></tr>
                
                <tr>
                 <td class="lfTdBt">开启积分兑换余额：</td>
                 <td class="rgTdBt">
                 <label><input type="radio" name="data[integral_exchange]" <?php if(($CONFIG["integral"]["integral_exchange"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"/>开启</label>
                 <label><input type="radio" name="data[integral_exchange]" <?php if(($CONFIG["integral"]["integral_exchange"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"/>关闭</label>
                    <code>开启后会员中心才会出现积分兑换余额的按钮，积分兑换比例跟使用比例一致，不建议经常修改
                   
                    <a style="color:#F00">
                    <?php if($integral_buy == 0): ?>当前积分使用比例100:1
                    <?php elseif($integral_buy == 10): ?>
                    	当前积分使用比例10:1
                    <?php elseif($integral_buy == 100): ?>
                    	当前积分使用比例1:1
                    <?php else: ?>
                    	错误，不合法的积分比例设置<?php endif; ?>
                    </a></code>
                  </td>
			    </tr>
                
                <tr>
                 <td class="lfTdBt">用户积分兑换余额税点：</td>
                 <td class="rgTdBt">
                 <input type="text" name="data[integral_exchange_tax]" value="<?php echo ($CONFIG["integral"]["integral_exchange_tax"]); ?>" class="scAddTextName w150" />%，这里是扣点百分比！
                    <code>这里就是设置用户积分兑换余额的时候应该扣除多少点，扣除部分网站回收，比如设置10%那么相当于用户用90积分去兑换，兑换比例
                    <a style="color:#F00">
                    <?php if($integral_buy == 0): ?>100:1
                    <?php elseif($integral_buy == 10): ?>
                    	10:1
                    <?php elseif($integral_buy == 100): ?>
                    	1:1
                    <?php else: ?>
                    	错误的比例设置<?php endif; ?>
                    </a>
                    。</code>
                  </td>
			    </tr>
                
                <tr>
                 <td class="lfTdBt">每次兑换最少积分数：</td>
                 <td class="rgTdBt">
                 <input type="text" name="data[integral_exchange_small]" value="<?php echo ($CONFIG["integral"]["integral_exchange_small"]); ?>" class="scAddTextName w150" />
                    <code>用户每一次积分兑换最少需要多少积分才可以兑换到余额，建议设置100，不过跟上面的比例有关系，如果积分比例是大的话这里设置大一点</code>
                  </td>
			    </tr>
                
                <tr>
                 <td class="lfTdBt">每次兑换最多积分数：</td>
                 <td class="rgTdBt">
                 <input type="text" name="data[integral_exchange_big]" value="<?php echo ($CONFIG["integral"]["integral_exchange_big"]); ?>" class="scAddTextName w150" />
                    <code>用户每一次积分兑换最多需要多少积分才可以兑换到余额，建议设置1000，不过跟上面的比例有关系，如果积分比例是大的话这里设置大一点</code>
                  </td>
			    </tr>
                
               
                <tr><td class="rgTdBt profit" colspan = "2"> 下面是各种操作奖励积分，二开请写下面！</td></tr>
                
                <tr>
                    <td class="lfTdBt">发表分享：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[share]" value="<?php echo ($CONFIG["integral"]["share"]); ?>" class="scAddTextName w150" />
                        <code>由于分享需要审核，积分会在后台审核后增加到用户账户</code>
                    </td>
                </tr>

                <tr>
                    <td class="lfTdBt">回复帖子：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[reply]" value="<?php echo ($CONFIG["integral"]["reply"]); ?>" class="scAddTextName w150" />
                        <code>由于回复帖子需要审核，积分会在后台审核后增加到用户账户</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">绑定手机：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[mobile]" value="<?php echo ($CONFIG["integral"]["mobile"]); ?>" class="scAddTextName w150" />
                        <code>建议多奖励一些积分</code>
                    </td>
                </tr>  
                <tr>
                    <td class="lfTdBt">邮件认证：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[email]" value="<?php echo ($CONFIG["integral"]["email"]); ?>" class="scAddTextName w150" />
                        <code>建议多奖励一些积分</code>
                    </td>
                </tr> 

                <tr>
                    <td class="lfTdBt">手机签到：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[sign]" value="<?php echo ($CONFIG["integral"]["sign"]); ?>" class="scAddTextName w150" />
                        <code>建议多奖励一些积分</code>
                    </td>
                </tr> 
                <tr>
                    <td class="lfTdBt">手机首次签到：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[firstsign]" value="<?php echo ($CONFIG["integral"]["firstsign"]); ?>" class="scAddTextName w150" />
                        <code>建议多奖励一些积分</code>
                    </td>
                </tr>
                 <tr>
                    <td class="lfTdBt">首次注册：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[register]" value="<?php echo ($CONFIG["integral"]["register"]); ?>" class="scAddTextName w150" />
                        <code>用户注册后增加多少积分</code>
                    </td>
                </tr>
            </table>
        </div>
        <div class="smtQr"><input type="submit" value="确认保存" class="smtQrIpt" /></div>
    </div>
</form>

     
        
</div>
</body>
</html>