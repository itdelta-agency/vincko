<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

?>

<div class="packet__promo" id="<?=$itemIds['ID']?>">
	<div class="wrap">
		<div class="packet__promo-pic">
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$name?>">
		</div>
		<div class="packet__promo-text">
			<h1><?=$name?></h1>
			<div class="packet__promo-announce"><?=$arResult['PREVIEW_TEXT']?></div>
		</div>
	</div>
</div>
<div class="wrap">
	<div class="packet__config-title">Конфигурация пакета</div>
	<div class="packet__config-flex">
		<div class="packet__config">
			<div class="packet__config-item<?if ($arResult["PROPERTIES"]["P_COMPLECT_WITH"]["VALUE"] == "Да"):?> packet__config-item-y<?endif;?>">
				<?if ($arResult["PROPERTIES"]["P_COMPLECT_WITH"]["VALUE"] != "Да"):?>
				<div class="packet__switcher">
					<label class="packet__label-switcher inline-block" for="packet-complect"><input type="checkbox" class="js-switcher-p" id="packet-complect" data-name="complect" checked><div class="packet__label-switcher-slider"></div></label>
				</div>
				<?endif;?>
				<div id="js-packet-complect" class="packet__config-item-flex">
					<div class="packet__config-item-left">
						<div class="packet__config-item-title">Комплект оборудования</div>
						<div class="packet__config-item-name"><?=$arResult['PACKET_COMPLECT']['NAME']?></div>
						<?/*<input type="hidden" name="complect" value="<?=$arResult['PACKET_COMPLECT']['ID']?>">*/?>
						<a href="<?=$arResult['PACKET_COMPLECT']['DETAIL_PAGE_URL']?>" target="_blank" class="packet__config-item-name-link">Подробнее о комплекте</a>
						<?if ($arResult["PACKET_COMPLECT_COUNT"] > 1):?>
						<div class="clear"></div>
						<a href="/pakety-okhrannykh-uslug/packet-complect/?packetID=<?=$arResult["ID"]?><?if ($_REQUEST["eq"]):?>&eq=<?=intval($_REQUEST["eq"])?><?endif;?><?if ($_REQUEST["op"]):?>&op=<?=intval($_REQUEST["op"])?><?endif;?>" class="packet__config-item-another-chop inline-block">Выбрать другой комплект</a>
						<?endif;?>
					</div>
					<div class="packet__config-item-mid">
						<div class="packet__config-item-mid-text">
							<?/*=$arResult['PACKET_COMPLECT']['PREVIEW_TEXT']*/?>
							<ul>
							<?foreach ($arResult["COMPLECT_EQUIPMENT"] as $arce):?>
								<li><?=$arce?></li>
							<?endforeach;?>
							</ul>
						</div>
					</div>
					<div class="packet__config-item-right">
						<div class="packet__config-item-price"><span class="js-price"><?=$arResult['PACKET_COMPLECT']['PRICE']?></span> &#8381;<?/*<span class="packet__config-item-price-old">50 630 ₽</span>*/?></div>
						<?/*<div class="packet__config-item-discount">скидка 10% при покупке абонплаты</div>*/?>
					</div>
				</div>
				<div id="js-packet-complect-no" class="packet__config-item-title-invisible">Комплект оборудования</div>
			</div>
			<div class="packet__config-item<?if ($arResult["PROPERTIES"]["P_ABONENTPLATA_WITH"]["VALUE"] == "Да"):?> packet__config-item-y<?endif;?>">
				<?if ($arResult["PROPERTIES"]["P_ABONENTPLATA_WITH"]["VALUE"] != "Да"):?>
				<div class="packet__switcher">
					<label class="packet__label-switcher inline-block" for="packet-abonplata"><input type="checkbox" class="js-switcher-p" id="packet-abonplata" data-name="abonplata" checked><div class="packet__label-switcher-slider"></div></label>
				</div>
				<?endif;?>
				<div id="js-packet-abonplata" class="packet__config-item-flex">
					<div class="packet__config-item-left">
						<div class="packet__config-item-title">Услуги охранной компании</div>
						<?if ($arResult["CHOP_INFO"]["NAME"]):?><div class="packet__config-item-name"><?=$arResult["CHOP_INFO"]["NAME"]?></div><?endif;?>
						<?if ($arResult["CHOP_INFO"]["CITY_NAME"]):?><div class="packet__config-item-gray"><?=$arResult["CHOP_INFO"]["CITY_NAME"]?></div><?endif;?>
						<?/*если охранная компания выбрана, то писать текст "Выбрать другую"*/?>
						<a href="/pakety-okhrannykh-uslug/packet-company/?packetID=<?=$arResult["ID"]?><?if ($_REQUEST["eq"]):?>&eq=<?=intval($_REQUEST["eq"])?><?endif;?><?if ($_REQUEST["op"]):?>&op=<?=intval($_REQUEST["op"])?><?endif;?>" class="packet__config-item-another-chop inline-block"><?if ($arResult["CHOP_INFO"]["CITY_NAME"]){?>Выбрать другую<?}else{?>Выбрать компанию<?}?></a>
					</div>
					<div class="packet__config-item-mid">
						<?if ($arResult["PRODUCT_PROPERTIES"]["P_ABONENTPLATA_Y"]["SET"] == 1):?>
						<div class="packet__config-item-selecter">
							<?if ($arResult["CHOP_INFO"]["ABONPLATA"]):?>
							<div class="packet__config-select">
								<?foreach ($arResult["CHOP_INFO"]["ABONPLATA"] as $k => $arca):?>
								<input type="radio" class="js-packet-radio js-input-radio input__radio inline-block" data-id="<?=$arca["ID"]?>" data-name="abonplata" data-price="<?=$arca["PRICE"]?>" id="abonplata-service<?=$arca["ID"]?>" name="abonplata-service" value="<?=$arca["ID"]?>"<?if ($k === 0):?> checked<?endif;?>><label for="abonplata-service<?=$arca["ID"]?>" class="packet__label-radio"><?=$arca["NAME"]?> - <?=$arca["PRICE"]?> руб.<?/* <span class="packet__label-radio-gray">1.5руб/день</span>*/?></label>
								<?endforeach;?>
							</div>
							<?endif;?>
						</div>
						<?endif;?>
					</div>
					<div class="packet__config-item-right">
						<?foreach ($arResult["CHOP_INFO"]["ABONPLATA"] as $k => $arcaSKU):?>
						<div id="abonplata-price<?=$arcaSKU["ID"]?>" class="js-packet-abonplata-price packet__config-item-price"<?if ($k !== 0):?> style="display: none;"<?endif;?>><span class="js-price"><?=$arcaSKU["PRICE"]?></span> &#8381;<?/*<span class="packet__config-item-price-old">30 000 ₽</span>*/?></div>
						<?endforeach;?>
						<?/*<div class="packet__config-item-price">1500 ₽<span class="packet__config-item-price-old">2500 ₽</span></div>*/?>
						<?/*<div class="packet__config-item-discount">скидка 50% при покупке оборудования и страховки</div>*/?>
					</div>
				</div>
				<div id="js-packet-abonplata-no" class="packet__config-item-title-invisible">Услуги охранной компании</div>
			</div>
			<div class="packet__config-item<?if ($arResult["PROPERTIES"]["P_STRAHOVKA_WITH"]["VALUE"] == "Да"):?> packet__config-item-y<?endif;?>">
				<?if ($arResult["PROPERTIES"]["P_STRAHOVKA_WITH"]["VALUE"] != "Да"):?>
				<div class="packet__switcher">
					<label class="packet__label-switcher inline-block" for="packet-strahovka"><input type="checkbox" class="js-switcher-p" id="packet-strahovka" data-name="strahovka" checked><div class="packet__label-switcher-slider"></div></label>
				</div>
				<?endif;?>
				<div id="js-packet-strahovka" class="packet__config-item-flex">
					<div class="packet__config-item-left">
						<div class="packet__config-item-title">Страхование</div>
						<div class="packet__config-item-name"><?=$arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["LINK_ELEMENT_VALUE"][$arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]]["NAME"]?></div>
						<a href="/strahovanie/" target="_blank" class="packet__config-item-name-link">Подробнее о страховке</a>
					</div>
					<div class="packet__config-item-mid">
						<div class="packet__config-item-selecter">
							<?foreach ($arResult["P_STRAHOVKA_SKU"] as $k => $arpsSKU):?>
							<input type="radio" class="js-packet-radio js-input-radio input__radio inline-block" data-id="<?=$arpsSKU["ID"]?>" data-name="strahovka" data-price="<?=$arpsSKU["PRICE"]?>" id="strahovka-service<?=$arpsSKU["ID"]?>" name="strahovka" value="<?=$arpsSKU["ID"]?>"<?if ($k == 0):?> checked<?endif;?>><label for="strahovka-service<?=$arpsSKU["ID"]?>" class="packet__label-radio"><?=$arpsSKU["NAME"]?><?/*<span class="packet__label-radio-gray">1.5руб/день</span>*/?></label>
							<?endforeach;?>
							<?/*<input type="radio" class="input__radio inline-block" id="strahovka-service2" name="strahovka-service"><label for="strahovka-service2" class="packet__label-radio">6 мес - 1000 руб. <span class="packet__label-radio-gray">1.5руб/день</span></label>
							<input type="radio" class="input__radio inline-block" id="strahovka-service3" name="strahovka-service"><label for="strahovka-service3" class="packet__label-radio">12 мес - 1500 руб. <span class="packet__label-radio-gray">1.5руб/день</span></label>*/?>
						</div>
					</div>
					<div class="packet__config-item-right">
						<?foreach ($arResult["P_STRAHOVKA_SKU"] as $k => $arpsSKU):?>
						<div id="strahovka-price<?=$arpsSKU["ID"]?>" class="js-packet-strahovka-price packet__config-item-price"<?if ($k>0):?> style="display: none;"<?endif;?>><span class="js-price"><?=$arpsSKU["PRICE"]?></span> &#8381;<?/*<span class="packet__config-item-price-old">30 000 ₽</span>*/?></div>
						<?endforeach;?>
						<?/*<div class="packet__config-item-discount">скидка 25% на стоимость страховки при покупке абонплаты на 25 месяцев и оборудования</div>*/?>
					</div>
				</div>
				<div id="js-packet-strahovka-no" class="packet__config-item-title-invisible">Страхование</div>
			</div>
		</div>
		<div class="packet__price">
			<div class="packet__price-itogo">Итого</div>
			<div class="packet__price-value"><span class="js-price" id="js-fullprice"><?=$price['PRICE']?></span> &#8381;<?/*<span class="packet__price-value-old"><?=$price['PRINT_RATIO_BASE_PRICE']?></span>*/?></div>
					<?/*<div class="packet__price-abonplata-info">
						абонплата <span>3 мес х 100 руб.</span> по выбранной опции производится непосредственно охранной компании при заключении договора охранных услуг
					</div>*/?>
			<form id="js-packet-form" method="POST" action="/ajax/basket.php">
				<input type="hidden" id="packetID" name="packetID" value="<?=$arResult["ID"]?>">
				<input type="hidden" id="complectID" name="complectID" value="<?=$arResult["PACKET_COMPLECT"]["ID"]?>">
				<input type="hidden" id="strahovkaID" name="strahovkaID" value="<?=$arResult["P_STRAHOVKA_SKU"][0]["ID"]?>">
				<input type="hidden" id="abonplataID" name="abonplataID" value="<?=$arResult["CHOP_INFO"]["ABONPLATA"][0]["ID"]?>">
			</form>
			<?if (!$USER->IsAuthorized()){?>
			<p class="packet__price-auth">Зарегистрируйтесь на сайте для оформления заказа</p>
			<a href="/login/?backurl=<?=$arResult["DETAIL_PAGE_URL"]?>" class="packet__price-linkauth">Вход/регистрация</a>
			<?}else{?>
			<a <?/*href="javascript:void(0);"*/?> href="#" class="packet__price-linkgo" <?/*id="<?=$itemIds['ADD_BASKET_LINK']?>"*/?> id="js-neworder"><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></a>
			<?}?>
			<div class="packet__price-summary">В пакет входит:</div>
			<div class="packet__price-summary-list">
				<?if (!empty($arResult['PACKET_COMPLECT']['NAME'])):?><div id="js-total-complect" class="packet__price-summary-row">
					<div class="packet__price-summary-title">Комплект оборудования <?=$arResult['PACKET_COMPLECT']['NAME']?></div>
					<div class="packet__price-summary-value"><span class="js-price" id="js-complect-price"><?=$arResult['PACKET_COMPLECT']['PRICE']?></span> &#8381;</div>
				</div>
				<?endif;?>
				<?if (!empty($arResult["CHOP_INFO"]["NAME"])):?><div id="js-total-abonplata" class="packet__price-summary-row">
					<div class="packet__price-summary-title"><?=$arResult["CHOP_INFO"]["NAME"]?><?/* 12 мес */?></div>
					<div class="packet__price-summary-value"><span class="js-price" id="js-abonplata-price"><?=$arResult["CHOP_INFO"]["ABONPLATA"][0]["PRICE"]?></span> &#8381;</div>
				</div>
				<?endif;?>
				<?if (!empty($arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"])):?><div id="js-total-strahovka" class="packet__price-summary-row">
					<div class="packet__price-summary-title"><?=$arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["LINK_ELEMENT_VALUE"][$arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]]["NAME"]?></div>
					<div class="packet__price-summary-value"><span class="js-price" id="js-strahovka-price"><?=$arResult["P_STRAHOVKA_SKU"][0]["PRICE"]?></span> &#8381;</div>
				</div>
				<?endif;?>
			</div>
		</div>
	</div>
</div>
<?/*<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>*/?>
<?
unset($actualItem, $itemIds, $jsParams);