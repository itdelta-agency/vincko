<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->RestartBuffer();
<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="regform">
	<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
	<table class="data-table bx-registration-table">
		<tbody>
		<tr>
			<td><span class="starrequired">*</span><?echo GetMessage("main_register_sms_code")?></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td></td>
			<td><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" /></td>
		</tr>
		</tfoot>
	</table>
</form>

<script>
	new BX.PhoneAuth({
		containerId: 'bx_register_resend',
		errorContainerId: 'bx_register_error',
		interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
		data:
			<?=CUtil::PhpToJSObject([
				'signedData' => $arResult["SIGNED_DATA"],
			])?>,
		onError:
			function(response)
			{
				var errorDiv = BX('bx_register_error');
				var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
				errorNode.innerHTML = '';
				for(var i = 0; i < response.errors.length; i++)
				{
					errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
				}
				errorDiv.style.display = '';
			}
	});
</script>

<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_register_resend"></div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>