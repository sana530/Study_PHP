<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?>会员中心</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/mcenter.css"/>
		<link rel="stylesheet" href="/static/default/wap/css/intel.css">
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/intel.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,mcenter.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
	</head>
	<body>   
<script src="/static/default/wap/js/dialog.js"></script>
<link href="/static/default/wap/css/main.css" rel="stylesheet">
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('life/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		<?php echo ($CONFIG['site']['sitename']); ?>快递小哥申请
	</div>
</header>
<form class="fabu-form" onsubmit="return confirm();"  method="post"  target="x-frame" action="<?php echo U('delivery/apply');?>">
	<div class="blank-10 bg border-top"></div>
	<div class="blank-10"></div>
	<div class="row">
		<div class="line">
			<span class="x3">名字</span>
			<span class="x9"><input type="text" class="text-input" name="data[first_name]" /></span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">姓氏</span>
			<span class="x9"><input type="text" class="text-input" name="data[last_name]" /></span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">身份证明</span>
			<script type="text/javascript">
                function identity(){
                    document.getElementById('license').style.display='none';
                    document.getElementById('passport').style.display='none';
                    if (document.getElementById('select').value == 1) {
                        var value = 'license';
					} else if (document.getElementById('select').value == 2)  {
                        var value = 'passport';
					}
                    document.getElementById(value).style.display='block';
					;
                }
			</script>
			<span class="x4">
				<select name="data[identity]" id="select" class="text-select" onchange="identity()">
					<option value="0" selected="selected">请选择</option>
					<option value="1">新西兰/澳大利亚驾照号</option>
					<option value="2">护照号（未持有新西兰/澳大利亚驾照者提供）</option>
				</select>
			</span>
			<div id="license" style="display:none">
				<span class="x5">
					<input type="text" class="text-input" name="data[license]" placeholder="请输入驾照号"/>
					<input type="text" class="text-input" name="data[license_version]" placeholder="请输入驾照 版本号"/>
				</span>
			</div>
			<div id="passport" style="display:none">
				<span class="x5">
					<input type="text" class="text-input" name="data[passport]" placeholder="请输入护照号"/>
				</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">邮箱</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[email]" value="<?php echo (($user["email"])?($user["email"]):''); ?>" />
		</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">手机</span>
			<span class="x9">
			<input type="text" class="text-input" name="data[mobile]" value="<?php echo (($user["mobile"])?($user["mobile"]):''); ?>" />
		</span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">地址</span>
			<span class="x9"><input id="addr" type="text" class="text-input" name="data[addr]" /></span>
			<script>
                function Autocomplete() {
                    new google.maps.places.Autocomplete((document.getElementById('addr')),{types: ['geocode']});
                }
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoyUbiTvaa1kbqgVQj43kv46SsaKvjSU&libraries=places&callback=Autocomplete" async defer></script>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x5">
				<div class="Upload-img-box">
					<div class="Upload-btn"><input type="file" id="fileToUpload_id" name="fileToUpload_id" data-role="none">身份证明</div>
					<div class="Upload-img">
						<div class="list-img loading" style="display:none;"></div>
						<div class="list-img jq_photo_id" style="display:none;"></div>
					</div>
				</div>
			</span>
		</div>
	</div>


	<div class="row">
		<div class="line">
			<tr>
				<td class="agreen">
					<input type="checkbox"  id="is_agree"  name="is_agree"  checked="checked" />
					<h1 style="display:none"><?php echo ($Privacy["contents"]); ?></h1>
					<h5 style="display:none">《跑腿协议》</h5>
					本人已阅读并同意<a href="javascript:;" onclick="liclick(this);"><FONT COLOR="#2fbdaa">《跑腿协议》</FONT></a>
					</td>
			</tr>
		</div>
	</div>

	  <!--弹出 start-->
	  <div id="menuDetail" class="menu_detail">
			<dl style="margin-top:15px; margin-right:15px;scrollbar-track-color:red;" >
				<div class="info" style="overflow:scroll; height:276px; "></div>
			</dl>
	   </div>
	   <!--end-->

	   


	<script type="text/javascript" src="/static/default/wap/js/ajaxfileupload.js"></script>
	<script>
        function ajaxupload(fileToUpload) {
            $(".loading").show();
            $.ajaxFileUpload({
                url: '<?php echo U("app/upload/upload",array("model"=>"life"));?>',
                type: 'post',
                fileElementId: fileToUpload,
                dataType: 'text',
                secureuri: false, //一般设置为false
                success: function (data, status) {
                    $(".loading").hide();
					var str = '<img src="__ROOT__/attachs/' + data + '"><input type="hidden" name="data[photo_'+fileToUpload.slice(-2)+']" value="' + data + '" />';
					$(".jq_photo_"+fileToUpload.slice(-2)).show().html(str);
                    $("#"+fileToUpload).unbind('change');
                    $("#"+fileToUpload).change(function () {
                        ajaxupload(fileToUpload);
                    });
                }
            });
        }
        $(document).ready(function () {
            $("input").each(function () {
                if ($(this).val() == $(this).attr('placeholder')) {
                    $(this).val('');
                }
            });
            $('button[type=submit]').click(function(){
                $("input").each(function () {
                    if ($(this).val() == $(this).attr('placeholder')) {
                        $(this).val('');
                    }
                });
			})
            $("#fileToUpload_id").change(function () {
                ajaxupload("fileToUpload_id");
            });
            $(document).on("click", ".photo img", function () {
                $(this).parent().remove();
            });
        });
			function confirm(){
				if(!document.getElementById("is_agree").checked){
				layer.msg('请您先选择同意许可协议',{icon:1});
				return false;
				}
			}

	</script>

	
	<script type="text/javascript">
		var _wraper = $('#menuDetail');
		var dialogTarget;
		function liclick(l){
			var _this = $(l),
				F = function(str){return _this.parent().find(str);},
				title = F('h5').text();
				if (F('h1').text()==''){
					info = "请联系1stpay管理员!"
				}else{
					info = F('h1').text();
				}
				_wraper.find('.info').text(info);
			_wraper.parents('.dialog').find('.dialog_tt').text(title);
			dialogTarget = _this;
			_wraper.dialog({title: title, closeBtn: true});
			}
	</script>


	<div class="container">
		<div class="blank-30"></div>
		<button  type="submit" class="button button-block button-big bg-dot">提交</button>
		<div class="blank-30"></div>
	</div>
</form>
		
<div class="blank-20"></div>
 <footer class="foot-fixed">
  <?php if($ctl == 'member'): ?><a class="foot-item  <?php if($ctl == 'member'): ?>active<?php endif; ?>" href="<?php echo u('mobile/index/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">首页</span>
    </a>
  <?php else: ?>
  <a class="foot-item" href="<?php echo u('member/index');?>">		
    <span class="icon icon-home"></span>
    <span class="foot-label">用户首页</span>
    </a><?php endif; ?>
    
    <a class="foot-item " href="<?php echo LinkTo('mobile/life/release');?>">			
    <span class="icon icon-plus"></span><span class="foot-label">发布</span></a>
    
     <a class="foot-item  <?php if(($ctl == 'tuancode')): ?>active<?php endif; ?>" href="<?php echo u('tuancode/index');?>">			
    <span class="icon icon-folder"></span><span class="foot-label">抢购劵</span></a>
    
    
    
    <a class="foot-item  <?php if(($ctl == 'message') ||($act == 'xiaoxizhongxin')): ?>active<?php endif; ?>" href="<?php echo u('message/index');?>">			
    <span class="icon icon-volume-up"></span><span class="foot-label">消息</span></a>
    
    <a class="foot-item  <?php if(($ctl == 'money') || ($ctl == 'logs') || ($ctl == 'cash') ||($act == 'zijinguanli')): ?>active<?php endif; ?>" href="<?php echo u('information/index');?>">			
    <span class="icon icon-gear"></span><span class="foot-label">设置</span></a>
    
   
    </footer>


<iframe id="x-frame" name="x-frame" style="display:none;">
</iframe>
</body>
</html>