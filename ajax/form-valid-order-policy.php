<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

CModule::IncludeModule('form');

$request = Application::getInstance()->getContext()->getRequest();


if ($request->isAjaxRequest()) {
// обработаем поля
	$arrVALUES = \Vincko\Order::validOrderPolicy($request->get("WEB_FORM_ID"), $_REQUEST);

	$error = CForm::Check(1, $arrVALUES, false, "Y", "Y");

	$result =
		[
			"value" => $arrVALUES,
			"count" => count($error),
			"error" => $error,
		];

	echo json_encode($result);

}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>