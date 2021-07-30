<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<? $APPLICATION->IncludeComponent("bitrix:system.auth.form","popup",Array(
		"REGISTER_URL" => "register.php",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "profile.php",
		"SHOW_ERRORS" => "Y",
		"AJAX_MODE" => "Y"
	)
); ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>