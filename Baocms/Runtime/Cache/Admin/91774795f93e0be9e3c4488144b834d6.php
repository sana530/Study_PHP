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
        <li class="li1">商家</li>
        <li class="li2">认领</li>
        <li class="li2 li3">认领列表</li>
    </ul>
</div>
<div class="main-jsgl main-sc">
    <p class="attention"><span>新功能，只要后台审核后，会员自动登录，并收到邮件通知！</span></p>
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="left">
                <?php echo BA('shop/index','','全部商家');?>
            </div>
            <div class="right">
                <form class="search_form" method="post" action="<?php echo U('shoprecognition/index');?>">
                    <div class="seleHidden" id="seleHidden">
                        <span>关键字(电话或商户名称)</span>
                        <input type="text" name="keyword" value="<?php echo ($keyword); ?>" class="inptText" /><input type="submit" value="   搜索"  class="inptButton" />
                    </div> 
                </form>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <form  target="baocms_frm" method="post">
        <div class="tableBox">
            <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                <tr>
                    <td class="w50"><input type="checkbox" class="checkAll" rel="yuyue_id" /></td>
                    <td class="w50">ID</td>
                    <td>用户</td>
                    <td>商家</td>
                    <td>姓名/手机</td>
                    <td>申请时间</td>
                    <td>理由</td>
                    <td>管理员回复</td>
                    <td>审核状态</td>
                    <td>操作</td>

                </tr>
                <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                        <td><input class="child_recognition_id" type="checkbox" name="recognition_id[]" value="<?php echo ($var["recognition_id"]); ?>" /></td>
                        <td> <?php echo ($var["recognition_id"]); ?></td>
                        <td><?php echo (($users[$var['user_id']]['account'])?($users[$var['user_id']]['account']):'游客'); ?>(ID:<?php echo ($var["user_id"]); ?>)</td>
                        <td><?php echo ($shops[$var['shop_id']]['shop_name']); ?></td>
                        <td><?php echo ($var["name"]); ?>/<?php echo ($var["mobile"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>
                        <td><?php echo ($var["content"]); ?></td>
                        <td><?php echo ($var["reply"]); ?></td>
                    <td>
                    <?php if($var['audit'] == 1): ?><a style="color:#F00">通过</a>
                    <?php else: ?>
                    <a style="color:#03F">未审核</a><?php endif; ?>
                    </td>
                    
                    
               <td>
               <?php if(($var["audit"]) == "0"): echo BA('shoprecognition/audit',array("recognition_id"=>$var["recognition_id"]),'同意认领','act','remberBtn'); endif; ?>
               <?php echo BA('shoprecognition/edit',array("recognition_id"=>$var["recognition_id"]),'编辑','','remberBtn');?>
               <?php echo BA('shoprecognition/delete',array("recognition_id"=>$var["recognition_id"]),'删除','act','remberBtn');?>
               </td>
               </tr><?php endforeach; endif; ?>
            </table>
            <?php echo ($page); ?>
        </div>
        <div class="selectNr" style="margin-bottom: 0px; border-bottom: none;">
            <div class="left">
                <a href="<?php echo U('shop/recognition');?>"  class=" a2 ">添加商家</a>
            </div>
        </div>
    </form>
</div>
</div>

     
        
</div>
</body>
</html>