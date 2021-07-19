<?php
$dbResSect = CIBlockSection::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams['IBLOCK_ID'],"ID"=>$arParams['PACKAGES_IDS'])
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

$arResult["SECTIONS"] = $arSections;