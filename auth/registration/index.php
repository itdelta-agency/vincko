<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
dump( $APPLICATION->arAuthResult);
$APPLICATION->IncludeComponent(
	"bitrix:system.auth.registration",
	"popup",
	array('AUTH_RESULT' => $APPLICATION->arAuthResult)
); ?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>