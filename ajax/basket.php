<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
/*$basket = \Bitrix\Sale\Basket::LoadItemsForFUser(\Bitrix\Sale\Fuser::getId(),v1);*/
//корзины формально не существует, поэтому при оформлении новых заказов очищаем возможное содержимое корзины
\Bitrix\Main\Loader::includeModule('sale');
\Bitrix\Main\Loader::includeModule('catalog');
//проверить работу при параллельном заказе двумя разными пользователями
CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
$siteID = \Bitrix\Main\Context::getCurrent()->getSite();
//подгружаем пустую корзину
$basket = \Bitrix\Sale\Basket::LoadItemsForFUser(\Bitrix\Sale\Fuser::getId(), $siteID);

/*
 * загружаю данные по пакету со всеми свойствами
 * цену необходимо высчитывать заново с учетом свойств
 */
$packetID = intval($_REQUEST["packetID"]);
$complectID = intval($_REQUEST["complectID"]);
$strahovkaID = intval($_REQUEST["strahovkaID"]);
$abonplataID = intval($_REQUEST["abonplataID"]);
//количество - пока что всегда можно заказать только 1 пакет
//$quantity = intval($request->getPost("quantity"));
$quantity = 1;
//стоимость пакета начальная
$packetPrice = 0;
//свойства, за счет которых меняется стоимость пакета
//$properties = array();
//проверять на наличие товаров в корзине не надо - мы их чистили несколькими строками ранее

//добавляю товар "пакет" с нулевой стоимостью. Цена будет формироваться за счет встроенных в пакет опций - оборудования, абонплаты и страховки
$item = $basket->createItem('catalog', $packetID);
$item->setFields(array(
    'QUANTITY' => $quantity,
    'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
    'LID' => $siteID,
	'PRICE' => $packetPrice,
	'CUSTOM_PRICE' => 'Y',
	'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
));

//добавление опций
//комплект оборудования
if ($complectID){
	$complectValues = CCatalogProduct::GetByIDEx($complectID);
	//цена - $complectValues["PRICES"][1]["PRICE"]
	$packetPrice += $complectValues["PRICES"][1]["PRICE"];
	/*$properties[] = [
		'NAME' => "Комплект оборудования",
        'CODE' => 'P_COMPLECT',
        'VALUE' => $complectValues["NAME"]
    ];*/
	$item = $basket->createItem('catalog', $complectID);
	$equipmentDiscounts = CCatalogDiscount::GetDiscountByProduct($complectID, $USER->GetUserGroupArray(), "N", 1, $siteID);
	if ($equipmentDiscounts !== false){
		//если есть скидка, то устанавливаем лучшую цену
		$equipmentPrice = CCatalogProduct::CountPriceWithDiscount($complectValues["PRICES"][1]["PRICE"], $complectValues["PRICES"][1]["CURRENCY"], $equipmentDiscounts);
	} else {
		//если нет скидок, то цена не меняется
		$equipmentPrice = $complectValues["PRICES"][1]["PRICE"];
	}
	$item->setFields(array(
		'QUANTITY' => $quantity,
		'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
		'LID' => $siteID,
		'PRICE' => $equipmentPrice,
		'CUSTOM_PRICE' => 'Y',
		'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
	));
}
//страховка
if ($strahovkaID){
	$strahovkaValues = CCatalogProduct::GetByIDEx($strahovkaID);
	//цена - $strahovkaValues["PRICES"][1]["PRICE"]
	$packetPrice += $strahovkaValues["PRICES"][1]["PRICE"];
	/*$properties[] = [
		'NAME' => "Страхование",
        'CODE' => 'P_SKU_STRAHOVKA',
        'VALUE' => $strahovkaValues["NAME"]
    ];*/
	$item = $basket->createItem('catalog', $strahovkaID);
	$item->setFields(array(
		'QUANTITY' => $quantity,
		'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
		'LID' => $siteID,
		'PRICE' => $strahovkaValues["PRICES"][1]["PRICE"],
		'CUSTOM_PRICE' => 'Y',
		'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
	));
}
//абонплата
if ($abonplataID){
	$abonplataValues = CCatalogProduct::GetByIDEx($abonplataID);
	$packetPrice += $abonplataValues["PRICES"][1]["PRICE"];
	/*$properties[] = [
		'NAME' => "Абонентская плата",
        'CODE' => 'P_SKU_ABONPLATA',
        'VALUE' => $abonplataValues["NAME"]
    ];*/
	$item = $basket->createItem('catalog', $abonplataID);
	$item->setFields(array(
		'QUANTITY' => $quantity,
		'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
		'LID' => $siteID,
		'PRICE' => $abonplataValues["PRICES"][1]["PRICE"],
		'CUSTOM_PRICE' => 'Y',
		'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
	));
}

/*if ($properties){
    $item->getPropertyCollection()->setProperty($properties);
}*/
//$result = \Bitrix\Catalog\Product\Basket::addProductToBasket($basket, $product, array('SITE_ID' => $siteID));
$basket->save();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>