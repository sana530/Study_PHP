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
        <li class="li1">文章</li>
        <li class="li2">文章回复</li>
        <li class="li2 li3">回复文章</li>
    </ul>
</div>
<div class="main-jsgl main-sc">
    <p class="attention"><span>注意：</span> 这里是管理文章回复内容的哦，以前没有，现在新增的东东！</p>
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="left">
                <?php echo BA('articlereply/create','','添加内容');?>  
            </div>
            <div class="right">
                <form method="post" action="<?php echo U('articlereply/index');?>">
                    <div class="seleHidden" id="seleHidden">
                        
                        <span>状态</span>
                        <select class="select w120" name="audit">
                            <option value="0"  >全部</option>
                            <option value="-1" <?php if(($audit) == "-1"): ?>selected="selected"<?php endif; ?> >等待审核</option>
                            <option value="1" <?php if(($audit) == "1"): ?>selected="selected"<?php endif; ?>>正常</option>
                        </select>
                        
                        <span>   用户ID：</span>   <input type="text" name="user_id" value="<?php echo (($user_id)?($user_id):''); ?>" class="inptText w150" />
                        <input type="submit" class="inptButton" value="  搜索" />
                    </div>
                </form>
            </div>
        </div>
        <form  target="baocms_frm" method="post">
            <div class="tableBox">
                <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#f1f1f1;"  >
                    <tr>
                        <td class="w50"><input type="checkbox" class="checkAll" rel="comment_id" /></td>
                        <td class="w50">ID</td>
                        <td>文章标题</td>
                        <td>用户</td>
                        <td>回复内容</td>
                        <td>赞</td>
                        <td>是否审核</td>
                        <td>操作</td>
                    </tr>
                    <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr bgcolor="#fff" height="48px" style="font-size:14px; color:#545454; text-align:left; line-height:48px;">
                            <td><input class="child_comment_id" type="checkbox" name="comment_id[]" value="<?php echo ($var["comment_id"]); ?>" /></td>
                            <td><?php echo ($var["comment_id"]); ?></td>

                            
                            <td><?php echo bao_msubstr($posts[$var['post_id']]['title'],0,8,false);?><a class="tips" rel="<?php echo ($posts[$var['post_id']]['title']); ?>" style="color: #fff; background: #1ca290; padding: 0px 5px; border-radius:0px; margin-left: 10px; display: inline-block; float: right; height: 20px; line-height: 20px;" href="javascript:void(0)">查看</a></td>
                            
                            <td><?php echo ($users[$var['user_id']]['account']); ?>(<?php echo ($var["user_id"]); ?>)</td>

                             <td><?php echo bao_msubstr($var['content'],0,8,false);?><a class="tips" rel="<?php echo ($var["content"]); ?>" style="color: #fff; background: #1ca290; padding: 0px 5px; border-radius:0px; margin-left: 10px; display: inline-block; float: right; height: 20px; line-height: 20px;" href="javascript:void(0)">查看</a></td>
                            <td><?php echo ($var["zan"]); ?></td>
                            <td>
                            <?php if($var["audit"] == 1): ?><font style="color: green;">已审核</font>
                                <?php else: ?>
                                <font style="color: red;">待审核</font><?php endif; ?>
                        </td>
                        <td>
                            <?php echo BA('articlereply/edit',array("comment_id"=>$var["comment_id"]),'编辑','','remberBtn');?>
                            <?php echo BA('articlereply/delete',array("comment_id"=>$var["comment_id"]),'删除','act','remberBtn');?>
                            <?php if(($var["audit"]) == "0"): echo BA('articlereply/audit',array("comment_id"=>$var["comment_id"]),'审核','act','remberBtn'); endif; ?>
                        </td>
                        </tr><?php endforeach; endif; ?>
                    
                    
                </table>
                <?php echo ($page); ?>
            </div>
            <div class="selectNr" style="margin-bottom: 0px; border-bottom: none;">
                <div class="left">
                    <?php echo BA('articlereply/delete','','批量删除','list','a2');?>
                    <?php echo BA('articlereply/audit','','批量审核','list','remberBtn');?>
                </div>
            </div>
        </form>
    </div>
    
    
     <script>
       $(document).ready(function (e) {
    
			$(".tips").click(function () {
				var tipnr = $(this).attr('rel');
				layer.tips(tipnr, $(this), {
					tips: [4, '#1ca290'],
					time: 4000
				});
			})
		});
    </script>
    
    
     
        
</div>
</body>
</html>