<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<div class="reg">
	<div class="reg__flex">
		<div class="reg__form">
			<?if($USER->IsAuthorized()):?>

			<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

			<?else:?>
			<?
			if (count($arResult["ERRORS"]) > 0):
				foreach ($arResult["ERRORS"] as $key => $error)
					if (intval($key) == 0 && $key !== 0) 
						$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

				ShowError(implode("<br />", $arResult["ERRORS"]));

			elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
			?>
			<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
			<?endif?>

			<?if($arResult["SHOW_SMS_FIELD"] == true):?>

			<form class="reg__form-form" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform">
				<?
				if($arResult["BACKURL"] <> ''):
				?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?
				endif;
				?>
				<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
				<div class="login__form-block">
					<label class="login__form-label" for="sms-code"><?echo GetMessage("main_register_sms")?><span class="starrequired">*</span></label>
					<input class="login__form-input" size="30" type="text" name="SMS_CODE" id="sms-code" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" placeholder="Введите номер телефона" autocomplete="off">
				</div>
				<input type="submit" name="code_submit_button" class="login__form-submit" value="<?echo GetMessage("main_register_sms_send")?>">
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

			<?else:?>

			<form class="reg__form-form" id="reg-form" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
			<?
			if($arResult["BACKURL"] <> ''):
			?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?
			endif;
			?>
<?/*			
			<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
				<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>
				<?else:?>
					<div class="reg__form-block">
						<td><?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
						<?
				switch ($FIELD)
				{
					case "PASSWORD":
						?><input class="reg__form-input" size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="bx-auth-input" />
			<?if($arResult["SECURE_AUTH"]):?>
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
			<?
						break;
					case "CONFIRM_PASSWORD":
						?><input class="reg__form-input" size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" /><?
						break;
					default:
						if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
						?><input class="reg__form-input" size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" /><?
								
							?><?
				}?>
				
					</div>
				<?endif?>
			<?endforeach?>
			*/?>
			
			<?// ********************* User properties ***************************************************?>
			<?/*<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
			
				<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
				<div class="reg__form-block">
					
				</div>
				<tr><td colspan="2"><?=trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
				
				<tr><td><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></td><td>
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.field.edit",
							$arUserField["USER_TYPE"]["USER_TYPE_ID"],
							array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
				<?endforeach;?>
			<?endif;?>*/?>
			<?// ******************** /User properties ***************************************************?>
			<?/*пользовательское свойство*/?>
			<div class="reg__form-block">
				<select name="UF_USERTYPE" class="reg__form-select">
					<option value="4">Физическое лицо</option>
					<option value="5">Юридическое лицо</option>
				</select>
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" type="text" size="30" name="REGISTER[NAME]" placeholder="Имя<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["NAME"] == "Y"):?>*<?endif?>">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" type="text" size="30" name="REGISTER[LAST_NAME]" placeholder="Фамилия<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["LAST_NAME"] == "Y"):?>*<?endif?>">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" type="text" size="30" name="REGISTER[SECOND_NAME]" placeholder="Отчество<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["SECOND_NAME"] == "Y"):?>*<?endif?>">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" type="text" size="30" name="REGISTER[EMAIL]" placeholder="E-mail">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" type="password" size="30" name="REGISTER[PASSWORD]" placeholder="Придумайте пароль<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["PASSWORD"] == "Y"):?>*<?endif?>" autocomplete="off">
				<?if($arResult["SECURE_AUTH"]):?>
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
			<div class="reg__form-block">
				<input class="reg__form-input" type="password" size="30" name="REGISTER[CONFIRM_PASSWORD]" placeholder="Повторите пароль<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["CONFIRM_PASSWORD"] == "Y"):?>*<?endif?>" autocomplete="off">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" id="reg-phonenumber" type="text" size="30" name="REGISTER[PHONE_NUMBER]" placeholder="Номер телефона<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["PHONE_NUMBER"] == "Y"):?>*<?endif?>">
			</div>
			<div class="reg__form-block">
				<input class="reg__form-input" id="reg-login" type="hidden" size="30" name="REGISTER[LOGIN]" placeholder="Логин<?if ($arResult["REQUIRED_FIELDS_FLAGS"]["LOGIN"] == "Y"):?>*<?endif?>">
			</div>
			<?
			/* CAPTCHA */
			if ($arResult["USE_CAPTCHA"] == "Y")
			{
				?>
					<div class="reg__form-block">
						<div><b><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></b></div>
						<div><input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" /></div>
						<div><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
						<div><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span></div>
						<div><input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" /></div>
					</div>
				<?
			}
			/* !CAPTCHA */
			?>
				<div class="reg__form-block-pp">
					<input type="checkbox" id="pp" class="reg__form-checkbox" checked>
					<label class="reg__form-pp" for="pp">Нажимая кнопку «Зарегистрироваться», вы даете согласие на обработку персональных данных в соответствии с <a href="/user-agreement/" target="_blank">Пользовательским соглашением</a> и <a href="/privacy-policy/" target="_blank">Политикой конфиденциальности</a>.</label>
				</div>
				<input type="submit" class="reg__form-submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>">
			</form>

			<?/*пожелания к паролю - <p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>*/?>

			<?endif //$arResult["SHOW_SMS_FIELD"] == true ?>

			<?/*про обязательные поля - <p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>*/?>

			<?endif?>
		</div>
		<div class="reg__text">
			<div class="reg__text-title">Преимущества партнерства с <span class="vincko-color">Vincko</span></div>
			<div class="reg__text-item">Регистрация на нашем сайте дает возможность оценивать охранные организации, заказывать пакеты услуг и охранное оборудование.</div>
		</div>
	</div>
</div>