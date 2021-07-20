<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$equipmentIblockId = 10;
$complectsIblockId = 11;
$packagesIblockId = 12;
$classesIblockId = 36;
$characteristicsIblockId = 37;

/*
 * получим готовые решения
 */


$res = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$packagesIblockId,"=PROPERTY_P_COMPLECT"=>$arResult['ID'])
);

while($arFields = $res->Fetch())
{
    $arResult['COMPLECT_PARENT_PACKAGE'] = $arFields;
}

$parentPackageId = $arResult['COMPLECT_PARENT_PACKAGE']['IBLOCK_SECTION_ID'];
$res = CIBlockSection::GetByID($parentPackageId);
while($arFields = $res->Fetch())
{
    $arResult['PACKAGE_GROUP'] = $arFields;
}
$res = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$packagesIblockId,"=IBLOCK_SECTION_ID"=>$parentPackageId),
    false,
    false,
    Array("ID","PROPERTY_CO_CLASS_REF","PROPERTY_P_COMPLECT")
);
$complectFirstIds = array();
while($arFields = $res->Fetch())
{
    $complectsIds = $arFields["PROPERTY_P_COMPLECT_VALUE"];
    if (is_array($complectsIds)) {
        array_push($complectFirstIds, $complectsIds[0]);
    }
    $arResult['PACKAGE_GROUP']['PACKAGES'][$arFields['ID']] = $arFields;
}

$res = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$complectsIblockId,"ID"=>$complectFirstIds)
);

while($arFields = $res->Fetch())
{
    $arResult['FIRST_LIST_COMPLECTS'][$arFields['ID']] = $arFields;
}

$res = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$classesIblockId)
);
while($arFields = $res->Fetch())
{
    $arResult['PACKAGES_CLASSES'][$arFields['ID']] = $arFields;
    $detailPicture = CFile::ResizeImageGet($arFields["DETAIL_PICTURE"], array("width" => 40, "height" => 40), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
    $arResult['PACKAGES_CLASSES'][$arFields['ID']]['ICON'] = $detailPicture;
}
foreach ($arResult['PACKAGE_GROUP']['PACKAGES'] as $package) {

    $classId = $package['PROPERTY_CO_CLASS_REF_VALUE'];
    $complectId = $package['PROPERTY_P_COMPLECT_VALUE'][0];
    $slug = $arResult['FIRST_LIST_COMPLECTS'][$complectId]['CODE'];
    if(in_array($arResult['ID'],$package['PROPERTY_P_COMPLECT_VALUE']))
    {
        $arResult['CURRENT_PACKAGE_CLASS'] = $classId;
        $slug = $arResult['CODE'];
    }
    $arResult['FIRST_LIST_COMPLECTS_SLUGS'][$classId] = array(
        "CLASS_ID" => $classId,
        "SLUG" => $slug
    );
}
/*
 * получить оборудование комплекта
 */

$arEquipSet = CCatalogProductSet::getAllSetsByProduct($arResult["ID"], CCatalogProductSet::TYPE_SET);
if (!empty($arEquipSet)) {
    $equipSet = reset($arEquipSet);
    $equipSetID = key($arEquipSet);
    $arResult["EQUIP_COMPLECT"] = array();
    $itemIds = array();
    $equipItemsCharacteristicsIds = array();
    foreach ($equipSet["ITEMS"] as $es) {
        array_push($itemIds, $es["ITEM_ID"]);
    }
    //получаем состав комплекта - все его оборудование
    $arSelect = array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE",
        "PROPERTY_EQUIPMENT_PICTURES", "PROPERTY_CO_CHARACTERISTICS_REF"
        ,"PROPERTY_SENSOR_ADVANTAGES", "PROPERTY_PRINCIPLE_OF_OPERATION","PROPERTY_FEATURES_OF_THE","PROPERTY_CLASSIFICATION",
        "PROPERTY_TYPE_OF_INSTALLATION",
        "PROPERTY_CONNECTED_DEVICES","PROPERTY_CCTV");
    $res = \CIBlockElement::GetList(array(), array("IBLOCK_ID" => $equipmentIblockId, "ID" => $itemIds, "ACTIVE" => "Y"), false,
        false, $arSelect);
    while ($arFields = $res->Fetch()) { // получаем сразу массив данных а не объект

        $picEnd = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array("width" => 90, "height" => 110), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);

        $equipmentPictures = array();
        foreach ($arFields["PROPERTY_EQUIPMENT_PICTURES_VALUE"] as $FILE) {
            $FILE = CFile::GetFileArray($FILE);
            if (is_array($FILE))
                $equipmentPictures[] = $FILE;
        }

        $characteristicsIds = $arFields["PROPERTY_CO_CHARACTERISTICS_REF_VALUE"];
        if (is_array($characteristicsIds)) {
            $equipItemsCharacteristicsIds = array_merge($equipItemsCharacteristicsIds, $characteristicsIds);
        }

        $arResult["EQUIP_COMPLECT"][] = array(
            "ID" => $arFields["ID"],
            "NAME" => $arFields["NAME"],
            "PREVIEW_TEXT" => $arFields["PREVIEW_TEXT"],
            "PREVIEW_PICTURE" => $picEnd["src"],
            "PREVIEW_PICTURE_MINI" => $picEnd["src"],
            "EQUIPMENT_PICTURES" => $equipmentPictures,
            "CHARACTERISTICS"=>$characteristicsIds,
            "SENSOR_ADVANTAGES"=>$arFields['PROPERTY_SENSOR_ADVANTAGES_VALUE'],
            "PRINCIPLE_OF_OPERATION"=>$arFields['PROPERTY_PRINCIPLE_OF_OPERATION_VALUE'],
            "FEATURES_OF_THE"=>$arFields['PROPERTY_FEATURES_OF_THE_VALUE'],
            "CLASSIFICATION"=>$arFields['PROPERTY_CLASSIFICATION_VALUE'],
            "TYPE_OF_INSTALLATION"=>$arFields['PROPERTY_TYPE_OF_INSTALLATION_VALUE'],
            "CONNECTED_DEVICES"=>$arFields['PROPERTY_CONNECTED_DEVICES_VALUE'],
            "CCTV"=>$arFields['PROPERTY_CCTV_VALUE'],
        );
    }
}

//получаем характеристики для оборудования
$res = \CIBlockElement::GetList(array(), array("IBLOCK_ID" => $characteristicsIblockId, "ID" => $equipItemsCharacteristicsIds, "ACTIVE" => "Y"), false,
    false, array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE"));
while ($arFields = $res->Fetch()) {
    $picEnd = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array("width" => 90, "height" => 110), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
    $arResult["EQUIP_ITEM_CHARACTERISTICS"][$arFields["ID"]] = array(
        "ID" => $arFields["ID"],
        "NAME" => $arFields["NAME"],
        "PREVIEW_TEXT" => $arFields["PREVIEW_TEXT"],
        "PREVIEW_PICTURE" => $picEnd["src"],
    );
}
//получаем все картинки для оборудования
if (isset($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"])
    && is_array($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"])) {

    foreach ($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"] as $key => $item) {
        $arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"][$key]['PREVIEW_PICTURE'] = CFile::GetFileArray($item['PREVIEW_PICTURE']);
    }
}
$arResult['PREVIEW_PICTURE_RESIZED'] = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'] , array("width" => 360, "height" => 290), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);
$arResult['PREVIEW_PICTURE_RESIZED_SMALL'] = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'] , array("width" => 110, "height" => 100), BX_RESIZE_IMAGE_PROPORTIONAL, false);

