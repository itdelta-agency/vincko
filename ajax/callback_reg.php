<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

if (isset($_POST["phone"]))  {
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "IBLOCK_SECTION" => false,
        "IBLOCK_ID" => 23,
        "NAME" => $_POST["phone"],
    );
    if($PRODUCT_ID = $el->Add($arLoadProductArray))
        echo "New ID: ".$PRODUCT_ID;
    else
        echo "Error: ".$el->LAST_ERROR;
}
