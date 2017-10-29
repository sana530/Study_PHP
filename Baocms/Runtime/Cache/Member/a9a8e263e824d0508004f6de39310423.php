<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>用户中心</title>        
        <link href="__TMPL__statics/css/newstyle.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/intel.css" rel="stylesheet" type="text/css" />
        <link href="themes/default/statics/css/style.css" rel="stylesheet" type="text/css" />
        <script src="__TMPL__statics/js/jquery.js"></script>
        <script> var BAO_PUBLIC = '__PUBLIC__';
            var BAO_ROOT = '__ROOT__';</script>
        <script src="__PUBLIC__/js/web.js"></script>
        <script src="__PUBLIC__/js/layer/layer.js"></script>
        <script src="__TMPL__statics/js/intel.js"></script>
    </head>
<style>

/*背景*/

.navListAll, .searchBox .submit, .sy_hottjJd, .cityInfor_nr .cityInfor_list .nr:hover .link .img, .topBackOn, .goods_flListA.on, .nearbuy_hotNum, .sy_sjcpBq1, .spxq_qgjjKk, .spxq_xqT li.on code, .hdxq_ljct, .qg-sp-tab span.on, .dcsy_topLi:hover .dcsy_topLiTu, .sjsy_ljzx, .indexnav_li ul li a.on, .x .current{ background-color: <?php echo ($color); ?>!important; }



/*文字颜色*/

.sy_FloorBtz .bt, .fontcl3, .topOne .nr .left a.on, .liOne:hover .liOneA, .spxq_qgsnum, .nearbuy_zjClear, .zixunList .wz .bt a, .spxq_pjAn, .sjsy_newsList h3, .locaTopDl a, .liOne .list ul li a:hover, .spxq_xqMapT, .spxq_table td a, .hdsy_Licj_l, .hdsy_Libms, .zixunDetail h1, .zixun_hot h3, .liveTab li,.shfw_xq_new li, .jfsy_jffzT, .jfsy_wellcome .blue, .liOne_visit_pull .empty a, .maincl{color: <?php echo ($color); ?>!important; }

/*边框top上*/

.sy_FloorBt, .qg-sp-tab span.on, .zixun_hot h3, .liveTab, .liOne_visit .liOne_visit_pull{border-bottom: 1px solid <?php echo ($color); ?>!important;}

/*边框*/

.spxq_qgjjKk, .hdxq_tgList, .liOne_visit .liOne_visit_pull, .x .current{border: 1px solid <?php echo ($color); ?>!important;}





/*特殊的*/

.liOne:hover .liOneA {color: <?php echo ($color); ?>; border-left: 1px solid <?php echo ($color); ?>;border-right: 1px solid <?php echo ($color); ?>!important;}

.changeCity_link:after {border-bottom: 2px solid <?php echo ($color); ?>!important;border-right: 2px solid <?php echo ($color); ?>!important;}

.spxq_xqT {border-bottom: 1px solid <?php echo ($color); ?>!important;}

.hdsy_tabLi.on a {border-top: 2px solid <?php echo ($color); ?>!important;}

.spxq_slider .flex-control-thumbs li .flex-active {border-color: <?php echo ($color); ?> !important;}

.zixunRelet { border-top: 2px solid <?php echo ($color); ?>!important;}

.sy_sjcpLi:hover {border-color: <?php echo ($color); ?>!important;}

.liOne_visit .liOne_visit_pull {border: 1px solid <?php echo ($color); ?>!important;}
	</style>
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

        <div class="topTwo_cart_box right" id='cart'><em class="ico"></em>购物车<span id="num" class="num"><?php echo (($cartnum)?($cartnum):'0'); ?></span>
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
        <?php if($ctl == life): ?><li class="navListAll"><span class="navListAllt">分类信息分类</span><div class="shadowy navAll"></div></li>
        <?php elseif($ctl == shop): ?>
        	<li class="navListAll"><span class="navListAllt">全部商家分类</span><div class="shadowy navAll"></div></li>
        <?php else: ?>
       		<li class="navListAll"><span class="navListAllt">全部抢购分类</span><div class="shadowy navAll"></div></li><?php endif; ?>
        	
