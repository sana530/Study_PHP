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

 <div class="nav">
    <div class="navList">
        <ul>
        <?php if($ctl == life): ?><li class="navListAll"><span class="navListAllt">分类信息分类</span><div class="shadowy navAll"><div class="menu_fllist2">
    <?php $k = 0; ?>            
    <?php if(is_array($channelmeans)): foreach($channelmeans as $key=>$item): $k++; ?>
        <div <?php if($i == 1): ?>class="item2 bo"<?php else: ?>class="item2"<?php endif; ?> >
            <h3>
                <div class="left ico ico_<?php echo ($k); ?>"></div>
                <div class="wz">
                	<a class="bt1" title="<?php echo ($item); ?>" target="_blank" href="<?php echo U('life/index',array('channel'=>$key));?>"><?php echo msubstr($item,0,4,'utf-8',false);?></a>
                    <div class="bt2">
                        <?php $i2=0; ?>
                        <?php if(is_array($cates)): foreach($cates as $key=>$var): if($var['channel_id'] == $k): $i2++;if($i2 <= 2){ ?>
                            <a title="<?php echo ($var['cate_name']); ?>" target="_blank" href="<?php echo U('life/index',array('channel'=> $k,'cat'=>$var['cate_id']));?>"><?php echo msubstr($var['cate_name'],0,4,'utf-8',false);?></a>
                            <?php } endif; endforeach; endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </h3>
            <div class="menu_flklist2">
                <div class="menu_fl2t"><a title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('life/index',array('channel'=>$key));?>"><?php echo ($item); ?></a></div>
                <div class="menu_fl2nr">
                    <?php if(is_array($cates)): foreach($cates as $key=>$var): if($var['channel_id'] == $k): ?><a title="<?php echo ($var['cate_name']); ?>" target="_blank" href="<?php echo U('life/index',array('channel'=> $k,'cat'=>$var['cate_id']));?>"><?php echo ($var['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
</div>
</div></li>
        <?php elseif($ctl == shop): ?>
        	<li class="navListAll"><span class="navListAllt">全部商家分类</span><div class="shadowy navAll"><div class="menu_fllist2">
    <?php $k = 0; ?>            
   <?php if(is_array($shopcates)): foreach($shopcates as $key=>$item): if(($item["parent_id"]) == "0"): $k++; ?>
        <div <?php if($i == 1): ?>class="item2 bo"<?php else: ?>class="item2"<?php endif; ?> >
            <h3>
                <div class="left ico ico_<?php echo ($k); ?>"></div>
                <div class="wz">
                	<a class="bt1" title="<?php echo ($item); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id']));?>"> <?php echo msubstr($item['cate_name'],0,4,'utf-8',false);?></a>
                    <div class="bt2">
                		 <?php $i=0; ?>
							<?php if(is_array($shopcates)): foreach($shopcates as $key=>$var): if($var['parent_id'] == $item['cate_id'] AND $i < 5): $i++; ?>
									<?php if($i < 4): ?><a title="<?php echo ($var['cate_name']); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$var['cate_id']));?>"><?php echo msubstr($var['cate_name'],0,4,'utf-8',false);?></a><?php endif; endif; endforeach; endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </h3>
            <div class="menu_flklist2">
                <div class="menu_fl2t"><a title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('shop/index',array('cat'=>$item['cate_id']));?>"><?php echo msubstr($item['cate_name'],0,4,'utf-8',false);?></a></div>
                <div class="menu_fl2nr">
                    <?php if(is_array($shopcates)): foreach($shopcates as $key=>$var): if($var['parent_id'] == $item['cate_id']): ?><a href="<?php echo U('shop/index',array('cat'=>$var['cate_id']));?>"><?php echo msubstr($var['cate_name'],0,4,'utf-8',false);?></a><?php endif; endforeach; endif; ?>
                </div>
            </div>
        </div><?php endif; endforeach; endif; ?>
</div>
</div></li>
        <?php else: ?>
       		<li class="navListAll"><span class="navListAllt">全部抢购分类</span><div class="shadowy navAll"><div class="menu_fllist2">
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
</div></li><?php endif; ?>
        	
<?php if(is_array($navigations)): $index = 0; $__LIST__ = $navigations;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($index % 2 );++$index; if(($var["parent_id"] == 0)): ?><li class="navLi"><a <?php if($var["target"] == 1): ?>target="_blank"<?php endif; ?> <?php if($ctl == $var['title']): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="<?php echo ($var['nav_name']); ?>" href="<?php echo ($var['url']); ?>" ><?php echo ($var['nav_name']); ?> <?php if($var['is_new'] == 1): ?><em class="hot"></em><?php endif; ?> </a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<div class="clear"></div>
<script src="__TMPL__statics/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__TMPL__statics/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="__TMPL__statics/js/jquery.pikachoose.min.js"></script>
<script type="text/javascript" language="javascript" src="__PUBLIC__/js/layer/layer.js"></script>
<!--主体内容-->
<div class="content zy_content" style="position: relative; padding-top: 5px;">
	<div class="spxq_xqT spxq_xqT2">
        <ul>
            <li class="jq_spxq_xqBt1 on"><code rel="spxq_xqBt1">商家位置</code><em></em></li>
            <li class="jq_spxq_xqBt2"><code rel="spxq_xqBt2">商家介绍</code><em></em></li>
            <li class="jq_spxq_xqBt3"><code rel="spxq_xqBt3">本店特色菜</code><em></em></li>
            <li class="jq_spxq_xqBt4"><code rel="spxq_xqBt4">店铺环境</code><em></em></li>
            <li class="jq_spxq_xqBt5"><code rel="spxq_xqBt5">设施服务</code><em></em></li>
            <li class="jq_spxq_xqBt6"><code rel="spxq_xqBt6">用户评价</code><em></em></li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            var href = window.location.href;
            var param = href.split('#');
            if (param[1] != undefined && param[1] !=null && param[1] != "") {
                var _targetTop2 = $('#' + param[1]).offset().top-50;//获取位置
                jQuery("html,body").stop(true).animate({scrollTop: _targetTop2}, 300);//跳转
            }
            $(".spxq_xqT2 ul li").click(function () {
                $(".spxq_xqT2 ul li").removeClass("on");
                $(this).addClass("on");
                var _targetTop = $('.' + $(this).find('code').attr('rel')).offset().top - 50;//获取位置
                jQuery("html,body").stop(true).animate({scrollTop: _targetTop}, 300, function(){
                    
                });//跳转
            });
            $(window).scroll(function () {
                $('.spxq_xqT2 ul li').each(function(i){       
                    if($("."+$(this).find('code').attr("rel")).offset().top - $(window).scrollTop() < 50){
                        $(this).addClass('on').siblings().removeClass('on');
                    }
                });
            });            
        });
    </script>

    <div class="spxq_loca"><a href="<?php echo U('index/index');?>" target="_blank">首页</a> > <a href="<?php echo U('booking/index');?>" target="_blank">预订</a> ><?php echo ($detail["shop_name"]); ?></div>
	<!--简介-->
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
    <div class="hotel_detl_box mb20">
    	<div class="hotel_detl_infor_top">
        	<h1 class="left"><?php echo ($detail["shop_name"]); ?></h1>
            <div class="FocAndShare2 right share bdsharebuttonbox" data-tag="share_1">
                <ul>
                    <li class="list"><a mini='act' href="<?php echo U('shop/favorites',array('shop_id'=>$detail['shop_id']));?>">
                        <em class="ico ico_2"></em>收藏商家</a>
                    </li>
                    <li class="list"><a data-cmd="more" href="javascript:void(0);">
                        <em class="ico ico_3"></em>分享</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <script>window._bd_share_config = {share: [{"tag": "share_1", 'bdCustomStyle': '__TMPL__statics/empty.css'}]};
                with (document)
                    0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = '/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
            </script>
        <div class="hotel_detl_infor seat_detl_infor">
            <div class="img_box left" style="overflow: hidden; height: 300px;">
                <!-- 轮播图片 Begin -->
                <div class="pikachoose">
                    <ul id="pikame" class="jcarousel-skin-pika">
                        <?php if(is_array($photos)): foreach($photos as $key=>$item): ?><li><a href="javascript:void(0);" target="_blank"><img src="<?php echo config_img($item['photo']);?>"/></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <script language="javascript">
                    $(document).ready(function (){
                        $("#pikame").PikaChoose({carousel:true, carouselVertical:true});
                    });
                </script>
                <!-- 轮播图片 End -->
            </div>
            <div class="pub_wz">
                <p class="addr"><span class="graycl">饭店地址：</span><?php echo ($detail['addr']); ?><a href="javascript:void(0);" class="see map_icon"><em class="ico"></em>查看地图</a></p>
                <div class="state_box">
                	<ul>
                    	<li>人均：<b class="pointcl"><?php echo ($detail[price]); ?></b>NZD</li>
                        <li class="mar">|</li>
                        <li class="wd blackcl6"><?php echo ($detail["comments"]); ?>人已评价</li>
                        <li class="mar">|</li>
                        <?php $sc = round($detail['score']/$detail['comments'],1);$scs = $sc*20; ?>
                    	<li class=""><span class="spxq_qgpstarBg mr10"><span class="spxq_qgpstar" style="width:<?php echo ($scs); ?>%;"></span></span><span class="fontcl1"><?php echo ($sc); ?></span>分</li>
                    </ul>
                </div>
                <div class="state_box mb10">
                	<ul>
                    	<li class="mr10">口味：<span class="blackcl6 mr10"><?php echo ($detail['kw_score']); ?></span></li>
                        
                        <li class="wd mr10">环境：<span class="blackcl6 mr10"><?php echo ($detail['hj_score']); ?></span></li>
                        
                    	<li class="mr10">服务：<span class="blackcl6 mr10"><?php echo ($detail['fw_score']); ?></span></li>
                    </ul>
                </div>
                <p class="mb10"><span class="graycl">电话：</span><?php echo ($detail["tel"]); ?></p>
                <p class="graycl mb20">特色：<span class="bq">订</span><?php if($coupon_list): ?><span class="bq bq2">券</span><?php endif; ?></p>
                <?php if(!empty($detail['business_time'])): ?><p class="mb20"><span class="graycl">营业时间：</span><?php echo ($detail["business_time"]); ?></p>
                <?php else: ?>
                	<p class="mb20"><span class="graycl">营业时间：</span>未设置</p><?php endif; ?>
                
                
            </div>
            <div class="clear"></div>
        </div>
	</div>
    <!--简介结束-->

    <div class="map_fixed">
        <div class="map_fixed_tit">
                <span>查看地图</span>
         <a href="javascript:;" title="关闭" class="close">×</a> 
        </div>
        <div class="map_fixed_box">
                <div id="allmap2" style="width:700px; height:430px;"></div>
        </div>
        <p class="zhu">注：地图位置坐标仅供参考，具体情况以实际道路标识信息为准</p>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.pub_wz .map_icon').click(function(){
                $('.map_fixed').show();
                var map2 = new google.maps.Map(document.getElementById('allmap2'), {
                    zoom: 17,
                    center: {
                        lng:parseFloat("<?php echo ($detail["lng"]); ?>"),
                        lat:parseFloat("<?php echo ($detail["lat"]); ?>")
                    }
                });
                var marker = new google.maps.Marker({
                    position: {
                        lng:parseFloat("<?php echo ($detail["lng"]); ?>"),
                        lat:parseFloat("<?php echo ($detail["lat"]); ?>")
                    },
                    map: map2
                });
                marker.setAnimation(google.maps.Animation.BOUNCE); //跳动的动画

            })
            $('.map_fixed .close').click(function(){
                    $('.map_fixed').fadeOut(100);
            })
    })
    </script>

    <!--商家优惠-->
    <?php if($coupon_list): ?><div class="seat_detl_youhui mb10">
            <div class="title mb10">商家优惠</div>
            <div>
                <ul>
                    <?php if(is_array($coupon_list)): foreach($coupon_list as $key=>$item): ?><li class="list">
                            <div class="pub_img left"><a target="_blank" href="<?php echo U('coupon/detail',array('coupon_id'=>$item['coupon_id']));?>"><img src="<?php echo config_img($item['photo']);?>" width="160" height="120" /><span class="tag">券</span></div>
                            <div class="pub_wz">
                                <p class="overflow_clear"><a target="_blank" href="<?php echo U('coupon/detail',array('coupon_id'=>$item['coupon_id']));?>"><?php echo ($item["title"]); ?></a></p>
                                <p class="fontcl1">剩余：<?php echo ($item["num"]); ?><span class="right graycl num">已下载<?php echo (($item["downloads"])?($item["downloads"]):'0'); ?>次</span></p>
                                <p>过期时间：<?php echo ($item["expire_date"]); ?></p>
                            </div>
                            <div class="clear"></div>
                        </li><?php endforeach; endif; ?>
                </ul>
                <div class="clear"></div>
            </div>
        </div><?php endif; ?>
    <!--<div class="seat_detl_ding mb20"><span class="left tag">订</span><p>本店支持在线订座，满480元送特调果汁初恋一杯，六月特惠，一定要手机买单</p></div>-->
    <!--商家优惠end-->
	<!--预约表单-->
    <div class="hotel_detl_soso mb20" >
    	<div class="hotel_soso seat_soso">
                <script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
                <div class="int_box time left"><input class="long date left" id="ding_date" type="text" name="date" value="<?php echo ($ding_date); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd',minDate:'%y-%M-{%d}'});" placeholder="日期" /><em class="ico ico_2"></em></div>
                <div class="short_box left">
                    <select class="left" id="ding_time">
                        <option>时间</option>
                        <?php if(is_array($cfg)): $i = 0; $__LIST__ = $cfg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item); ?>" <?php if($item == $ding_time): ?>selected="selected"<?php endif; ?> ><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <select class="left" id="ding_num">
                        <option>人数</option>
                        <?php if(is_array($room)): $i = 0; $__LIST__ = $room;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item); ?>" <?php if($item == $ding_num): ?>selected="selected"<?php endif; ?> ><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="room_box left" id="ding_type">
                	<span rel="0" class="list <?php if($ding_type == 0): ?>on<?php endif; ?>">大厅<em class="ico"></em></span>
                        <span rel="1" class="list <?php if($ding_type == 1): ?>on<?php endif; ?>">包厢<em class="ico"></em></span>
                </div>
                <input type="button" value="立即预约" class="btn right"  />
                <div class="clear"></div>
        </div>
    </div>
    <!--预约表单end-->
    <div class="spxq_xqT">
        <ul>
            <li class="on"><code rel="spxq_xqBt1">商家位置</code><em></em></li>
            <li><code rel="spxq_xqBt2">商家介绍</code><em></em></li>
            <li><code rel="spxq_xqBt3">本店特色菜</code><em></em></li>
            <li><code rel="spxq_xqBt4">店铺环境</code><em></em></li>
            <li><code rel="spxq_xqBt6">设施服务</code><em></em></li>
            <li><code rel="spxq_xqBt5">用户评价</code><em></em></li>
            
        </ul>
    </div>
    <!--地图-->
    <div class="hotel_detl_box mb20 spxq_xqBt1">
        <div class="hotel_detl_tit">商家位置</div>
        <div class="hotel_detl_nr">
            <div class="hotel_map">
                <div class="map_box left" id="allmap" style="width:1160px; height:430px;"></div>
                <div class="clear"></div>
            </div>
        </div>
        <script type="text/javascript">

            //google map
            function initMap() {
                var map = new google.maps.Map(document.getElementById('allmap'), {
                    zoom: 14,
                    center: {
                        lng:parseFloat("<?php echo ($detail["lng"]); ?>"),
                        lat:parseFloat("<?php echo ($detail["lat"]); ?>")
                    }
                });
                var marker = new google.maps.Marker({
                    position: {
                        lng:parseFloat("<?php echo ($detail["lng"]); ?>"),
                        lat:parseFloat("<?php echo ($detail["lat"]); ?>")
                    },
                    map: map
                });
                marker.setAnimation(google.maps.Animation.BOUNCE); //跳动的动画
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&callback=initMap"></script>

    </div>
    <!--地图结束-->
    <div class="hotel_detl_box mb20 spxq_xqBt2">
        <div class="hotel_detl_tit">商家介绍</div>
        <div class="hotel_detl_nr"><?php echo ($detail["details"]); ?></div>
    </div>
    
    <div class="hotel_detl_box mb20 spxq_xqBt3">
        <div class="hotel_detl_tit">本店特色菜</div>
        <div class="hotel_detl_nr">
        	<div class="seat-tstj">
                    <?php if(is_array($menucates)): foreach($menucates as $key=>$item): ?><a href="javascript:void(0);"><?php echo ($item["cate_name"]); ?><span></span></a><?php endforeach; endif; ?>
                    </div>
            <div class="seat-tj-more"><a href="<?php echo U('booking/menu',array('shop_id'=>$detail['shop_id']));?>">更多</a></div>
            <div class="seat-sjtj-img">
                <ul>
                    <?php if(is_array($menu_list)): foreach($menu_list as $key=>$item): ?><li>
                            <div class="seat-sjtj-img-li">
                                <a href="javascript:void(0);"><div class="img"><img src="<?php echo config_img($item['photo']);?>" width="91" height="67"  />
                                    <div class="price">$<?php echo round($item['ding_price']/100,1);?></div>
                                </div>
                                <p class="rap"><?php echo ($item["menu_name"]); ?></p></a>
                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="hotel_detl_box mb20 spxq_xqBt4">
        <div class="hotel_detl_tit">店铺环境</div>
        <div class="hotel_detl_nr"></div>
    </div>
    <div class="hotel_detl_box mb20 spxq_xqBt5">
        <div class="hotel_detl_tit">设施服务</div>
        <div class="hotel_detl_nr">
        	<div class="hotel_serve">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th width="76">网络设施</th>
                        <td>
                        	<div class="list_box">
                                <ul>
                                    <li class="list">
                                    	<img src="__TMPL__statics/images/hotel/serIco/serIco1.png" />
                                        <p>免费wifi</p>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th width="76">停车场</th>
                        <td>
                        	<div class="list_box">
                                <ul>
                                    <li class="list">
                                    	<img src="__TMPL__statics/images/hotel/serIco/serIco2.png" />
                                        <p>提供<span class="fontcl1">收费</span>停车位</p>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
    
    <div class="hotel_detl_box mb20 spxq_xqBt6">
        <div class="hotel_detl_tit">用户评价<a href="<?php echo U('member/booking/index');?>" class="right hotel_evlt">我也要评价<em class="ico"></em></a></div>
        <div class="hotel_detl_nr">
        	<div class="sjxq_tab">
                <ul>
                    <li class="sjxq_tabLi <?php if(!$have_photo): ?>on<?php endif; ?>"><a href="<?php echo U('booking/detail',array('shop_id'=>$detail['shop_id']));?>">全部</a></li>
                    <li class="sjxq_tabLi <?php if(($have_photo) == "1"): ?>on<?php endif; ?> "><a href="<?php echo U('booking/detail',array('shop_id'=>$detail['shop_id'],'have_photo'=>1));?>">晒图评价</a></li>
                </ul>
            </div>
            <div class="spxq_pjListBox">
                <ul>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li class="spxq_pjList">
                            <div class="left spxq_pjList_l">
                                <div class="spxq_pjTx"><img src="<?php echo config_img($users[$var['user_id']]['face']);?>" width="75" height="75" /></div>
                                <p class="spxq_pjYh"><?php echo ($users[$var['user_id']]['nickname']); ?></p>
                            </div>
                            <div class="left spxq_pjList_r sjxq_pjList_r">
                                <div><span class="spxq_qgpstarBg"><span class="spxq_qgpstar spxq_qgpstar<?php echo round($var['score']*10,1);?>">&nbsp;</span></span><span class="spxq_pjTime"></span>
                                <!--<?php echo (date('Y-m-d H:i',$var["create_time"])); ?>-->
                                </div>
                                <p class="spxq_pjP"><?php echo ($var["contents"]); ?></p>
                                <?php if(!empty($var['reply'])): ?><p class="spxq_pjP"><?php echo ($var["reply"]); ?></p><?php endif; ?>
                                <ul class="spxq_pjUl">
                                    <?php if(is_array($pics)): foreach($pics as $key=>$pic): if($pic['order_id'] == $var['order_id']): ?><li class="spxq_pjLi"><a href="javascript:void(0);" rel="<?php echo config_img($pic['pic']);?>" ><img src="<?php echo config_img($pic['pic']);?>" width="100" height="100" /></a></li><?php endif; endforeach; endif; ?>
                                </ul>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="x"><?php echo ($page); ?></div>
            </div>
        </div>
    </div>
   
<!--主体内容结束-->
<!--立即预约弹出层-->
<div class="seat_yuyue_mask">
	<div class="cont">
    	<div class="top">立即预约<a href="javascript:void(0);" class="close right">x</a></div>
        <div class="title"><?php echo ($detail["shop_name"]); if($deposit > 0): ?>(需支付定金<?php echo ($deposit); ?>NZD)<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($detail["orders"]); ?><small class="graycl">人已定！</small></div>
        <div class="btn_box">
            <a target="_blank" href="<?php echo U('booking/menu',array('shop_id'=>$detail['shop_id']));?>" class="btn left" >在线点菜</a>
            <input type="button" id="order_btn" class="btn btn2 right" value="直接下单" />
        </div>
        <div class="shuru">
            <input type="text" id="note" placeholder="备注：如您的口味需求，请填写，店小二会尽量安排" />
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".room_box .list").click(function(){
            $(".room_box .list").removeClass('on');
            $(this).addClass('on');
        })
        
        $(".seat_soso .btn").click(function(){
            $(".seat_yuyue_mask").show();
        });
        $(".seat_yuyue_mask .close").click(function(){
            $(".seat_yuyue_mask").hide();
        });
        $("#order_btn").click(function(){
            var note = $("#note").val();
            var ding_date = $("#ding_date").val();
            var ding_time = $("#ding_time option:selected").val();
            var ding_num = $("#ding_num option:selected").val();
            var ding_type = $("#ding_type .list.on").attr('rel');
            SetCookie('note',note);
            SetCookie('ding_date',ding_date);
            SetCookie('ding_time',ding_time);
            SetCookie('ding_num',ding_num);
            SetCookie('ding_type',ding_type);
            setTimeout(function () {
               window.location.href = "<?php echo U('booking/order',array('shop_id'=>$detail['shop_id']));?>";    
            }, 1000);
        })
        
        function SetCookie(name, value)
        {
                var Days = 30; //此 cookie 将被保存 30天
                var exp = new Date();    //new Date("December 31, 9998");
                exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
                document.cookie = name + "=" + value + ";expires=" + exp.toGMTString() +";path=/";
            }
    });
</script>
<!--立即预约弹出层end-->
<div class="mask_bg mask_spxq_pjLi_img_mask">
	<div class="mask_spxq_pjLi_img"><img src="" width="300" height="300" /></div>
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