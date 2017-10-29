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
        <li class="li2 li3">声望设置</li>
    </ul>
</div>
<p class="attention"><span>注意：</span>威望（声望）和升级有关系！当然用户等级再未来会有其他的作用！ 声望暂时只有这些，如果会二次开发的可以将这些应用到更多地方</p>
<form  target="baocms_frm" action="<?php echo U('setting/prestige');?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >

                <tr>
                    <td class="lfTdBt">每日登录：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[login]" value="<?php echo ($CONFIG["prestige"]["login"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">点评商家：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[dianping]" value="<?php echo ($CONFIG["prestige"]["dianping"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">发表分享：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[share]" value="<?php echo ($CONFIG["prestige"]["share"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">回复帖子：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[reply]" value="<?php echo ($CONFIG["prestige"]["reply"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">抢购：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[tuan]" value="<?php echo ($CONFIG["prestige"]["tuan"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">绑定手机：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[mobile]" value="<?php echo ($CONFIG["prestige"]["mobile"]); ?>" class="scAddTextName w150" />
                    </td>
                </tr>  
                <tr>
                    <td class="lfTdBt">邮件认证：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[email]" value="<?php echo ($CONFIG["prestige"]["email"]); ?>" class="scAddTextName w150" />
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