<?php if(is_array($navigations)): $index = 0; $__LIST__ = $navigations;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($index % 2 );++$index; if(($var["parent_id"] == 0)): ?><li class="navLi"><a <?php if($var["target"] == 1): ?>target="_blank"<?php endif; ?> <?php if($ctl == $var['title']): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="<?php echo ($var['nav_name']); ?>" href="<?php echo ($var['url']); ?>" ><?php echo ($var['nav_name']); ?> <?php if($var['is_new'] == 1): ?><em class="hot"></em><?php endif; ?> </a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<div class="clear"></div>
            <script type="text/javascript">
                $(document).ready(function () {
                $('#selectBoxInput').on("mouseleave", function () {
                    $('.selectList').stop().hide();
                }).on("mouseenter", function(){
                    $('.selectList').stop().slideDown();
                });
                $('.selectList').on("mouseleave", function(){
                    $(this).stop().hide();
                }).on("mouseenter", function(){
                    $(this).stop().show();
                });
                $(".selectList li a").click(function () {
                    $("#selectBoxInput").html($(this).html());
                    $('.selectList').hide();
                });
                    $('.menu_fllist2 > .item2').hover(function () {
                        $(this).addClass('on');
                        $(this).children('.menu_flklist2').css('display', 'block');
                    }, function () {
                        $(this).removeClass('on');
                        $(this).children('.menu_flklist2').css('display', 'none');
                    });//导航菜单js
                });
            </script>
            <div class="main_c">
            <div class="w-user-info">
                    <div class="user-name-wrap fl">
                      <span class="user-name">您好：<?php echo ($MEMBER['nickname']); ?></span>
                      <span class="account-info-con">等级：VIP<?php echo ($MEMBER['rank_id']); ?>&nbsp;&nbsp;</span>
                      <?php if(!empty($MEMBER['mobile'])): ?><span class="tit">手机已绑定</span>
                      <span class="account-info-con"><?php echo ($MEMBER["mobile"]); ?></span>
                      <span class="account-info-btn"><a class="link" href="<?php echo U('set/mobile2');?>" id="j-uc-bind-phone">修改</a></span>
                      <?php else: ?>
                      <span class="account-info-con">未绑定手机</span>
                      <span class="account-info-btn"><a class="link" href="<?php echo U('set/mobile2');?>" id="j-uc-bind-phone">绑定</a></span><?php endif; ?>
                    </div>
                <ul class="user-money-wrap fr">
                    <li>
                        <span class="tit">我的余额</span>
                        <span class="org"> &nbsp;$<?php echo round($MEMBER['money']/100,2);?> 
                        	<a class="user_cz myInfor_sx myInfor_sx_fk" href="<?php echo U('money/money');?>"> 余额充值</a>
                            <a class="user_cz myInfor_sx myInfor_sx_fk" href="<?php echo U('money/transfer');?>"> 转账给好友</a>
                        </span>
                    </li>

                  
                    <?php if($MEMBER['money_negative'] > 0): ?><li>
                        <span class="tit">我的额度</span>
                        <span class="org"> &nbsp;$<?php echo round($MEMBER['money_negative']/100,2);?> 
                    </li>
                    <?php else: ?>
                        <li>
                            <span class="tit">我的额度 &nbsp;</span>
                            <a class="user_cz myInfor_sx myInfor_sx_fk" href="<?php echo U('/mcenter/credit');?>">申请额度</a>
                        </li><?php endif; ?>


                    
					<?php if(!empty($shop_gold)): ?><li>
                        <span class="tit">商户资金</span>
                        <span class="org"> &nbsp;$<?php echo round($MEMBER['gold']/100,2);?></span>
                    </li><?php endif; ?>
                    <li class="last">
                        <span class="tit">我的积分</span>
                        <span class="org">&nbsp;<?php echo ($MEMBER['integral']); ?>
                         <?php if($CONFIG[integral][integral_exchange] == 1): ?>&nbsp;
                            	<a class="user_cz myInfor_sx myInfor_sx_fk" href="<?php echo U('money/exchange');?>">兑换</a><?php endif; ?>
                        </span>
                    </li>
                </ul>
            </div>

                <div class="content_left">
                    <ul>
                        <li class="index_nav">
                            <h3 style="border-top:none;">订单中心</h3>
                            <div class="indexnav_li">
                                <ul>
                                    <li><a <?php if($ctl == 'order' or $ctl == 'ele' ): ?>class="on"<?php endif; ?> href="<?php echo U('order/index');?>">我的订单</a></li>
                                    <li><a <?php if($ctl == 'index' ): ?>class="on"<?php endif; ?> href="<?php echo U('index/index');?>">我的抢购券</a></li>
                                    <li><a <?php if($ctl == 'coupon' ): ?>class="on"<?php endif; ?> href="<?php echo U('coupon/index');?>">优惠券下载</a></li>
                                    <li><a <?php if($ctl == 'yuyue' ): ?>class="on"<?php endif; ?> href="<?php echo U('yuyue/index');?>">我的预约</a></li>
									<?php if($open_lifeservice == '1' ): ?><li><a <?php if($ctl == 'mylifeservice' ): ?>class="on"<?php endif; ?> href="<?php echo U('appoint/index');?>">我的家政</a></li><?php endif; ?>
									<?php if($open_jifen == '1' ): ?><li><a <?php if($ctl == 'exchange' ): ?>class="on"<?php endif; ?> href="<?php echo U('exchange/index');?>">我的兑换</a></li><?php endif; ?>
                                    <li><a <?php if($ctl == 'ding' ): ?>class="on"<?php endif; ?> href="<?php echo U('booking/index');?>">我的订座</a></li>
                                    <?php if($open_cloud == '1' ): ?><li><a <?php if($ctl == 'cloud' ): ?>class="on"<?php endif; ?> href="<?php echo U('cloud/index');?>">我的一元云购</a></li><?php endif; ?>
                                    <li><a <?php if($ctl == 'hotel' ): ?>class="on"<?php endif; ?> href="<?php echo U('hotel/index');?>">我的预订酒店</a></li>
                                    <li><a <?php if($ctl == 'farm' ): ?>class="on"<?php endif; ?> href="<?php echo U('farm/index');?>">我的农家乐</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="index_nav">



                            <h3>会员服务</h3>



                            <div class="indexnav_li">



                                <ul>







                                    <li><a <?php if($ctl == 'money' ): ?>class="on"<?php endif; ?> href="<?php echo U('money/money');?>">充值管理</a></li>

                                    <?php if($open_huodong == '1' ): ?><li><a <?php if($ctl == 'myactivity' ): ?>class="on"<?php endif; ?> href="<?php echo U('myactivity/index');?>">我的活动</a></li><?php endif; ?>

									<?php if($open_life == '1' ): ?><li><a <?php if($ctl == 'life' ): ?>class="on"<?php endif; ?> href="<?php echo U('life/index');?>">我的分类信息</a></li><?php endif; ?>

                                    <li><a <?php if($ctl == 'message' ): ?>class="on"<?php endif; ?> href="<?php echo U('message/index');?>">我的消息</a></li>



                                    <li><a <?php if($ctl == 'dianping' ): ?>class="on"<?php endif; ?> href="<?php echo U('dianping/index');?>">我的点评</a></li>



                                    <li><a <?php if($ctl == 'favorites' ): ?>class="on"<?php endif; ?> href="<?php echo U('favorites/index');?>">我的关注</a></li>



                                    <li><a <?php if($ctl == 'recognition' ): ?>class="on"<?php endif; ?> href="<?php echo U('recognition/index');?>">我的认领商家</a></li>

                                    <?php if($open_express == '1' ): ?><li><a <?php if($ctl == 'express' ): ?>class="on"<?php endif; ?> href="<?php echo U('express/index');?>">我的快递</a></li><?php endif; ?>

                                </ul>



                            </div>



                        </li>







                        <li class="index_nav">



                            <h3>账户中心</h3>



                            <div class="indexnav_li">



                                <ul>







                                    <li><a <?php if($ctl == 'cash' ): ?>class="on"<?php endif; ?> href="<?php echo U('cash/index');?>">申请提现</a></li>



                                    <li><a <?php if($ctl == 'set' ): ?>class="on"<?php endif; ?> href="<?php echo U('set/base');?>">账户设置</a></li>



                                    <li><a <?php if($ctl == 'address' ): ?>class="on"<?php endif; ?> href="<?php echo U('address/index');?>">收货地址</a></li>



                                    <li><a <?php if($ctl == 'logs' ): ?>class="on"<?php endif; ?> href="<?php echo U('logs/integral');?>">日志管理</a></li>







                                </ul>



                            </div>



                        </li>





                  <?php if($distribution == '1' ): ?><li class="index_nav">

                            <h3>分销中心</h3>

                            <div class="indexnav_li">

                                <ul>

                                    <li><a <?php if($act == 'profit' ): ?>class="on"<?php endif; ?> href="<?php echo U('distribution/profit', array('status' => 1));?>">收益统计</a></li>

                                    <li><a <?php if($act == 'subordinate' ): ?>class="on"<?php endif; ?> href="<?php echo U('distribution/subordinate');?>">我的下级</a></li>

                                    <li><a <?php if($act == 'superior' ): ?>class="on"<?php endif; ?> href="<?php echo U('distribution/superior');?>">我的上级</a></li>

                                    <li><a <?php if($act == 'qrcode' ): ?>class="on"<?php endif; ?> href="<?php echo U('distribution/qrcode');?>">二维码</a></li>

                                    <li><a <?php if($act == 'poster' ): ?>class="on"<?php endif; ?> href="<?php echo U('distribution/poster');?>">我的海报</a></li>

                                </ul>

                            </div>

                        </li><?php endif; ?>  

                        

                    </ul>



                </div>








