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
<style>
    .liOne {z-index: 999;}
    .common-banner--floor {width:1200px;}
    .common-banner--newtop {width:1200px; height: 60px;margin:0px auto 0; border: none;padding: 0;overflow: hidden;}
    .common-banner {position: relative;text-align: center;}
    .common-banner--newtop .common-banner__sheet {width: 100%;}
    .common-banner--floor .color--left { left: 0;}
    .common-banner--floor .color {position: absolute; width: 50%;height: 60px;margin: 0;padding: 0;border: none;}
    .common-banner--floor .color--right {right: 0;}
    .common-banner--floor .common-banner__link { position: absolute;top: 0;left: 50%;width: 1200px; height: 60px; margin-left: -600px;}
    .common-banner--newtop .common-banner__link { display: block;z-index: 9;}
    .common-banner img { vertical-align: top;}
    .cf:after {display: block;clear: both;height: 0;overflow: hidden;visibility: hidden;}
    .common-banner--floor .close {z-index:10;}
    .common-banner .close {position: absolute;top:8px;right:8px;background:url(/themes/default/Pchome/statics/images/tp_54.png) no-repeat center center;}
    .common-close--iconfont-small { padding: 8px;}
</style>



<?php  $cache = cache(array('type'=>'File','expire'=> 21600)); $token = md5("Ad, closed=0 AND site_id=66 AND  city_id IN ({$city_ids}) and bg_date <= '{$today}' AND end_date >= '{$today}' ,0,1,21600,orderby asc,,"); if(!$items= $cache->get($token)){ $items = D("Ad")->where(" closed=0 AND site_id=66 AND  city_id IN ({$city_ids}) and bg_date <= '{$today}' AND end_date >= '{$today}' ")->order("orderby asc")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><div class="J-hub J-banner-newtop ui-slider common-banner common-banner--newtop common-banner--floor log-mod-viewed J-banner-stamp-active" >
        <div class="common-banner__sheet cf">
            <div class="color color--left" style="background:#83d8f5"></div>
            <div class="color color--right" style="background:#83d8f5"></div>
            <a class="common-banner__link" target="_blank" href="<?php echo ($item["link_url"]); ?>" >
                <img  src="<?php echo config_img($item['photo']);?>" width="1200" height="60" >
            </a>
        </div><a href="javascript:void(0)" class="F-glob F-glob-close common-close--iconfont-small close" title="关闭"></a>
    </div> <?php endforeach; ?>
<script>
    $(document).ready(function () {
        $(".common-close--iconfont-small").click(function () {
            $(".common-banner").hide();
        });
    });
</script>
<div class="mainBg shadow">
    <div class="topTwo ">
        <div class="left">
            <?php if(!empty($CONFIG['site']['logo'])): if(!empty($city['photo'])): ?><h1><a href="<?php echo u('pchome/index/index');?>"><img src="<?php echo config_img($city['photo']);?>" width="215" height="65" /></a></h1>
                    <?php else: ?>
                    <h1><a href="<?php echo u('pchome/index/index');?>"><img src="<?php echo config_img($CONFIG['site']['logo']);?>" /></a></h1><?php endif; endif; ?>
            <div class="changeCity ">
                <p class="changeCity_name  arrows"><?php echo ($city_chinese_name); ?></p>
                <a href="<?php echo u('pchome/city/index');?>" class="graycl changeCity_link">更换城市</a>
            </div>
        </div>
        <div class="right searchBox_r">
            <script>
                $(document).ready(function () {
                    $(".selectList li a").click(function () {
                        $("#search_form").attr('action', $(this).attr('rel'));
                        $("#selectBoxInput").html($(this).html());
                        $('.selectList').hide();
                    });

                    $(".selectList a").each(function(){
                        if($(this).attr("cur")){
                            $("#search_form").attr('action', $(this).attr('rel'));
                            $("#selectBoxInput").html($(this).html());
                        }
                    })
                });
            </script>

            <div class="searchBox ">
                <form id="search_form"  method="post" action="<?php echo u('pchome/all/index');?>">
                    <div class="selectBox"> <span class="select"  id="selectBoxInput">全部</span>
                        <div  class="selectList">
                            <ul>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'all'){?> cur='true'<?php }?> rel="<?php echo u('pchome/all/index');?>">全部</a></li>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'shop'){?> cur='true'<?php }?> rel="<?php echo u('pchome/shop/index');?>">商家</a></li>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'tuan'){?> cur='true'<?php }?>rel="<?php echo u('pchome/tuan/index');?>">抢购</a></li>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'life'){?> cur='true'<?php }?>rel="<?php echo u('pchome/life/index');?>">生活</a></li>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'mall'){?> cur='true'<?php }?>rel="<?php echo u('pchome/mall/index');?>">商品</a></li>
                                <li><a href="javascript:void(0);" <?php if($ctl == 'news'){?> cur='true'<?php }?>rel="<?php echo u('pchome/news/index');?>">新闻</a></li>

                            </ul>

                        </div>
                    </div>

                    <input type="text" class="text " <?php if($ctl != ding): ?>name="keyword" value="<?php echo (($keyword)?($keyword):'输入您要搜索的内容'); ?>"<?php endif; ?> onclick="if (value == defaultValue) {
                    value = '';
                    this.style.color = '#000'
                    }"  onBlur="if (!value) {
                    value = defaultValue;
                    this.style.color = '#999'
                    }" />

                    <input type="submit" class="submit pointers" value="" />
                </form>
            </div>

            <div class="hotSearch">
                <?php $a =1; ?>
                <?php  $cache = cache(array('type'=>'File','expire'=> 43200)); $token = md5("Keyword,,0,8,43200,key_id desc,,"); if(!$items= $cache->get($token)){ $items = D("Keyword")->where("")->order("key_id desc")->limit("0,8")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; if($item['type'] == 0 or $item['type'] == 1): ?><a href="<?php echo u('pchome/shop/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                        <?php elseif($item['type'] == 2): ?>
                        <a href="<?php echo u('pchome/tuan/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                        <?php elseif($item['type'] == 3): ?>
                        <a href="<?php echo u('pchome/life/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                        <?php elseif($item['type'] == 4): ?>
                        <a href="<?php echo u('pchome/mall/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a><?php endif; ?> <?php endforeach; ?>
            </div>
        </div>

        <div class="topTwo_cart_box right pointers" id='cart'><em class="ico"></em>购物车<span id="num" class="num"><?php echo (($cartnum)?($cartnum):'0'); ?></span>
            <div class="topTwo_cart_list_box">
                <div class="box"  id='cart_show'>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<script>
    $('#cart').hover(function(){
        var link = "<?php echo U('pchome/mall/goods');?>";
        $("#cart_show").load(link);
    });

</script>

<script src="/Public/js/my97/WdatePicker.js"></script>
<script src="/static/default/pc/js/dqq.js"></script>
<script src="__TMPL__statics/js/jquery.cookie.js?v=20150718"></script>
<script>
    $(function () {
        $(".right_img2").mouseover(function () {
            $(".rig_xt").show();
            $(".rig_xt").mouseover(function () {
                $(".rig_xt").show();
            })
            $(".rig_xt").mouseout(function () {
                $(".rig_xt").hide();
            });
        });
        /* 点菜 */
    });
</script>
<style>
#cart_waimai .del{cursor: pointer;}
</style>
<div class="nav">
    <div class="navList">
        <ul>
            <li class="navListAll zy_navListAll"><i class="nav-bz left"></i><span class="navListAllt">全部抢购分类<em></em></span>
                <div class="shadowy navAll">
                    <div class="menu_fllist2">
    <?php $i=0; ?>             
    <?php if(is_array($shopcates)): foreach($shopcates as $key=>$item): if(($item["parent_id"]) == "0"): $i++;if($i <= 8){ ?>
        <div <?php if($i == 1): ?>class="item2 bo"<?php else: ?>class="item2"<?php endif; ?> >
            <h3>
                <div class="left ico ico_<?php echo ($i); ?>"></div>
                <div class="wz">
                	<a class="bt1" title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a>
                    <div class="bt2">
                        <?php $i2=0; ?>
                        <?php if(is_array($shopcates)): foreach($shopcates as $key=>$item2): if(($item2["parent_id"]) == $item["cate_id"]): $i2++;if($i2 <= 2){ ?>
                            <a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo msubstr($item2['cate_name'],0,15,'utf-8',false);?></a>
                            <?php } endif; endforeach; endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </h3>
            <div class="menu_flklist2">
                <div class="menu_fl2t"><a title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a></div>
                <div class="menu_fl2nr">
                    <?php $k=0; ?>
                    <?php if(is_array($shopcates)): foreach($shopcates as $key=>$item2): if(($item2["parent_id"]) == $item["cate_id"]): ?><a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo ($item2['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                </div>
            </div>
        </div>
        <?php } endif; endforeach; endif; ?>
</div>

                </div>
            </li>
            <li class="navLi"><a class="navA <?php if($ctl == ele and $act == index): ?>on<?php endif; ?> " href="<?php echo U('ele/index');?>">首页</a></li>
            <li class="navLi"><a class="navA <?php if($ctl == ele and $act == takeout): ?>on<?php endif; ?>" href="<?php echo U('ele/takeout');?>">身边美食</a></li>
            <li class="navLi"><a class="navA " href="<?php echo U('ele/index',array('new'=>1));?>">今日新单</a></li>
            <li class="navLi"><a class="navA" href="<?php echo U('ele/index',array('hot'=>1));?>">热门疯抢</a></li>
        </ul>
    </div>
</div>

<div class="content zy_content content2">
    <?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Hotel,shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Hotel")->where("shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $is_hotel = $item; ?> <?php endforeach; ?>
<?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Ele,shop_id = {$detail['shop_id']} AND audit = 1,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Ele")->where("shop_id = {$detail['shop_id']} AND audit = 1")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $is_ele = $item; ?> <?php endforeach; ?>
<?php  $cache = cache(array('type'=>'File','expire'=> 86400)); $token = md5("Booking,shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0,0,1,86400,,,"); if(!$items= $cache->get($token)){ $items = D("Booking")->where("shop_id = {$detail['shop_id']} AND audit = 1 AND closed = 0")->order("")->limit("0,1")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $is_booking = $item; ?> <?php endforeach; ?>
<?php $action = strtolower(ACTION_NAME); ?>
<div class="shop-type c2016">
    <ul>
        <li <?php if(($ctl == 'shop') AND ($action == 'detail')): ?>class="a"<?php endif; ?>><a href="<?php echo U('shop/detail',array('shop_id'=>$detail['shop_id']));?>">首页</a></li>
        <?php if(!empty($is_hotel)): ?><li <?php if(($ctl == 'hotel') AND ($action == 'detail')): ?>class="a"<?php endif; ?>><a href="<?php echo U('hotel/detail',array('hotel_id'=>$is_hotel['hotel_id']));?>">酒店</a></li><?php endif; ?>
        <?php if(!empty($is_ele)): ?><li <?php if(($ctl == 'ele') AND ($action == 'shop') AND ($is_delivery == '0')): ?>class="a"<?php endif; ?>><a href="<?php echo U('ele/shop',array('shop_id'=>$detail['shop_id']));?>">美食</a></li><?php endif; ?>
        <?php if((!empty($is_ele)) AND ($is_ele['is_delivery'] == 1)): ?><li <?php if(($ctl == 'ele') AND ($action == 'shop') AND ($is_delivery == '1')): ?>class="a"<?php endif; ?>><a href="<?php echo U('ele/shop',array('shop_id'=>$detail['shop_id'],'delivery'=>1));?>">外送</a></li><?php endif; ?>
        <?php if(!empty($is_booking)): ?><li <?php if(($ctl == 'booking') AND ($action == 'detail')): ?>class="a"<?php endif; ?>><a href="<?php echo U('booking/detail',array('shop_id'=>$detail['shop_id']));?>">订座</a></li><?php endif; ?>
        <li <?php if(($ctl == 'shop') AND ($action == 'news')): ?>class="a"<?php endif; ?>><a href="<?php echo U('shop/news',array('shop_id'=>$detail['shop_id']));?>">新闻</a></li>
        <li <?php if(($ctl == 'shop') AND ($action == 'ping')): ?>class="a"<?php endif; ?>><a href="<?php echo U('shop/ping',array('shop_id'=>$detail['shop_id']));?>">点评</a></li>
    </ul>
</div>
    <div class="evalOne">
        <ul class="eval_ul">
            <li class="eval_li1">
                <img width="100" height="70" src="<?php echo config_img($shop['logo']);?>" class=""/>
            </li>
            <li class="eval_li2">
                <p class="furit"><?php echo ($shop["shop_name"]); ?></p>
                <?php if(!empty($shop['score'])): ?><p><span class="spxq_qgpstarBg"><span class="spxq_qgpstar spxq_qgpstar<?php echo ($shop["score"]); ?>">&nbsp;</span></span></p>
                <?php else: ?>
                <p>该店铺暂未收到评价</p><?php endif; ?>
                
                <p>电话：<?php echo ($shop['tel']); ?></p>
            </li>
            <li class="eval_li3">
                <p>餐厅地址：<?php echo ($shop["addr"]); ?></p>
                <p>营业时间：<?php echo ($ex["business_time"]); ?></p>
            </li>
            <li class="eval_de">
                <p><span class="eval_num"><?php echo round($shop['score']/10,1);?></span>分</p>
                <p>商家评分</p>
            </li>
            <li class="eval_de">
                <?php if($is_delivery == 1): ?><p class=""><span class="eval_num"><?php echo ($detail["distribution"]); ?></span>分钟<img src="__TMPL__statics/images/tp_19.png"></p>
                <p>平均送餐时间</p>
                <?php else: ?>
                <p class=""><span class="eval_num"><?php echo ($detail["order_ready"]); ?></span>分钟<img src="__TMPL__statics/images/tp_19.png"></p>
                <p>平均上菜时间</p><?php endif; ?>
            </li>
            <li class="eval_sc">
                <a mini="act" href="<?php echo U('shop/favorites',array('shop_id'=>$detail['shop_id']));?>">
                    <p><img src="__TMPL__statics/images/tp_20.png" onclick="on()" id="image"></p>
                    <p>收藏</p>
                </a>
                <p class="app_red">(<?php echo ($shop['fans_num']); ?>)</p>
            </li>
        </ul>
    </div>
  
    <!--店铺介绍-->
   <div class="evalOne" style="margin-top:15px;">
        <ul class="eval_ul">
            <li class="eval_sc2" style="padding-bottom: 10px;">
                <a>商家公告：<?php echo ($detail['intro']); ?></a>
            </li>
        </ul>
    </div>
    
    <div class="app">
        <div class="appraise">
            <ul class="pizz">
                <li class="on"><a href="<?php echo U('ele/shop',array('shop_id'=>$detail['shop_id']));?>">产品分类</a></li>
                <li><a href="<?php echo U('ele/evaluate',array('shop_id'=>$detail['shop_id']));?>">评价</a></li>
            </ul>
        </div>
        <div>
            <ul class="appraise_3 appra">
                <?php if(is_array($cates)): foreach($cates as $key=>$item): ?><li <?php if(($item["cate_id"]) == $cate): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ele/shop',$linkArr,array('cate'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a><code>(<?php echo ($item["num"]); ?>)</code></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".tabNew_sp1 input").click(function () {
                if ($(this).prop('checked') == true) {
                    location.href = $(this).attr('rel');
                } else {
                    location.href = $(this).attr('data');
                }
            });
        });
        </script>

    <div class="between">
        <div class="cen_l left">
            <div class="tabNew newDiv">
                <div class="tabNew_1">
                    <span class="left tabNew_sp1"><label <?php if($is_new == 1): ?>class="on seat-check"<?php else: ?>class="seat-check"<?php endif; ?> ><input type="checkbox" name="is_new"  <?php if(($is_new) == "1"): ?>checked="checked"<?php endif; ?>  rel="<?php echo LinkTo('ele/shop',$linkArr,array('is_new'=>1));?>"  data="<?php echo LinkTo('ele/shop',$linkArr,array('is_new'=>0));?>"/></label> 新品</span>
                    <span class="left tabNew_sp1"><label <?php if($is_hot == 1): ?>class="on seat-check"<?php else: ?>class="seat-check"<?php endif; ?> ><input type="checkbox" name="is_hot"  <?php if(($is_hot) == "1"): ?>checked="checked"<?php endif; ?>  rel="<?php echo LinkTo('ele/shop',$linkArr,array('is_hot'=>1));?>"  data="<?php echo LinkTo('ele/shop',$linkArr,array('is_hot'=>0));?>"/></label> 热门</span>
                    <span class="left tabNew_sp1"><label <?php if($is_tuijian == 1): ?>class="on seat-check"<?php else: ?>class="seat-check"<?php endif; ?> ><input type="checkbox" name="is_tuijian"  <?php if(($is_tuijian) == "1"): ?>checked="checked"<?php endif; ?>  rel="<?php echo LinkTo('ele/shop',$linkArr,array('is_tuijian'=>1));?>"  data="<?php echo LinkTo('ele/shop',$linkArr,array('is_tuijian'=>0));?>"/></label> 招牌</span>

                    <ul class="right">  
                        <li><a href="<?php echo LinkTo('ele/shop',$linkArr,array('order'=>'d'));?>">默认排序</a><span class="tabNew_sp">|</span> </li>
                        <li><a href="<?php echo LinkTo('ele/shop',$linkArr,array('order'=>'n'));?>">销量<img src="__TMPL__statics/images/tp_24.png"></a><span class="tabNew_sp">|</span> </li>
                        <li><a href="<?php echo LinkTo('ele/shop',$linkArr,array('order'=>'p'));?>">价格 <img src="__TMPL__statics/images/tp_25.png"></a></li>
                    </ul>
                </div>
                <div class="tabNew_2">
                    <ul id="food_lists">
                        <?php if(is_array($list)): foreach($list as $key=>$item): ?><li>                           
                                <div class="tabNew_div opimagAdd">
                                    <img src="<?php echo config_img($item['photo']);?>" width="189" height="142">
                                    <a class="jq_addcart opimagAdd_link" id="price_<?php echo ($item['product_id']); ?>" rel="<?php echo ($item["product_id"]); ?>" data="<?php echo ($item["product_name"]); ?>" price="<?php echo round($item['price']/100,2);?>" href="javascript:void(0);">来一份</a>
                                </div>                            
                                <div class="tabNew_div3">
                                    <div class="left tabNew_p">    
                                        <p><?php echo ($item["product_name"]); ?></p>
                                        <p class="shou_num">月售<?php echo ($item["month_num"]); ?>份</p>
                                        <p>$<?php echo round($item['price']/100,2);?>/份</p>
                                    </div>
                                    <div style="padding-top: 50px;" class="right">
                                         <a class="jq_addcart" id="price_<?php echo ($item['product_id']); ?>" rel="<?php echo ($item['product_id']); ?>" data="<?php echo ($item["product_name"]); ?>" price="<?php echo round($item['price']/100,2);?>" goods_img="<?php echo config_img($item['photo']);?>" href="javascript:void(0);"><img src="__TMPL__statics/images/tp_26.png"></a>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
 <div class='x'><?php echo ($page); ?></div>
            </div>

        </div>
        <div id="cart_waimai" class="cart">
            <div class="title">电脑下单不享优惠了哦，优惠手机下单专享</div>
            <form id="forms"  method="post">
                <div class="box">
                    <table width="100%">
                        <tr class="tit">
                            <td width="40%" class="food">菜名</td>
                            <td width="30%">份数</td>
                            <td width="20%">单价</td>
                            <td width="10%">操作</td>
                        </tr>
                    </table>                                
                    <div class="center">
                        <table width="100%" id="food_list">
                            <?php if(!empty($eleproducts)): if(is_array($eleproducts)): foreach($eleproducts as $key=>$item): ?><tr id="jq_tr_<?php echo ($item["product_id"]); ?>">
                                        <td class="food"><?php echo ($item["product_name"]); ?></td>
                                    <?php if($item["shop_id"] != $detail['shop_id']): ?><td class="numinput">
                                            <div class="cuts" rel="<?php echo ($item["product_id"]); ?>">-</div>
                                            <div><input type="text" readonly="readonly" id="jq_num_<?php echo ($item["product_id"]); ?>" name="num[<?php echo ($item["product_id"]); ?>]" value="<?php echo ($item["cart_num"]); ?>"></div>  
                                            <div class="adds" rel="<?php echo ($item["product_id"]); ?>">+</div>
                                        </td>
                                        <?php else: ?>
                                        <td class="numinput">
                                            <div class="cut" rel="<?php echo ($item["product_id"]); ?>">-</div>
                                            <div><input type="text" readonly="readonly" id="jq_num_<?php echo ($item["product_id"]); ?>" name="num[<?php echo ($item["product_id"]); ?>]" value="<?php echo ($item["cart_num"]); ?>"></div>  
                                            <div class="add" rel="<?php echo ($item["product_id"]); ?>">+</div>
                                        </td><?php endif; ?>
                                        <td><?php echo round($item['price']/100,2);?></td>
                                         <td><div class="del" rel="<?php echo ($item["product_id"]); ?>">×</div></td>
                                    </tr><?php endforeach; endif; endif; ?>
                        </table>

                    </div>

                    <?php $cha = round($detail['since_money']/100,2) - round($total_money/100,2); ?>
                    <div class="count">
                        <?php if($is_delivery == 1): if(($shop[is_pei]) == "1"): if($total_money < $detail['since_money']): ?><p><span id="since" style="display: inline-block;">还差$<?php echo ($cha); ?>起送</span><?php else: ?><span id="since" style="display: inline-block;">可以起送</span></p><?php endif; endif; ?>
                        <?php else: ?>
                        <span style="display: inline-block;">请到店消费，如需打包请告知服务员</span><?php endif; ?>
                        <p>共 <span class="c" id="food_count"><?php echo (($cartnum)?($cartnum):'0'); ?></span> 份,总计<span class="c price">$</span>
                            <span class="c price" id="food_money"><?php echo round($total_money/100,2);?></span></p>
                    </div>
                </div>
                <input type="hidden" name="delivery" value="<?php echo ($is_delivery); ?>">
                <div class="btn btns"><input type="button" id="sub" value="立即下单"> <input type="button" id="clearcart" style="background-color:#f3f3f3; color:#444;" value="清空"></div>
            </form>
        </div>

        <script>

            //购物车parseInt
            function getCart() {
                var res = new Array();
                var cart = $.cookie('eleproducts');
                if (cart) {
                    local = cart.split('|');
                    for (a in local) {
                        res.push(local[a]);
                    }
                }
                return res;
            }



            function setCart(product_id, num) {
                var res = getCart();
                var status = false;
                var total = 0;
                var money = parseFloat($("#food_money").html());
                for (a in res) {
                    local = String(res[a]);
                    goo = local.split('_');
                    total += parseInt(goo[1]);
                    if (parseInt(goo[0]) == product_id) {
                        status = true;
                        money += parseFloat($("#price_" + product_id).attr('price')) * parseInt(num);
                        if ((parseInt(goo[1]) + parseInt(num)) < 0) {
                            $("jq_tr_" + product_id).remove();
                        } else {
                            res.splice(a, 1, parseInt(goo[0]) + '_' + (parseInt(goo[1]) + num));
                            $("#jq_num_" + product_id).val(parseInt(goo[1]) + parseInt(num));
                        }
                    }
                }

                if (status == false) {
                    money += parseFloat($("#price_" + product_id).attr('price')) * parseInt(num);
                    res.push(product_id + '_' + num);
                }

                money = money.toFixed(2);
                total += num;
                var since_money = "<?php echo round($detail['since_money']/100,2);?>";
                var cha = (parseFloat(since_money) - money).toFixed(2);
                if (cha >0) {
                    $("#since").html("还差$" + cha + "起送").css("color", "#FE4D3D");
                } else {
                    $("#since").html("可以起送").css("color", "#333");
                }

                $.cookie('eleproducts',  res.join("|"), { path: '/', expires: 7 });
                $("#food_count").html(total);
                $("#food_money").html(money);
            }


            $(document).ready(function () {
                 $(".jq_addcart").click(function () {
                    var product_id = parseInt($(this).attr('rel'));
                    var product_name = $(this).attr('data');
                    var price = parseFloat($(this).attr('price'));
                    //var num = parseInt($("#jq_num_" + $(this).attr('rel')).val());
                    var str = "";
                    str += '<tr id="jq_tr_' + product_id + '">';
                    str += '<td class="food">' + product_name + '</td>';
                    str += '<td class="numinput">';
                    str += '<div class="cut" rel="' + product_id + '">-</div>';
                    str += '<div><input type="text" readonly="readonly" id="jq_num_' + product_id + '" name="num[' + product_id + ']" value="1"></div>';
                    str += '<div class="add" rel="' + product_id + '">+</div></td>';
                    str += '<td>' + price + '</td>';
					
				    str += '<td><div class="del" rel="' + product_id + '">×</div></td>';
					
					//str += '<td>×</td></tr>';
					
					
					
                    if ($("#jq_tr_" + product_id).length <= 0) {
                        $("#food_list").append(str);
                    }
					var top1 = $(this).offset().top;
					var left1 = $(this).offset().left;
					var top2 = $("#food_list").offset().top;
					var left2 = $("#food_list").offset().left;
					$("#smallcarbox img").attr("src",$(this).attr('goods_img')).attr("top1",top1).attr("left1",left1).attr("top2",top2).attr("left2",left2);
					$("#smallcarbox").css({"top":top1+"px","left":left1+"px"}).show().animate({"top":top2+"px","left":left2+"px"},1000,function(){
						$("#smallcarbox").hide();
					});
                    setCart(product_id, 1);
                });


                $("#food_list").on('click', '.cut', function () {
                    var obj = $("#jq_num_" + $(this).attr('rel'));
                    var product_id = $(this).attr('rel');
                    var num = parseInt(obj.val());
                    if (num > 0) {
                        num--;
                        obj.val(num);
                        setCart(product_id, -1);
                    }
                });

                $("#food_list").on('click', '.add', function () {
                    var obj = $("#jq_num_" + $(this).attr('rel'));
                    var product_id = $(this).attr('rel');
                    var num = parseInt(obj.val());
                    num++;
                    obj.val(num);
                    setCart(product_id, 1);
                })
				//删除单个产品购物车
				 $("#food_list").on('click', '.del', function () {
                    var obj = $("#jq_num_" + $(this).attr('rel'));
                    var product_id = $(this).attr('rel');
                    var num = parseInt(obj.val());
			
                    setCart(product_id, -num);
					layer.msg("删除成功");
                    window.location.reload(true);
                })

                $("#sub").click(function () {
                    var forms = $("#forms").serialize();
                    var shop_id = "<?php echo ($shop["shop_id"]); ?>";
                    $.post("<?php echo U('ele/order');?>", forms, function (result) {
                        if (result.status == "login") {
                            ajaxLogin();
                        } else if (result.status == "more") {
                            layer.confirm(result.msg, {
                                area: '200px', //宽高
                                btn: ['是的', '不'], //按钮
                                shade: false //不显示遮罩
                            }, function () {
                                $.post("<?php echo U('ele/delother');?>", {shop_id:shop_id}, function (data) {
                                    if (data.status == "success") {
                                        layer.msg(data.msg);
                                        setTimeout(function () {
                                            location.reload();
                                        }, 1000);
                                    } else {
                                        layer.msg(data.msg);
                                    }
                                }, 'json');
                            });
                            $('.layui-layer-btn0').css('background', '#2fbdaa');
                        } else if (result.status == "success") {
                            $.cookie('eleproducts', null,{ path: '/', expires: 7 });
                            layer.msg(result.msg, function () {
                                setTimeout(function () {
                                    window.location.href = result.url;
                                }, 1000)
                            });
                        } else {
                            layer.msg(result.msg);
                        }
                    }, 'json');
                });

                $("#clearcart").click(function () {
                    $.cookie('eleproducts', null,{ path: '/', expires: 7 });
                    layer.msg("清除成功");
                    window.location.reload(true);
                });
            });
        </script>

    </div>
</div>

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