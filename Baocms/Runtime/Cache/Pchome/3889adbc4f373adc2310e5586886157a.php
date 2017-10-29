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
<script type="text/javascript" src="__TMPL__statics/js/jquery.qrcode.min.js"></script><!--二维码-->
<style>
/*CSS重写*/
.zy_content {padding-top: 5px;}
.qg-sp-listBox {padding: 0px;}
.goods_sjcpDwBox {height: 230px;}
.nearbuy_cpLi {width: 237px;padding-right: 10px;padding-bottom: 10px;}
.qg-sp-liBox .img {width: 234px;height:234px;}
.qg-sp-liBox1 .img {width:187px;height:187px;}
.sy_sjcpwx canvas{width: 102px;height: 102px;margin: 0px auto;padding: 10px;background: #fff;}
.sy_sjcpBq span { margin-right: 2px;}
.sy_hottjJg .left em{ margin-left:10px; font-size:12px;}
</style>
<div class="content zy_content">
    <div class="left zy_content_l">
        <div class="goods_flBox" id="shopping">
            <ul>
                <?php if(!empty($selArr)): ?><li class="goods_flListLf">
                        <ul>
                            <li class="goods_flLi"><a class="goods_flLiA" href="<?php echo U('mall/index');?>">全部</a></li>
                            <li class="goods_flLi goods_flLix">&gt;</li>
                            <script>
                                $(function () {
                                    $('.goods_flLiLf .goods_flLiA').hover(function () {
                                        $(this).parent().find('.goods_flLiLfk').show();
                                        $(this).addClass("on");
                                    });
                                    $('.goods_flLiLf').hover(function () {
                                    }, function () {
                                        $(this).find('.goods_flLiLfk').hide();
                                        $(this).children(".goods_flLiA").removeClass("on");
                                    });
                                    $('.goods_flLiFl').hover(function () {
                                        $(this).parent().find('.goods_flLiLfk').hide();
                                        $(this).parent().find(".goods_flLiA").removeClass("on");
                                    });
                                });
                            </script>
                            <?php if(!empty($cat)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat));?>"><?php echo ($goodscate[$cat]['cate_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>0));?>" class="goods_flLiFl">ｘ</a>
                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>0));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == "0"): ?>|<a <?php if(($item["cate_id"]) == $cat): ?>class="on"<?php endif; ?>  href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$item['cate_id'],'cate_id'=>0));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li>
                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>
                            <?php if(!empty($cate_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cate_id'=>$cate_id));?>"><?php echo ($goodscate[$cate_id]['cate_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cate_id'=>0));?>" class="goods_flLiFl">ｘ</a>
                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cate_id'=>0));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?>|<a <?php if(($item["cate_id"]) == $cate_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cate_id'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li>
                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>
                            <?php if(!empty($area_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id));?>"><?php echo ($areas[$area_id]['area_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>0,'business'=>0));?>" class="goods_flLiFl">ｘ</a>
                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>0));?>">全部</a>
                                        <?php if(is_array($areas)): foreach($areas as $key=>$item): if(($item["city_id"]) == $city_id): ?>|<a <?php if(($item["area_id"]) == $area_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$item['area_id'],'business'=>0));?>"><?php echo ($areas[$item['area_id']]['area_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li>
                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>
                            <?php if(!empty($business_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>$business_id));?>"><?php echo ($bizs[$business_id]['business_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>0));?>" class="goods_flLiFl">ｘ</a>
                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>0));?>">全部</a>
                                        <?php if(is_array($bizs)): foreach($bizs as $key=>$item): if(($item["area_id"]) == $area_id): ?>|<a <?php if(($item["business_id"]) == $business_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>$item['business_id']));?>"><?php echo ($bizs[$item['business_id']]['business_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li>
                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>
                        </ul>
                    </li><?php endif; ?>
                <?php if(empty($cat)): ?><li class="goods_flList">
                        <div class="left goods_flList_l">分类1：</div>
                        <div class="left goods_flList_r">
                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>
                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == "0"): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                        </div>
                    </li><?php endif; ?>
                <?php if(!empty($cat) and empty($cate_id)): ?><li class="goods_flList">
                        <div class="left goods_flList_l">分类2：</div>
                        <div class="left goods_flList_r">
                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat));?>">全部</a>
                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cate_id'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>
                        </div>
                    </li><?php endif; ?>
                <?php if(empty($area_id)): ?><li class="goods_flList">
                        <div class="left goods_flList_l">地区：</div>
                        <div class="left goods_flList_r">
                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>
                            <?php if(is_array($areas)): foreach($areas as $key=>$item): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$item['area_id']));?>"><?php echo ($item["area_name"]); ?></a><?php endforeach; endif; ?>
                        </div>
                    </li><?php endif; ?>
                <?php if(!empty($area_id) and empty($business_id)): ?><li class="goods_flList">
                        <div class="left goods_flList_l">商圈：</div>
                        <div class="left goods_flList_r">
                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>
                            <?php if(is_array($bizs)): foreach($bizs as $key=>$item): if(($item["area_id"]) == $area_id): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('business'=>$item['business_id']));?>"><?php echo ($item["business_name"]); ?></a><?php endif; endforeach; endif; ?>
                        </div>
                    </li><?php endif; ?>
            </ul>
        </div>
        <div class="nearbuy_sxk">
            <ul>
                <li class="nearbuy_sxkLi <?php if(empty($order) or $order == d): ?>on<?php endif; ?> "><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'d'));?>">默认排序</a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "s"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'s'));?>">销量排序<em class="em_up"></em></a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "p"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'p'));?>">价格排序<em></em></a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "v"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'v'));?>">人气排序<em class="em_up"></em></a></li>

            </ul>
        </div>
        <div class="qg-sp-listBox">
        <div class="nearbuy_cpList">
            <ul>
             <?php if(is_array($list)): foreach($list as $key=>$item): ?><li class="nearbuy_cpLi">
                        <div class="sy_sjcpLi nearbuy_cpLik">
                            <a href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="<?php echo config_img($item['photo']);?>" width="225" height="225"></a>
                            <p class="sy_hottjbt"><?php echo bao_msubstr($item['title'],0,18,false);?></p>
                            <p class="sy_hottjp"><?php echo bao_msubstr($item['intro'],0,22,false);?></p>
                            <p class="sy_hottjJg">
                                <span class="left">$<?php echo ($item["mall_price"]); ?>
                                
                                <?php if(empty($MEMBER)): ?><em class="login_kuaijie" style=" cursor:pointer">代理价？</em>
                                <?php elseif(!empty($MEMBER['is_agent'])): ?>
                                    <em>代理价：$<?php echo ($item["is_agent_price"]); ?></em><?php endif; ?>
                                
                                <del>$<?php echo ($item["price"]); ?></del></span>
                                <span class="right">已售<?php echo ($item["sold_num"]); ?></span>
                            </p>
                            <hr style=" border:none 0px; border-bottom: 1px solid #e0e0e0; margin-top:6px;">
                            <p class="nearbuy_cpLiPf">
                            <?php if(!empty($item['use_integral'])): ?><span class="left">可使用积分:<a class="spxq_qgsnum"><?php echo ($item['use_integral']); ?> </a></span>
                            <?php else: ?>
                            <span class="left">关注度: &nbsp;<?php echo ($item['views']); ?></span><?php endif; ?>
                            <span class="right">
                            <a class="sy_hottjJd" target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>">立即购买</a>
                            </span>
                            </p>
                            <div class="sy_sjcpBq">
                            <?php if($item['is_vs4'] == 1): ?><span class="sy_sjcpBq1">速达</span><?php endif; ?>
                            <?php if($item['is_vs5'] == 1): ?><span class="sy_sjcpBq2">包邮</span><?php endif; ?>
                            <?php if($item['is_vs2'] == 1): ?><span class="sy_sjcpBq3">正品</span><?php endif; ?>
                            <?php if($item['is_vs6'] == 1): ?><span class="sy_sjcpBq4">到付</span><?php endif; ?>
                            </div>
                            <div class="sy_sjcpLiDw">
                                <div class="sy_sjcpDwBox goods_sjcpDwBox">
                               <script type="text/javascript">
                                $(function () {
                                    var str = "<?php echo ($host); echo u('mobile/mall/detail',array('goods_id'=>$item['goods_id']));?>";
                                    $("#code_<?php echo ($item["goods_id"]); ?>").empty();
                                    $('#code_<?php echo ($item["goods_id"]); ?>').qrcode(str);
                                })
                               </script>
                               <div class="sy_sjcpDwNr" style="padding-top:30px;">
                                <?php if(!empty($item['mobile_fan'])): ?><p>手机下单立减 <span style="color:#F00; font-size:16px; font-weight:bold"><?php echo ($item['mobile_fan']); ?></span>NZD</p>
                                <?php else: ?>
                                <p>扫描二维码购买</p><?php endif; ?>
                          <a href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><div class="sy_sjcpwx"  id="code_<?php echo ($item["goods_id"]); ?>"></div></a>
                                    </div>
                                    <div class="sy_sjcpDwBg">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </li><?php endforeach; endif; ?>    
              </ul>
        </div>
        </div>
        <div class="x">
            <?php echo ($page); ?>
        </div>
    </div>
    <div class="right zy_content_r">
        <div class="qg-sp-tab-box">
            <script>
                $(function () {
                    $(".qg-sp-tab span").each(function (e) {
                        $(this).click(function () {
                            $(this).parent().find("span").removeClass("on");
                            $(this).addClass("on");
                            $(".qg-sp-tab-nr .qg-sp-tab-nrList").each(function (i) {
                                if (e == i) {
                                    $(this).parent().find(".qg-sp-tab-nrList").hide();
                                    $(this).show();
                                }
                                else {
                                    $(this).hide();
                                }
                            });
                        });
                        $(".qg-sp-tab span").eq(0).click();
                    });
                });
            </script>
            <div class="qg-sp-tab">
                <span class="on">人气排行</span>
                <span>销售排行</span>
            </div>
            <div class="qg-sp-tab-nr">
                <div class="qg-sp-tab-nrList">
                    <ul>
                        <?php  $cache = cache(array('type'=>'File','expire'=> 3600)); $token = md5("Goods,views desc,end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}',3600,0,6,,"); if(!$items= $cache->get($token)){ $items = D("Goods")->where("end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}'")->order("views desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li>
                                <div class="qg-sp-liBox1">
                                    <div class="img"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="<?php echo config_img($item['photo']);?>"  width="187" height="187"  /></a></div>
                                    <p class="rap"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><?php echo bao_msubstr($item['title'],0,12,false);?></a></p>
                                    <div class="sc_cpList_gj">
                                        <span class="left">
                                            <span class="sc_cpList_gjj">
                                                <i>$</i><?php echo round($item['mall_price']/100,2);?> &nbsp; <del><?php echo round($item['price']/100,2);?></del>
                                            </span>
                                    </span>
                                    </div>
                                </div>
                            </li> <?php endforeach; ?>
                    </ul>
                </div>
                <div class="qg-sp-tab-nrList">
                    <ul>
                        <?php  $cache = cache(array('type'=>'File','expire'=> 3600)); $token = md5("Goods,sold_num desc,end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}',3600,0,6,,"); if(!$items= $cache->get($token)){ $items = D("Goods")->where("end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}'")->order("sold_num desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li>
                                <div class="qg-sp-liBox1">
                                    <div class="img"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="<?php echo config_img($item['photo']);?>" width="187" height="187" /></a></div>
                                    <p class="rap"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><?php echo bao_msubstr($item['title'],0,12,false);?></a></p>
                                      <div class="sc_cpList_gj">
                                        <span class="left">
                                            <span class="sc_cpList_gjj">
                                                <i>$</i><?php echo round($item['mall_price']/100,2);?> &nbsp; <del><?php echo round($item['price']/100,2);?></del>
                                            </span>
                                    </span>
                                    </div>
                                </div>
                            </li> <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
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