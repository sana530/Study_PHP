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
        <li class="li1">预订</li>
        <li class="li2">预订管理</li>
        <li class="li2 li3">编辑预订商家</li>
    </ul>
</div>
<form  target="baocms_frm" action="<?php echo U('booking/edit',array('shop_id'=>$detail['shop_id']));?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">选择商家：</td>
                    <td class="rgTdBt">
                        <div class="lt">
                            <input type="hidden" id="shop_id" name="data[shop_id]" value="<?php echo (($detail["shop_id"])?($detail["shop_id"]):''); ?>"/>
                            <input type="text" id="shop_name" name="data[shop_name]" value="<?php echo (($detail["shop_name"])?($detail["shop_name"]):''); ?>" class="manageInput" />
                        </div>
                        <a mini="select"  w="1000" h="600" href="<?php echo U('shop/select');?>" class="remberBtn">选择商家</a>
                    </td>
                </tr>    
                <tr>
                    <td class="lfTdBt">商家地址：</td>
                    <td class="rgTdBt"><input id="addr" type="text" name="data[addr]" value="<?php echo (($detail["addr"])?($detail["addr"]):''); ?>" class="manageInput" /></td>

                    </td>
                </tr><tr>
                    <td class="lfTdBt">平均消费：</td>
                    <td class="rgTdBt"><input type="text" name="data[price]" value="<?php echo (($detail["price"])?($detail["price"]):''); ?>" class="scAddTextName w210" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">预订定金：</td>
                    <td class="rgTdBt"><input type="text" name="data[deposit]" value="<?php echo (($detail["deposit"])?($detail["deposit"]):''); ?>" class="scAddTextName w210" />
                        
                    </td>
                </tr><tr>
                    <td class="lfTdBt">商家手机号：</td>
                    <td class="rgTdBt"><input type="text" name="data[mobile]" value="<?php echo (($detail["mobile"])?($detail["mobile"]):''); ?>" class="scAddTextName w210" />

                    </td>
                </tr><tr>
                    <td class="lfTdBt">商家电话：</td>
                    <td class="rgTdBt"><input type="text" name="data[tel]" value="<?php echo (($detail["tel"])?($detail["tel"]):''); ?>" class="scAddTextName w210" />

                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                图片：
                </td>
                <td class="rgTdBt">
                    <div style="width: 300px;height: 100px; float: left;">
                        <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_logo" />
                        <input id="logo_file" name="logo_file" type="file" multiple="true" value="" />
                    </div>
                    <div style="width: 300px;height: 100px; float: left;">
                        <img id="logo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                        <a href="<?php echo U('setting/attachs');?>">设置</a>
                        建议尺寸:<?php echo ($CONFIG["attachs"]["hotel"]["thumb"]); ?>
                    </div>
                    <script>
                        $("#logo_file").uploadify({
                            'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                            'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"hotel"));?>',
                            'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                            'buttonText': '上传酒店图片',
                            'fileTypeExts': '*.gif;*.jpg;*.png',
                            'queueSizeLimit': 1,
                            'onUploadSuccess': function (file, data, response) {
                                $("#data_logo").val(data);
                                $("#logo_img").attr('src', '__ROOT__/attachs/' + data).show();
                            }
                        });

                    </script>
                </td>
            </tr>
            
            <tr>
                    <td  class="lfTdBt">组图：</td>
                    <td class="rgTdBt">
                        <div>
                            <input id="thumb_file" name="logo_file" type="file" multiple="true" value="" />
                        </div>
                        <div class="jq_uploads_img">
                            <?php if(is_array($thumb)): foreach($thumb as $key=>$item): ?><span style="width: 200px; height: 120px; float: left; margin-left: 5px; margin-top: 10px;"> 
                                    <img width="160" height="120" src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>">  
                                    <input type="hidden" name="thumb[]" value="<?php echo ($item["photo"]); ?>" />  
                                    <a href="javascript:void(0);">取消</a>  
                                </span><?php endforeach; endif; ?>
                        </div>
                        <script>
                            $("#thumb_file").uploadify({
                                'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"hotel"));?>',
                                'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                'buttonText': '上传图片',
                                'fileTypeExts': '*.gif;*.jpg;*.png',
                                'queueSizeLimit': 5,
                                'onUploadSuccess': function (file, data, response) {
                                    var str = '<span style="width: 160px; height: 120px; float: left; margin-left: 5px; margin-top: 10px;">  <img width="160" height="120" src="__ROOT__/attachs/' + data + '">  <input type="hidden" name="thumb[]" value="' + data + '" />    <a href="javascript:void(0);">取消</a>  </span>';
                                    $(".jq_uploads_img").append(str);
                                }
                            });

                            $(document).on("click", ".jq_uploads_img a", function () {
                                $(this).parent().remove();
                            });

                        </script>
                    </td>
                </tr>
 
        <tr>
            <td class="lfTdBt">就餐类型：</td>
            <td class="rgTdBt">
                <?php if(is_array($dingtypes)): $i = 0; $__LIST__ = $dingtypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><label><span><?php echo ($item); ?>：</span><input style="width: 20px; height: 20px;" type="checkbox" name="type[]" value="<?php echo ($i); ?>" <?php if($have_type[$i] == $i): ?>checked="checked"<?php endif; ?> /></label><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </td>
        </tr>
        <tr style="display: none">
            <td class="lfTdBt">商家坐标：</td>
            <td class="rgTdBt">
                <div class="lt">
                    经度<input type="text" name="data[lng]" id="data_lng" value="<?php echo (($detail["lng"])?($detail["lng"]):''); ?>" class="scAddTextName w200" />
                    纬度 <input type="text" name="data[lat]" id="data_lat" value="<?php echo (($detail["lat"])?($detail["lat"]):''); ?>" class="scAddTextName w200" />
                </div>
        </tr>
                <script>
                    function initAutocomplete() {
                        autocomplete = new google.maps.places.Autocomplete((document.getElementById('addr')),{types: ['geocode']});
                        autocomplete.addListener('place_changed', fillInAddress);
                    }
                    function fillInAddress() {
                        var place = autocomplete.getPlace();
                        var geocoder = new google.maps.Geocoder();  //定義一個Geocoder物件
                        geocoder.geocode(
                            { address: place.formatted_address },    //設定地址的字串
                            function(results, status) {    //callback function
                                if (status == google.maps.GeocoderStatus.OK) {    //判斷狀態
                                    document.getElementById("data_lng").value = results[0].geometry.location.lng();
                                    document.getElementById("data_lat").value = results[0].geometry.location.lat();
                                }
                            }
                        );
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&libraries=places&callback=initAutocomplete" async defer></script>


     <tr>
            <td class="lfTdBt">详情：</td>
            <td class="rgTdBt">
                <script type="text/plain" id="data_details" name="data[details]" style="width:800px;height:360px;"><?php echo ($detail["details"]); ?></script>
            </td>
        </tr>
        <link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.min.css" type="text/css">
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
        <script>
                    um = UM.getEditor('data_details', {
                        imageUrl: "<?php echo U('app/upload/editor');?>",
                        imagePath: '__ROOT__/attachs/editor/',
                        lang: 'zh-cn',
                        langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                        focus: false
                    });
        </script>
     
     
    </table>
</div>
<div class="smtQr"><input type="submit" value="确认编辑" class="smtQrIpt" /></div>
</div>
</form>

     
        
</div>
</body>
</html>