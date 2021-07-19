<?php

namespace Vincko;

class Order
{
	const REQUIRED_FIELD_POLICY = [
		"PASPORT"
	];

	// получим варианты оплаты
	public static function getPaymentSystem(){
		$obPaySystem = CSalePaySystemAction::GetList(
			["SORT" => "ASC"],
			["ACTIVE" => "Y"],
			false,
			false,
			[
				"PS_DESCRIPTION",
				"NAME",
				"LOGOTIP"
			]
		);
		while ($arPaySystemTmp = $obPaySystem->Fetch()) {
			$arPayIcon = CFile::GetFileArray($arPaySystemTmp["LOGOTIP"]);
			$arPaySystem[$arPaySystemTmp["ID"]] = $arPaySystemTmp;
			$arPaySystem[$arPaySystemTmp["ID"]]["ICON"] = $arPayIcon["SRC"];
		}
		return $arPaySystem;
	}

	public static function createOrderPolicy($arField, $paymentID, $quantity = false, $mounting = false)
	{

		\Bitrix\Main\Loader::includeModule("sale");

		// получаем ИД пользователя
		$userId = $GLOBALS["USER"]->IsAuthorized()
			? $GLOBALS["USER"]->GetID()
			: \CSaleUser::GetAnonymousUserID();

		// получаем информацию о продукте
		if ($policy = Policy::getById($arField["POLICY"]["ID"])) {
			$basket = \Bitrix\Sale\Basket::create(\Bitrix\Main\Context::getCurrent()->getSite());

			$item = $basket->createItem('catalog', $policy["ID"]);
			$item->setField('QUANTITY', 1);
			$item->setField('CURRENCY', 'RUB');
			$item->setField('PRODUCT_PROVIDER_CLASS', '\Bitrix\Catalog\Product\CatalogProvider');

			$arSetProps = $arField;

			$item->getPropertyCollection()->setProperty($arSetProps);

			$basket->refresh();

			$order = \Bitrix\Sale\Order::create(
				\Bitrix\Main\Context::getCurrent()->getSite(),
				$userId,
				\Bitrix\Currency\CurrencyManager::getBaseCurrency()
			);
			dump($arSetProps);
			$order->setPersonTypeId(1);
			$order->setBasket($basket);
		/*	$paymentCollection = $order->getPaymentCollection();
			$payment = $paymentCollection->createItem(
				\Bitrix\Sale\PaySystem\Manager::getObjectById($paymentID)
			);

			$payment->setField("SUM", $order->getPrice());
			$payment->setField("CURRENCY", $order->getCurrency());
*/
			$order->save();

			return $order->getId();
		}
	}


	//событие когда заказ со страховкой оплачены
	public static function orderPolicyPay($orderID)
	{
		\CModule::IncludeModule("sale"); // подключение модуля продаж

		$obBasket = \CSaleBasket::GetList(
			[],
			[
				"ORDER_ID" => $orderID
			],
			false,
			false,
			[]
		);
		while ($arBasket = $obBasket->Fetch()) {
			$arBasketIds[] = $arBasket["ID"];
		}
		$obBasketProductProp = \CSaleBasket::GetPropsList(
			[],
			[
				"BASKET_ID" => $arBasketIds
			]
		);
		while ($arBasketProductProp = $obBasketProductProp->Fetch()) {
			$arProduct[$arBasketProductProp["BASKET_ID"]][$arBasketProductProp["CODE"]] = $arBasketProductProp["VALUE"];
		}
		$error = "";
		foreach ( $arProduct as $arField) {
			//рассматриваем только полисы
			if(empty($arField["POLICY_ID"])){
				continue;
			}

			// заполнены ли все поля для полиса
			$requiredFields =  static::REQUIRED_FIELD_POLICY;

			foreach ($requiredFields as $nameField ) {
				if(empty($arField[$nameField])){
					$error .= "нет поля ".$nameField." у ".$arField["POLICY_ID"];
					continue 2;
				}

			}

			dump($arField);

		}





	}
}
