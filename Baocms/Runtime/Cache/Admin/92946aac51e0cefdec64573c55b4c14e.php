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
        <li class="li1">订餐管理</li>
        <li class="li2">餐饮商家</li>
        <li class="li2 li3">编辑</li>
    </ul>
</div>
<div class="mainScAdd ">
    <div class="tableBox">
        <form target="baocms_frm" action="<?php echo U('ele/edit',array('shop_id'=>$detail['shop_id']));?>" method="post">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">商家名称：</td>
                    <td  class="rgTdBt"><input type="text" name="data[shop_name]" value="<?php echo ($detail['shop_name']); ?>" class="manageInput" /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">是否打洋：</td>
                    <td  class="rgTdBt">
                        <label> <input type="radio" name="data[is_open]" value="1" <?php if(($detail["is_open"]) == "1"): ?>checked="checked"<?php endif; ?>  />营业中 </label>
                        <label> <input type="radio" name="data[is_open]" value="0"  <?php if(($detail["is_open"]) == "0"): ?>checked="checked"<?php endif; ?> /> 打烊</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">状态审核：</td>
                    <td  class="rgTdBt">
                        <label> <input type="radio" name="data[audit]" value="0" <?php if(($detail["audit"]) == "0"): ?>checked="checked"<?php endif; ?>  />审核中 </label>
                        <label> <input type="radio" name="data[audit]" value="1"  <?php if(($detail["audit"]) == "1"): ?>checked="checked"<?php endif; ?> /> 通过</label>
                        <label> <input type="radio" name="data[audit]" value="2"  <?php if(($detail["audit"]) == "2"): ?>checked="checked"<?php endif; ?> /> 拒绝</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">是否支持在线付款：</td>
                    <td  class="rgTdBt">
                        <label> <input type="radio" name="data[is_pay]" value="1" <?php if(($detail["is_pay"]) == "1"): ?>checked="checked"<?php endif; ?>  /> 支持</label>
                        <label> <input type="radio" name="data[is_pay]" value="0"  <?php if(($detail["is_pay"]) == "0"): ?>checked="checked"<?php endif; ?> /> 不支持</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">分类：</td>
                    <td class="rgTdBt"> 
                        <?php if(is_array($getEleCate)): foreach($getEleCate as $index=>$var): ?><label style="margin-right: 10px;"><span><?php echo ($var); ?>：</span><input type="checkbox" name="cate[]" value="<?php echo ($index); ?>"<?php if(in_array($index,$cate)){?> checked="checked" <?php }?> /></label><?php endforeach; endif; ?>   
                </td> 
                </tr>
                <tr>
                    <td class="lfTdBt">是否返利：</td>
                    <td  class="rgTdBt">
                        <label> <input type="radio" name="data[is_fan]" value="1" <?php if(($detail["is_fan"]) == "1"): ?>checked="checked"<?php endif; ?>  /> 支持</label>
                        <label> <input type="radio" name="data[is_fan]" value="0"  <?php if(($detail["is_fan"]) == "0"): ?>checked="checked"<?php endif; ?> /> 不支持</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">最高返利金额：</td>
                    <td  class="rgTdBt">
                        <input type="text" name="data[fan_money]" value="<?php echo round($detail['fan_money']/100,2);?>" class="manageInput" />
                        <code>比如填写的是9元 那么很可能也只会反1元也可能会返现几角几分！如果填写0就不返利</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">新客户下单立减：</td>
                    <td  class="rgTdBt">
                        <label> <input type="radio" name="data[is_new]" value="1" <?php if(($detail["is_new"]) == "1"): ?>checked="checked"<?php endif; ?>  /> 支持</label>
                        <label> <input type="radio" name="data[is_new]" value="0"  <?php if(($detail["is_new"]) == "0"): ?>checked="checked"<?php endif; ?> /> 不支持</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">满多少钱：</td>
                    <td  class="rgTdBt"><input type="text" name="data[full_money]" value="<?php echo round($detail['full_money']/100,2);?>" class="manageInput" />

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">减多少钱：</td>
                    <td  class="rgTdBt">
                        <input type="text" name="data[new_money]" value="<?php echo round($detail['new_money']/100,2);?>" class="manageInput" />
                        <code>每超过满的金额10元将额外增加一元</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">是否支持送餐：</td>
                    <td class="rgTdBt">
                        <label> <input type="radio" name="data[is_delivery]" value="1" <?php if(($detail["is_delivery"]) == "1"): ?>checked="checked"<?php endif; ?>  /> 支持</label>
                        <label> <input type="radio" name="data[is_delivery]" value="0"  <?php if(($detail["is_delivery"]) == "0"): ?>checked="checked"<?php endif; ?>
                            <?php if(empty($detail["is_delivery"])): ?>checked="checked"<?php endif; ?> /> 不支持</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">配送费：</td>
                    <td  class="rgTdBt"><input type="text" name="data[logistics]" value="<?php echo round($detail['logistics']/100,2);?>" class="manageInput" />

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">起送价：</td>
                    <td  class="rgTdBt"><input type="text" name="data[since_money]" value="<?php echo round($detail['since_money']/100,2);?>" class="manageInput" />
                        <code>满多少钱才能下单！</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">卖出数：</td>
                    <td><input type="text" name="data[sold_num]" value="<?php echo (($detail["sold_num"])?($detail["sold_num"]):''); ?>" class="manageInput" />

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">月卖出数：</td>
                    <td  class="rgTdBt"><input type="text" name="data[month_num]" value="<?php echo (($detail["month_num"])?($detail["month_num"]):''); ?>" class="manageInput" />

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">说明：</td>
                    <td  class="rgTdBt"><textarea  name="data[intro]" cols="50" rows="10" ><?php echo (($detail["intro"])?($detail["intro"]):''); ?></textarea>

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">排序：</td>
                    <td  class="rgTdBt"><input type="text" name="data[orderby]" value="<?php echo (($detail["orderby"])?($detail["orderby"]):'100'); ?>" class="manageInput" />

                    </td>
                </tr>

                <tr>
                    <td class="lfTdBt">配送：</td>
                    <td  class="rgTdBt"><input type="text" name="data[distribution]" value="<?php echo (($detail["distribution"])?($detail["distribution"]):'100'); ?>" class="manageInput" /> 分钟送达

                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">自主取餐时间：</td>
                    <td class="rgTdBt"><input type="text" name="data[order_ready]" value="<?php echo (($detail["order_ready"])?($detail["order_ready"]):'30'); ?>" class="manageInput" /> 分钟</td>
                </tr>
                <tr>
                    <td class="lfTdBt">结算费率：</td>
                    <td class="rgTdBt"><input type="text" name="data[rate]" value="<?php echo (($detail["rate"])?($detail["rate"]):''); ?>" class="manageInput" />
                        <code>千分之，比如是千分之60 就填60，不能写小数点，建议100-150，意思是就是10%-15%</code>
                    </td>
                </tr>
            </table>
            <div class="smtQr"><input type="submit" value="确认保存" class="smtQrIpt" /></div>
        </form>
    </div>
</div>

     
        
</div>
</body>
</html>