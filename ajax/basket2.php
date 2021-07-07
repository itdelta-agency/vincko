<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//тестовый скрипт для добавления 1 произвольной страховки без свойств в корзину
use Bitrix\Sale;
\Bitrix\Main\Loader::includeModule('sale');
\Bitrix\Main\Loader::includeModule('catalog');

CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
$siteID = Bitrix\Main\Context::getCurrent()->getSite();
$fuser = Sale\Fuser::getId();
$productID = intval($_REQUEST["elementID"]);
//подгружаем пустую корзину
$basket = \Bitrix\Sale\Basket::LoadItemsForFUser(\Bitrix\Sale\Fuser::getId(), $siteID);
//количество
$quantity = 1;
//для получения стоимости товара в бонусах
$productInfo = CCatalogProduct::GetByIDEx($productID);

if (($productInfo["PRICES"][2]["CURRENCY"] == "BNS") && ($productInfo["PRICES"][2]["PRICE"] > 0)){
	/*
	 * цена товара в бонусах указана
	 * для теста - добавляю возможность оплаты бонусами
	 * вполне достаточно доп.св-ва bonusprice. Если оно присутствует и >0, то возможность оплаты бонусами существует
	 * или добавить свойство товару с отметкой о возможности оплаты бонусами
	 */
	$props = array(
		array(
			"NAME" => "Возможность оплаты бонусами",
			"CODE" => "BONUSPAYMENT",
			"VALUE" => 1
		),
		array(
			"NAME" => "Стоимость товара в бонусах",
			"CODE" => "BONUSPRICE",
			"VALUE" => $productInfo["PRICES"][2]["PRICE"]
		)
	);
}
$goodInfo = [
	"PRODUCT_ID" => $productID,
	"CURRENCY" => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
	"QUANTITY" => $quantity,
	"LID" => $siteID,
	"PROPS" => $props
];

$r = Bitrix\Catalog\Product\Basket::addProduct($goodInfo);
if (!$r->isSuccess()){
	//если вдруг че пошло не так
	var_dump($r->getErrorMessages());
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>