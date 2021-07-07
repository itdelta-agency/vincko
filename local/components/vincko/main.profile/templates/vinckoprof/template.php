<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="lk-columns">
		<div class="lk-columns__left">
			<ul class="lk-menu">
				<li><a href="/lk/orders/">Заказы и заявки</a></li>
				<li><a class="active" href="/lk/prof/">Мои данные</a></li>
				<li><a href="/lk/bonuses/">Бонусный счет</a></li>
			</ul>
		</div>
		<div class="lk-columns__right lk-columns__right-prof">
			<?ShowError($arResult["strProfileError"]);?>
			<?
			if ($arResult['DATA_SAVED'] == 'Y')
				ShowNote(GetMessage('PROFILE_DATA_SAVED'));
			?>

			<?if($arResult["SHOW_SMS_FIELD"] == true):?>

			<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
				<div class="prof__form">
					<?=$arResult["BX_SESSION_CHECK"]?>
					<input type="hidden" name="lang" value="<?=LANG?>" />
					<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
					<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
					<div class="izayavka__form-block">
						<label class="izayavka__label"><?echo GetMessage("main_profile_code")?></label>
						<input size="30" type="text" class="reg__form-input" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" />
					</div>
					
					<div class="izayavka__form-block">
						<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>
						<div id="bx_profile_resend"></div>
					</div>
				</div>
				<div class="izayavka__submit">
					<input type="submit" class="izayavka__submit-button" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>">
				</div>

			</form>

			<script>
			new BX.PhoneAuth({
				containerId: 'bx_profile_resend',
				errorContainerId: 'bx_profile_error',
				interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
				data:
					<?=CUtil::PhpToJSObject([
						'signedData' => $arResult["SIGNED_DATA"],
					])?>,
				onError:
					function(response)
					{
						var errorDiv = BX('bx_profile_error');
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

			<?else:?>
			<script type="text/javascript">
			<!--
			var opened_sections = [<?
			$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
			$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
			if ($arResult["opened"] <> '')
			{
				echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
			}
			else
			{
				$arResult["opened"] = "reg";
				echo "'reg'";
			}
			?>];
			//-->
			var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
			</script>
			<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
			<div class="prof__form">
			<?=$arResult["BX_SESSION_CHECK"]?>
			<input type="hidden" name="lang" value="<?=LANG?>" />
			<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
			<div class="izayavka__form-block">
				<label class="izayavka__label">Тип учетной записи</label>
				<select name="UF_USERTYPE" class="reg__form-select">
					<option value="4"<?if ($arResult["USER_PROPERTIES"]["DATA"]["UF_USERTYPE"]["VALUE"] == 4):?> selected<?endif;?>>Физическое лицо</option>
					<option value="5"<?if ($arResult["USER_PROPERTIES"]["DATA"]["UF_USERTYPE"]["VALUE"] == 5):?> selected<?endif;?>>Юридическое лицо</option>
				</select>
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('LAST_NAME')?></label>
				<input type="text" name="LAST_NAME" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('NAME')?></label>
				<input type="text" name="NAME" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>">
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('SECOND_NAME')?></label>
				<input type="text" name="SECOND_NAME" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>">
			</div>

			<div class="izayavka__form-block" style="display: none;">
				<label class="izayavka__label"><?=GetMessage('LOGIN')?></label>
				<input type="text" name="LOGIN" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>">
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?echo GetMessage("main_profile_phone_number")?></label>
				<input type="text" name="PHONE_NUMBER" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["PHONE_NUMBER"]?>">
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('EMAIL')?></label>
				<input type="text" name="EMAIL" class="reg__form-input" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>">
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
				<input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input reg__form-input">
				<?if($arResult["SECURE_AUTH"]):?>
				<div class="clear"></div>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
				<script type="text/javascript">
				document.getElementById('bx_auth_secure').style.display = 'inline-block';
				</script>
				<?endif?>
			</div>

			<div class="izayavka__form-block">
				<label class="izayavka__label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
				<input type="password" name="NEW_PASSWORD_CONFIRM" class="reg__form-input" maxlength="50" value="" autocomplete="off">
			</div>
			</div>

			<div class="izayavka__submit">
				<input type="submit" class="izayavka__submit-button" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
			</div>
				

			</form>
			<?endif?>
		</div>
		<div class="clear"></div>
</div>