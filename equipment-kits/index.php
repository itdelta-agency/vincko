<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$params = array(
  'IBLOCK_ID'=>9,
  'COOKIE'=>$_COOKIE
);

$packages = MainService::getPackagesIds($params);

if(!empty($packages))
{
    $packagesFilter = array(
        "ID"=>$packages
    );
    $APPLICATION->IncludeComponent(
    "it-delta:iblock.content",
    "equipment-kits",
    Array(
        "ACTIVE_DATE" => "N",
        "ADD_CACHE_STRING" => "",
        "CACHE_TIME" => "0",
        "CACHE_TYPE" => "A",
        "FILTER_NAME" => "packagesFilter",
        "IBLOCK_ID" => "12",
        "EQUIPMENT-KITS_IBLOCK_ID"=>"11",
        "IBLOCK_TYPE" => "references",
        "PAGE_ELEMENT_COUNT" => "10",
        "RAND_ELEMENTS" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    )
);
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>