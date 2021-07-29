<?php

$resultF = CIBlockSection::GetList(
    false,
    array('IBLOCK_ID' => 46),
    false,
    array("UF_PICTURE_SVG")
);

while ($sect = $resultF->Fetch()) {

    if (isset($sect['UF_PICTURE_SVG'])):
        $sect["PICTURE"] = $sect['UF_PICTURE_SVG'];
        endif;
    $arSection[$sect['ID']]['ID'] = $sect['ID'];
    $arSection[$sect['ID']]['NAME'] = $sect['NAME'];
    $arSection[$sect['ID']]['DESCRIPTION'] = $sect['DESCRIPTION'];
    $arSection[$sect['ID']]['PREVIEW_PICTURE'] = CFile::GetPath($sect["PICTURE"]);
    $sections[] = $sect['ID'];

}
$resultF = CIBlockElement::GetList(
    false,
    array('IBLOCK_SECTION_ID' => $sections)
 );
while ($sect = $resultF->Fetch()) {
    $arSection[$sect['IBLOCK_SECTION_ID']]['ITEMS'][$sect['ID']]['ID'] = $sect['ID'];
    $arSection[$sect['IBLOCK_SECTION_ID']]['ITEMS'][$sect['ID']]['NAME'] = $sect['NAME'];
    $arSection[$sect['IBLOCK_SECTION_ID']]['ITEMS'][$sect['ID']]['PREVIEW_TEXT'] = $sect['PREVIEW_TEXT'];

}

$arResult = $arSection;