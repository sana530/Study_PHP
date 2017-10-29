<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>用户中心</title>
        <link href="__TMPL__statics/css/newstyle.css?v=20150729" rel="stylesheet" type="text/css" />
        <script src="__TMPL__statics/js/jquery.js"></script>
        <script> var BAO_PUBLIC = '__PUBLIC__';
            var BAO_ROOT = '__ROOT__';</script>
        <script src="__PUBLIC__/js/web.js"></script>
        <script>
            $(function () {
                $('#selectBoxInput').click(function () {
                    $('.selectList').toggle(300);
                });
                $(".selectList li a").click(function () {
                    $("#selectBoxInput").html($(this).html());
                    $('.selectList').hide();
                });
            });
        </script>
    </head>
    <body> 
        <div class="topOne">
            <div class="nr">
                <?php if(empty($MEMBER)): ?><div class="left"><span class="welcome">您好，欢迎访问<?php echo ($CONFIG["site"]["sitename"]); ?></span><a href="<?php echo u('pchome/passport/login');?>">登陆</a>|<a href="<?php echo U('passport/register');?>">注册</a>
                        <?php else: ?>
                        <div class="left">欢迎 <b style="color: red;font-size:14px;"><?php echo ($MEMBER["nickname"]); ?></b> 来到<?php echo ($CONFIG["site"]["sitename"]); ?>&nbsp;&nbsp; <a href="<?php echo u('member/index/index');?>" >个人中心</a>|<a href="<?php echo u('pchome/passport/logout');?>" >退出登录</a><?php endif; ?>
                        </div>
                        <div class="right">                    
                            <ul>
                                <li class="liOne"><a class="liOneB" href="<?php echo u('member/order/index');?>" >我的订单</a><em>&nbsp;</em></li>
                                <li class="liOne"><a class="liOneA" href="javascript:void(0);">我的服务<em>&nbsp;</em></a>
                                    <div class="list">
                                        <ul>
                                            <li><a href="<?php echo u('member/order/index');?>">我的订单</a></li>
                                            <li><a href="<?php echo u('member/ele/index');?>">我的外卖</a></li>
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
                                <li class="liOne liOne_visit"><a class="liOneA" href="javascript:void(0);">最近浏览<em>&nbsp;</em></a>
                                    <div class="list liOne_visit_pull">
                                        <ul>
                                            <?php
 $views = unserialize(cookie('views')); $views = array_reverse($views, TRUE); if($views){ foreach($views as $v){ ?>
                                            <li class="liOne_visit_pull_li">
                                                <a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>">
                                                <img src="<?php echo config_img($v['photo']);?>" width="80" height="50" /></a>
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
                                <li class="liOne"> <a class="liOneA" href="javascript:void(0);">我是商家<em>&nbsp;</em></a>
                                    <div class="list">
                                        <ul>
                                            <li><a href="<?php echo u('shangjia/login/index');?>">商家登陆</a></li>
                                            <li><a href="<?php echo u('shangjia/index/index');?>">微信营销</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <span>|</span>
                                <li class="liOne"> <a class="liOneA" href="javascript:void(0);">快捷导航<em>&nbsp;</em></a>
                                    <div class="list">
                                        <ul>
                                            <li><a href="<?php echo u('pchome/shop/index');?>">商家列表</a></li>
                                            <li><a href="<?php echo u('pchome/jifen/index');?>">积分商城</a></li>
                                            <li><a href="<?php echo u('pchome/billboard/index');?>">商家榜单</a></li>
                                        </ul>
                                    </div>
                                </li>
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
                                <li>1.提交订单<em>&nbsp;</em></li>
                                <li>2.去支付<em>&nbsp;</em></li>
                                <li class="on">3.完成<em>&nbsp;</em></li>
                            </ul>               
                        </div>
                        <div class="all_3">
                            <ul class="ul_3">
                                <li><img src="__TMPL__statics/images/tp_5.png"><p>随时退</p></li>
                                <li><img src="__TMPL__statics/images/tp_6.png"><p>不满意免单</p></li>
                                <li><img src="__TMPL__statics/images/tp_7.png"><p>过期退</p></li>
                            </ul>
                        </div>
                    </div>
                    <table  class="tab_bor">
                        <tr>
                            <td><p class="tab_p1"><img src="__TMPL__statics/images/tp_15.png"></p></td>
                            <td><p class="tab_p2"><?php echo ($message); ?><a href="<?php echo U('pchome/ele/index');?>"> &nbsp再去逛逛>></a></p></td>
                        </tr>
                        <tr>
                            <td colspan="2"><div class="tab_p4"><a href="<?php echo U('member/ele/index');?>">查看已买购物</a></div></td>
                        </tr>
                    </table>
                    <table class="tab_xx" width="100%">
                        <tr>
                            <th colspan="5">订单信息</th>
                        </tr>
                        <tr>
                            <td>订单编号：<?php echo ($detail["order_id"]); ?></td>
                            <td>下单时间：<?php echo (date('Y-m-d H:i',$detail["single_time"])); ?></td>
                            <td>付款方式：<?php echo ($paytype[$detail['code']]['name']); ?></td>
                            <td>付款时间：<?php echo (date('Y-m-d H:i',$detail["create_time"])); ?></td>
                            <?php if(($detail["is_delivery"]) == "1"): ?><td>地址：<?php echo ($citys[$addr['city_id']]['name']); ?>&nbsp;<?php echo ($areas[$addr['area_id']]['area_name']); ?>&nbsp;<?php echo ($bizs[$addr['business_id']]['business_name']); ?>&nbsp;<?php echo ($addr['addr']); ?></td><?php endif; ?>
                        </tr>
                        <tr>
                            <th colspan="2">菜单详情</th>
                            <th>单价</th>
                            <th>数量</th>
                            <th class="tab_fiveTh">总额</th>
                        </tr>
                        <?php if(is_array($ele_goods)): foreach($ele_goods as $key=>$item): ?><tr>
                                <td width="150"><img width="150" src="__ROOT__/attachs/<?php echo ($products[$item['product_id']]['photo']); ?>"></td>
                                <td width="200"><?php echo ($products[$item['product_id']]['product_name']); ?></td>
                                <td><?php echo round($products[$item['product_id']]['price']/100,2);?>X</td>
                                <td><?php echo ($item["num"]); ?>=</td>
                                <td class="tab_fiveTh"><?php echo round($item['total_price']/100,2);?></td>
                            </tr><?php endforeach; endif; ?>
                        <?php if(!empty($detail['new_money'])): ?><tr>
                            <td colspan="3">&nbsp;</td>
                            <td>-</td>
                            <td><?php echo round($detail['new_money']/100,2);?></td>
                        </tr><?php endif; ?>
                         <?php if(!empty($detail['fan_money'])): ?><tr>
                            <td colspan="3">&nbsp;</td>
                            <td>-</td>
                            <td><?php echo round($detail['fan_money']/100,2);?></td>
                        </tr><?php endif; ?>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td><p class="pay_total_p">支付总金额：<span>$<?php echo round($detail['need_pay']/100,2);?></span></p></td>
                        </tr>
                    </table>      
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