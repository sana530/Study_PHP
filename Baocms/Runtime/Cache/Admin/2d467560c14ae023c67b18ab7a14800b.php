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
        <li class="li1">商城</li>
        <li class="li2">产品管理</li>
        <li class="li2 li3">编辑</li>
    </ul>
</div>
<div class="mainScAdd ">

    <div class="tableBox">
        <form target="baocms_frm" action="<?php echo U('goods/edit',array('goods_id'=>$detail['goods_id']));?>" method="post">
            <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">产品名称：</td>
                    <td class="rgTdBt"><input type="text" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>" class="manageInput manageInput2" />

                    </td>
                </tr> 
                <tr>
                    <td  class="lfTdBt">产品副标题：</td>
                    <td class="rgTdBt"><input type="text" name="data[intro]" value="<?php echo (($detail["intro"])?($detail["intro"]):''); ?>" class="manageInput manageInput2" />

                    </td>
                </tr>
                 <tr>
                    <td  class="lfTdBt">产品规格：</td>
                    <td class="rgTdBt"><input type="text" name="data[guige]" value="<?php echo (($detail["guige"])?($detail["guige"]):''); ?>" class="manageInput" />

                    </td>
                </tr>  
                  <tr>
                    <td  class="lfTdBt">库存：</td>
                    <td class="rgTdBt"><input type="text" name="data[num]" value="<?php echo (($detail["num"])?($detail["num"]):''); ?>" class="manageInput" />

                    </td>
                </tr>   

                <tr>
                    <td class="lfTdBt">商家：</td>
                    <td class="rgTdBt"> <div class="lt">
                            <input type="hidden" id="shop_id" name="data[shop_id]" value="<?php echo (($detail["shop_id"])?($detail["shop_id"]):''); ?>"/>
                            <input type="text" id="shop_name" name="shop_name" value="<?php echo ($shop["shop_name"]); ?>" class="manageInput" />
                        </div>
                        <a mini="select"  w="1000" h="600" href="<?php echo U('shop/select');?>" class="remberBtn">选择商家</a>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">分类：</td>
                    <td class="rgTdBt">

                        <select name="parent_id" id="parent_id" class="seleFl w100"  style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $parent_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?>(<?php echo ($var["rate"]); ?>‰)</option><?php endif; endforeach; endif; ?>
                        </select>
                        <select id="cate_id" name="data[cate_id]" class="seleFl w100" style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): if(($var["cate_id"]) == $parent_id): if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var2["cate_name"]); ?>(<?php echo ($var["rate"]); ?>‰)</option>
                                    <?php if(is_array($cates)): foreach($cates as $key=>$var3): if(($var3["parent_id"]) == $var2["cate_id"]): ?><option  value="<?php echo ($var3["cate_id"]); ?>"  <?php if(($var3["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> >&nbsp;&nbsp;-<?php echo ($var3["cate_name"]); ?>(<?php echo ($var["rate"]); ?>‰)</option><?php endif; endforeach; endif; endif; endforeach; endif; endif; endif; endforeach; endif; ?>
                        </select>
                        <script>
                            $(document).ready(function(e){
                                $("#parent_id").change(function(){
                                    var url = '<?php echo U("goodscate/child",array("parent_id"=>"0000"));?>';
                                    if($(this).val() > 0){
                                        var url2 = url.replace('0000',$(this).val());
                                        $.get(url2,function(data){
                                            $("#cate_id").html(data);
                                        },'html');
                                    }
                                });
                                
                            });
                        </script>
                    </td>
                </tr>    
                  
                 
                <tr>
                    <td class="lfTdBt">
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                缩略图：
                </td>
                <td class="rgTdBt">
                    <div style="width: 300px;height: 100px; float: left;">
                        <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                        <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                    </div>
                    <div style="width: 300px;height: 100px; float: left;">
                        <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                        <a href="<?php echo U('setting/attachs');?>">设置</a>
                        建议尺寸<?php echo ($CONFIG["attachs"]["goods"]["thumb"]); ?>
                    </div>
                    <script>
                        $("#photo_file").uploadify({
                            'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                            'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"goods"));?>',
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
            </tr>
               <tr>

                         <td class="lfTdBt">
                            更多详情图：
                        </td>
                        <td class="rgTdBt">
                            <div>
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

                        </td>

                    </tr>
             <tr>
                    <td  class="lfTdBt">属性：</td>
                    <td class="rgTdBt">                                  
                         <label><span>认证商家：</span><input type="checkbox" name="data[is_vs1]" <?php if($detail['is_vs1'] == 1): ?>checked="checked"<?php endif; ?>  value="1" /></label>
                        <label><span style="margin-left: 20px;">正品保证：</span><input type="checkbox" name="data[is_vs2]" <?php if($detail['is_vs2'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">假一赔十：</span><input type="checkbox" name="data[is_vs3]" <?php if($detail['is_vs3'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">当日送达：</span><input type="checkbox" name="data[is_vs4]" <?php if($detail['is_vs4'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                        <label><span style="margin-left: 20px;">免运费：</span><input type="checkbox" name="data[is_vs5]" <?php if($detail['is_vs5'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
						<label><span style="margin-left: 20px;">货到付款</span><input type="checkbox" name="data[is_vs6]" <?php if($detail['is_vs6'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>
                    </td>
                </tr>        
            <tr>
            <td class="lfTdBt">市场价格：</td>
            <td class="rgTdBt"><input type="text" name="data[price]" value="<?php echo (($detail["price"])?($detail["price"]):''); ?>" class="manageInput" />

            </td>
        </tr>
        <tr>
            <td class="lfTdBt">售价：</td>
            <td class="rgTdBt">
                <code>普通会员购买价格 </code><input type="text" name="data[mall_price]" value="<?php echo (($detail["mall_price"])?($detail["mall_price"]):''); ?>" class="manageInput manageInput4" />
                <code>代理商购买价格【前台代理商实际购买价格，请高于结算价】 </code><input type="text" name="data[is_agent_price]" value="<?php echo (($detail["is_agent_price"])?($detail["is_agent_price"]):''); ?>" class="manageInput manageInput4" />
            </td>
        </tr>
        <?php $config = D('Setting')->fetchAll(); ?>
        <tr>
            <td class="lfTdBt">额外显示价格：</td>
            <td class="rgTdBt">
            <?php if(!empty($config['goods']['cost_price'])): ?><code>成本价 </code><input type="text" name="data[cost_price]" value="<?php echo ($detail["cost_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?>
            <?php if(!empty($config['goods']['factory_price'])): ?><code>出厂价 </code><input type="text" name="data[factory_price]" value="<?php echo ($detail["factory_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?>
            <?php if(!empty($config['goods']['wholesale_price'])): ?><code>批发价 </code><input type="text" name="data[wholesale_price]" value="<?php echo ($detail["wholesale_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?>
            <?php if(!empty($config['goods']['agent_price'])): ?><code>代理价 </code><input type="text" name="data[agent_price]" value="<?php echo ($detail["agent_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?>
            <?php if(!empty($config['goods']['market_price'])): ?><code>市场价 </code><input type="text" name="data[market_price]" value="<?php echo ($detail["market_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?>  
            <?php if(!empty($config['goods']['retail_price'])): ?><code>零售价 </code><input type="text" name="data[retail_price]" value="<?php echo ($detail["retail_price"]); ?>" class="manageInput manageInput4" /><?php endif; ?> 
            <?php if(!empty($config['goods']['gross_margin'])): ?><code>毛利率 </code><input type="text" name="data[gross_margin]" value="<?php echo ($detail["gross_margin"]); ?>" class="manageInput manageInput5" /> %<?php endif; ?>  
            <?php if(!empty($config['goods']['profit_margin'])): ?><code>利润率 </code><input type="text" name="data[profit_margin]" value="<?php echo ($detail["profit_margin"]); ?>" class="manageInput manageInput5" /> %<?php endif; ?>
            </td>
        </tr>
        
        
        <tr>
            <td class="lfTdBt">手机下单优惠价格：</td>
             <td class="rgTdBt"><input type="text" name="data[mobile_fan]" value="<?php echo (($detail["mobile_fan"])?($detail["mobile_fan"]):''); ?>" class="manageInput" />
             <code>建议填写1元以下，默认不要写，除非做活动时候</code>
            </td>
        </tr>
        
        
          <tr>
            <td class="lfTdBt">可使用积分数：</td>
             <td class="rgTdBt"><input type="text" name="data[use_integral]" value="<?php echo (($detail["use_integral"])?($detail["use_integral"]):''); ?>" class="manageInput" />
                 <code>最大可使用的积分数，100积分抵扣1元，不填表示不可使用积分</code>  
            </td>
        </tr>
        
        <tr>
            <td class="lfTdBt">结算价格：</td>
            <td class="rgTdBt"><input type="text" name="data[settlement_price]" value="<?php echo (($detail["settlement_price"])?($detail["settlement_price"]):''); ?>" class="manageInput" />
			<code>结算价格必须填写，否则该产品不能设置通过审核。</code>
            </td>
        </tr>
        <tr>
            <td class="lfTdBt">卖出数量：</td>
            <td class="rgTdBt"><input type="text" name="data[sold_num]" value="<?php echo (($detail["sold_num"])?($detail["sold_num"]):''); ?>" class="manageInput" />

            </td>
        </tr><tr>
            <td class="lfTdBt">浏览量：</td>
            <td class="rgTdBt"><input type="text" name="data[views]" value="<?php echo (($detail["views"])?($detail["views"]):''); ?>" class="manageInput" />

            </td>
        </tr><tr>
            <td class="lfTdBt">购买须知：</td>
            <td class="rgTdBt">
                <script type="text/plain" id="data_instructions" name="data[instructions]" style="width:800px;height:360px;"><?php echo ($detail["instructions"]); ?></script>
            </td>
        </tr>
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
        <tr>
            <td class="lfTdBt">商品详情：</td>
            <td class="rgTdBt">
                <script type="text/plain" id="data_details" name="data[details]" style="width:800px;height:360px;"><?php echo ($detail["details"]); ?></script>
            </td>
        </tr>
        <script>
            um = UM.getEditor('data_details', {
                imageUrl: "<?php echo U('app/upload/editor');?>",
                imagePath: '__ROOT__/attachs/editor/',
                lang: 'zh-cn',
                langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                focus: false
            });
        </script>
        <tr>
            <td class="lfTdBt">过期时间：</td>
            <td class="rgTdBt"><input type="text" name="data[end_date]" value="<?php echo (($detail["end_date"])?($detail["end_date"]):''); ?>" onfocus="WdatePicker();"  class="inputData" />

            </td>
        </tr>
        <tr>
            <td class="lfTdBt">排序：</td>
            <td class="rgTdBt"><input type="text" name="data[orderby]" value="<?php echo (($detail["orderby"])?($detail["orderby"]):''); ?>" class="manageInput" />

            </td>
        </tr>
        <tr>
            <td class="lfTdBt">是否分成给上级分销商：</td>
            <td class="rgTdBt"><input type="checkbox" name="data[profit_enable]" value='1' <?php if($detail['profit_enable'] == 1): ?>checked="checked"<?php endif; ?> /></td>
        </tr>
        <tr>
            <td class="lfTdBt">购买付款后等级升为：</td>
            <td class="rgTdBt">
                <select name="data[profit_rank_id]" class="seleFl w200">
                    <option value="0">不设置</option>
                    <?php if(is_array($ranks)): foreach($ranks as $key=>$item): ?><option <?php if(($item["rank_id"]) == $detail["profit_rank_id"]): ?>selected="selected"<?php endif; ?> value="<?php echo ($item["rank_id"]); ?>"><?php echo ($item["rank_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lfTdBt">一级会员分成比例：</td>
            <td class="rgTdBt"><input type="number" min="0" max="100" name="data[profit_rate1]" value='<?php echo ($detail["profit_rate1"]); ?>' class="manageInput " />%</td>
        </tr>
        <tr>
            <td class="lfTdBt">二级会员分成比例：</td>
            <td class="rgTdBt"><input type="number" min="0" max="100" name="data[profit_rate2]" value='<?php echo ($detail["profit_rate2"]); ?>' class="manageInput " />%</td>
        </tr>
        <tr>
            <td class="lfTdBt">三级会员分成比例：</td>
            <td class="rgTdBt"><input type="number" min="0" max="100" name="data[profit_rate3]" value='<?php echo ($detail["profit_rate3"]); ?>' class="manageInput " />%</td>
        </tr>
    </table>

    <div style="margin-left:140px;margin-top:20px">
        <input type="submit" value="确认编辑"  class="smtQrIpt"  />
        <div>
            </form>
        </div>
    </div>
    
     
        
</div>
</body>
</html>