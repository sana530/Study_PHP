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


<div class="tlist">
            <?php if(is_array($list)): foreach($list as $key=>$order): ?><table bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; vertical-align:middle; background-color:#FFF; margin-top: 10px;"  >

            <tr class="no"  style="border-top:  1px #000  double;">
                <td>订单</td>
                <td>价格</td>
                <td>购买时间</td>
                <td>配送地址</td>
                <td>是否货到付款</td>
            </tr>
            <tr class="no" style="border-bottom:  1px #000 double;">
                <td> <?php echo ($order["order_id"]); ?></td>
                <td><?php echo round($order['total_price']/100,2);?>NZD</td>
                
                  <td><?php echo (date('Y-m-d H:i:s',$order["create_time"])); ?></td>
                  <td>
                     <?php if(!empty($order['addr_id'])): ?>收货地址：
                   <?php echo ($areas[$addrs[$order['addr_id']]['area_id']]['area_name']); ?>--
                   <?php echo ($business[$addrs[$order['addr_id']]['business_id']]['business_name']); ?>--
                   <?php echo ($addrs[$order['addr_id']]['addr']); ?>--
                   <?php echo ($addrs[$order['addr_id']]['name']); ?>--
                   <?php echo ($addrs[$order['addr_id']]['mobile']); ?></span><?php endif; ?>

                </td>
                <td>
            <?php if(($order["is_daofu"]) == "1"): ?><font style="color: red;">货到付款</font><?php else: ?>已支付<?php endif; ?>
                </td>
            </tr>

            </table>
            <table bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin-top:10px; vertical-align:middle; background-color:#FFF;"  >
            
            <tr class="no">
                <td>商品图片</td>
                <td>商品名称</td>
                <td>数量</td>
                <td>单价</td>
                <td>是否缺货</td>
            </tr>    
         
                <?php if(is_array($goods)): foreach($goods as $key=>$good): if($good['order_id'] == $order['order_id']): ?><tr class="no">
                            <td><img width="80" src="<?php echo config_img($products[$good['goods_id']]['photo']);?>" /></td>
                            <td><?php echo ($products[$good['goods_id']]['title']); ?></td>
                            
                            <td><?php echo ($good["num"]); ?></td>
                            <td><?php echo round($good['price']/100,2);?>NZD</td>
                            <td style="width: 200px;">
                                
                            </td>
                        </tr><?php endif; endforeach; endif; ?>
           
     
             </table>


      

    </table><?php endforeach; endif; ?>
    <input type="button"  onclick="window.print();" value=" 打 印 " />
</div>

</body>
</html>