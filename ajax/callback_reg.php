<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

if (isset($_POST["phone"]))  {

    $phone = $_POST["phone"];
    if(mb_strlen(preg_replace('/[^0-9]/', '', $phone)) == 11) {
        $el = new CIBlockElement;
        $arLoadProductArray = Array(
            "IBLOCK_SECTION" => false,
            "IBLOCK_ID" => 23,
            "NAME" => $phone,
            "PROPERTY_PHONE" => $phone
        );
        $el->Add($arLoadProductArray);
    } else {
        echo 'errEnt';
    };

}
