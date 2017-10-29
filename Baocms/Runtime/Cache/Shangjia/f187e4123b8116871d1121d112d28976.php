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
<script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
<div class="sjgl_lead">
    <ul>
        <li><a href="#">商家管理</a> > <a href="">商城</a> > <a>编辑商品</a></li>
    </ul>
</div>

<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">商家发布的商品要在后台审核之后才能显示在前台</div>
        </div>
    </div> 

    <div class="tabnr_change  show">
    	<form method="post"  action="<?php echo U('goods/edit',array('goods_id'=>$detail['goods_id']));?>"  target="baocms_frm">
        <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
        <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="120"><p class="tuanfabu_t">商品名称：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>" class="tuanfabu_int tuanfabu_intw1"/>
                 <code>商品标题，建议不要超过20字</code>
                </div></td>
            </tr>
             <tr>
                    <td width="120"><p class="tuanfabu_t">商品简介：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[intro]" value="<?php echo (($detail["intro"])?($detail["intro"]):''); ?>" class="tuanfabu_int tuanfabu_intw3" style="width: 584px;" /><code>商品简要说明，建议不要超过30字</code>

                        </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">产品规格：</p></td>
                    <td><div class="tuanfabu_nr">
                           <input type="text" name="data[guige]" value="<?php echo (($detail["guige"])?($detail["guige"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                           <code>请填写商品规格，如件、条、捆、份、卷、张、公斤、千克、等</code>
                        </div></td>
                         </tr>
                          <tr>
                    <td width="120"><p class="tuanfabu_t">库存：</p></td>
                    <td><div class="tuanfabu_nr">
                           <input type="text" name="data[num]" value="<?php echo (($detail["num"])?($detail["num"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                           <code>请填写商品库存</code>
                        </div></td>
                         </tr>
           <tr>

                    <td width="120"><p class="tuanfabu_t">分类：</p></td>
                    <td><div class="tuanfabu_nr">
                        <select name="parent_id" id="parent_id" class="seleFl w100"  style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $parent_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <select id="cate_id" name="data[cate_id]" class="seleFl w100" style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): if(($var["cate_id"]) == $parent_id): if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var2["cate_name"]); ?></option>
                                    <?php if(is_array($cates)): foreach($cates as $key=>$var3): if(($var3["parent_id"]) == $var2["cate_id"]): ?><option  value="<?php echo ($var3["cate_id"]); ?>"  <?php if(($var3["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> >&nbsp;&nbsp;-<?php echo ($var3["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; endif; endif; endforeach; endif; ?>
                        </select>
                        <script>
                            $(document).ready(function(e){
                                $("#parent_id").change(function(){
                                    var url = '<?php echo U("goods/child",array("parent_id"=>"0000"));?>';
                                    if($(this).val() > 0){
                                        var url2 = url.replace('0000',$(this).val());
                                        $.get(url2,function(data){
                                            $("#cate_id").html(data);
                                        },'html');
                                    }
                                });

                            });
                        </script>
                        <code>必须选择二级分类</code>
                    </div></td>
                </tr>    
               
            <tr>
                <td width="120"><p class="tuanfabu_t">商家分类：</p></td>
                <td><div class="tuanfabu_nr">
                <select id="shopcate_id" name="data[shopcate_id]" class="seleFl w200" style="width: 140px;">
                <?php if(is_array($autocates)): foreach($autocates as $key=>$var): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $detail["shopcate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endforeach; endif; ?>
                </select>
                </div></td>
            </tr>
            <tr>
                <td><p class="tuanfabu_t">商品图片：</p></td>
                <td><div class="tuanfabu_nr">
                <div style="width: 300px;height: 100px; float: left;">
                    <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                    <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                </div>
                <div style="width: 300px;height: 100px; float: left;">
                    <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                    建议尺寸<?php echo ($CONFIG["attachs"]["goods"]["thumb"]); ?>
                </div>
                <script>
                    $("#photo_file").uploadify({
                        'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                        'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"goods"));?>',
                        'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                        'buttonText': '上传商品图片',
                        'fileTypeExts': '*.gif;*.jpg;*.png',
                        'queueSizeLimit': 1,
                        'onUploadSuccess': function (file, data, response) {
                            $("#data_photo").val(data);
                            $("#photo_img").attr('src', '__ROOT__/attachs/' + data).show();
                        }
                    });
                </script>
                </div>
                </td>
            </tr>

            <tr>
            	<td><p class="tuanfabu_t">更多详情图【最多4张】：</p></td>
                 <td><div class="tuanfabu_nr">
                         <div style="width: 300px;height: 100px; float: left;">
                                <input id="logo_file" name="logo_file" type="file" multiple="true" value="" />
                          </div>
                            <div class="jq_uploads_img">
                                <?php if(is_array($photos)): foreach($photos as $key=>$item): ?><span style="width: 200px; height: 120px; float: left; margin-left: 5px; margin-top: 10px;"> 
                                        <img width="100" height="100" src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>">  
                                        <input type="hidden" name="photos[]" value="<?php echo ($item["photo"]); ?>" />  
                                        <a href="javascript:void(0);">取消</a>  
                                    </span><?php endforeach; endif; ?>
                            </div>
                            <script>
                                $("#logo_file").uploadify({
                                    'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                    'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"goods"));?>',
                                    'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                    'buttonText': '上传图片',
                                    'fileTypeExts': '*.gif;*.jpg;*.png',
                                    'queueSizeLimit': 10,
                                    'onUploadSuccess': function (file, data, response) {
                                        var str = '<span style="width: 200px; height: 120px; float: left; margin-left: 5px; margin-top: 10px;">  <img width="200" height="100" src="__ROOT__/attachs/' + data + '">  <input type="hidden" name="photos[]" value="' + data + '" />    <a href="javascript:void(0);">取消</a>  </span>';
                                        $(".jq_uploads_img").append(str);
                                    }
                                });
                                $(document).on("click", ".jq_uploads_img a", function () {
                                    $(this).parent().remove();
                                });
                            </script>
                          </div>

                </td>

                    </tr>
                    <tr>
                    <td width="120"><p class="tuanfabu_t">属性：</p></td>
                    <td><div class="tuanfabu_nr">
                     <label><span>认证商家：</span><input type="checkbox" name="data[is_vs1]" <?php if($detail['is_vs1'] == 1): ?>checked="checked"<?php endif; ?>  value="1" /></label>
                        <label><span style="margin-left: 20px;">正品保证：</span><input type="checkbox" name="data[is_vs2]" <?php if($detail['is_vs2'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">假一赔十：</span><input type="checkbox" name="data[is_vs3]" <?php if($detail['is_vs3'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">当日送达：</span><input type="checkbox" name="data[is_vs4]" <?php if($detail['is_vs4'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">免运费：</span><input type="checkbox" name="data[is_vs5]" <?php if($detail['is_vs5'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
						<label><span style="margin-left: 20px;">货到付款</span><input type="checkbox" name="data[is_vs6]" <?php if($detail['is_vs6'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                      </div></td>
                </tr>

            <tr>

                <td width="120"><p class="tuanfabu_t">市场价格：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[price]" value="<?php echo (($detail["price"])?($detail["price"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">价格：</p></td>
                <td><div class="tuanfabu_nr">
                <code>商城价 </code>
                <input type="text" name="data[mall_price]" value="<?php echo (($detail["mall_price"])?($detail["mall_price"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                <code>代理商价 </code>
                <input type="text" name="data[is_agent_price]" value="<?php echo (($detail["is_agent_price"])?($detail["is_agent_price"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">可使用积分数：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[use_integral]" value="<?php echo (($detail["use_integral"])?($detail["use_integral"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                <code>100的倍数，100积分抵扣1元，一般不建议设置，如果你商品为1元，那么不得高于100积分，以此类推。</code>
                </div>
                </td>
            </tr>

   <!--分销单独调用开始-->
                 <?php if(!empty($SHOP['is_profit'])): ?><tr>
                    <td width="120"><p class="tuanfabu_t">分成给上级分销商：</p></td>
                    <td><div class="tuanfabu_nr">
                          <input type="checkbox" name="data[profit_enable]" value='1' <?php if($detail['profit_enable'] == 1): ?>checked="checked"<?php endif; ?> />
                        <code> 如需分成这里必须打钩，如此商品无需分成、则不勾选、下面不填写即可</code></div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">一级会员分成比例：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[profit_rate1]" value="<?php echo ($detail['profit_rate1']); ?>" class="tuanfabu_int "  /> %
                        <code> 这里是销售价，所以建议您留足够的利润给代理商分成，比如您产品销售100元，您拿30元分成、那么下面30元怎么样一个比例给1、2、3级分销商</code></div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">二级会员分成比例：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[profit_rate2]" value="<?php echo ($detail['profit_rate2']); ?>" class="tuanfabu_int" /> %
                       <code> 同上</code> </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">三级会员分成比例：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[profit_rate3]" value="<?php echo ($detail['profit_rate3']); ?>" class="tuanfabu_int" /> %
                        <code> 同上</code></div></td>
                </tr><?php endif; ?>
                <!--分销单独调用结束-->

            <tr>
                <td><p class="tuanfabu_t">购买须知：</p></td>
                <td><div class="tuanfabu_nr">
                <script type="text/plain" id="data_instructions" name="data[instructions]" style="width:800px;height:360px;"><?php echo ($detail["instructions"]); ?></script>
                <link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.min.css" type="text/css">
				<script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
                <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
                <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
                <script>
                                um = UM.getEditor('data_instructions', {
                                    imageUrl: "<?php echo U('app/upload/editor');?>",
                                    imagePath: '__ROOT__/attachs/editor/',
                                    lang: 'zh-cn',
                                    langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                                    focus: false
                                });
                </script>
                </div></td>
            </tr>
            <tr>
                <td><p class="tuanfabu_t">商品详情：</p></td>
                <td><div class="tuanfabu_nr">
                <script type="text/plain" id="data_details" name="data[details]" style="width:800px;height:360px;"><?php echo ($detail["details"]); ?></script>
                <script>
					um = UM.getEditor('data_details', {
						imageUrl: "<?php echo U('app/upload/editor');?>",
						imagePath: '__ROOT__/attachs/editor/',
						lang: 'zh-cn',
						langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
						focus: false
					});
				</script>
                </div></td>
            </tr>
            <tr>
                <td width="120"><p class="tuanfabu_t">过期时间：</p></td>
                <td><div class="tuanfabu_nr">
                <input type="text" name="data[end_date]" value="<?php echo (($detail["end_date"])?($detail["end_date"]):''); ?>" onfocus="WdatePicker();" class="tuanfabu_int tuanfabu_intw2" />
                </div></td>
            </tr>
        </table>
        <div class="tuanfabu_an">
        <input type="submit" class="radius3 sjgl_an tuan_topbt" value="确认发布" />
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