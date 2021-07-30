<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

if ($request->isPost()) {

    $items = json_decode($request->getPost('items'));
    $session = \Bitrix\Main\Application::getInstance()->getSession();
    $session->set('orderItems', $items);

    LocalRedirect("/order/");

}
