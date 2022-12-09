<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->RestartBuffer();

header('Content-type: application/json');

if (!$GLOBALS["USER"]->IsAuthorized()) {

	$return = $GLOBALS["USER"]->Login(strip_tags($request->getPost('USER_LOGIN')), strip_tags($request->getPost('USER_PASSWORD')), 'Y');

	if (empty($return['MESSAGE'])) {
		$result["status"] = true;
	} else {
		$result = [
			"status" => false,
			"error"  => strip_tags($return['MESSAGE'])
		];
	}
	echo json_encode($result);
}
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>