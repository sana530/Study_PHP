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
        <li class="li1">餐饮频道</li>
        <li class="li2">菜单管理</li>
        <li class="li2 li3">编辑</li>
    </ul>
</div>
<div class="mainScAdd ">
    <div class="tableBox">
        <form target="baocms_frm" action="<?php echo U('eleproduct/edit',array('product_id'=>$detail['product_id']));?>" method="post">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">菜名：</td>
                    <td class="rgTdBt"><input type="text" name="data[product_name]" value="<?php echo (($detail["product_name"])?($detail["product_name"]):''); ?>" class="manageInput" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">商家：</td>
                    <td class="rgTdBt"><input type="text" name="data[shop_id]" value="<?php echo (($detail["shop_id"])?($detail["shop_id"]):''); ?>" class="manageInput" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">分类：</td>
                    <td class="rgTdBt"><input type="text" name="data[cate_id]" value="<?php echo (($detail["cate_id"])?($detail["cate_id"]):''); ?>" class="manageInput" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">

                        <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js?t=<?php echo ($nowtime); ?>"></script>
                        <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                        缩略图：
                    </td>
                    <td>
                        <div style="width: 300px;height: 100px; float: left;">
                            <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                            <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                        </div>
                        <div style="width: 300px;height: 100px; float: left;">
                            <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                            <a href="<?php echo U('setting/attachs');?>">设置</a>
                            建议尺寸<?php echo ($CONFIG["attachs"]["eleproduct"]["thumb"]); ?>
                        </div>
                        <script>
                            $("#photo_file").uploadify({
                                'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"eleproduct"));?>',
                                'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                'buttonText': '上传缩略图',
                                'fileTypeExts': '*.gif;*.jpg;*.png',
                                'queueSizeLimit': 1,
                                'onUploadSuccess': function (file, data, response) {
                                    $("#data_photo").val(data);
                                    $("#photo_img").attr('src', '__ROOT__/attachs/' + data).show();
                                }
                            });

                        </script>
                    </td>
                </tr><tr>
                    <td class="lfTdBt">价格：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[price]" value="<?php echo round($detail['price']/100,2);?>" class="manageInput" />

                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">结算价格：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[settlement_price]" value="<?php echo round($detail['settlement_price']/100,2);?>" class="manageInput" />
<code>默认由商家添加菜品的时候自动生成！</code>
                    </td>
                </tr>
   
                <tr>
                    <td class="lfTdBt">是否新品：</td>
                    <td class="rgTdBt">
                        <label> <input type="radio" name="data[is_new]" value="1" <?php if(($detail["is_new"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                        <label> <input type="radio" name="data[is_new]" value="0"  <?php if(($detail["is_new"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">是否热门：</td>
                    <td class="rgTdBt">
                        <label> <input type="radio" name="data[is_hot]" value="1" <?php if(($detail["is_hot"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                        <label> <input type="radio" name="data[is_hot]" value="0"  <?php if(($detail["is_hot"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">是否推荐：</td>
                    <td class="rgTdBt">
                        <label> <input type="radio" name="data[is_tuijian]" value="1" <?php if(($detail["is_tuijian"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                        <label> <input type="radio" name="data[is_tuijian]" value="0"  <?php if(($detail["is_tuijian"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                    </td>
                </tr>

                <tr>
                    <td class="lfTdBt">卖出数：</td>
                    <td class="rgTdBt"><input type="text" name="data[sold_num]" value="<?php echo (($detail["sold_num"])?($detail["sold_num"]):''); ?>" class="manageInput" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">月卖出数：</td>
                    <td class="rgTdBt"><input type="text" name="data[month_num]" value="<?php echo (($detail["month_num"])?($detail["month_num"]):''); ?>" class="manageInput" />

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