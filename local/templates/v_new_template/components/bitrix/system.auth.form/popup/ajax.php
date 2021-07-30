<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");


header('Content-type: application/json');
if ($arResult['ERROR']) {
	echo json_encode(array(
		'type' => 'error',
		'message' => strip_tags($arResult['ERROR_MESSAGE']['MESSAGE']),
	));
} else {
	echo json_encode(array('type' => 'ok'));
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>