<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo ($CONFIG['site']['headinfo']); ?>
        <title><?php if($config['title'])echo $config['title'];else echo $seo_title; ?></title>
        <meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
        <meta name="description" content="<?php echo ($seo_description); ?>" />
        <link href="__TMPL__statics/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/themes/default/Pchome/statics/css/intel.css" />
        <link rel="stylesheet" href="/themes/default/Pchome/statics/css/<?php echo ($ctl); ?>.css" />
        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';</script>
        <script src="__TMPL__statics/js/jquery.js"></script>
        <script src="__PUBLIC__/js/layer/layer.js"></script>
        <script src="__TMPL__statics/js/jquery.flexslider-min.js"></script>
        <script src="__TMPL__statics/js/js.js"></script>
        <script src="__PUBLIC__/js/web.js"></script>
        <script src="__TMPL__statics/js/baocms.js"></script>
        <script src="__TMPL__statics/js/intel.js"></script>
    </head>
<style>
    /*背景*/
    .nav, .searchBox .submit, .sy_hottjJd, .topBackOn, .goods_flListA.on, .nearbuy_hotNum, .sy_sjcpBq1, .spxq_qgjjKk, .spxq_xqT li.on code, .hdxq_ljct, .qg-sp-tab span.on, .dcsy_topLi:hover .dcsy_topLiTu, .sjsy_ljzx, .dui-huan, .locaNr_serAn, .seat-check.on, .spxq_xqMapList li.on, .hdsy_Licj_l em, .hdsy_LicjA, .tBarFabu .sub_btn .btn, .dcsy_topLi.on .dcsy_topLiTu, .liveBtn, .cloudBuy_list .btn, .jfsy_spA, .jfsy_flexslider .flex-control-nav .flex-active, .spxq_xqT li.on a, .subBtn, .cloudBuy_cont_tab ul li.on, .zy_doorSer_detail .nrForm .btn, .basic-info .action .write,  .sy_coupon_tab a.on, .sales-promotion .tag-tuan, .comment_input p .pn, .goods .tm-fcs-panel span.y a, .login_btndz{ background-color: <?php echo ($color); ?>!important; }
    /*文字颜色*/
    .sy_FloorBtz .bt, .fontcl3, .topOne .nr .left a.on, .liOne:hover .liOneA, .spxq_qgsnum, .nearbuy_zjClear, .zixunList .wz .bt a, .spxq_pjAn, .sjsy_newsList h3, .locaTopDl a, .liOne .list ul li a:hover, .spxq_xqMapT, .spxq_table td a, .hdsy_Licj_l, .hdsy_Libms, .zixunDetail h1, .zixun_hot h3, .liveTab li,.shfw_xq_new li, .jfsy_jffzT, .jfsy_wellcome .blue, .maincl, .m-detail-main-winner-content .user, .pointcl, .liOne_visit_pull .empty a, .liOne_visit_pull .empty a, .goods .tm-price, .intro a, .comment .price{color: <?php echo ($color); ?>!important; }/*边框top上*/
    .sy_FloorBt, .qg-sp-tab span.on, .zixun_hot h3, .liveTab {border-bottom: 1px solid <?php echo ($color); ?>!important;}/*边框*/
    .spxq_qgjjKk, .hdxq_tgList, .liOne .list ul, .liOne_visit .liOne_visit_pull, .seat-check.on, .liveSearchLeft{border: 1px solid <?php echo ($color); ?>!important;}

    /*特殊的*/
    .liOne:hover .liOneA {color: <?php echo ($color); ?>; border-left: 1px solid <?php echo ($color); ?>;border-right: 1px solid <?php echo ($color); ?>!important;}
    .changeCity_link:after {border-bottom: 2px solid <?php echo ($color); ?>!important;border-right: 2px solid <?php echo ($color); ?>!important;}
    .spxq_xqT {border-bottom: 1px solid <?php echo ($color); ?>!important;}
    .hdsy_tabLi.on a {border-top: 2px solid <?php echo ($color); ?>!important;}
    .spxq_slider .flex-control-thumbs li .flex-active {border-color: <?php echo ($color); ?> !important;}
    .zixunRelet { border-top: 2px solid <?php echo ($color); ?>!important;}
    .sy_sjcpLi:hover {border-color: <?php echo ($color); ?>!important;}
    .navListAll{background-color: #17A994;}
    .topTwo .menu {width: 18%; margin-top: 10px;float: right;color: #929292;font-size: 12px;text-align: center;}
    .topTwo .ment_left {float: left;width: 33%;}
    .topTwo .ment_left .ment_left_img img { width: 36px;height: 36px;}
    .navA {position: relative;}
    .navA .hot {display: block;width: 27px;height: 18px;background: url(/themes/default/Pchome/statics/images/header-hot.gif) no-repeat center top;position: absolute;right: -5px;top: 2px;}
    .mod .mod-title .current {border-bottom: 2px solid <?php echo ($color); ?>;}
    .topTwo .searchBox_r .searchBox {border: 2px solid <?php echo ($color); ?>;}
    .superior {border-top: <?php echo ($color); ?> 2px solid;}
    .navListAll {background-color: #3ac9aa;}
    .navA.on, .navA:hover { background-color: #00907f;}
</style>
<style>
    .anchorBL{   display:none !important;  }
    .pointers{cursor: pointer;}
    .arrows{cursor: default;}

</style>
<script>
    navigator.geolocation.getCurrentPosition(function (position) {
        bd_encrypt(position.coords.latitude, position.coords.longitude);
    });
    function bd_encrypt(gg_lat, gg_lon)
    {
        dingwei('<?php echo U("index/dingwei",array("t"=>$nowtime,"lat"=>"llaatt","lng"=>"llnngg"));?>', gg_lat, gg_lon);
    }
    function dingwei(page, lat, lng) {
        page = page.replace('llaatt', lat);
        page = page.replace('llnngg', lng);
        $.get(page, function (data) {
        }, 'html');
    }
</script>



<body>

<iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
 <div id="topAlert">

<div class="topOne">
    <div class="nr">
        <?php if(empty($MEMBER)): ?><div class="left"><!--您好，欢迎访问<?php echo ($CONFIG["site"]["sitename"]); ?>-->
        <a href="javascript:void(0);" class="on login_kuaijie " id="login">登陆</a>
        <script>
         $(document).ready(function () {
           $(".login_kuaijie").click(function(){
             ajaxLogin();
           })
         })
        </script>
        |<a class="whiteColor" href="<?php echo U('passport/register');?>">注册</a>
        <?php else: ?>
        <div class="left">欢迎 <b style="color: red;font-size:14px;"><?php echo ($MEMBER["nickname"]); ?></b> 来到<?php echo ($CONFIG["site"]["sitename"]); ?>&nbsp;&nbsp; 
        <a href="<?php echo u('member/index/index');?>" class="maincl whiteColor" >个人中心</a>
        <a href="<?php echo u('pchome/passport/logout');?>" class="maincl whiteColor" >退出登录</a><?php endif; ?>
        <a href="<?php echo U('download/index');?>" class="topSm blackcl6 whiteColor">APPs</a>
    </div>
    <div class="right">
        <ul>
            <li class="liOne "><a class="liOneB whiteColor" href="<?php echo U('member/order/index');?>" >我的订单</a></li>
            <li class="liOne " ><a class="liOneA whiteColor" href="javascript:void(0);">我的服务<em>&nbsp;</em></a>
                <div class="list">
                    <ul>
                        <li><a href="<?php echo u('member/order/index');?>">我的订单</a></li>
                        <li><a href="<?php echo u('member/ele/index');?>">我的美食</a></li>
                        <li><a href="<?php echo u('member/yuyue/index');?>">我的预约</a></li>
                        <li><a href="<?php echo u('member/dianping/index');?>">我的评价</a></li>
                        <li><a href="<?php echo u('member/favorites/index');?>">我的收藏</a></li>                                    
                        <li><a href="<?php echo u('member/myactivity/index');?>">我的活动</a></li>
                        <li><a href="<?php echo u('member/life/index');?>">会员服务</a></li>
                        <li><a href="<?php echo u('member/set/nickname');?>">帐号设置</a></li>
                    </ul>
                </div>
            </li>
            <span>|</span>
            <li class="liOne liOne_visit "><a class="liOneA whiteColor" href="javascript:void(0);">最近浏览<em>&nbsp;</em></a>
                <div class="list liOne_visit_pull">
                    <ul style="border:none !important;">
                        <?php
 $views = unserialize(cookie('views')); $views = array_reverse($views, TRUE); if($views){ foreach($views as $v){ ?>
                        <li class="liOne_visit_pull_li">
                            <a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><img src="__ROOT__/attachs/<?php echo ($v["photo"]); ?>" width="80" height="50" /></a>
                            <h5><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><?php echo ($v["title"]); ?></a></h5>
                            <div class="price_box"><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><em class="price">$<?php echo ($v["tuan_price"]); ?></em><span class="old_price">$<?php echo ($v["price"]); ?></span></a></div>
                        </li>
                        <?php }?>
                    </ul>
                    <p class="empty"><a href="javascript:;" id="emptyhistory">清空最近浏览记录</a></p>
                    <?php }else{?>
                    <p class="empty">您还没有浏览记录</p>
                    <?php } ?>
                </div>
            </li>
            <span>|</span>
            <li class="liOne "> <a class="liOneA whiteColor" href="javascript:void(0);">我是商家<em>&nbsp;</em></a>
                <div class="list">
                    <ul>
                        <li><a href="<?php echo U('shangjia/index/index');?>">商家登陆</a></li>
                    </ul>
                </div>
            </li>
            <span>|</span>
            <!--<li class="liOne"> <a class="liOneA" href="javascript:void(0);">快捷导航<em>&nbsp;</em></a>
                <div class="list">
                    <ul>
                     		<li><a href="<?php echo u('pchome/hotel/index');?>">酒店频道</a><em class="hot"></em></li>
                                <li><a href="<?php echo u('pchome/farm/index');?>">农家乐频道</a><em class="hot"></em></li>
                                <li><a href="<?php echo u('pchome/tribe/index');?>">部落频道</a><em class="hot"></em></li>
                                <li><a href="<?php echo u('pchome/huodong/index');?>">活动频道</a></li>
                                <li><a href="<?php echo u('pchome/life/index');?>">同城信息</a></li>
                                <li><a href="<?php echo u('pchome/coupon/index');?>">优惠券</a></li>
                                <li><a href="<?php echo u('pchome/jifen/index');?>">积分商城</a></li>
                                <li><a href="<?php echo u('pchome/tieba/index');?>">新版贴吧</a></li>
                                <li><a href="<?php echo u('pchome/billboard/index');?>">商家榜单</a></li>
                                 <li><a href="<?php echo u('pchome/cloud/index');?>">一元云购</a></li>
                                <li><a href="<?php echo u('pchome/community/index');?>">智慧小区</a></li>
                                <li><a href="<?php echo u('pchome/biz/index');?>">去哪儿了</a></li>
                                <li><a href="<?php echo u('pchome/news/index');?>">文章资讯</a></li>
                                <li><a href="<?php echo u('pchome/seller/index');?>">商家新闻</a></li>
                                <li><a href="<?php echo u('pchome/appoint/index');?>">新版家政</a></li>
                                <li><a href="<?php echo u('store/index/index');?>">商户管理</a></li>        
                    </ul>
                </div>
            </li>-->
  
        </ul>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#emptyhistory").click(function(){
            $.get("<?php echo U('tuan/emptyviews');?>",function(data){
                if(data.status == 'success'){
                    $(".liOne_visit_pull ul li").remove();
                    $(".liOne_visit_pull p.empty").html("您还没有浏览记录");
                }else{
                    layer.msg(data.msg,{icon:2});
                }
            },'json')
        })
    });
