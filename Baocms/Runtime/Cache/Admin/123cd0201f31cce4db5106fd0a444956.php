<?php if (!defined('THINK_PATH')) exit();?><div class="listBox clfx">
    <div class="menuManage">
        <form  target="baocms_frm" action="<?php echo U('user/money',array('user_id'=>$user_id));?>" method="post">
            <div class="mainScAdd">
                <div class="tableBox">
                    <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                        <tr>
                            <td class="lfTdBt">啟用可負金額:</td>
                            <td class="rgTdBt">
                                <label><input type="radio" value="1" name="money_negative_on"
                                    onclick="document.getElementById('box').style.display=''; document.getElementById('box').getElementsByTagName('input').money_negative.value = '<?php echo ($detail["money_negative"]); ?>'""
                                    <?php if(($detail["money_negative"]) > "0"): ?>checked="checked"<?php endif; ?>">开启</label>
                                <label><input type="radio" value="0" name="money_negative_on"
                                    onclick="document.getElementById('box').style.display='none'; document.getElementById('box').getElementsByTagName('input').money_negative.value = ''"
                                    <?php if(($detail["money_negative"]) == "0"): ?>checked="checked"<?php endif; ?>">关闭</label>
                            </td>
                        </tr>
                        <tr id="box" <?php if(($detail["money_negative"]) == "0"): ?>style="display:none"<?php endif; ?>>
                            <td class="lfTdBt">余额可负金额:</td>
                            <td class="rgTdBt">
                                - <input name="money_negative" type="text" class="scAddTextName w100" value="<?php echo round($detail['money_negative']/100,2);?>" />
                                <code>请输入正整数金额(Ex:300)</code>
                            </td>
                        </tr>
                        <tr>
                            <td class="lfTdBt">增减余额:</td>
                            <td class="rgTdBt">
                                <input name="money" type="text" class="scAddTextName w150" />
                                <code>减少余额输入负数</code>
                            </td>
                        </tr>
                        <tr >
                            <td class="lfTdBt">原由:</td>
                            <td class="rgTdBt">
                                <textarea name="intro" cols="50" rows="6"></textarea>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="smtQr"><input type="submit" value="确定保存" class="smtQrIpt" /></div>
            </div>
        </form>
    </div>
</div>