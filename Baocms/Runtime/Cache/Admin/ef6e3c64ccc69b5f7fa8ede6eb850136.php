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
        <li class="li1">商家</li>
        <li class="li2">商家管理</li>
        <li class="li2 li3">编辑商家</li>
    </ul>
</div>
<p class="attention"><span>说明：</span> 请注意显示商家万能代码的时候建议多审核下</p>
<form  target="baocms_frm" action="<?php echo U('shop/edit',array('shop_id'=>$detail['shop_id']));?>" method="post">

    <div class="mainScAdd">

        <div class="tableBox">

            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >

                <tr>

                    <td class="lfTdBt">管理者：</td>

                    <td class="rgTdBt">

                        <div class="lt">

                            <input type="hidden" id="user_id" name="data[user_id]" value="<?php echo (($detail["user_id"])?($detail["user_id"]):''); ?>" />

                            <input class="scAddTextName w210 sj" type="text" name="nickname" id="nickname"  value="<?php echo ($user["nickname"]); ?>" />

                        </div>

                        <a mini="select"  w="800" h="600" href="<?php echo U('user/select');?>" class="seleSj">选择用户</a>

                    </td>

                </tr>    
                
                <tr>



                    <td class="lfTdBt">分类：</td>
                    <td class="rgTdBt">
                        <select id="cate_id" name="data[cate_id]" class="seleFl w210">
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option>                

                                <?php if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($var2["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; ?>

                        </select>




                    </td>



                </tr>    


                <tr>
                    <td class="lfTdBt">商家等级：</td>
                    <td class="rgTdBt">
                       <select id="grade_id" name="data[grade_id]" class="seleFl w210">
                       <option value="0">请选择...</option>
                        <?php if(is_array($grades)): foreach($grades as $key=>$var): ?><option value="<?php echo ($var["grade_id"]); ?>"  <?php if(($var["grade_id"]) == $detail["grade_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["grade_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        <code>商家等级必须选择</code>
                    </td>
                </tr>    


                   <tr>

                    <td class="lfTdBt">所在区域：</td>

                    <td class="rgTdBt">

                        

                        <select name="data[city_id]" id="city_id" style="float: left;" class="seleFl w210"></select>

                        <select name="data[area_id]" id="area_id" style="float: left;"  class="seleFl w210"></select>

						<select name="data[business_id]" id="business_id" style="float: left;"  class="seleFl w210"></select>

                    </td>

                </tr>

               

                 <script src="<?php echo U('app/datas/cab',array('name'=>'cityareas'));?>"></script> 

                       <script>

								var city_id = <?php echo (int)$detail['city_id'];?>;

								var area_id = <?php echo (int)$detail['area_id'];?>;

								var business_id = <?php echo (int)$detail['business_id'];?>;

                                $(document).ready(function () {

                                    var city_str = ' <option value="0">请选择...</option>';

                                    for (a in cityareas.city) {

                                        if (city_id == cityareas.city[a].city_id) {

                                            city_str += '<option selected="selected" value="' + cityareas.city[a].city_id + '">' + cityareas.city[a].name + '</option>';

                                        } else {

                                            city_str += '<option value="' + cityareas.city[a].city_id + '">' + cityareas.city[a].name + '</option>';

                                        }

                                    }

                                    $("#city_id").html(city_str);



                                    $("#city_id").change(function () {

                                        if ($("#city_id").val() > 0) {

                                            city_id = $("#city_id").val();

                                            var area_str = ' <option value="0">请选择...</option>';

                                            for (a in cityareas.area) {

                                                if (cityareas.area[a].city_id == city_id) {

                                                    if (area_id == cityareas.area[a].area_id) {

                                                        area_str += '<option selected="selected" value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';

                                                    } else {

                                                        area_str += '<option value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';

                                                    }

                                                }

                                            }

                                            $("#area_id").html(area_str);

                                            $("#business_id").html('<option value="0">请选择...</option>');

                                        } else {

                                            $("#area_id").html('<option value="0">请选择...</option>');

                                            $("#business_id").html('<option value="0">请选择...</option>');

                                        }



                                    });



                                    if (city_id > 0) {

                                        var area_str = ' <option value="0">请选择...</option>';

                                        for (a in cityareas.area) {

                                            if (cityareas.area[a].city_id == city_id) {

                                                if (area_id == cityareas.area[a].area_id) {

                                                    area_str += '<option selected="selected" value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';

                                                } else {

                                                    area_str += '<option value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';

                                                }

                                            }

                                        }

                                        $("#area_id").html(area_str);

                                    }





                                    $("#area_id").change(function () {

                                        if ($("#area_id").val() > 0) {

                                            area_id = $("#area_id").val();

                                            var business_str = ' <option value="0">请选择...</option>';

                                            for (a in cityareas.business) {

                                                if (cityareas.business[a].area_id == area_id) {

                                                    if (business_id == cityareas.business[a].business_id) {

                                                        business_str += '<option selected="selected" value="' + cityareas.business[a].business_id + '">' + cityareas.business[a].business_name + '</option>';

                                                    } else {

                                                        business_str += '<option value="' + cityareas.business[a].business_id + '">' + cityareas.business[a].business_name + '</option>';

                                                    }

                                                }

                                            }

                                            $("#business_id").html(business_str);

                                        } else {

                                            $("#business_id").html('<option value="0">请选择...</option>');

                                        }



                                    });



                                    if (area_id > 0) {

                                        var business_str = ' <option value="0">请选择...</option>';

                                        for (a in cityareas.business) {

                                            if (cityareas.business[a].area_id == area_id) {

                                                if (business_id == cityareas.business[a].business_id) {

                                                    business_str += '<option selected="selected" value="' + cityareas.business[a].business_id + '">' + cityareas.business[a].business_name + '</option>';

                                                } else {

                                                    business_str += '<option value="' + cityareas.business[a].business_id + '">' + cityareas.business[a].business_name + '</option>';

                                                }

                                            }

                                        }

                                        $("#business_id").html(business_str);

                                    }

                                    $("#business_id").change(function () {

                                        business_id = $(this).val();

                                    });

                                });

                </script> 



             <tr>



                    <td class="lfTdBt">商铺名称：</td>



                    <td class="rgTdBt"><input type="text" name="data[shop_name]" value="<?php echo (($detail["shop_name"])?($detail["shop_name"]):''); ?>" class="scAddTextName w210" />







                    </td>



                </tr>

                

              <tr>



                    <td class="lfTdBt">



                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>



                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">



                商铺LOGO：



                </td>



                <td class="rgTdBt">



                    <div style="width: 300px;height: 100px; float: left;">



                        <input type="hidden" name="data[logo]" value="<?php echo ($detail["logo"]); ?>" id="data_logo" />



                        <input id="logo_file" name="logo_file" type="file" multiple="true" value="" />



                    </div>



                    <div style="width: 300px;height: 100px; float: left;">



                        <img id="logo_img" width="80" height="80"  src="<?php echo config_img($detail['logo']);?>" />



                        <a href="<?php echo U('setting/attachs');?>">设置</a>



                        建议尺寸:<?php echo ($CONFIG["attachs"]["shoplogo"]["thumb"]); ?>



                    </div>



                    <script>



                        $("#logo_file").uploadify({



                            'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',



                            'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"shoplogo"));?>',



                            'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',



                            'buttonText': '上传商铺LOGO',



                            'fileTypeExts': '*.gif;*.jpg;*.png',



                            'queueSizeLimit': 1,



                            'onUploadSuccess': function (file, data, response) {



                                $("#data_logo").val(data);



                                $("#logo_img").attr('src', '__ROOT__/attachs/' + data).show();



                            }



                        });







                    </script>



                </td>



            </tr><tr>



            <td class="lfTdBt">



                店铺缩略图：



            </td>



            <td class="rgTdBt">



                <div style="width: 300px; height: 100px; float: left;">



                    <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />



                    <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />



                </div>



                <div style="width: 300px; height: 100px; float: left;">



                    <img id="photo_img" width="80" height="80"  src="<?php echo config_img($detail['photo']);?>" />



                    <a href="<?php echo U('setting/attachs');?>">设置</a>建议尺寸:<?php echo ($CONFIG["attachs"]["shopphoto"]["thumb"]); ?>



                </div>



                <script>



                    $("#photo_file").uploadify({



                        'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',



                        'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"shopphoto"));?>',



                        'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',



                        'buttonText': '上传店铺缩略图',



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



            <td class="lfTdBt">店铺地址：</td>



            <td class="rgTdBt">



                <input type="text" name="data[addr]" value="<?php echo (($detail["addr"])?($detail["addr"]):''); ?>" class="scAddTextName w210" />



            </td>



        </tr><tr>



            <td class="lfTdBt">店铺电话：</td>



            <td class="rgTdBt"><input type="text" name="data[tel]" value="<?php echo (($detail["tel"])?($detail["tel"]):''); ?>" class="scAddTextName w210" />







            </td>



        </tr>



        <tr>



            <td class="lfTdBt">联系人：</td>



            <td class="rgTdBt">



                <input type="text" name="data[contact]" value="<?php echo (($detail["contact"])?($detail["contact"]):''); ?>" class="scAddTextName w210" />



            </td>



        </tr>



        <tr>



            <td class="lfTdBt">手机号码：</td>



            <td class="rgTdBt">



                <input type="text" name="data[mobile]" value="<?php echo (($detail["mobile"])?($detail["mobile"]):''); ?>" class="scAddTextName w210" />



            </td>



        </tr>

        <tr>



            <td class="lfTdBt">标签：</td>

            <td class="rgTdBt"><input type="text" name="data[tags]" value="<?php echo (($detail["tags"])?($detail["tags"]):''); ?>" class="scAddTextName w210" />

                <code>每个标签用“，”分隔</code>

            </td>

        </tr>

        <tr>



            <td class="lfTdBt">属性：</td>

            <td class="rgTdBt">

                <label><span style="margin-left: 20px;">自主配送：</span><input type="checkbox" name="data[is_pei]" <?php if($detail['is_pei'] == 1): ?>checked="checked"<?php endif; ?> value="1" /></label>

                <code>不勾选则是配送员配送</code>

            </td>

        </tr>



        <tr>

            <td class="lfTdBt">等待配送时间：</td>

            <td class="rgTdBt">

                <label><input type="text" class="scAddTextName w210"  name="data[delivery_time]" value="<?php echo (($ex["delivery_time"])?($ex["delivery_time"]):'30'); ?>" />分钟</label>

                <code>自主配送则不用填</code>

            </td>

        </tr>



        <tr style="display: none">

            <td class="lfTdBt">店铺附近坐标：</td>

            <td class="rgTdBt"><input type="text" name="data[near]" value="<?php echo (($ex["near"])?($ex["near"]):''); ?>" class="scAddTextName w210" />

            </td>

        </tr><tr>

            <td class="lfTdBt">营业时间：</td>

            <td class="rgTdBt"><input type="text" name="data[business_time]" value="<?php echo (($ex["business_time"])?($ex["business_time"]):''); ?>" class="scAddTextName w210" />

                <code>例如8:00-19：00</code>

            </td>



        </tr><tr>

            <td class="lfTdBt">固定排名：</td>

            <td class="rgTdBt"><input type="text" name="data[orderby]" value="<?php echo (($detail["orderby"])?($detail["orderby"]):'100'); ?>" class="scAddTextName w210" />

                <code>1就是固定排名在第一位，一般建议不需要设置这个值！</code>

            </td>

        </tr>



        <tr>

            <td class="lfTdBt">人均消费：</td>

            <td class="rgTdBt"><input type="text" name="data[price]" value="<?php echo (($ex["price"])?($ex["price"]):'0'); ?>" class="scAddTextName w210" />

            </td>

        </tr>

        <tr>



            <td class="lfTdBt">订座：</td>

            <td class="rgTdBt">&nbsp;&nbsp;&nbsp;<input type="radio" name="data[is_ding]" value="1" <?php if($detail["is_ding"] == 1): ?>checked="checked"<?php endif; ?>  />是 &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="data[is_ding]" value="0"  <?php if($detail["is_ding"] == 0): ?>checked="checked"<?php endif; ?>/>否&nbsp;&nbsp;&nbsp;

            </td>



        </tr>



        <tr>



            <td class="lfTdBt">商家坐标：</td>

            <td class="rgTdBt">

                <div class="lt">

                    经度<input type="text" name="data[lng]" id="data_lng" value="<?php echo (($detail["lng"])?($detail["lng"]):''); ?>" class="scAddTextName w210 w100" />

                    纬度 <input type="text" name="data[lat]" id="data_lat" value="<?php echo (($detail["lat"])?($detail["lat"]):''); ?>" class="scAddTextName w210 w100" />

                </div>

                <a style="margin-left: 10px;" mini="select"  w="600" h="600" href="<?php echo U('public/maps',array('lat'=>$detail['lat'],'lng'=>$detail['lng']));?>" class="seleSj">google地图</a>



        </tr>



			



          <tr>

                    <td class="lfTdBt">是否认领</td>

                    <td class="rgTdBt">

                 <input type="radio" name="data[recognition]" value="0" <?php if($detail[recognition] == 0): ?>checked="checked"<?php endif; ?> />未认领

				<input type="radio" name="data[recognition]" value="1" <?php if($detail[recognition] == 1): ?>checked="checked"<?php endif; ?> />已认领



                <code>特别说明，前台申请默认是已认领状态！如果是后台添加则是未认领状态，请注意区别</code>

                    </td>

        </tr>





       

        



        <tr>

            <td class="lfTdBt">打印标识(apiKey)</td>

            <td class="rgTdBt"><input type="text" name="data[apiKey]" value="<?php echo ($detail["apiKey"]); ?>" class="scAddTextName w210" />

            <code>打印标识</code>

            </td>

        </tr>



		<tr>

            <td class="lfTdBt">密钥(mKey)</td>

            <td class="rgTdBt"><input type="text" name="data[mKey]" value="<?php echo ($detail["mKey"]); ?>" class="scAddTextName w210" />

            <code>密钥</code>

            </td>



        </tr>



		<tr>

            <td class="lfTdBt">用户id(partner)</td>

            <td class="rgTdBt"><input type="text" name="data[partner]" value="<?php echo ($detail["partner"]); ?>" class="scAddTextName w210" />

            <code>你再打印平台注册的ID</code>

            </td>

        </tr>



		<tr>

            <td class="lfTdBt">打印机终端号(machine_code)</td>

            <td class="rgTdBt"><input type="text" name="data[machine_code]" value="<?php echo ($detail["machine_code"]); ?>" class="scAddTextName w210" />

             <code>打印机终端号，一般购买打印机后打印机后面都有此号码。</code>

            </td>

        </tr>

        

        

 

        

        <tr>

                <td  class="lfTdBt">客服代码：</td>

                <td class="rgTdBt"><textarea  name="data[service]" cols="120" rows="15" ><?php echo (($detail["service"])?($detail["service"]):''); ?></textarea>



                </td>

            </tr>

            
			<tr>
                <td  class="lfTdBt">全景URL地址：</td>
                
                <td class="rgTdBt"><input type="text" name="data[panorama_url]" value="<?php echo ($detail["panorama_url"]); ?>" class="scAddTextName w360" />
                <code>请填写完整的全景URL地址，带http</code>
                </td>

            </tr>
		

        

          <tr>

              <td class="lfTdBt">是否显示客服代码</td>

              <td class="rgTdBt">

                 <input type="radio" name="data[service_audit]" value="0" <?php if($detail[service_audit] == 0): ?>checked="checked"<?php endif; ?> />不显示

				<input type="radio" name="data[service_audit]" value="1" <?php if($detail[service_audit] == 1): ?>checked="checked"<?php endif; ?> />显示

                <code>特别说明，部分用户的JS代码是不安全的，所以需要你后台审核通过才可以显示</code>

               </td>

          </tr>

          

          

          <tr>

              <td class="lfTdBt">外卖打印</td>

              <td class="rgTdBt">

                 <input type="radio" name="data[is_ele_print]" value="1" <?php if($detail[is_ele_print] == 1): ?>checked="checked"<?php endif; ?> />开启

				<input type="radio" name="data[is_ele_print]" value="0" <?php if($detail[is_ele_print] == 0): ?>checked="checked"<?php endif; ?> />关闭

                <code>开启状态才能打印外卖订单</code>

               </td>

          </tr>

          

          <tr>

              <td class="lfTdBt">抢购打印</td>

              <td class="rgTdBt">

                 <input type="radio" name="data[is_tuan_print]" value="1" <?php if($detail[is_tuan_print] == 1): ?>checked="checked"<?php endif; ?> />开启

				<input type="radio" name="data[is_tuan_print]" value="0" <?php if($detail[is_tuan_print] == 0): ?>checked="checked"<?php endif; ?> />关闭

                <code>开启状态才能打印抢购订单</code>

               </td>

          </tr>

          

           <tr>

              <td class="lfTdBt">商城打印</td>

              <td class="rgTdBt">

                 <input type="radio" name="data[is_goods_print]" value="1" <?php if($detail[is_goods_print] == 1): ?>checked="checked"<?php endif; ?> />开启

				<input type="radio" name="data[is_goods_print]" value="0" <?php if($detail[is_goods_print] == 0): ?>checked="checked"<?php endif; ?> />关闭

                <code>开启状态才能打印商城订单</code>

               </td>

          </tr>

          

           <tr>

              <td class="lfTdBt">订座打印</td>

              <td class="rgTdBt">

                 <input type="radio" name="data[is_ding_print]" value="1" <?php if($detail[is_ding_print] == 1): ?>checked="checked"<?php endif; ?> />开启

				<input type="radio" name="data[is_ding_print]" value="0" <?php if($detail[is_ding_print] == 0): ?>checked="checked"<?php endif; ?> />关闭

                <code>开启状态才能打印订座订单</code>

               </td>

          </tr>

        



            <tr>

            <td class="lfTdBt">详情：</td>

            <td class="rgTdBt">

                <script type="text/plain" id="data_details" name="details" style="width:800px;height:360px;"><?php echo ($ex["details"]); ?></script>

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