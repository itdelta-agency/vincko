<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
    "vincko:main.register",
    "vincko_reg",
    Array(
        "AUTH" => "Y",
        "REQUIRED_FIELDS" => array("PHONE_NUMBER","NAME","LAST_NAME"),
        "SET_TITLE" => "N",
        "SHOW_FIELDS" => array("PHONE_NUMBER","NAME","LAST_NAME"),
        "SUCCESS_PAGE" => "",
        "USER_PROPERTY_NAME" => "",
        "USE_BACKURL" => "Y"
    )
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>