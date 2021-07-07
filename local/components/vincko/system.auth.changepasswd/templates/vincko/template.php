<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["PHONE_REGISTRATION"])
{
	CJSCore::Init('phone_auth');
}
?>

<div class="login__flex">
	<div class="login__form">
	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	?>

	<?if($arResult["SHOW_FORM"]):?>

	<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
		<?if ($arResult["BACKURL"] <> ''): ?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<? endif ?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="CHANGE_PWD">
		
			<?/*<thead>
				<tr>
					<td colspan="2"><b><?=GetMessage("AUTH_CHANGE_PASSWORD")?></b></td>
				</tr>
			</thead>*/?>
			
	<?if($arResult["PHONE_REGISTRATION"]):?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-login"><?echo GetMessage("sys_auth_chpass_phone_number")?></label>
					<input type="text" value="<?=htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"])?>" class="login__form-input bx-auth-input" id="user-login" disabled="disabled" />
					<input type="hidden" name="USER_PHONE_NUMBER" value="<?=htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"])?>" />
				</div>
				
				<div class="login__form-block login__form-block-flex">
					<div class="login__form-repeat-sms" id="bx_chpass_resend"></div>
					<div class="login__form-input-sms">
						<input type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" placeholder="<?echo GetMessage("sys_auth_chpass_code")?>" class="login__form-input bx-auth-input" autocomplete="off" />
					</div>
				</div>
	<?else:?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-login"><?=GetMessage("AUTH_LOGIN")?></label>
					<input type="text" name="USER_LOGIN" id="user-login" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="login__form-input bx-auth-input" />
				</div>
	<?
		if($arResult["USE_PASSWORD"]):
	?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-password"><?echo GetMessage("sys_auth_changr_pass_current_pass")?></label>
					<input type="password" name="USER_CURRENT_PASSWORD" id="user-password" maxlength="255" value="<?=$arResult["USER_CURRENT_PASSWORD"]?>" class="login__form-input bx-auth-input" autocomplete="new-password" />
				</div>
	<?
		else:
	?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-checkword"><?=GetMessage("AUTH_CHECKWORD")?></label>
					<input type="text" name="USER_CHECKWORD" id="user-checkword" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="login__form-input bx-auth-input" autocomplete="off" />
				</div>
	<?
		endif
	?>
	<?endif?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-password"><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?></label>
					<input type="password" name="USER_PASSWORD" id="user-password" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="login__form-input bx-auth-input" autocomplete="new-password" />
				</div>
	<?if($arResult["SECURE_AUTH"]):?>
				<div class="login__form-block">
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
				</div>
	<?endif?>
				<div class="login__form-block">
					<label class="login__form-label" for="user-confirm-password"><?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?></label>
					<input type="password" name="USER_CONFIRM_PASSWORD" id="user-confirm-password" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="login__form-input bx-auth-input" autocomplete="new-password" />
				</div>
			<?if($arResult["USE_CAPTCHA"]):?>
				<div class="login__form-block">
					<div>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</div>
					<label class="login__form-label" for="captcha-word"><?echo GetMessage("system_auth_captcha")?></label>
					<input type="text" name="captcha_word" id="captcha-word" class="login__form-input" maxlength="50" value="" autocomplete="off" />
				</div>
			<?endif?>
			<input type="submit" class="login__form-submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" />
	</form>

	<div class="login__form-block">
		<?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
	</div>
	<?/*<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>*/?>

	<?if($arResult["PHONE_REGISTRATION"]):?>

	<script type="text/javascript">
	new BX.PhoneAuth({
		containerId: 'bx_chpass_resend',
		errorContainerId: 'bx_chpass_error',
		interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
		data:
			<?=CUtil::PhpToJSObject([
				'signedData' => $arResult["SIGNED_DATA"]
			])?>,
		onError:
			function(response)
			{
				var errorDiv = BX('bx_chpass_error');
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

	<div id="bx_chpass_error" style="display:none"><?ShowError("error")?></div>

	<?endif?>

	<?endif?>

	<?/*<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>*/?>

	</div>
	<div class="login__text">
		<div class="login__text-title">Регистрация нового пользователя</div>
		<div class="login__text-info">Регистрация на нашем сайте дает возможность оценивать охранные организации, управлять услугами, надо придумать сюда описание преимуществ регистрации и зачем еще она нужна.</div>
		<a href="/reg/" class="login__text-registration-link">Зарегистрироваться</a>
	</div>
</div>