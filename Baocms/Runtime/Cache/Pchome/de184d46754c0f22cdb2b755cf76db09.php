<?php if (!defined('THINK_PATH')) exit();?><div class="pagewd">
    <ul>
        <li>
            <div class="left"><span>距离：</span></div>
            <div class="listBox clfx"><span style="color:White;background-color:Green;padding-left:5px;padding-right:5px;" id="drvDistance">计算中...</span></b><br /></div>
            <div class="left"><span>时间：</span></div>
            <div class="listBox clfx"><span id="drvDuration">计算中...</span></div>
        </li>
        <li>
            <div class="lef">
                <div class="listBox clfx">
                    <div id="allmap" style="width: 1070px; height:300px;"></div>
                    <script type="text/javascript">
                        function showDrivingDirections(){
                            var fromplace = "<?php echo ($from_addr); ?>";
                            var toplace = "<?php echo ($to_addr); ?>";
                            var map = new google.maps.Map(document.getElementById("allmap"), {mapTypeId:google.maps.MapTypeId.ROADMAP} );
                            gdirDiv = new google.maps.DirectionsRenderer();
                            gdirDiv.setMap(map);
                            gdir = new google.maps.DirectionsService();
                            var d = { origin:fromplace, destination:toplace, travelMode:google.maps.TravelMode.DRIVING, provideRouteAlternatives:true };
                            gdir.route(d,function(k,o){
                                if(o==google.maps.DirectionsStatus.OK){
                                    gdirDiv.setDirections(k);
                                    var h=gdirDiv.getRouteIndex();
                                    var q=gdirDiv.getDirections();
                                    document.getElementById("drvDistance").innerHTML=q.routes[h].legs[0].distance.text;
                                    document.getElementById("drvDuration").innerHTML=q.routes[h].legs[0].duration.text;
                                    $('#logistics').html('<p>包含送餐费：重新计算中...</p>');
                                    $.post("<?php echo U('ele/deliveryfee');?>", { order_id:"<?php echo ($order_id); ?>", distance: q.routes[h].legs[0].distance.text}, function (data) {
                                        if (data.status == 'success') {
                                            $('#logistics').html('<p>包含送餐费：<code><span class="order_s4">$' + data.fee + '</span></code></p>');
                                        }
                                    })
                                }
                            })
                        }
                        showDrivingDirections();
                    </script>
                </div>
            </div>
        </li>
    </ul>
</div>