<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"vincko:main.register",
	"vincko",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("PHONE_NUMBER","NAME","LAST_NAME"),
		"SET_TITLE" => "N",
		"SHOW_FIELDS" => array("EMAIL","PHONE_NUMBER","NAME","SECOND_NAME","LAST_NAME"),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => array("UF_USERTYPE"),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>