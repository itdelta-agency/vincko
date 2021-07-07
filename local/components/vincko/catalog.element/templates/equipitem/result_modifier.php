<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

/*
 * получить содержимое комплекта
 */
$arEquipSet = CCatalogProductSet::getAllSetsByProduct($arResult["ID"], CCatalogProductSet::TYPE_SET);
if (!empty($arEquipSet)){
	$equipSet = reset($arEquipSet);
	$equipSetID = key($arEquipSet);
	$arResult["EQUIP_COMPLECT"] = array();
	foreach ($equipSet["ITEMS"] as $es){
		$res = \CIBlockElement::GetList(array(), array("IBLOCK_ID" => 10, "ID" => $es["ITEM_ID"], "ACTIVE" => "Y"), false, false, array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE"));
		while ($ans = $res->GetNextElement()){
			$arFields = $ans->GetFields();
			$picEnd = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array("width" => 90, "height" => 110), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
			$arResult["EQUIP_COMPLECT"][] = array(
				"ID" => $arFields["ID"],
				"NAME" => $arFields["NAME"],
				"PREVIEW_TEXT" => $arFields["PREVIEW_TEXT"],
				"PREVIEW_PICTURE" => $picEnd["src"]
			);
		}
	}
}