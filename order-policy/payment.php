<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->IncludeComponent(
	"vincko:sale.order",
	"payment",
	[
		"FILTER_REVIEWS_SUB_DOMAIN" => "Y",

		"SEF_FOLDER"        => "/order-policy/payment/",
		"PAY_TO_LIST"       => "/order/",
		"SEF_URL_TEMPLATES" => [
			"section" => "#SECTION_CODE_PATH#/",
		],
	]
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
