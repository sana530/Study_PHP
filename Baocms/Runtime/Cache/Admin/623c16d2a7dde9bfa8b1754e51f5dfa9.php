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
        <li class="li1">当前位置</li>
        <li class="li2">广告位</li>
        <li class="li2 li3">新增</li>
    </ul>
</div>

<p class="attention"><span>注意：</span></a></p>


<div class="mainScAdd">
	<form  target="baocms_frm" action="<?php echo U('adsite/create');?>" method="post">
		<div class="tableBox">
       
            <table class="table table-hover">
                <tr>
                    <td class="lfTdBt">广告位名称：</td>
                    <td  class="rgTdBt"><input type="text" name="data[site_name]" value="<?php echo (($detail["site_name"])?($detail["site_name"]):''); ?>" class="manageInput w300" />
                    </td>
                </tr>
				
                <tr>
                    <td class="lfTdBt">模版选择：</td>
                    <td  class="rgTdBt">
						<select name="data[theme]">
							<?php if(is_array($template)): foreach($template as $key=>$item): ?><option value="<?php echo ($item[theme]); ?>"><?php echo ($item[name]); ?></option><?php endforeach; endif; ?>
						</select>
                    </td>
                </tr>
				
                <tr>
                    <td class="lfTdBt">广告位类型：</td>
                    <td  class="rgTdBt">
                        <select name="data[site_type]" class="manageSelect w300">
                            <?php if(is_array($types)): foreach($types as $key=>$var): ?><option value="<?php echo ($key); ?>"><?php echo ($var); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">广告位位置：</td>
                    <td  class="rgTdBt">
                        <select name="data[site_place]" class="manageSelect w300">
                            <?php if(is_array($place)): foreach($place as $key=>$var): ?><option value="<?php echo ($key); ?>"><?php echo ($var); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
            </table>
		</div>
		<div class="smtQr"><input type="submit" value="确认添加" class="smtQrIpt" /></div>
	</form>
</div>

</div>
</div>



  

     
        
</div>
</body>
</html>