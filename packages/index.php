<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
Готовые решения
<?$APPLICATION->IncludeComponent(
    "it-delta:iblock.content",
    "tasks",
    Array(
        "ACTIVE_DATE" => "N",
        "ADD_CACHE_STRING" => "",
        "CACHE_TIME" => "0",
        "CACHE_TYPE" => "A",
        "FILTER_NAME" => "arrFilter1",
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

<div class="current-packages"></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>