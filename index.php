<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Vincko - первый федеральный маркетплейс охраны");
$APPLICATION->SetPageProperty("keywords", "охранные предприятия, оборудование для охраны дома и офиса");
$APPLICATION->SetPageProperty("description", "Первый федеральный маркетплейс охраны Vincko");
$APPLICATION->SetTitle("Vincko - первый федеральный маркетплейс охраны");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>

<main class="main">

    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content",
        "main_banner",
        Array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "FILTER_NAME" => "arrFilter1",
            "IBLOCK_ID" => "27",
            "IBLOCK_TYPE" => "references",
            "PAGE_ELEMENT_COUNT" => "3",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC"
        )
    );?>
    
    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content", 
        "main_open_for", 
        array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "FILTER_NAME" => "arrFilter1",
            "IBLOCK_ID" => "42",
            "IBLOCK_TYPE" => "references",
            "PAGE_ELEMENT_COUNT" => "6",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC",
            "COMPONENT_TEMPLATE" => "main_open_for"
        ),
        false
    );?>

    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content", 
        "main_reputation_rating", 
        array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "FILTER_NAME" => "arrFilter1",
            "IBLOCK_ID" => "9",
            "IBLOCK_TYPE" => "chop",
            "PAGE_ELEMENT_COUNT" => "0",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "PROPERTY_69",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "COMPONENT_TEMPLATE" => "main_reputation_rating"
        ),
        false
    );?>

    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content",
        "main_reviews",
        Array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "FILTER_NAME" => "arrFilter1",
            "IBLOCK_ID" => "16",
            "IBLOCK_TYPE" => "reviews",
            "PAGE_ELEMENT_COUNT" => "5",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC"
        )
    );?>

    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content",
        "main_tasks",
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
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC"
        )
    );?>

    <?$APPLICATION->IncludeComponent(
        "it-delta:iblock.content", 
        "main_kits", 
        array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "FILTER_NAME" => "arrFilter1",
            "IBLOCK_ID" => "12",
            "IBLOCK_TYPE" => "equipment",
            "PAGE_ELEMENT_COUNT" => "10",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC",
            "COMPONENT_TEMPLATE" => "main_kits"
        ),
        false
    );?>

    <?$APPLICATION->IncludeComponent(
	"it-delta:iblock.content", 
	"main_manufacturer", 
	array(
		"ACTIVE_DATE" => "N",
		"ADD_CACHE_STRING" => "",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main_manufacturer",
		"FILTER_NAME" => "arrFilter1",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "references",
		"PAGE_ELEMENT_COUNT" => "10",
		"RAND_ELEMENTS" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>
</main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>