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
<div class="sjgl_lead">
    <ul>
        <li><a href="#">其他</a> > <a href="">外卖设置</a> > <a>外卖营业状态</a></li>
    </ul>
</div>
<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">打烊状态用户将不能在继续下单</div>
        </div>
    </div> 
     <!--引入菜单-->
    <div class="tabnr_change show">
    <style type="text/css">
	.tuanfabu_table tr td{width:50px;}
	#busihour{ width:460px; height:30px;} 
	
	</style>
        <form  method="post" target="baocms_frm"  action="<?php echo U('ele/open');?>">
    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><p class="tuanfabu_t">状态</td>
                <td>
                    <div class="tuanfabu_nr">
                        <label>
                            <input type="radio" <?php if(($ele["is_open"]) == "0"): ?>checked="checked"<?php endif; ?>  name="is_open" id="is_open" value="0"/>打烊中
                        </label>
                         <label>
                             <input type="radio" <?php if(($ele["is_open"]) == "1"): ?>checked="checked"<?php endif; ?>    name="is_open" id="is_open" value="1"/>营业中
                        </label>
                    </div>
                </td>
            </tr>
            
            <!--<tr>
                <td width="60"><p class="tuanfabu_t">外卖配送半径</td>
                <td>
                    <div class="tuanfabu_nr">
                  <input type="text" name="is_radius" id="is_radius" class="tuanfabu_int tuanfabu_intw2" value="<?php echo ($ele[is_radius]); ?>" />
                  <code>单位为KM，超过距离范围不显示，请填写数字，建议填写1-5，以可以不填写</code>
                    </div>
                </td>
            </tr>
            
             <tr>
                <td width="60"><p class="tuanfabu_t">指定配送员ID:</td>
                <td>
                    <div class="tuanfabu_nr">
                  <input type="text" name="given_distribution" id="given_distribution" class="tuanfabu_int tuanfabu_intw2" value="<?php echo ($ele[given_distribution]); ?>" />
                  <code>如留空，开启第三方配送后都可以抢单，如需要指定配送员，请填写配送员的ID号或者咨询网站客服</code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td><p class="tuanfabu_t">是否开启自动发货</td>
                <td>
                    <div class="tuanfabu_nr">
                        <label>
                            <input type="radio" <?php if(($ele["is_print_deliver"]) == "0"): ?>checked="checked"<?php endif; ?>  name="is_print_deliver" id="is_open" value="0"/>关闭
                        </label>
                         <label>
                             <input type="radio" <?php if(($ele["is_print_deliver"]) == "1"): ?>checked="checked"<?php endif; ?>    name="is_print_deliver" id="is_open" value="1"/>开启
                        </label>
                        <code>必须配置打印机后才能开启自动打印，配置方式：商家设置》》》基本设置》》》填写相关参数后保存</code>
                    </div>
                </td>
            </tr>-->
            
            <tr>
                <td><p class="tuanfabu_t">开启订单语音提示</td>
                <td>
                    <div class="tuanfabu_nr">
                        <label>
                            <input type="radio" <?php if(($ele["is_voice"]) == "0"): ?>checked="checked"<?php endif; ?> name="is_voice" id="is_open" value="0"/>关闭
                        </label>
                         <label>
                             <input type="radio" <?php if(($ele["is_voice"]) == "1"): ?>checked="checked"<?php endif; ?> name="is_voice" id="is_open" value="1"/>开启
                        </label>
                        <code>开启后PC有新订单来了有语音提示</code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td><p class="tuanfabu_t">点餐二维码</td>
                <td>
                    <div class="tuanfabu_nr">
                       <img style="width:40px" src="__ROOT__/attachs/<?php echo ($file['big_file']); ?>"/>
                         <code><a style="color:#00F" target="_blank" href="__ROOT__/attachs/<?php echo ($file['big_file']); ?>">点击下载二维码，新窗口打开，另存到电脑上，然后印刷出来即可！</a></code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td><p class="tuanfabu_t">开启自动刷新</td>
                <td>
                    <div class="tuanfabu_nr">
                        <label>
                            <input type="radio" <?php if(($ele["is_refresh"]) == "0"): ?>checked="checked"<?php endif; ?> name="is_refresh" id="is_open" value="0"/>关闭
                        </label>
                         <label>
                             <input type="radio" <?php if(($ele["is_refresh"]) == "1"): ?>checked="checked"<?php endif; ?> name="is_refresh" id="is_open" value="1"/>开启
                        </label>
                         <code>开启后PC已卖出的订单自动刷新</code>
                    </div>
                </td>
            </tr>
            
             <tr>
                <td width="60"><p class="tuanfabu_t">自动刷新间隔秒数:</td>
                <td>
                    <div class="tuanfabu_nr">
                  <input type="text" name="is_refresh_second" id="is_refresh_second" class="tuanfabu_int tuanfabu_intw2" value="<?php echo ($ele[is_refresh_second]); ?>" />
                  <code>必须先开启自动刷新后才有效，建议10秒一下</code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td width="60"><p class="tuanfabu_t">营业时间</td>
                <td>
                    <div class="tuanfabu_nr">
                  <input type="text" name="busihour" id="busihour" class="px" value="<?php echo ($ele[busihour]); ?>" />
                  <code>比如：8:00-12:00,13:00-16:00 中间用,分割</code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td width="60"><p class="tuanfabu_t">留言标签</td>
                <td>
                    <div class="tuanfabu_nr">
                    <input type="text" name="tags" id="busihour" class="px" value="<?php echo ($ele[tags]); ?>" />
                    <code>比如：辣多一点,辣少一点,请提供餐具,没零钱,米饭多一点 中间用,分割</code>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" class="radius3 sjgl_an tuan_topbt" value="立刻更新"/></td>
            </tr>
        </table>
        </form>
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