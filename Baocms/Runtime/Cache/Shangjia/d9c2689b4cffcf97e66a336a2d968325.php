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
        <li><a href="#">系统设置</a> > <a href="">预订管理</a> > <a>预订资料</a></li>
    </ul>
</div>
<div class="tuan_content">
    <div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">预订资料设置、基本信息,订座信息修改后需要后台重新审核后才能正常运行，改动请慎重！！！ </div>
        </div>
    </div> 
    <div class="tuanfabu_tab">
        <ul>
            <li class="tuanfabu_tabli tabli_change on"><a href="<?php echo U('booking/set_booking');?>">订座资料</a></li>
        </ul>
    </div>
    <div class="tabnr_change  show">
        <form method="post"  action="<?php echo U('booking/set_booking');?>" target="baocms_frm">
            <table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><p class="tuanfabu_t">商家名称：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[shop_name]" value="<?php if(!empty($shopding["shop_name"])): echo ($booking["shop_name"]); else: echo ($SHOP["shop_name"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td width="120"><p class="tuanfabu_t">商家地址：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[addr]" value="<?php if(!empty($shopding["addr"])): echo ($booking["addr"]); else: echo ($SHOP["addr"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td><p class="tuanfabu_t">平均消费：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[price]" value="<?php echo (($booking["price"])?($booking["price"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td><p class="tuanfabu_t">订座定金：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[deposit]" value="<?php echo (($booking["deposit"])?($booking["deposit"]):''); ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td><p class="tuanfabu_t">商家手机号：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[mobile]" value="<?php echo (($booking["mobile"])?($booking["mobile"]):$SHOP['mobile']); ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td><p class="tuanfabu_t">商家电话：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[tel]" value="<?php echo (($booking["tel"])?($booking["tel"]):$SHOP['tel']); ?>" class="tuanfabu_int tuanfabu_intw2" />
                        </div></td>
                </tr>
                <tr>
                    <td><p class="tuanfabu_t">营业时间：</p></td>
                    <td>
                        <div class="tuanfabu_nr">
                            <select name="data[stime]">
                                <?php if(is_array($cfg)): $i = 0; $__LIST__ = $cfg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item); ?>" <?php if($item == $booking['stime']): ?>selected="selected"<?php endif; ?> ><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select> -
                            <select name="data[ltime]">
                                <?php if(is_array($cfg)): $i = 0; $__LIST__ = $cfg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item); ?>" <?php if($item == $booking['ltime']): ?>selected="selected"<?php endif; ?> ><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </td>
                </tr>
            
                
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                <tr>
                    <td width="120"><p class="tuanfabu_t">订座图片：</p></td>
                    <td>
                        <div class="tuanfabu_nr">
                            <div style="width: 300px;height: 100px; float: left;">
                                <input type="hidden" name="data[photo]" value="<?php echo ($hotel["photo"]); ?>" id="data_img" class="tuanfabu_int tuanfabu_intw" />
                                <input id="logo_file" name="data[photo]" type="data[photo]" multiple="true" value="" />
                            </div>
                            <div style="width: 300px;height: 100px; float: left;">
                                <img id="image_show" width="100" height="80"  src="__ROOT__/attachs/<?php echo (($hotel["photo"])?($hotel["photo"]):'default.jpg'); ?>" />
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
                                        $("#data_img").val(data);
                                        $("#image_show").attr('src', '__ROOT__/attachs/' + data).show();
                                    }
                                });
                            </script>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><p class="tuanfabu_t">订座组图：</p></td>
                    <td class="rgTdBt">
                        <div class="tuanfabu_nr">
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
                                    var str = '<span style="width: 160px; height: 120px; float: left; margin-left: 5px; margin-top: 10px;">  <img width="120" height="90" src="__ROOT__/attachs/' + data + '">  <input type="hidden" name="thumb[]" value="' + data + '" />    <a href="javascript:void(0);">取消</a>  </span>';
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
                    <td width="120"><p class="tuanfabu_t">就餐类型：</p></td>
                    <td><div class="tuanfabu_nr">
                            <?php if(is_array($dingtypes)): $i = 0; $__LIST__ = $dingtypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><label><span><?php echo ($item); ?>：</span><input style="width: 20px; height: 20px;" type="checkbox" name="type[]" value="<?php echo ($i); ?>" <?php if($have_type[$i] == $i): ?>checked="checked"<?php endif; ?> /></label><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div></td>
                </tr>
                
                
                
      
                 <tr>
                    <td><p class="tuanfabu_t">详情：</p></td>
                    <td><div class="tuanfabu_nr">
                            <script type="text/plain" id="data_details" name="data[details]" style="width:800px;height:360px;"><?php echo ($hotel["details"]); ?></script>
                        </div></td>
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

              
              
                <tr style="display: none">
                    <td width="120"><p class="tuanfabu_t">酒店坐标：</p></td>
                    <td><div class="tuanfabu_nr">
                            <input type="text" name="data[lng]" id="lng" value="<?php if(!empty($shopding["lng"])): echo ($booking["lng"]); else: echo ($SHOP["lng"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" /> 经度
                            <input type="text" name="data[lat]" id="lat" value="<?php if(!empty($shopding["lat"])): echo ($booking["lat"]); else: echo ($SHOP["lat"]); endif; ?>" class="tuanfabu_int tuanfabu_intw2" /> 纬度
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