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
        <li class="li1"> 当前位置</li>
        <li class="li2">发货管理</li>

    </ul>
</div>
<div class="main-jsgl main-sc">
    <p style="height: 48px;" class="attention"><span>注意：</span>
        可以先加入捡货单，然后捡货！加入捡货单后可以点击立刻创建按钮进行清单创建！
        建议将商家地址比较接近的单子一起捡货！
        如果后期自建仓库的话，可以考虑联系官方开发者，升级经销存智能化管理！
        商家自主发货的情况下，也需要在这一步由后台确认！
    </p>
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="right">
                <form class="search_form" method="post" action="<?php echo U('order/delivery');?>"> 
                    <div class="seleHidden" id="seleHidden">
                        <div class="seleK">
                            <label>
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo (($user_id)?($user_id):''); ?>" />
                                <input type="text" name="nickname" id="nickname"  value="<?php echo ($nickname); ?>"   class="text" />
                                <a mini="select"  w="800" h="600" href="<?php echo U('user/select');?>" class="sumit">选择用户</a>
                            </label>
                            <label>
                                <span>订单编号</span>
                                <input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="inptText" />

                                <input type="submit" value="   搜索"  class="inptButton" />
                            </label>
                        </div>
                    </div> 
                </form>
                <a href="javascript:void(0);" class="searchG">高级搜索</a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>


        <form method="post" action="<?php echo U('order/delivery');?>">
            <div class="selectNr selectNr2">
                <div class="left">
                    <div class="seleK">

                        <input type="hidden" id="user_id" name="user_id" value="<?php echo (($user_id)?($user_id):''); ?>" />
                        <input type="text" name="nickname" id="nickname"  value="<?php echo ($nickname); ?>"   class="text" />
                        <a mini="select"  w="800" h="600" href="<?php echo U('user/select');?>" class="sumit lt">选择用户</a>
                        <span>商家</span>
                        <input type="hidden" id="shop_id" name="shop_id" value="<?php echo (($shop_id)?($shop_id):''); ?>"/>
                        <input type="text"   id="shop_name" name="shop_name" value="<?php echo ($shop_name); ?>" class="text" />
                        <a  href="<?php echo U('shop/select');?>" mini='select' w='800' h='600' class="sumit lt ">选择商家</a>
                        <span>开始时间</span>
                        <input type="text" name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>"  onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text" />
                        <span>结束时间</span>
                        <input type="text" name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text" />
                        <span>订单编号</span>
                        <input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="inptText" />
                    </div>
                </div>
                <div class="right">
                    <input type="submit" value="   搜索"  class="inptButton" />
                </div>
                <div class="clear"></div>
            </div>
        </form>
        <div class="tableBox">
            <form  target="baocms_frm" method="post">
                <?php if(is_array($list)): foreach($list as $key=>$order): ?><table bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; vertical-align:middle; background-color:#FFF; margin-top: 10px;"  >
                        <tr class="no">
                            <td><input class="child_order_id" name="order_id[]"  type="checkbox" value="<?php echo ($order["order_id"]); ?>" /> ID</td>
                            <td><?php echo ($order["order_id"]); ?></td>
                            <td>买家 </td>
                            <td><?php echo ($users[$order['user_id']]['account']); ?></td>


                            <td>创建时间</td>
                            <td><?php echo (date('Y-m-d H:i:s',$order["create_time"])); ?></td>
                            <td>创建IP</td>
                            <td><?php echo ($order["create_ip"]); ?></td>

                        </tr>

                        <tr class="no">
                            <td>总价值</td>
                            <td><?php echo round($order['total_price']/100,2);?></td>
                            <td>
                                卖家
                            </td>
                            <td>
                                <?php echo ($shops[$order['shop_id']]['shop_name']); ?>
                            </td>
                            <td>收货地址</td>
                            <td>
                                <?php echo ($areas[$addrs[$order['addr_id']]['area_id']]['area_name']); ?>、
                                <?php echo ($business[$addrs[$order['addr_id']]['business_id']]['business_name']); ?>、

                                <?php echo ($addrs[$order['addr_id']]['addr']); ?>
                                <br/>
                                <?php echo ($addrs[$order['addr_id']]['name']); ?>
                                <?php echo ($addrs[$order['addr_id']]['mobile']); ?>
                            </td>
                            <td>发货</td>
                            <td style="color: red;">
                                <?php echo BA('order/distribution',array('order_id'=>$order['order_id']),'一键发货','act','remberBtn');?>


                            </td>

                        </tr>

                        <tr class="no">
                            <td colspan="8">

                                <table style="width: 100%;">
                                    <tr class="no">
                                        <th>图片</th>
                                        <th>商品名称</th>
                                        <th>数量</th>
                                        <th>单价</th>
                                        <th>总价</th>
                                    </tr>  
                                    <?php if(is_array($goods)): foreach($goods as $key=>$good): if(($good["order_id"]) == $order["order_id"]): ?><tr class="no">
                                            <td><img width="80" src="<?php echo config_img($products[$good['goods_id']]['photo']);?>" /></td>
                                            <td><?php echo ($products[$good['goods_id']]['title']); ?></td>

                                            <td><?php echo ($good["num"]); ?></td>
                                            <td><?php echo round($good['price']/100,2);?></td>
                                            <td><?php echo round($good['total_price']/100,2);?></td>
                                         </tr><?php endif; endforeach; endif; ?>



                                </table>

                            </td>                    
                        </tr>


                    </table><?php endforeach; endif; ?>




                <?php echo ($page); ?>
            </form>



        </div>
        
     
        
</div>
</body>
</html>