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
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

?>
<div class="wrap">
	<?if ($arResult["ID"] == 32):?>
	<div class="vinkombo-promo">
		<div class="vinkombo-promo__logo"></div>
		<div class="vinkombo-promo__text">
			<div class="vinkombo-promo__text-wrap">
				<div class="vinkombo-promo__title"><span>VIN</span>КОМБО</div>
				<div class="vinkombo-promo__announce">Идеален для тех, кто хочет быть уверен в полной защищенности от проникновения, протечки труб и затопления соседей или дома, утечки газа и пожара.</div>
			</div>
		</div>
	</div>
	<?endif;?>
	<h1><?=$APPLICATION->ShowTitle(false);?></h1>
	<div class="packets__list">
		<form id="js-form-submit-onchange" method="GET" action="<?=$APPLICATION->GetCurUri();?>">
		<?if (!empty($_REQUEST["complectID"])):?><input type="hidden" name="complectID" value="<?=intval($_REQUEST["complectID"])?>"><?endif;?>
			<div class="packets__flex">
				<?/*<div class="packets__sort">Город: <a class="sort__icon-arrow-bot" href="#">Москва</a></div>*/?>
				<?/*<div class="packets__filter-switcher">
					<label class="label__switcher inline-block" for="filter-p-discount">Есть акции <input type="checkbox" id="filter-p-discount"><div class="label__switcher-slider"></div></label>
				</div>*/?>
					<div class="packets__filter-switcher">
						<label class="label__switcher inline-block" for="filter-p-equipment">С оборудованием <input type="hidden" name="eq" value="off"><input type="checkbox" class="js-packet-filter-reload" id="filter-p-equipment" name="eq"<?if ($_REQUEST["eq"] != "off"):?> checked<?endif;?>><div class="label__switcher-slider"></div></label>
					</div>
					<div class="packets__filter-switcher">
						<label class="label__switcher inline-block" for="filter-p-abonplata">С абонплатой <input type="hidden" name="ap" value="off"><input type="checkbox" class="js-packet-filter-reload" id="filter-p-abonplata" name="ap"<?if ($_REQUEST["ap"] != "off"):?> checked<?endif;?>><div class="label__switcher-slider"></div></label>
					</div>
					<div class="packets__filter-switcher">
						<label class="label__switcher inline-block" for="filter-p-strahovka">Со страховкой <input type="hidden" name="sk" value="off"><input type="checkbox" class="js-packet-filter-reload" id="filter-p-strahovka" name="sk"<?if ($_REQUEST["sk"] != "off"):?> checked<?endif;?>><div class="label__switcher-slider"></div></label>
					</div>
			</div>
		</form>
		<?if (!empty($arResult['ITEMS'])){?>
		<?foreach ($arResult["ITEMS"] as $item):?>
		<div class="packet__item<?if (!empty($item["P_RED_VALUE"])):?> action<?endif;?>">
			<?if (!empty($item["P_RED_VALUE"])):?><div class="packet__item-action">
				<div class="packet__item-action-red"><?=$item["P_RED_VALUE"]?></div>
			</div><?endif;?>
			<div class="packet__item-title"><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></div>
			
			<div class="packet__item-data">
				<div class="packet__item-complect">
					<?if (count($item["DISPLAY_PROPERTIES"]["P_COMPLECT"]["VALUE"]) > 0){?>
					<div class="packet__item-complect-item">
						<div class="packet__item-complect-item-title">Поддерживается оборудование:</div>
						<div class="packet__item-complect-item-values">
							<?if ($item["P_COMPLECT_COUNT"] == 1){?>
							<div class="packet__item-complect-item-val"><?=$item["PRODUCT_PROPERTIES"]["P_COMPLECT"]["VALUES"][$item["PRODUCT_PROPERTIES"]["P_COMPLECT"]["SELECTED"]]?></div>
							<?}else{?>
							<div class="packet__item-complect-item-val"><?=$item["P_COMPLECT_COUNT"]?> комплекта</div>
							<?}?>
						</div>
					</div>
					<?}?>
					<?if ($item["PRODUCT_PROPERTIES"]["P_ABONENTPLATA_Y"]["SET"] == 1):?>
					<div class="packet__item-complect-item">
						<div class="packet__item-complect-item-title">Абонплата:</div>
						<div class="packet__item-complect-item-values">
							<div class="packet__item-complect-item-val">Есть</div>
						</div>
					</div>
					<?endif;?>
					<?if ($item["PRODUCT_PROPERTIES"]["P_STRAHOVKA"]["SET"] == 1):?>
					<div class="packet__item-complect-item">
						<div class="packet__item-complect-item-title">Страховка:</div>
						<div class="packet__item-complect-item-values">
							<div class="packet__item-complect-item-val"><?=$item["PRODUCT_PROPERTIES"]["P_STRAHOVKA"]["VALUES"][$item["PRODUCT_PROPERTIES"]["P_STRAHOVKA"]["SELECTED"]]?></div>
							<?/*<?foreach ($item["P_STRAHOVKA_SKU"] as $itemS):?>
							<div class="packet__item-complect-item-val"><?=$itemS["NAME"]?></div>
							<?endforeach;?>*/?>
						</div>
					</div>
					<?endif;?>
				</div>
				
				<div class="packet__item-options">
					<?/*<?foreach ($item["DISPLAY_PROPERTIES"]["P_OPTIONS"]["LINK_ELEMENT_VALUE"] as $ipopt):?>*/?>
					<?foreach ($item["P_OPTIONS_VALUE"] as $ipov):?>
					<div class="packet__item-option-element">
						<div class="packet__item-option-element-val">
							<div class="packet__item-option-element-pic inline-block">
								<img src="<?=$ipov["ICON"]["src"]?>" srcset="<?=$ipov["ICON2x"]["src"]?>" alt="<?=$ipov["NAME"]?>">
							</div>
							<div class="packet__item-option-element-text inline-block"><?=$ipov["NAME"]?></div>
						</div>
					</div>
					<?endforeach;?>
				</div>
			
				<div class="packet__item-price">
					<div class="packet__item-startprice">от <?=$item["PRICES"]["BASE"]["PRINT_VALUE"]?></div>
					<?if ($item["DISPLAY_PROPERTIES"]["P_BONUSES"]):?>
					<div class="packet__item-bonuses">
						<?foreach ($item["DISPLAY_PROPERTIES"]["P_BONUSES"]["DISPLAY_VALUE"] as $bonusItem):?>
						<div class="packet__item-gift-item"><?=$bonusItem?></div>
						<?endforeach;?>
					</div>
					<?endif;?>
					<?/*<div class="good__item-discount">
						<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
						<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
						<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
					</div>*/?>
					<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="packet__item-link">Подробнее</a>
				</div>
			</div>
		</div>
		<?endforeach;?>
		<?}else{?>
			<p>Не найдены пакеты, соответствующие Вашему запросу.</p>
		<?}?>
	</div>
</div>
<?
$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<?/*
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BASKET_URL: '<?=$arParams['BASKET_URL']?>',
		ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});
	var <?=$obName?> = new JCCatalogSectionComponent({
		siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
		componentPath: '<?=CUtil::JSEscape($componentPath)?>',
		navParams: <?=CUtil::PhpToJSObject($navParams)?>,
		deferredLoad: false, // enable it for deferred load
		initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
		bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
		lazyLoad: !!'<?=$showLazyLoad?>',
		loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
		template: '<?=CUtil::JSEscape($signedTemplate)?>',
		ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
		parameters: '<?=CUtil::JSEscape($signedParams)?>',
		container: '<?=$containerName?>'
	});
</script>
*/?>
<!-- component-end -->