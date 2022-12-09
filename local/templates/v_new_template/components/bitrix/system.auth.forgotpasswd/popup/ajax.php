<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->RestartBuffer();

header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["code_submit_button"] <> '' && !$USER->IsAuthorized())
{
	$result = [
		"TYPE" => "ERROR",
		"MESSAGE" => "Неверный код"
	];

	if($_REQUEST["SIGNED_DATA"] <> '')
	{
		if(($params = \Bitrix\Main\Controller\PhoneAuth::extractData($_REQUEST["SIGNED_DATA"])) !== false)
		{
			if(($userId = CUser::VerifyPhoneCode($params['phoneNumber'], $_REQUEST["SMS_CODE"])))
			{
				$result = [
					"TYPE" => "OK",
					"MESSAGE" => ""
				];
			}}}

	echo json_encode($result);
}else{
	echo '{
	"MESSAGE": "На ваш номер было выслано СМС с кодом подтверждения.",
    "TYPE": "OK",
    "SIGNED_DATA": "YToxOntzOjExOiJwaG9uZU51bWJlciI7czoxMjoiKzc5MTc2NjkyMDEyIjt9.4161c6a160573de00cd7d967a7b46052414d0f25213b4f727e8514a6776ad30f",
    "ID": 62
}';
}


/*
 * <div class="info-popup">
						<div class="info-popup__wrapper">
							<div class="info-popup__sign">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99996 17.3333C4.40496 17.3333 0.666626 13.595 0.666626 8.99998C0.666626 4.40498 4.40496 0.666645 8.99996 0.666645C13.595 0.666645 17.3333 4.40498 17.3333 8.99998C17.3333 13.595 13.595 17.3333 8.99996 17.3333ZM9.83329 4.83331H8.16663V9.83331H9.83329V4.83331ZM9.83329 11.5H8.16663V13.1666H9.83329V11.5Z"
										  fill="#FF3232"/>
								</svg>
							</div>
							<div class="info-popup__text">
								Извините, пользователь с таким номером телефона не зарегистрирован. Проверьте
								правильность ввода номера.
							</div>
						</div>
					</div>

<div class="phone-wrapper">
					<input type="text" name="USER_PHONE_NUMBER" value="<?=$arResult["USER_PHONE_NUMBER"]?>" class="email-input"  placeholder="e-mail" />
					<div class="info-popup">
						<div class="info-popup__wrapper">
							<div class="info-popup__sign">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99996 17.3333C4.40496 17.3333 0.666626 13.595 0.666626 8.99998C0.666626 4.40498 4.40496 0.666645 8.99996 0.666645C13.595 0.666645 17.3333 4.40498 17.3333 8.99998C17.3333 13.595 13.595 17.3333 8.99996 17.3333ZM9.83329 4.83331H8.16663V9.83331H9.83329V4.83331ZM9.83329 11.5H8.16663V13.1666H9.83329V11.5Z"
										  fill="#FF3232"/>
								</svg>
							</div>
							<div class="info-popup__text">
								Извините, пользователь с таким почтовым адресом не зарегистрирован. Проверьте
								правильность ввода почты.
							</div>
						</div>
					</div>
				</div>

				<div class="popup__success">
					<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							  d="M16.1402 7.7318C16.5645 8.08537 16.6218 8.71593 16.2682 9.14021L11.2682 15.1402C11.0884 15.356 10.826 15.4863 10.5453 15.499C10.2646 15.5117 9.99156 15.4058 9.79289 15.2071L6.79289 12.2071C6.40237 11.8166 6.40237 11.1834 6.79289 10.7929C7.18342 10.4024 7.81658 10.4024 8.20711 10.7929L10.4328 13.0186L14.7318 7.85984C15.0853 7.43556 15.7159 7.37824 16.1402 7.7318Z"
							  fill="white"/>
						<path d="M11.5 21C17.0228 21 21.5 16.5228 21.5 11C21.5 5.47715 17.0228 1 11.5 1C5.97715 1 1.5 5.47715 1.5 11C1.5 16.5228 5.97715 21 11.5 21Z"
							  stroke="white" stroke-width="2"/>
					</svg>

					Отправлено

				</div>
<div class="popup__success">
					<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							  d="M16.1402 7.7318C16.5645 8.08537 16.6218 8.71593 16.2682 9.14021L11.2682 15.1402C11.0884 15.356 10.826 15.4863 10.5453 15.499C10.2646 15.5117 9.99156 15.4058 9.79289 15.2071L6.79289 12.2071C6.40237 11.8166 6.40237 11.1834 6.79289 10.7929C7.18342 10.4024 7.81658 10.4024 8.20711 10.7929L10.4328 13.0186L14.7318 7.85984C15.0853 7.43556 15.7159 7.37824 16.1402 7.7318Z"
							  fill="white"/>
						<path d="M11.5 21C17.0228 21 21.5 16.5228 21.5 11C21.5 5.47715 17.0228 1 11.5 1C5.97715 1 1.5 5.47715 1.5 11C1.5 16.5228 5.97715 21 11.5 21Z"
							  stroke="white" stroke-width="2"/>
					</svg>

					<?= Loc::getMessage("FORGOT_SUCCESS")  ?>

				</div>
*/


if (!empty($APPLICATION->arAuthResult)) {
	//echo json_encode($APPLICATION->arAuthResult);
}
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>