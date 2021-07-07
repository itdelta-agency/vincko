<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//тестовый скрипт для оформления заказа через API с учетом бонусов
use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;
global $USER;
$USER = new CUser();
if ($USER->isAuthorized()){
	//оформление заказа только для авторизованных пользователей
	if (check_bitrix_sessid()){
		//проверка сессии
		
		//поля, которые приходят с запросом
		$request = Context::getCurrent()->getRequest();
		$orderFio = $request["ORDER_PROP_20"];
		$orderEmail = $request["ORDER_PROP_21"];
		$orderPhone = $request["ORDER_PROP_22"];
		$orderAddress = $request["ORDER_PROP_26"];
		$orderComment = $request["ORDER_DESCRIPTION"];
		$orderBonusPay = $request["ORDER_BONUSES"];
		$orderPaySystem = $request["PAY_SYSTEM_ID"];
		$orderDelivery = $request["DELIVERY_ID"];
		$userID = $USER->GetID();
		\Bitrix\Main\Loader::includeModule('sale');
		\Bitrix\Main\Loader::includeModule('catalog');
		
		$siteID = Bitrix\Main\Context::getCurrent()->getSite();
		$currencyCode = CurrencyManager::getBaseCurrency();
		
		//создаю новый заказ
		$order = Order::create($siteID, $userID);
		//id типа плательщика - физическое лицо (3)
		$order->setPersonTypeId(3);
		//базовая валюта - рубли
		$order->setField('CURRENCY', $currencyCode);
		//комментарий к заказу
		if ($orderComment) {
			$order->setField('USER_DESCRIPTION', $orderComment);
		}
		
		//информация о товарах в заказе
		$basket = Basket::loadItemsForFUser($userID, $siteID);
		//для одного товара-страховки (для демонстрации)
		//надо проходить по всем товарам и смотреть возможность оплаты бонусами, скидки и прочую информацию
		$basketElems = $basket->getBasketItems();
		//это для 1 товара. Если пакет добавляется, то надо перебирать возможность оплаты у всех
		$props = $basketElems[0]->getPropertyCollection();
		if ($props->getPropertyValues()["BONUSPAYMENT"]["VALUE"] == 1){
			//если можно оплатить бонусами, то ищем стоимость товара в бонусах. Если товаров несколько с оплатой бонусами, то суммировать в цикле
			$bonusPrice = $props->getPropertyValues()["BONUSPRICE"]["VALUE"];
		}
		//$quantity = 1;
		$order->setBasket($basket);
		
		
		//отгрузка и доставка
		$shipmentCollection = $order->getShipmentCollection();
		$shipment = $shipmentCollection->createItem(
			//СДЭК ID = 7
			Delivery\Services\Manager::getObjectById(7)
		);
		//$shipmentCollection = $order->getShipmentCollection();
		//$shipment = $shipmentCollection->createItem();
		$service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
		$shipment->setFields(array(
			'DELIVERY_ID' => $service['ID'],
			'DELIVERY_NAME' => $service['NAME'],
		));
		$shipmentItemCollection = $shipment->getShipmentItemCollection();
		foreach ($basket as $basketItem){
			$item = $shipmentItemCollection->createItem($basketItem);
			$item->setQuantity($basketItem->getQuantity());
		}
		
		//$shipmentItemCollection = $shipment->getShipmentItemCollection();
		//$shipmentItem = $shipmentItemCollection->createItem($item);
		//$shipmentItem->setQuantity($quantity);
		
		//оплата
		//оставшаяся сумма для оплаты после вычета бонусов = (СтоимостьТовараВБонусах - ОплаченнаяБонусамиСумма)*СтоимостьТовараВРублях/СтоимостьТовараВБонусах
		$paymentAfterBonuses = ceil(($bonusPrice - $orderBonusPay)*($order->getPrice())/$bonusPrice);
		
		$paymentCollection = $order->getPaymentCollection();
		
		//оплата картой (рублями) = 10
		$payment = $paymentCollection->createItem(
			PaySystem\Manager::getObjectById($orderPaySystem)
		);
		//$paySystemService = PaySystem\Manager::getObjectById(10);
		//данные по оплате
		//$payment->setField("PAY_SYSTEM_ID", $orderPaySystem);
		//$payment->setField("PAY_SYSTEM_NAME", "Оплата картой онлайн");
		$payment->setField("SUM", $paymentAfterBonuses);
		$payment->setField("CURRENCY", $currencyCode);
		
		//часть оплаты с внутреннего счета через бонусы
		$newPayment = $paymentCollection->createItem(
			PaySystem\Manager::getObjectById(9)
		);
		//$newPayment = $paymentCollection->createItem();
		
		//$newPayment->setField("PAY_SYSTEM_ID", 9);
		//$newPayment->setField("PAY_SYSTEM_NAME", "Бонусы");
		$newPayment->setFields([
			"SUM" => $order->getPrice() - $paymentAfterBonuses,
			"CURRENCY" => $currencyCode,
			"COMMENTS" => "Оплачено бонусами",
			"PAID" => "Y"
		]);
		$newPayment->setPaid("Y");
		//$newPayment->setField("SUM", $order->getPrice() - $paymentAfterBonuses);
		//$newPayment->setField("CURRENCY", $currencyCode);
		//$newPayment->setField("COMMENTS", "Оплачено бонусами");
		//$newPayment->setPaid("Y");
		//вычесть потраченные бонусы со счета пользователя (+необходима проверка на их наличие)
		$bonusNotes = "Списание бонусов за покупку";
		$bonusDescription = "MANUAL";
		CSaleUserAccount::UpdateAccount($userID, (-1)*$orderBonusPay, "BNS", $bonusDescription, 0, $bonusNotes);
		//установка оплаты бонусами как совершенную
		
		//свойства
		$propertyCollection = $order->getPropertyCollection();
		//номер телефона
		$phoneProp = $propertyCollection->getPhone();
		$phoneProp->setValue($orderPhone);
		//мыло
		$emailProp = $propertyCollection->getUserEmail();
		$emailProp->setValue($orderEmail);
		//имя заказчика
		$nameProp = $propertyCollection->getPayerName();
		$nameProp->setValue($orderFio);

		//сохранение заказа
		$order->doFinalAction(true);
		$result = $order->save();
		$orderId = $order->getId();
		
		//отправка смс уведомления. Событие SMS_SALE_NEW_ORDER. Шаблон ID = 4
		//отправку смс надо вешать на событие, связанное с оформлением заказа, в init.php
		/*
		$fields = array(
			'USER_PHONE' => $phoneProp,
			'ORDER_ID' => $orderId,
			'PRICE' => $order->getPrice()
		);
		$sms = new \Bitrix\Main\Sms\Event('SMS_SALE_NEW_ORDER', $fields);
		$sms->setSite($siteID);
		$sms->setLanguage('ru');
		$sms->send();
		*/
	}
} else {
	//неавторизованный пользователь не должен сюда попасть - уведомляем об этом
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>