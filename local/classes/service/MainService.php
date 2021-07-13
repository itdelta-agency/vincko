<?php
//класс MainService реализует сервисный слой
class MainService
{
    //получает id всех готовых решений по id города и id объекта охраны
    function getPackagesIds()
    {
        if(CModule::IncludeModule("iblock")) {
            if (isset($_COOKIE["selected_city"]) && isset($_COOKIE["selected_estate"]))
            {
                $city_id = $_COOKIE['selected_city'];
                $estate_id = $_COOKIE['selected_estate'];
            }

            $res = CIBlockElement::GetList(array("SORT"=>"ASC"),
                array('IBLOCK_ID'=>9, 'ACTIVE'=>'Y',
                    "PROPERTY_CITY_ID"=>$city_id, "PROPERTY_CH_TYPE" => $estate_id),
                false,
                false,
                array('ID','PROPERTY_CH_PACKETS'));

            while($el = $res->GetNext())
            {
                $arElements[$el['ID']] = $el;
            }

            $packagesIds = array();

            foreach ($arElements as $key => $arItem) {
                $item = $arItem['PROPERTY_CH_PACKETS_VALUE'];
                if(is_array($item))
                    $packagesIds = array_merge($packagesIds, $item);
            }

            return $packagesIds;
        }
    }
}