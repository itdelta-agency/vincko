<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

CModule::IncludeModule('form');

$request = Application::getInstance()->getContext()->getRequest();


if ($request->isAjaxRequest()) {


	$error = CForm::Check(1, $_REQUEST, false, "Y", "Y");

	$arFieldLogicRequired = [
		"form_checkbox_ACTUAL_ADDRESS" =>
			[
				"ACTUAL_CITY",
				"ACTUAL_STREET",
				"ACTUAL_HOUSE",
				"ACTUAL_DATE",
				"ACTUAL_INDEX",
			],
		"form_radio_POLICY_ADDRESS"    =>
			[
				"POLICY_CITY",
				"POLICY_HOUSE",
				"POLICY_STREET",
				"POLICY_HOUSING",
				"POLICY_DATE",
				"POLICY_INDEX"
			]
	];
	if (!empty($request->get('form_checkbox_ACTUAL_ADDRESS'))) {
		foreach ($arFieldLogicRequired["form_checkbox_ACTUAL_ADDRESS"] as $requiredField) {
			unset($error[$requiredField]);
		}
	}
	if ($request->get("form_radio_POLICY_ADDRESS") != 30) {
		foreach ($arFieldLogicRequired["form_radio_POLICY_ADDRESS"] as $requiredField) {
			unset($error[$requiredField]);
		}
	}


	if (count($error) > 0) {
		echo json_encode($error);
	}
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>