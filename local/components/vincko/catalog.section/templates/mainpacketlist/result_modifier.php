<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */
//print_r ($arResult);die;
foreach ($arResult["ITEMS"] as &$item){
	//если надо значение базовой цены, то "CATALOG_GROUP_1"
	//$strahovkaSKU = CCatalogSKU::getOffersList(array($item["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]), 14, array(), array("NAME"), array());
	//$item["P_STRAHOVKA_SKU"] = $strahovkaSKU[$item["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]];
	$optionsArr = array();
	foreach ($item["DISPLAY_PROPERTIES"]["P_OPTIONS"]["LINK_ELEMENT_VALUE"] as $idpo){
		$optionsArr[] = array(
			"NAME" => $idpo["NAME"],
			"ICON" => CFile::ResizeImageGet($idpo["PREVIEW_PICTURE"], array("width" => 24, "height" => 30), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false),
			"ICON2x" => CFile::ResizeImageGet($idpo["PREVIEW_PICTURE"], array("width" => 48, "height" => 60), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false)
		);
	}
	$item["P_OPTIONS_VALUE"] = $optionsArr;
	$item["P_RED_VALUE"] = $item["DISPLAY_PROPERTIES"]["P_RED"]["VALUE"];
	$item["P_COMPLECT_COUNT"] = count($item["DISPLAY_PROPERTIES"]["P_COMPLECT"]["VALUE"]);
}
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();