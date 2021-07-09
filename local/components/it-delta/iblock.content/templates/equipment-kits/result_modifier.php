<?php
$dbResSect = CIBlockSection::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams['IBLOCK_ID'])
);
//получаем разделы и собираем в массив
while($sectRes = $dbResSect->GetNext())
{
    //получаем путь картинки раздела
    $sectRes['PICTURE_SRC'] = CFile::GetPath($sectRes["PICTURE"]);
    $arSections[$sectRes['ID']] = $sectRes;
}
//прикрепляем элементы к разделам
foreach($arResult["ITEMS"] as $key => $arItem) {
    $arSections[$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem;
}

//собираем id комплектов из всех готовых решений
$equipmentKitsIds = array();
foreach ($arSections as $key => $arSection) {
    foreach ($arSection['ITEMS'] as $key => $arItem) {
        $item = $arItem['PROPERTIES']['P_COMPLECT']['VALUE'];
        if(is_array($item))
            $equipmentKitsIds = array_merge($equipmentKitsIds, $item);
    }
}

$dbResEquipmentKits = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams['EQUIPMENT-KITS_IBLOCK_ID'], "ID" =>$equipmentKitsIds)
);

while($equipmentKitsRes = $dbResEquipmentKits->GetNext())
{
    //получаем путь картинки
    $equipmentKitsRes['PICTURE_SRC'] = CFile::GetPath($equipmentKitsRes["PREVIEW_PICTURE"]);
    $arEquipmentKits[$equipmentKitsRes['ID']] = $equipmentKitsRes;
}
//прикрепляем комплекты к разделам
foreach ($arSections as $key => $arSection) {
    foreach ($arSection['ITEMS'] as $key => $arItem) {
        $item = $arItem['PROPERTIES']['P_COMPLECT']['VALUE'];
        if(is_array($item))
        {
            foreach ($item as $key => $value) {
                if(key_exists($value,$arEquipmentKits))
                    $arSections[$arSection['ID']]['EQUIPMENT-KITS'][] = $arEquipmentKits[$value];
            }
        }
    }
}

$arResult["SECTIONS"] = $arSections;