<div class="content_right">
    <div class="tgdd">
        <div class="tgdd_t">
            <ul>
                <li <?php if($ctl == 'order' and ($act == 'index' or $act == 'noindex')): ?>class="on"<?php endif; ?> ><a href="<?php echo U('order/index');?>">抢购订单</a></li>
 
                <li <?php if($ctl == 'ele'): ?>class="on"<?php endif; ?> ><a href="<?php echo U('ele/index');?>">订餐订单</a></li>

                <?php if($open_mall == '1' ): ?><li <?php if($ctl == 'order' and $act == 'goods'): ?>class="on"<?php endif; ?> ><a href="<?php echo U('order/goods');?>">商城订单</a></li><?php endif; ?>
            </ul>
        </div>
        <div class="tgdd_t">
            <script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
            <form action="<?php echo U('order/goods');?>" method="post">
                <div class="search_form"> 
                    <span class="search_form_wz">开始时间</span><input class="search_form_time" type="text" name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  />
                    <span class="search_form_wz">结束时间</span><input class="search_form_time" type="text" name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});" />
                    
                <span class="search_form_wz">状态</span>
                <select name="st" class="search_form_zt">
                    <option value="999">请选择</option>
                    <option <?php if(($st) == "0"): ?>selected="selected"<?php endif; ?>  value="0">等待付款</option>
                    <option <?php if(($st) == "1"): ?>selected="selected"<?php endif; ?>  value="1">等待发货</option>
                    <option <?php if(($st) == "2"): ?>selected="selected"<?php endif; ?>  value="2">仓库已捡货</option>
                    <option <?php if(($st) == "3"): ?>selected="selected"<?php endif; ?>  value="3">已收货</option>
                    <option <?php if(($st) == "4"): ?>selected="selected"<?php endif; ?>  value="4">申请退款</option>
                    <option <?php if(($st) == "5"): ?>selected="selected"<?php endif; ?>  value="5">已退款</option>
                    <option <?php if(($st) == "8"): ?>selected="selected"<?php endif; ?>  value="8">已完成</option>
                </select>
                
                
                    <span class="search_form_wz">订单编号</span>
                    <input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="search_form_ssk" /><input type="submit" class="search_form_ssan" value="搜索" />
                </div>
            </form>
        </div>
        <div class="tgdd_nr">
  
  <div class="blank-20"></div>
     <table class="tuan_table3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background-color:#F9F9F9;">
            <td width="26%">商品详情</td>
            <td width="10%">单价</td>
            <td width="5%">数量</td>
            <td width="9%">总价</td>
            <td width="15%">状态</td>
            <td width="20%">实付金额</td>
            <td width="15%">评价</td>
     </table>
     <div class="blank-10"></div>
     
           
                
