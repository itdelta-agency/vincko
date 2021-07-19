<?php
// получаем список типов недвижимости
$dbResElem = CIBlockElement::GetList(
    Array("SORT"=>"ASC"),
    Array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams['ESTATE_IB_ID'])
);

while($elemRes = $dbResElem->GetNext())
{
    $arEstates[$elemRes['ID']] = $elemRes;
}

$arResult["ESTATES"] = $arEstates;