<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<div class="passrecovery" data-test="test">
	<div class="login__flex">
		<div class="login__form">
			<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			<?
			if ($arResult["BACKURL"] <> '')
			{
			?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?
			}
			?>
				<input type="hidden" name="AUTH_FORM" value="Y">
				<input type="hidden" name="TYPE" value="SEND_PWD">

				<?/*<p><?echo GetMessage("sys_forgot_pass_label")?></p>*/?>

				<div style="display: none;">
					<div><b><?=GetMessage("sys_forgot_pass_login1")?></b></div>
					<div>
						<input type="hidden" name="USER_LOGIN" id="reg-login" value="<?=$arResult["USER_LOGIN"]?>" />
						<input type="hidden" name="USER_EMAIL" />
					</div>
					<div><?echo GetMessage("sys_forgot_pass_note_email")?></div>
				</div>
			<?if($arResult["PHONE_REGISTRATION"]):?>
				<div class="login__form-block">
					<label class="login__form-label" for="reg-phonenumber"><?=GetMessage("sys_forgot_pass_phone")?></label>
					<input class="login__form-input" type="text" name="USER_PHONE_NUMBER" id="reg-phonenumber" maxlength="255" value="<?=$arResult["USER_PHONE_NUMBER"]?>" placeholder="Введите номер телефона">
				</div>
				
				<?/*<div style="margin-top: 16px">
					<div><b></b></div>
					<div><input type="text" name="USER_PHONE_NUMBER" value="<?=$arResult["USER_PHONE_NUMBER"]?>" /></div>
					<div><?echo GetMessage("sys_forgot_pass_note_phone")?></div>
				</div>*/?>
			<?endif;?>

			<?if($arResult["USE_CAPTCHA"]):?>
				<div class="login__form-block">
					<div>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</div>
					<label class="login__form-label"><?echo GetMessage("system_auth_captcha")?></label>
					<div><input class="login__form-input" type="text" name="captcha_word" maxlength="50" value="" /></div>
				</div>
			<?endif?>
				<input class="login__form-submit" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
			</form>
		</div>
		<div class="login__text">
			<div class="login__text-title">Регистрация нового пользователя</div>
			<div class="login__text-info">Регистрация на нашем сайте дает возможность оценивать охранные организации и заказывать пакеты услуг.</div>
			<noindex>
			<a href="/reg/" class="login__text-registration-link"><?=GetMessage("AUTH_REG")?></a>
			</noindex>
		</div>
	</div>
</div>

<script type="text/javascript">
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>
