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
<script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js?t=<?php echo ($nowtime); ?>"></script>
<link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
<div class="sjgl_lead">
    <ul>
        <li><a href="#">其他</a> > <a href="">餐饮设置</a> > <a>菜品管理</a></li>
    </ul>
</div>
<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">商家添加菜品</div>
        </div>
    </div> 
    <div class="tabnr_change show">
    	<form target="baocms_frm" action="<?php echo U('eleproduct/edit',array('product_id'=>$detail['product_id']));?>" method="post">
    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="120"><p class="tuanfabu_t">菜名：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[product_name]" value="<?php echo (($detail["product_name"])?($detail["product_name"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                </div></td>
            </tr>
                       <tr>
                <td width="120"><p class="tuanfabu_t">介绍：</p></td>
                <td><div class="tuanfabu_nr">
                <textarea name="data[desc]" cols="60" rows="6"><?php echo (($detail["desc"])?($detail["desc"]):''); ?></textarea>
              
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">分类：</p></td>
                <td><div class="tuanfabu_nr">
                <select id="cate_id" name="data[cate_id]" class="manageSelect w200" style="width: 140px;">
                    <?php if(is_array($elecates)): foreach($elecates as $key=>$var): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">缩略图：</p></td>
                <td><div class="tuanfabu_nr">
                <div style="width: 300px;height: 100px; float: left;">
                    <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                    <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                </div>
                <div style="width: 300px;height: 100px; float: left;">
                    <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
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
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">价格：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[price]" value="<?php echo round($detail['price']/100,2);?>" class="tuanfabu_int tuanfabu_intw2" />
                </div></td>
            </tr>
            
            <tr>
                <td width="120"><p class="tuanfabu_t">是否新品：</p></td>
                <td><div class="tuanfabu_nr">
                <label><input style="width: 40px;"  type="radio" name="data[is_new]" value="1" <?php if(($detail["is_new"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                <label><input style="width: 40px;"  type="radio" name="data[is_new]" value="0"  <?php if(($detail["is_new"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">是否热门：</p></td>
                <td><div class="tuanfabu_nr">
                <label><input style="width: 40px;"  type="radio" name="data[is_hot]" value="1" <?php if(($detail["is_hot"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                <label><input style="width: 40px;"  type="radio" name="data[is_hot]" value="0"  <?php if(($detail["is_hot"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">是否推荐：</p></td>
                <td><div class="tuanfabu_nr">
                <label><input style="width: 40px;"  type="radio" name="data[is_tuijian]" value="1" <?php if(($detail["is_tuijian"]) == "1"): ?>checked="checked"<?php endif; ?>  />是 </label>
                <label><input style="width: 40px;"  type="radio" name="data[is_tuijian]" value="0"  <?php if(($detail["is_tuijian"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                </div></td>
            </tr>
        </table>
        <div class="tuanfabu_an">
        <input type="submit" class="radius3 sjgl_an tuan_topbt" value="确认" />
        </div>
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