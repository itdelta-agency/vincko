<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

CModule::IncludeModule('form');

$request = Application::getInstance()->getContext()->getRequest();
if ($request->isAjaxRequest()) {

	$error = CForm::Check(1, $_REQUEST, false, "Y", "Y");
	$arFieldLogicRequired = [
		"ACTUAL_ADDRESS" =>
			[
				"REQUEST_FIELD"  => "form_checkbox_ACTUAL_ADDRESS",
				"NOT_VALUE"      => "Y",
				"REQUIRED_FIELD" => [
					"ACTUAL_CITY",
					"ACTUAL_STREET",
					"ACTUAL_HOUSE",
					"ACTUAL_DATE",
					"ACTUAL_INDEX",
				]
			],
		"POLICY_ADDRESS" =>
			[
				"REQUEST_FIELD"  => "form_radio_POLICY_ADDRESS",
				"NOT_VALUE"      => "30",
				"REQUIRED_FIELD" => [
					"POLICY_CITY",
					"POLICY_HOUSE",
					"POLICY_STREET",
					"POLICY_HOUSING",
					"POLICY_DATE",
					"POLICY_INDEX"
				]

			]
	];
	foreach ($arFieldLogicRequired as $logicField => $logicValue) {
		if ($request->get($logicValue["REQUEST_FIELD"]) != $logicValue["VALUE"]) {
			continue;
		}
		foreach ($logicValue["REQUIRED_FIELD"] as $requiredField) {
			if (!empty($error[$requiredField])) {
				unset($error[$requiredField]);
			}
		}

	}
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>