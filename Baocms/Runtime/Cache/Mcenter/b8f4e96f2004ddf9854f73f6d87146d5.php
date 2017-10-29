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
<header class="top-fixed bg-yellow bg-inverse">
	<div class="top-back">
		<a class="top-addr" href="<?php echo U('life/index');?>"><i class="icon-angle-left"></i></a>
	</div>
	<div class="top-title">
		扫街网信用额度申请表
	</div>
</header>
<form class="fabu-form" method="post"  target="x-frame" onsubmit="return confirm();" action="<?php echo U('credit/index');?>">
	<div class="blank-10 bg border-top"></div>
	<div class="blank-10"></div>
	<div class="row">
		<div class="line">
			<span class="x3">称呼</span>
			<span class="x4">
				<select name="data[title]" class="text-select">
					<option value="0" selected="selected">请选择</option>
					<?php if(is_array($cates)): foreach($cates as $key=>$var): ?><option value="<?php echo ($var); ?>"><?php echo ($var); ?></option><?php endforeach; endif; ?>
				</select>
			</span>
		</div>
	</div>
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
			<span class="x3">出生日期</span>
			<span class="x9">
                    <div class="lef select_box">
                        <select class="sel_year" name="data[born_year]" rel="<?php echo (($usersex["born_year"])?($usersex["born_year"]):'--'); ?>"></select> 年
                        <select class="sel_month" name="data[born_month]" rel="<?php echo (($usersex["born_month"])?($usersex["born_month"]):'--'); ?>"></select> 月
                        <select class="sel_day" name="data[born_day]" rel="<?php echo (($usersex["born_day"])?($usersex["born_day"]):'--'); ?>"></select> 日
                    </div>
			</span>
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
			<span class="x3">申请额度</span>
			<span class="x9"><input type="text" class="text-input" name="data[credit_limit]" placeholder="最高限额500新西兰元"/></span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x3">还款银行账号</span>
			<span class="x9"><input type="text" class="text-input" name="data[bank_account]" /></span>
		</div>
	</div>
	<div class="row">
		<div class="line">
			<span class="x5">
				<div class="Upload-img-box">
					<div class="Upload-btn"><input type="file" id="fileToUpload_id" name="fileToUpload_id" data-role="none">身份证明</div>
					<div class="Upload-img">
						<div class="list-img loading_id" style="display:none;"></div>
						<div class="list-img jq_photo_id" style="display:none;"></div>
					</div>
				</div>
				</span>
				<span class="x6">
				<div class="Upload-img-box">
					<div class="Upload-btn"><input type="file" id="fileToUpload_bk" name="fileToUpload_bk" data-role="none">3个月银行对账单</div>
					<div class="Upload-img">
						<div class="list-img loading_bk" style="display:none;"></div>
						<div class="list-img jq_photo_bk" style="display:none;"></div>
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
					本人已阅读并同意<a href='<?php echo U("/article/system",array("content_id"=>"4"));?>' target="_blank"><FONT COLOR="#2fbdaa">《1STPAY 隐私权政策》</FONT></a>和&nbsp;
					<a href='<?php echo U("/article/system",array("content_id"=>"7"));?>' ><FONT COLOR="#2fbdaa">《1STPAY O2O信用账期服务关键条款》</FONT></a></td>
			</tr>
		</div>
	</div>
	<script type="text/javascript" src="/static/default/wap/js/ajaxfileupload.js"></script>
	<script>
        function ajaxupload(fileToUpload) {
            $(".loading_"+fileToUpload.slice(-2)).show();
            $.ajaxFileUpload({
                url: '<?php echo U("app/upload/upload",array("model"=>"life"));?>',
                type: 'post',
                fileElementId: fileToUpload,
                dataType: 'text',
                secureuri: false, //一般设置为false
                success: function (data, status) {
                    $(".loading_"+fileToUpload.slice(-2)).hide();
                    if (data.slice(-3) == 'pdf') {
                        var str = '<iframe src="__ROOT__/attachs/' + data.replace(/thumb_/, "") + ' "></iframe><input type="hidden" name="data[photo_'+fileToUpload.slice(-2)+']" value="' + data + '" />';
					} else {
                        var str = '<img src="__ROOT__/attachs/' + data + '"><input type="hidden" name="data[photo_'+fileToUpload.slice(-2)+']" value="' + data + '" />';
					}
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
            $("#fileToUpload_bk").change(function () {
                ajaxupload("fileToUpload_bk");
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
	<div class="container">
		<div class="blank-30"></div>
		<button   type="submit" class="button button-block button-big bg-dot">提交</button>
		<div class="blank-30"></div>
	</div>
</form>
<script type="text/javascript" src="__TMPL__statics/js/birthday.js"></script>
<script>
    $(function () {
        $.ms_DatePicker({
            YearSelector: ".sel_year",
            MonthSelector: ".sel_month",
            DaySelector: ".sel_day"
        });
        $.ms_DatePicker();
    });
</script>
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