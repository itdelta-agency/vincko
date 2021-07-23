<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
//print_r(json_encode($_POST));
//print_r($request);

//$complect_id = intval($_POST['order-id']['complect_id']);
//$guard_id = intval($_POST['order-id']['guard_id']);
//$insurance_id = intval($_POST['order-id']['insurance_id']);

//if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
//    if ($complect_id && $guard_id && $insurance_id) {
//        CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
//        Add2BasketByProductID($complect_id, 1, false);
//        Add2BasketByProductID($guard_id, 1, false);
//        Add2BasketByProductID($insurance_id, 1, false);
//    }
//}

$res = ["result" => "OK"];
$response = new \Bitrix\Main\Engine\Response\Json($res);
$response->send();

?>
