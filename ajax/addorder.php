<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();


if ($request->isPost()) {

    $items = json_decode($request->getPost('items'));
    //получаем id товаров
    $complect_id = $items[0]->active == true ? $items[0]->id : null;
    $subscription_fee_id = $items[1]->active == true ? $items[1]->id : null;
    $policy_id = $items[2]->active == true ? $items[2]->id : null;
    //если товаров нет
    if($complect_id==null && $subscription_fee_id==null && $policy_id==null)
    {
        $response = ['message' => 'order error', 'success' => false];
        $response = new \Bitrix\Main\Engine\Response\Json($response);
        $response->send();
    }
    //если в заказе на Готовое решение есть: Страховка, Комплект оборудования, Услуги охранной компании:
    if($complect_id && $subscription_fee_id && $policy_id)
    {
        //заполнение формы для страхового полиса в макете, логика работы в ТЗ
        //оформление доставки описание здесь в макете
        //оплата/рассрочка
    }
    //если в заказе на Готовое решение есть: Страховка, Услуги охранной компании
    if($complect_id==null && $subscription_fee_id && $policy_id)
    {
        //заполнение формы для страхового полиса
        //оплата/рассрочка
    }
    //если в заказе на Готовое решение есть: Комплект оборудования, Услуги охранной компании
    if($complect_id && $subscription_fee_id && $policy_id==null)
    {
        //оформление доставки
        //оплата/рассрочка
    }
    //если в заказе на Готовое решение есть: Страховка, Комплект оборудования
    if($complect_id && $subscription_fee_id==null && $policy_id)
    {
        //заполнение формы для страхового полиса
        //оформление доставки
        //оплата/рассрочка
    }
    //если в заказе на Готовое решение есть только Страховка (или страховка приобретается как самостоятельный продукт)
    if($complect_id==null && $subscription_fee_id==null && $policy_id) {
        // заполнение формы для страхового полиса
        //оплата/рассрочка

    }
    //если в заказе на Готовое решение есть только Комплект оборудования
    if($complect_id && $subscription_fee_id==null && $policy_id==null)
    {
        //оформление доставки
        //оплата/рассрочка
    }
    //если в заказе на Готовое решение есть только Услуги охранной компании
    if($complect_id=null && $subscription_fee_id && $policy_id=null)
    {
        //оплата/рассрочка
    }

    /*
     * Оформление заказа
     */
    Bitrix\Main\Loader::includeModule('sale');
    Bitrix\Main\Loader::includeModule('catalog');

    $products = array(
        array(
            'PRODUCT_ID' => $complect_id,
            'QUANTITY' => 1,
            'PRODUCT_PROVIDER_CLASS' => \Bitrix\Catalog\Product\Basket::getDefaultProviderName()
        ),
        array(
            'PRODUCT_ID' => $subscription_fee_id,
            'QUANTITY' => 1,
            'PRODUCT_PROVIDER_CLASS' => \Bitrix\Catalog\Product\Basket::getDefaultProviderName()
        ),
        array(
            'PRODUCT_ID' => $policy_id,
            'QUANTITY' => 1,
            'PRODUCT_PROVIDER_CLASS' => \Bitrix\Catalog\Product\Basket::getDefaultProviderName()
        ),
    );
    global $USER;
    $registeredUserID = $USER->GetID();
    $siteId = \Bitrix\Main\Context::getCurrent()->getSite();
    $basket = Bitrix\Sale\Basket::create($siteId);
    //создаем объект корзины и наполняем ее товарами
    foreach ($products as $product) {
        if($product["PRODUCT_ID"] != null) {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }
    }
    //создадим заказ
    $order = Bitrix\Sale\Order::create($siteId, $registeredUserID);
    $order->setPersonTypeId(1);
    $order->setBasket($basket);
    //создадим отгрузку
    $shipmentCollection = $order->getShipmentCollection();
    $shipment = $shipmentCollection->createItem(
        Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
    );
    //наполним отгрузку товарами
    $shipmentItemCollection = $shipment->getShipmentItemCollection();

    foreach ($basket as $basketItem) {
        $item = $shipmentItemCollection->createItem($basketItem);
        $item->setQuantity($basketItem->getQuantity());
    }
    //создадим оплату
    $paymentCollection = $order->getPaymentCollection();
    $payment = $paymentCollection->createItem(
        Bitrix\Sale\PaySystem\Manager::getObjectById(10)
    );
    //настройка свойств оплаты
    $payment->setField("SUM", $order->getPrice());
    $payment->setField("CURRENCY", $order->getCurrency());
    //сохраним заказ
    $result = $order->save();
    if ($result->isSuccess()) {
        $orderId = $result->getId();
        $response = ['orderId' => $orderId, 'success' => true];
        $response = new \Bitrix\Main\Engine\Response\Json($response);
        $response->send();
    } else {
        $response = ['message' => 'order error', 'success' => false];
        $response = new \Bitrix\Main\Engine\Response\Json($response);
        $response->send();
    }
}
?>

