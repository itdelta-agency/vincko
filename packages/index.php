<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


?>

<?$APPLICATION->IncludeComponent(
    "it-delta:iblock.content",
    "tasks",
    Array(
        "ACTIVE_DATE" => "N",
        "ADD_CACHE_STRING" => "",
        "CACHE_TIME" => "0",
        "CACHE_TYPE" => "A",
        "IBLOCK_ID" => "34",
        "IBLOCK_TYPE" => "references",
        "PAGE_ELEMENT_COUNT" => "10",
        "RAND_ELEMENTS" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    )
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>