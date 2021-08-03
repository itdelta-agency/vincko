<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;

define('LOG_FILENAME', $_SERVER["DOCUMENT_ROOT"]. "/log.txt");

global $USER;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

function getPropertyByCode($propertyCollection, $code)  {
    foreach ($propertyCollection as $property)
    {
        if($property->getField('CODE') == $code)
            return $property;
    }
}
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}


$request = Context::getCurrent()->getRequest();

if ($request->isPost()) {

    $errorsValidate = [];


    if ($_SERVER['REMOTE_ADDR'] == '46.147.123.63') {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
        die();
    }

    $siteId = Context::getCurrent()->getSite();
    $currencyCode = CurrencyManager::getBaseCurrency();
    $productProviderClass = \Bitrix\Catalog\Product\Basket::getDefaultProviderName();

    // Создаёт новый заказ
    $order = Order::create($siteId, $USER->isAuthorized() ? $USER->GetID() : 1);
    $order->setPersonTypeId(3);
    $order->setField('CURRENCY', $currencyCode);

    $arProductsIds = $request['orderItemsIds'];
    $products = [];
    foreach ($arProductsIds as $arProductsId)
    {
         array_push($products, array('PRODUCT_ID' => $arProductsId, 'CURRENCY' => $currencyCode, 'QUANTITY' => 1, 'LID' => $siteId, 'PRODUCT_PROVIDER_CLASS' => $productProviderClass));
    }


    $basket = Basket::create($siteId);

    foreach ($products as $product) {
        if ($item = $basket->getExistsItem('catalog', $product["PRODUCT_ID"])) {
            $item->setField('QUANTITY', $item->getQuantity() + 1); //добавляем указанное количество к существующему товару

        } else {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }
    }

    $order->setBasket($basket);

    $shipmentCollection = $order->getShipmentCollection();
    $shipment = $shipmentCollection->createItem(
        Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
    );

    $shipmentItemCollection = $shipment->getShipmentItemCollection();

    /** @var Sale\BasketItem $basketItem */

    foreach ($basket as $basketItem)
    {
        $item = $shipmentItemCollection->createItem($basketItem);
        $item->setQuantity($basketItem->getQuantity());
    }

    $paymentId = $request['payment-method'];
    $paymentCollection = $order->getPaymentCollection();
    $payment = $paymentCollection->createItem(
        Bitrix\Sale\PaySystem\Manager::getObjectById($paymentId)
    );
    $payment->setField("SUM", $order->getPrice());
    $payment->setField("CURRENCY", $order->getCurrency());

    // Устанавливаем свойства
    $propertyCollection = $order->getPropertyCollection();
    $arProps = $request['orderProps'];
    foreach ($arProps as $code => $value)
    {
        $arProperty = getPropertyByCode($propertyCollection, $code);
        $arProperty->setValue($value);
    }
    $arPropertyAddress = $request['street'] .', '. $request['house'] . ', '. $request['housing'] . ', ' . $request['flat'];
    $arProperty = getPropertyByCode($propertyCollection, 'ADDRESS');
    $arProperty->setValue($arPropertyAddress);

    $arPropertyFIO = $request['surname'] .' '. $request['name'] . ' '. $request['patronomic'];
    $arProperty = getPropertyByCode($propertyCollection, 'FIO');
    $arProperty->setValue($arPropertyFIO);

    $passportData = 'Паспортные данные: Серия и номер паспорта: ' . $request['number'] . ' Дата выдачи: ' . $request['date'] . ' Кем выдан '.
        $request['whom'] . ' Код подразделения: '. $request['code']. ' Дата рождения: '. $request['birthday'] . ' Место рождения'
        .$request['place'];

    $registrationAddress = 'Адрес регистрации: Город/населенный пункт: ' . $request['city1'] . ' Улица: ' . $request['street1'] . ' Дом '.
     $request['house1'] . ' Корпус: '. $request['housing1']. ' Квартира: '. $request['flat1'] . ' Дата регистрации'
        .$request['date1'] . 'Индекс' .$request['index1'];

    $residenseAddress = ' Адрес фактического проживания: Город/населенный пункт: ' . $request['city2'] . ' Улица: ' . $request['street2'] . ' Дом '.
        $request['house2'] . ' Корпус: '. $request['housing2']. ' Квартира: '. $request['flat2'] . ' Дата регистрации'
        .$request['date2'] . ' Индекс' .$request['index2'];

    $comment = $passportData . $registrationAddress . $residenseAddress;
    $order->setField('USER_DESCRIPTION', $comment); // Устанавливаем поля комментария покупателя
    AddMessage2Log(123,'comment');
    // Сохраняем
    $order->doFinalAction(true);
    $result = $order->save();
    $orderId = $order->getId();
    if ($result->isSuccess())
    {
//        $session = \Bitrix\Main\Application::getInstance()->getSession();
//        $orderItems = $session->remove('orderItems');
        LocalRedirect("/order/?ORDER_ID=" . $orderId);
    }
}
