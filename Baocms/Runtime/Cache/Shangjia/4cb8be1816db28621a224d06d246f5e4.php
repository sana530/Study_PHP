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
        <li><a href="#">系统设置</a> > <a href="">微店管理</a> > <a>微店文字资料</a></li>
    </ul>
</div>
<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">微店文字资料介绍微店的基本信息 </div>
        </div>
    </div> 
    <div class="tuanfabu_tab">
        <ul>
            <li class="tuanfabu_tabli tabli_change on"><a href="<?php echo U('goods/weidian');?>">微店资料</a></li>
        </ul>
    </div>
    <div class="tabnr_change  show">
        <form method="post"  action="<?php echo U('goods/weidian');?>" target="baocms_frm">
            <table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php if(!$weidian){ ?>
                <tr>
                    <td><p class="tuanfabu_t">店铺名称：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[weidian_name]" value="<?php if(!empty($weidian["weidian_name"])): echo ($weidian["weidian_name"]); else: echo ($the_shop["shop_name"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">店铺地址：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[addr]" value="<?php if(!empty($weidian["addr"])): echo ($weidian["addr"]); else: echo ($the_shop["addr"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                
     
                
                <tr>
                    <td width="120"><p class="tuanfabu_t">分类：</p></td>
                    <td><div class="tuanfabu_nr">
                            <select name="data[cate_id]" id="cate_id" class="tuanfabu_int tuanfabu_intw2">
                                <option value="">=选择=</option>
                                 <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> >
                                     
                                     <?php echo ($var["cate_name"]); ?></option>              
                                     
                                     
                                      <?php if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($var2["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; ?>
                            </select>
                        </div>
                    </td>
                </tr>
                
                
                <tr>
                    <td width="120"><p class="tuanfabu_t">城市地区：</p></td>
                    <td><div class="tuanfabu_nr">
                            <select name="data[city_id]" id="city_id" class="tuanfabu_int tuanfabu_intw2"></select>
                            <select name="data[area_id]" id="area_id" class="tuanfabu_int tuanfabu_intw2"></select>
                        </div></td>
                </tr>
                <script src="<?php echo U('app/datas/cityarea');?>"></script>
                <script>
                            var city_id = <?php echo (int)$city_id; ?> ;
                            var area_id = <?php echo (int)$area_id; ?> ;
                            function changeCity(cid){
                            var area_str = '<option value="0">请选择.....</option>';
                                    for (a in cityareas.area){
                            if (cityareas.area[a].city_id == cid){
                            if (area_id == cityareas.area[a].area_id){
                            area_str += '<option selected="selected" value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';
                            } else{
                            area_str += '<option value="' + cityareas.area[a].area_id + '">' + cityareas.area[a].area_name + '</option>';
                            }
                            }
                            }
                            $("#area_id").html(area_str);
                            }
                    $(document).ready(function(){
                    var city_str = '<option value="0">请选择.....</option>';
                            for (a in cityareas.city){
                    if (city_id == cityareas.city[a].city_id){
                    city_str += '<option selected="selected" value="' + cityareas.city[a].city_id + '">' + cityareas.city[a].name + '</option>';
                    } else{
                    city_str += '<option value="' + cityareas.city[a].city_id + '">' + cityareas.city[a].name + '</option>';
                    }
                    }
                    $("#city_id").html(city_str);
                            if (city_id){
                    changeCity(city_id);
                    }
                    $("#city_id").change(function(){
                    city_id = $(this).val();
                            changeCity($(this).val());
                    });
                    });                </script>
                <tr>
                    <td><p class="tuanfabu_t">营业时间：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[business_time]" value="<?php echo (($weidian["business_time"])?($weidian["business_time"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <?php }else{ ?>
                <tr>
                    <td><p class="tuanfabu_t">您的信息：</p></td>
                    <td><div class="tuanfabu_nr" style="color:#999999;">
                            <?php echo ($weidian["weidian_name"]); ?>,<?php echo ($weidian["addr"]); ?>,<?php echo ($weidian["cate_id"]); ?>,<?php echo ($weidian["city_id"]); ?>,<?php echo ($weidian["area_id"]); ?>,<?php echo ($weidian["business_time"]); ?>&nbsp;<span style="color:#ff0000;">* 基本信息不可修改</span>
                        </div></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><p class="tuanfabu_t">详情：</p></td>
                    <td><div class="tuanfabu_nr">
                            <script type="text/plain" id="data_details" name="details" style="width:800px;height:360px;"><?php echo ($weidian["details"]); ?></script>
                        </div></td>
                </tr>
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                <tr>
                    <td width="120"><p class="tuanfabu_t">微店形象照：</p></td>
                    <td><div class="tuanfabu_nr">
                            <div style="width: 300px;height: 100px; float: left;">
                                <input type="hidden" name="data[pic]" value="<?php echo ($weidian["pic"]); ?>" id="data_img" class="tuanfabu_int tuanfabu_intw" />
                                <input id="logo_file" name="data[pic]" type="data[pic]" multiple="true" value="" />
                            </div>
                            <div style="width: 300px;height: 100px; float: left;">
                                <img id="image_show" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($weidian["pic"])?($weidian["pic"]):'default.jpg'); ?>" />
                                建议尺寸:<?php echo ($CONFIG["attachs"]["shopphoto"]["thumb"]); ?>
                            </div>
                            <script>
                                        $("#logo_file").uploadify({
                                'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                        'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"weidian"));?>',
                                        'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                        'buttonText': '上传微店形象照',
                                        'fileTypeExts': '*.gif;*.jpg;*.png',
                                        'queueSizeLimit': 1,
                                        'onUploadSuccess': function (file, data, response) {
                                        $("#data_img").val(data);
                                                $("#image_show").attr('src', '__ROOT__/attachs/' + data).show();
                                        }
                                });                            </script>
                        </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">微店logo：</p></td>
                    <td><div class="tuanfabu_nr">
                            <div style="width: 300px;height: 100px; float: left;">
                                <input type="hidden" name="data[logo]" value="<?php echo ($weidian["logo"]); ?>" id="data_img2" class="tuanfabu_int tuanfabu_intw" />
                                <input id="logo_file2" name="logo_file2" type="file" multiple="true" value="" />
                            </div>
                            <div style="width: 300px;height: 100px; float: left;">
                                <img id="image_show2" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($weidian["logo"])?($weidian["logo"]):'default.jpg'); ?>" />
                                建议尺寸:<?php echo ($CONFIG["attachs"]["shopphoto"]["thumb"]); ?>
                            </div>
                            <script>
                                        $("#logo_file2").uploadify({
                                'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                        'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"weidian"));?>',
                                        'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                        'buttonText': '上传微店LOGO',
                                        'fileTypeExts': '*.gif;*.jpg;*.png',
                                        'queueSizeLimit': 1,
                                        'onUploadSuccess': function (file, data, response) {
                                        $("#data_img2").val(data);
                                                $("#image_show2").attr('src', '__ROOT__/attachs/' + data).show();
                                        }
                                });                            </script>
                        </div></td>
                </tr>
                <link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.min.css" type="text/css">
                <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
                <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
                <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
                <script>
                                        um = UM.getEditor('data_details', {
                                        imageUrl: "<?php echo U('public/editor');?>",
                                                imagePath: '__ROOT__/attachs/editor/',
                                                lang: 'zh-cn',
                                                langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                                                focus: false
                                        });                </script>
                <tr style="display: none">
                    <td width="120"><p class="tuanfabu_t">分店坐标：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[lng]" id="lng" value="<?php if(!empty($weidian["lng"])): echo ($weidian["lng"]); else: echo ($the_shop["lng"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" /> 经度
                            <input type="text" name="data[lat]" id="lat" value="<?php if(!empty($weidian["lat"])): echo ($weidian["lat"]); else: echo ($the_shop["lat"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" /> 纬度
                        </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">地图：</p></td>
                    <td><div class="tuanfabu_nr">
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&libraries=places&callback=initAutocomplete" async defer></script>
                            <div class="top" style="width:700px; margin-bottom: 20px;">
                                <div id="r-result">请输入:<input type="text" id="addr" class="mapinputs tuanfabu_int tuanfabu_intw3" size="20" /></div>
                            </div>
                            <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
                            <div id="allmap" style="width: 600px; height:500px;"></div>
                            <script type="text/javascript">
                                var autocomplete;
                                var geolocation;
                                var map;
                                var marker;
                                var infowindow;
                                var geocoder;
                                var markersArray = [];
                                function initAutocomplete() {
                                    geocoder = new google.maps.Geocoder();
                                    autocomplete = new google.maps.places.Autocomplete((document.getElementById('addr')),{types: ['geocode']});
                                    autocomplete.addListener('place_changed', fillInAddress);
                                    geolocate();
                                }
                                function fillInAddress() {
                                    var place = autocomplete.getPlace();
                                    geocoder.geocode(
                                        { address: place.formatted_address },    //設定地址的字串
                                        function(results, status) {    //callback function
                                            if (status == google.maps.GeocoderStatus.OK) { geolocation = results[0].geometry.location; }
                                            map = new google.maps.Map(document.getElementById("allmap"), { center: geolocation, zoom: 15 });
                                            google.maps.event.addListener(map, 'click', function (event) { placeMarker(event.latLng); });
                                            placeMarker(geolocation);
                                        }
                                    );
                                }
                                function geolocate() {
                                    if (document.getElementById("lat").value && document.getElementById("lng").value) {
                                        geolocation = { lat:parseFloat(document.getElementById("lat").value), lng:parseFloat(document.getElementById("lng").value) };
                                    } else if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(function(position) {
                                            geolocation = {lat: position.coords.latitude, lng: position.coords.longitude};
                                        });
                                    }
                                    map = new google.maps.Map(document.getElementById("allmap"), {zoom: 13, center: geolocation});
                                    google.maps.event.addListener(map, 'click', function (event) { placeMarker(event.latLng); });

                                }
                                function placeMarker(location) {
                                    //clearOverlays
                                    if (markersArray && markersArray.length > 0) {
                                        for (var i = 0; i < markersArray.length; i++) { markersArray[i].setMap(null); }
                                        markersArray.length = 0;
                                    }
                                    if (infowindow) { infowindow.close(); }

                                    marker = new google.maps.Marker({ position: location, map: map });
                                    markersArray.push(marker);
                                    if (geocoder) {
                                        geocoder.geocode({ 'location': location }, function (results, status) {
                                            if (status == google.maps.GeocoderStatus.OK && results[0]) {
                                                var message = "<b>座標:</b>" + results[0].geometry.location.lat() + " , " + results[0].geometry.location.lng() + "<br />" + "<b>地址:</b>" + results[0].formatted_address;
                                                var infowindow = new google.maps.InfoWindow({content: message, size: new google.maps.Size(50, 50)});
                                                infowindow.open(map, marker);
                                                document.getElementById("lng").value = results[0].geometry.location.lng();
                                                document.getElementById("lat").value = results[0].geometry.location.lat();
                                                document.getElementById("addr").value = results[0].formatted_address;
                                            } else {
                                                alert("Geocoder failed due to: " + status);
                                            }
                                        });
                                    }
                                }
                                function setiInit() {
                                    var lattxt = document.getElementById("lat").value;
                                    var lngtxt = document.getElementById("lng").value;
                                    var geolocation = { lat:parseFloat(lattxt), lng:parseFloat(lngtxt) };
                                    placeMarker(geolocation);
                                }
                                window.onload = function () { setiInit(); }
                        </script>
                        </div></td>
                </tr>



            </table>
            <div class="tuanfabu_an">
                <input type="submit" class="radius3 sjgl_an tuan_topbt" value="确认保存" />
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