</script>  
<div class="between">
    <div class="middle" style="margin-bottom: 40px;">
        <div class="all">
            <div class="all_2">
                <ul>
                    <li class="on">1.提交订单<em>&nbsp;</em></li>
                    <li class="on">2.去支付<em>&nbsp;</em></li>
                    <li>3.完成<em>&nbsp;</em></li>
                </ul>
            </div>
            <div class="all_3">
                <ul class="ul_3">
                    <li><img src="__TMPL__statics/images/tp_5.png">
                        <p>随时退</p>
                    </li>
                    <li><img src="__TMPL__statics/images/tp_6.png">
                        <p>不满意免单</p>
                    </li>
                    <li><img src="__TMPL__statics/images/tp_7.png">
                        <p>过期退</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="mode_dingdan">
            <form action="<?php echo U('mall/paycode2',array('log_id'=>$logs['log_id']));?>" method="post" target="baocms_frm">
                <?php if(!empty($useraddr)): ?><div class="order-addres">
                        <h3><span class="left addlt">收货地址</span> <span class="order-add right addrt">新增收货地址</span>
                            <p class="clear"></p>
                        </h3>
                        <div class="box">
                            <!--默认地址样式-->
                            <div class="addright_on">
                                <div class="left">
                                    <?php $item = $useraddr[0]; ?>
                                    <label><input type="hidden" name="addr_id" id="addr_id_<$item.addr_id>" value="<?php echo ($item["addr_id"]); ?>"/><span><?php echo ($citys[$item['city_id']]['name']); ?>&nbsp;&nbsp;<?php echo ($areas[$item['area_id']]['area_name']); ?>&nbsp;&nbsp;<?php echo ($bizs[$item['business_id']]['business_name']); ?>&nbsp;&nbsp;<?php echo ($item["addr"]); ?>（<?php echo ($item["name"]); ?>收）<?php echo ($item["mobile"]); ?></span></label>
                                </div>
                                <div class="right "><a href="javascript:void(0);" class="order-mr">使用地址</a> <span style="display:none;" id="addr_idss"><?php echo ($item["addr_id"]); ?></span><span style="display:none;" id="city_idss"><?php echo ($citys[$item['city_id']]['name']); ?></span><span style="display:none;" id="area_idss"><?php echo ($areas[$item['area_id']]['area_name']); ?></span><span style="display:none;" id="business_idss"><?php echo ($bizs[$item['business_id']]['business_name']); ?></span><span style="display:none;" id="addrss"><?php echo ($item["addr"]); ?></span><span style="display:none;" id="mobiless"><?php echo ($item['mobile']); ?></span><span style="display:none;" id="namess"><?php echo ($item['name']); ?></span> </div>
                            </div>
                            <?php $i=0 ?>
                            <?php if(is_array($useraddr)): foreach($useraddr as $key=>$item): $i++;if($i>1){ ?>
                                <div class="addright none">
                                    <div class="left"><label><input type="hidden" name="addr_id" id="addr_id_<?php echo ($item["addr_id"]); ?>"  value="<?php echo ($item["addr_id"]); ?>"/> <span rel="<?php echo ($item["addr_id"]); ?>" class="order-mr-change"><?php echo ($citys[$item['city_id']]['name']); ?>&nbsp;&nbsp;<?php echo ($areas[$item['area_id']]['area_name']); ?>&nbsp;&nbsp;<?php echo ($bizs[$item['business_id']]['business_name']); ?>&nbsp;&nbsp;<?php echo ($item["addr"]); ?>（<?php echo ($item["name"]); ?>收）<?php echo ($item["mobile"]); ?></span></label>
                                    </div>
                                    <div class="right addrightLink none"> <a href="javascript:void(0);" rel="<?php echo ($item["addr_id"]); ?>" class="order-mr order-mr-change">更换地址</a> <span style="display:none;" id="addr_idss"><?php echo ($item["addr_id"]); ?></span><span style="display:none;" id="city_idss"><?php echo ($citys[$item['city_id']]['name']); ?></span><span style="display:none;" id="area_idss"><?php echo ($areas[$item['area_id']]['area_name']); ?></span><span style="display:none;" id="business_idss"><?php echo ($bizs[$item['business_id']]['business_name']); ?></span><span style="display:none;" id="addrss"><?php echo ($item["addr"]); ?></span><span style="display:none;" id="mobiless"><?php echo ($item['mobile']); ?></span><span style="display:none;" id="namess"><?php echo ($item['name']); ?></span> </div>
                                </div>
                                <?php } endforeach; endif; ?>
                        </div>
                        <div class="moreAddress">更多地址</div>
                    </div>
                    <?php else: ?>
                    <div class="order-addres">
                        <h3 class="none"><span class="left addlt">收货地址</span> <span class="order-add right addrt">新增收货地址</span></h3>
                            <div class="box"> </div>
                            <a id="order-add" class="order-add" style="display: inherit;" href="javascript:void(0);">新增地址+</a> </div><?php endif; ?>
                <div class="mode">选择支付方式</div>
                <ul class="mode_zx">
                    <li class="on">在线付款</li>
                    <li>现金支付</li>
                </ul>
                <div class="order_type table1">
                    <div  class="order_style">
                        <ul class="zfList">
                            <?php $i = 0; ?>
                            <?php if(is_array($payment)): foreach($payment as $key=>$var): if($var['code'] != 'weixin'): $i++; ?>
                                    <li>
                                        <label class="block">
                                            <label class="seat-check-radio">
                                                <input id="code" value="<?php echo ($var["code"]); ?>" name="code" type="radio" />
                                            </label>
                                            <img src="__PUBLIC__/images/<?php echo ($var["logo"]); ?>">
                                        </label>
                                    </li><?php endif; endforeach; endif; ?>
                        </ul>
                        <div class="clear"></div>
                        <script>
                            $(document).ready(function () {
                                $(".seat-check-radio").click(function () {
                                    $(".seat-check-radio").removeClass("on");
                                    $(this).addClass("on");
                                });
                                $(".order_style ul.zfList li").click(function () {
                                    $(".order_style ul.zfList li").removeClass("current");
                                    $(this).addClass("current");
                                });
                                $(".order-addres .addright").mouseover(function () {
                                    $(this).addClass("current");
                                    $(this).find('.addrightLink').show();
                                }).mouseout(function () {
                                    $(this).removeClass("current");
                                    $(this).find('.addrightLink').hide();
                                });
                                $(".order-addres .moreAddress").click(function () {
                                    $(".order-addres").find('.addright').slideToggle(500);
                                });
                                $(".box").on('click', '.order-mr-change', function () {
                                    var order_id = "<?php echo ($order["order_id"]); ?>";
                                    var addr_idd = $(this).attr('rel');
                                    $.post("<?php echo U('mall/change_addr');?>", {order_id: order_id, addr_id: addr_idd}, function (data) {
                                        if (data.status == 'success') {
                                           
                                            layer.msg(data.msg, {icon: 1});
                                            window.location.reload();
                                        } else {
                                            layer.msg(data.msg, {icon: 2});
                                        }
                                    }, 'json')
                                });
                            });
                        </script> 
                    </div>
                </div>
                <div class="order_plus table1" style="display: none;">
                    <div class="order_style2">
                        <label class="left">
                            <label class="seat-check-radio">
                                <input type="radio" name="code" value="wait">
                            </label>
                            <img src="__PUBLIC__/images/tp_11.png">
                        </label>
                        <span class="left"><img src="__TMPL__statics/images/tp_12.png">货到付款</span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="order_p1">
                    <div class="order_s3"> <span class="">支付：<span class="order_s4">$<?php echo round($logs['need_pay']/100,2);?></span></span> </div>
                    <div > <a href="javascript:history.go(-1);" style="margin-right:10px;">返回修改订单</a>
                        <input type="submit" name="sub" value="去支付">
                    </div>
                </div>
                <div class="clear"></div>
            </form>
            </label>
            <div class="order-box  pay-order">
                <table class="order" width="100%">
                    <tr>
                        <th>项目</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th width="120">总价</th>
                    </tr>
                    <?php if(is_array($ordergoods)): foreach($ordergoods as $key=>$item): ?><tr>
                            <td>
                                <div class="tab_nr">
                                    <div style="margin-right: 5px;" class="left tab_img"><img src="<?php echo config_img($goods[$item['goods_id']]['photo']);?>" width="134" height="85" class="img_3"></div>
                                    <div class="left tab_wz">
                                        <p class="tab_nr1"><?php echo ($goods[$item['goods_id']]['title']); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td width="115">
                                <div class="tab_price">$<span class="price"><?php echo round($item['price']/100,2);?></span></div>
                            </td>
                            <td width="116"> <?php echo ($item['num']); ?> </td>
                            <td><?php echo round($item['need_pay']/100,2);?></td>
                        </tr><?php endforeach; endif; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="order-cover" id="addr_add">
        <div class="add-newdress">
            <div class="add-newdress2"> <span class="left">添加新地址</span> <img src="__TMPL__statics/images/tp_54.png" class="right add-close"> </div>
            <form id="address"  method="post">
                <div class="add-message">
                    <p><span>*</span> 联系人：
                        <input type="text" value="" name="name" class="add-text">
                    </p>
                    <p><span>*</span> 地区：
                        <select id="city_id" name="city_id" style="width: 100px; margin-left: 28px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                        <select id="area_id" name="area_id" style="width: 100px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                        <select id="business_id" name="business_id" style="width: 100px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                    </p>
                    <p><span>*</span> 手机号码：
                        <input type="text" value="" name="mobile" class="add-text2">
                    </p>
                    <p><span>*</span> 收货地址：
                        <input type="text" value="" name="addr" class="add-text2 add-dw">
                    </p>
                </div>
                <div class="add-button">
                    <input type="button" id="add_hold" class="add-hold" value="保 存"/>
                    <input type="button" class="add-off" value="取 消"/>
                </div>
            </form>
        </div>
    </div>
    <div class="order-cover" id="addr_edit">
        <div class="add-newdress">
            <div class="add-newdress2"> <span class="left">修改地址</span> <img src="__TMPL__statics/images/tp_54.png" class="right add-close"> </div>
            <form id="addredit"  method="post">
                <div class="add-message">
                    <input type="hidden" name="addr_id" value="" id="addr_ids">
                    <p><span>*</span> 联系人：
                        <input type="text" id="names" value="" name="name" class="add-text">
                    </p>
                    <p><span>*</span> 地区：
                        <select id="city_ids" name="city_id" style="width: 100px; margin-left: 28px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                        <select id="area_ids" name="area_id" style="width: 100px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                        <select id="business_ids" name="business_id" style="width: 100px;" class="add-text">
                            <option value="0">请选择...</option>
                        </select>
                    </p>
                    <p><span>*</span> 手机号码：
                        <input type="text" value="" id="mobiles" name="mobile" class="add-text2">
                    </p>
                    <p><span>*</span> 收货地址：
                        <input type="text" value="" id="addrs" name="addr" class="add-text2 add-dw">
                    </p>
                </div>
                <div class="add-button">
                    <input type="button" id="edit_hold" class="add-hold" value="保 存"/>
                    <input type="button" class="add-off" value="取 消"/>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#add_hold").click(function () {
                var formss = $("#address").serialize();
                $.post("<?php echo u('member/address/address');?>", formss, function (result) {
                    if (result.status == 'success') {
                       
                        layer.msg(result.msg);
                        window.location.reload();
                    } else {
                        layer.msg(result.msg);
                    }
                }, 'json');
            });
        })

    </script> 
    <script>
        $(document).ready(function () {
            $("#edit_hold").click(function () {
                var forms = $("#addredit").serialize();
                $.post("<?php echo u('member/address/addredit');?>", forms, function (result) {
                    if (result.status == 'success') {
                      
                        layer.msg(result.msg);
                        window.location.reload();
                    } else {
                        layer.msg(result.msg);
                    }
                }, 'json');
            });
        })

    </script> 
    <script src="<?php echo U('app/datas/cab',array('name'=>'cityareas'));?>"></script> 
    <script>
        var city_id = 0;
        var area_id = 0;
        var business_id = 0;
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
    <script>

        function changeCAB(c, a, b) {
            $("#city_ids").unbind('change');
            $("#area_ids").unbind('change');
            var city_ids = c;
            var area_ids = a;
            var business_ids = b;
            var city_str = ' <option value="0">请选择...</option>';
            for (b in cityareas.city) {
                if (city_ids == cityareas.city[b].city_id) {
                    city_str += '<option selected="selected" value="' + cityareas.city[b].city_id + '">' + cityareas.city[b].name + '</option>';
                } else {
                    city_str += '<option value="' + cityareas.city[b].city_id + '">' + cityareas.city[b].name + '</option>';
                }
            }
            $("#city_ids").html(city_str);

            $("#city_ids").change(function () {
                if ($("#city_ids").val() > 0) {
                    city_ids = $("#city_ids").val();
                    var area_str = ' <option value="0">请选择...</option>';
                    for (b in cityareas.area) {
                        if (cityareas.area[b].city_id == city_ids) {
                            if (area_ids == cityareas.area[b].area_id) {
                                area_str += '<option selected="selected" value="' + cityareas.area[b].area_id + '">' + cityareas.area[b].area_name + '</option>';
                            } else {
                                area_str += '<option value="' + cityareas.area[b].area_id + '">' + cityareas.area[b].area_name + '</option>';
                            }
                        }
                    }

                    $("#area_ids").html(area_str);
                    $("#business_ids").html('<option value="0">请选择...</option>');


                } else {
                    $("#area_ids").html('<option value="0">请选择...</option>');
                    $("#business_ids").html('<option value="0">请选择...</option>');
                }

            });

            if (city_ids > 0) {
                var area_str = ' <option value="0">请选择...</option>';
                for (b in cityareas.area) {
                    if (cityareas.area[b].city_id == city_ids) {
                        if (area_ids == cityareas.area[b].area_id) {
                            area_str += '<option selected="selected" value="' + cityareas.area[b].area_id + '">' + cityareas.area[b].area_name + '</option>';
                        } else {
                            area_str += '<option value="' + cityareas.area[b].area_id + '">' + cityareas.area[b].area_name + '</option>';
                        }
                    }
                }
                $("#area_ids").html(area_str);
            }


            $("#area_ids").change(function () {
                if ($("#area_ids").val() > 0) {
                    area_ids = $("#area_ids").val();
                    var business_str = ' <option value="0">请选择...</option>';
                    for (b in cityareas.business) {
                        if (cityareas.business[b].area_id == area_ids) {
                            if (business_ids == cityareas.business[b].business_id) {
                                business_str += '<option selected="selected" value="' + cityareas.business[b].business_id + '">' + cityareas.business[b].business_name + '</option>';
                            } else {
                                business_str += '<option value="' + cityareas.business[b].business_id + '">' + cityareas.business[b].business_name + '</option>';
                            }
                        }
                    }
                    $("#business_ids").html(business_str);
                } else {
                    $("#business_ids").html('<option value="0">请选择...</option>');
                }

            });

            if (area_ids > 0) {
                var business_str = ' <option value="0">请选择...</option>';
                for (b in cityareas.business) {
                    if (cityareas.business[b].area_id == area_ids) {
                        if (business_ids == cityareas.business[b].business_id) {
                            business_str += '<option selected="selected" value="' + cityareas.business[b].business_id + '">' + cityareas.business[b].business_name + '</option>';
                        } else {
                            business_str += '<option value="' + cityareas.business[b].business_id + '">' + cityareas.business[b].business_name + '</option>';
                        }
                    }
                }
                $("#business_ids").html(business_str);
            }
            $("#business_ids").change(function () {
                business_ids = $(this).val();
            });
        }

    </script> 
    <script>
        $(function () {
            $(".order-add").click(function () {
                $("#addr_add").show();
            });
            $(document).on('click', '.order-xg', function () {
                changeCAB($(this).attr('c'), $(this).attr('a'), $(this).attr('b'));  // 在这里修改  123 的值 
                $("#addr_edit").show();
                var addr_idss = $(this).parent().find("#addr_idss").html();
                $("#addr_ids").val(addr_idss);
                var namess = $(this).parent().find("#namess").html();
                $("#names").val(namess);
                var addrss = $(this).parent().find("#addrss").html();
                $("#addrs").val(addrss);
                var mobiless = $(this).parent().find("#mobiless").html();
                $("#mobiles").val(mobiless);

            });

            $(".add-off").click(function () {
                $(".order-cover").hide();
            })
            /*$(".add-hold").click(function () {
             $(".order-cover").hide();
             })*/
            $(".add-close").click(function () {
                $(".order-cover").hide();
            })
        })

    </script> 
    <div class="footerOut">
    <?php if($ctl == index): ?><div class="foot_yqlj">
            友情链接：
            <?php  $cache = cache(array('type'=>'File','expire'=> 21600)); $token = md5("Links,audit=1 AND colsed=0 AND city_id=$city_id,0,10,21600,orderby asc,,"); if(!$items= $cache->get($token)){ $items = D("Links")->where("audit=1 AND colsed=0 AND city_id=$city_id")->order("orderby asc")->limit("0,10")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><a target="_blank" href="<?php echo ($item["link_url"]); ?>"><?php echo ($item["link_name"]); ?></a> <?php endforeach; ?>
            <a target="_blank" href="<?php echo U('Pchome/public/apply_link');?>">申请链接</a>
        </div><?php endif; ?>

    <div class="footer">
        <div class="footNav">
            <div class="left">
                <div class="footNavLi">
                    <ul>

                    	<li class="footerLi foot_contact">
                            <h3><i class="ico_1"></i>联系我们</h3>
                			<div class="nr">
                            	<p>客服电话：<b class="fontcl3"><?php echo ($CONFIG["site"]["tel"]); ?></b></p>
                                <p>在线客服：<a target="_blank" href="http://v2.zopim.com/widget/livechat.html?key=4HcLtdVNhkK8alhvOG52HDnoroXdQx0I&lang=zh-cn"><img src="__TMPL__statics/images/foot_btn.png"/></a></p>
                                <p>工作时间：周一至周五9:30-18:00</p>
                                <p class="graycl">公共节假日除外</p>
                            </div>
                        </li>

                        <li class="footerLi">
                            <h3><i class="ico_2"></i>公司信息</h3>
                            <ul class="list">
                                <li><a target="_blank" title="关于我们" href="<?php echo U('pchome/article/system',array('content_id'=>1));?>">关于我们</a></li>
                                <li><a target="_blank" title="联系我们" href="<?php echo U('pchome/article/system',array('content_id'=>3));?>">联系我们</a></li>
                                <li><a target="_blank" title="人才招聘" href="<?php echo U('pchome/article/system',array('content_id'=>2));?>">人才招聘</a></li>
                                <li><a target="_blank" title="免责声明" href="<?php echo U('pchome/article/system',array('content_id'=>4));?>">免责声明</a></li>
                            </ul>
                        </li>

                        <li class="footerLi">
                            <h3><i class="ico_3"></i>商户合作</h3>
                            <ul class="list">
                                <li><a href="<?php echo U('pchome/shop/apply');?>">商家入驻</a></li>
                                <li><a target="_blank" title="广告合作" href="<?php echo U('pchome/article/system',array('content_id'=>5));?>">广告合作</a></li>
                                <li><a href="<?php echo U('pchome/shangjia/index/index');?>">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="footerLi">
                            <h3><i class="ico_4"></i>用户帮助</h3>
                            <ul class="list">
                                <li><a target="_blank" title="服务协议" href="<?php echo U('pchome/article/system',array('content_id'=>7));?>">服务协议</a></li>
                                <li><a target="_blank" title="退款承诺" href="<?php echo U('pchome/article/system',array('content_id'=>8));?>">退款承诺</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right"><p>扫一扫加关注</p><img src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["wxcode"]); ?>" width="149" height="149" /></div>
        </div>
    </div>

	<div class="footerCopy">copyright 2013-2113 <?php echo ($_SERVER['HTTP_HOST']); ?> All Rights Reserved <?php echo ($CONFIG["site"]["sitename"]); ?>版权所有 - <?php echo ($CONFIG["site"]["icp"]); ?> <?php echo ($CONFIG["site"]["tongji"]); ?></div>
</div>  

<div class="topUp">
    <ul>
    	<li class="kefu"><a target="_blank" href="http://v2.zopim.com/widget/livechat.html?key=4HcLtdVNhkK8alhvOG52HDnoroXdQx0I&lang=zh-cn"><div class="kefu_open maincl">在线客服</div></a></li>
        <li class="topBack"><div class="topBackOn">回到<br />顶部</div></li>
        <li class="topUpWx"><div class="topUpWxk"><img src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["wxcode"]); ?>" width="149" height="149" /><p class="maincl">扫描二维码关注微信</p></div></li>
    </ul>
</div>



<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".topUp").show();
                $(".indexpop").show();
            } else {
                $(".topUp").hide();
                $(".indexpop").hide();

            }

            var ctl = "<?php echo ($ctl); ?>";
            if(ctl == 'coupon'){
                if ($(window).scrollTop() > 665) {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }

            }else{
                if ($(window).scrollTop() > '<?php echo ($height_num); ?>') {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }
            }
        });

        $(".topBack").click(function () {
            $("html,body").animate({scrollTop: 0}, 200);
        });

		$(window).scroll(function(){
			var top = $(document).scrollTop();          //定义变量，获取滚动条的高度
			var menu = $(".topUp");                      //定义变量，抓取topUp
			var items = $(".footerOut");    //定义变量，查找footerOut 
			items.each(function(){
				var m=$(this);
				var itemsTop = m.offset().top;      //定义变量，获取当前类的top偏移量
				if(itemsTop-360 <= top-360){
					menu.css('bottom','360px');
					menu.css('top','auto');
				}else{
					menu.css('bottom','0px');
					menu.css('top','auto');
				}
			});
		});
    });
</script>
</body>
</html>