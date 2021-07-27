<?php
// //Подготовка классов решений
// $arrClassFetch = CIBlockElement::GetList(
//     array("SORT" => "ASC"),
//     array("IBLOCK_ID" => "36"),
//     false,
//     false,
//     array("ID", "NAME", "PREVIEW_PICTURE", "SORT")
// );
// while ($class = $arrClassFetch->GetNext()) {
//     $arrClass[$class['ID']] = $class;
//     $arrClass[$class['ID']]['PREVIEW_PICTURE'] = CFile::GetPath($class["PREVIEW_PICTURE"]);
// }

// foreach ($arResult["ITEMS"] as $key => $arItem) {
//     if($arItem['IBLOCK_SECTION_ID'] == 35){
//         $arSections[$arItem['IBLOCK_SECTION_ID']]['ITEMS'][] = $arItem;

//         $arSections[$arItem['IBLOCK_SECTION_ID']]['CLASS_INFO'] = $arrClass[$arItem['PROPERTIES']['CO_CLASS_REF']['VALUE']];
//     }
// }

// //собираем id комплектов из всех готовых решений
// $equipmentKitsIds = array();
// foreach ($arSections as $key => $arSection) {
//     foreach ($arSection['ITEMS'] as $arItem) {
//         $item = $arItem['PROPERTIES']['P_COMPLECT']['VALUE'];
//         if (is_array($item))
//             $equipmentKitsIds = array_merge($equipmentKitsIds, (array) reset($item));
//         foreach ($arItem['PROPERTIES']['P_COMPLECT']['VALUE'] as $complect):
//             $arConnect[$complect] = $arrClass[$arItem['PROPERTIES']['CO_CLASS_REF']['VALUE']];
//         endforeach;
//     }
// }

// $dbResEquipmentKits = CIBlockElement::GetList(
//     array("SORT" => "ASC"),
//     array("ACTIVE" => "Y", "IBLOCK_ID" => $arParams['EQUIPMENT-KITS_IBLOCK_ID'], "ID" => $equipmentKitsIds),
//     false,
//     false,
//     array("ID", "NAME", "PROPERTY_CO_CHARACTERISTICS_REF", "CODE", "PROPERTY_CO_PRESENTS_REF", 'CATALOG_GROUP_1')
// );

// $arCharacteristic = array();
// while ($equipmentKitsRes = $dbResEquipmentKits->GetNext()) {
//     $arDiscounts = CCatalogDiscount::GetDiscountByProduct(
//         $equipmentKitsRes['ID'],
//     );
//     !empty($arDiscounts) ? $equipmentKitsRes["DISCOUNT_PRICE"] = $equipmentKitsRes['CATALOG_PRICE_1'] - ($equipmentKitsRes['CATALOG_PRICE_1'] *$arDiscounts[0]['VALUE'] / 100): '' ;

//     //получаем путь картинки
//     $equipmentKitsRes['DETAIL_URL'] = $equipmentKitsRes['CODE'];

//     $equipmentKitsRes['PROPERTY_CO_CLASS_REF_VALUE'] != null ? $arrComplect[] = $equipmentKitsRes['PROPERTY_CO_CLASS_REF_VALUE'] : '';
//     $equipmentKitsRes['PROPERTY_CO_CHARACTERISTICS_REF_VALUE'] != null ? $arCharacteristic = array_merge($arCharacteristic, $equipmentKitsRes['PROPERTY_CO_CHARACTERISTICS_REF_VALUE']) : '';

//     $arEquipmentKits[$equipmentKitsRes['ID']] = $equipmentKitsRes;
// }

// $characteristicsFetch = CIBlockElement::GetList(
//     array("SORT" => "ASC"),
//     array("IBLOCK_ID" => "37", "ID" => $arCharacteristic),
//     false,
//     false,
//     array("ID", "NAME", "PREVIEW_PICTURE")
// );
// while ($detail = $characteristicsFetch->GetNext()) {
//     $characteristicDetail[$detail['ID']] = $detail;
//     $characteristicDetail[$detail['ID']]["PREVIEW_PICTURE"] = CFile::GetPath($detail["PREVIEW_PICTURE"]);
// }


// foreach ($arEquipmentKits as $eq):
//     foreach ($eq['PROPERTY_CO_CHARACTERISTICS_REF_VALUE'] as $characteristicID):
//         $arEquipmentKits[$eq['ID']]['COMPLECT_CHARACTERISTICS'][$characteristicID] = $characteristicDetail[$characteristicID];
//     endforeach;
//     $arEquipmentKits[$eq['ID']]['CLASS_INFO'] = $arConnect[$eq['ID']];
// endforeach;


// //прикрепляем комплекты к разделам
// foreach ($arSections as $key => $arSection) {
//     foreach ($arSection['ITEMS'] as $arItem) {
//         $item = $arItem['PROPERTIES']['P_COMPLECT']['VALUE'];
//         if (is_array($item)) {
//             foreach ($item as $value) {
//                 if (key_exists($value, $arEquipmentKits))
//                     $arSections[$arSection['ID']]['EQUIPMENT-KITS'][] = $arEquipmentKits[$value];

//             }
//         }
//     }
// }

// $arResult["SECTIONS"] = $arSections;