<?php if(is_array($list)): foreach($list as $key=>$order): ?><table  class="tuan_table1"  width="100%" border="0">
  <tr class="tr_left_2">
    <td class="left10" colspan="4">
    订单ID：<span class="mallorder_jg"><?php echo ($order["order_id"]); ?></span>
    <span class="td_top_1">交易时间：<?php echo (date('Y-m-d H:i:s',$order["create_time"])); ?>
    </td>
  </tr>
  <tr>
    <td class="td_left_1"> 
    
    <?php if(is_array($shops)): foreach($shops as $key=>$shop): if(is_array($goods)): $index = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($index % 2 );++$index; if(($good['shop_id'] == $shop['shop_id']) AND ($good['order_id'] == $order['order_id'])): ?><table  class="tuan_table2" width="100%" border="0">
      <tr class="tr_left_1">
      
        <td class="left1">
        <!--商品展示开始-->
        <div class="index__production___yfP3y" >
        <a  target="_blank"  href="<?php echo U('pchome/mall/detail',array('goods_id'=>$products[$good['goods_id']]['goods_id']));?>" class="index__pic___TScfk" >
        
        
        <img src="<?php echo config_img($products[$good['goods_id']]['photo']);?>" ><span></span></a>
        <div class="index__infos___A6XLq" >
            <p ><a href="<?php echo U('pchome/mall/detail',array('goods_id'=>$products[$good['goods_id']]['goods_id']));?>" target="_blank" ><span ></span><span><?php echo ($products[$good['goods_id']]['title']); ?></span><span ></span></a><span></span><span></span></p>
            <span></span>
            
            <p></p>
            
            
            <span></span>
        	</div>
		</div>
       <!--商品展示END-->
        
        </td>
        <td class="left2">$<?php echo round($good['price']/100,2);?></td>
        <td class="left3"><?php echo ($good['num']); ?></td>
        <td class="left4">$<?php echo round($good['total_price']/100,2);?></td>
        <td class="left5"> <?php if($order['status'] != 0 && $order['is_daofu'] != 0): echo ($goodtypes[$good['status']]); endif; ?></td>
      </tr>
     
    </table><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
    
    </td>
    <td class="left7" width="15%">
    
     <?php if(($order["is_daofu"]) == "0"): if(($order["status"]) == "0"): ?><a class="myInfor_sx myInfor_sx_fk" href="<?php echo U('pchome/mall/pay',array('order_id'=>$order['order_id']));?>" target="_blank">去付款</a>
                        <?php else: ?>
                        <?php echo ($types[$order['status']]); endif; ?>
                    <?php else: ?>
                        <?php if(($order["status"]) == "0"): ?>货到付款
                        <?php else: ?>
                        <?php echo ($types[$order['status']]); endif; endif; ?>
       <?php if(($order["is_mobile"]) == "1"): ?><br/><img src="/themes/default/Shangjia/statics/images/mobile.png" /><?php endif; ?>    
       <?php if(!empty($order['message'])): ?><br/>用户留言：<?php echo ($order['message']); endif; ?>
     </td>
    <td class="left8" width="20%">
    <span>实付金额：<?php echo round($order['need_pay']/100,2);?></span><br/>
    
      <?php if($order['mobile_fan'] > 0): ?>手机优惠：<?php echo round($order['mobile_fan']/100,2);?>NZD<?php endif; ?>
      <br/>
      <?php if($order['use_integral'] > 0): ?>使用积分：<?php echo ($order['use_integral']); ?> <br/>
      抵扣现金：<?php echo round($order['use_integral']/100,2);?>NZD<?php endif; ?>           

    </td>
    <td class="left9" width="15%">
      <?php if($order['is_daofu']==1): ?><!--如果是货到付款-->
            <?php if($order['status']==0): ?><a mini='confirm' href="<?php echo U('order/goodsdel',array('order_id'=>$order['order_id']));?>">取消订单</a>
            <?php elseif($order['status']==2): ?>
                <a mini='confirm'href="<?php echo U('order/goodsshou',array('order_id'=>$order['order_id']));?>">确认收货</a>
            <?php elseif($order['status']==8): ?>
                 <?php if(($order["is_dianping"]) == "0"): ?><a href="<?php echo U('order/dianping',array('order_id'=>$order['order_id']));?>">点评</a><?php endif; ?> 
                 <?php if(($order["is_dianping"]) == "1"): ?><a>已点评</a><?php endif; endif; ?>
        <?php else: ?><!--如果不是货到付款-->
            <?php if($order['status']==0): ?><a mini='confirm' href="<?php echo U('order/goodsdel',array('order_id'=>$order['order_id']));?>">取消订单</a>
            <?php elseif($order['status']==1): ?>
            	<!--<a mini='confirm' href="<?php echo U('order/refund',array('order_id'=>$order['order_id']));?>">申请退款</a>-->
            <?php elseif($order['status']==2): ?>
                <a mini='confirm' href="<?php echo U('order/goodsshou',array('order_id'=>$order['order_id']));?>">确认收货</a>
            <?php elseif($order['status']==8): ?>
            
                 <?php if(($order["is_dianping"]) == "0"): ?><a href="<?php echo U('order/dianping',array('order_id'=>$order['order_id']));?>">点评</a><?php endif; ?> 
                 <?php if(($order["is_dianping"]) == "1"): ?><a>已点评</a><?php endif; ?>  

      		<?php elseif($order['status']==4): ?>
            	<a mini='confirm' href="<?php echo U('order/cancel_refund',array('order_id'=>$order['order_id']));?>">取消退款</a><?php endif; endif; ?> 
     <br/>  
     <a href="<?php echo U('order/details',array('order_id'=>$order['order_id']));?>">订单详情</a>
    </td>
  </tr>
 
</table>
<br/><?php endforeach; endif; ?>


            
            <div class="x"><?php echo ($page); ?></div>
        </div>
    </div>
</div>
</div>
</div>
<div style="clear:both;"></div>
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