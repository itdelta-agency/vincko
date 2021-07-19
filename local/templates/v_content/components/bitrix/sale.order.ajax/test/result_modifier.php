<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */
use Vincko\Policy;
$arResult["POLICY_ID"]= 781;
if ($policy = Policy::getById($arResult["POLICY_ID"] )) {

	$basket = \Bitrix\Sale\Basket::create(\Bitrix\Main\Context::getCurrent()->getSite());

	$item = $basket->createItem('catalog', $arResult["POLICY_ID"]);
	$item->setField('QUANTITY', 1);
	$item->setField('CURRENCY', 'RUB');
	$item->setField('PRODUCT_PROVIDER_CLASS', '\Bitrix\Catalog\Product\CatalogProvider');

	$basket->refresh();
}
$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);