<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<?$APPLICATION->IncludeComponent(
    "vincko:main.register",
    "vincko_reg",
    Array(
        "AUTH" => "N",
        "REQUIRED_FIELDS" => array("PHONE_NUMBER","NAME","LAST_NAME"),
        "SET_TITLE" => "N",
        "SHOW_FIELDS" => array("PHONE_NUMBER","NAME","LAST_NAME"),
        "SUCCESS_PAGE" => "/auth/",
        "USER_PROPERTY_NAME" => "",
        "USE_BACKURL" => "Y",
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>