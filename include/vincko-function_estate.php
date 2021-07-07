<?
\Bitrix\Main\Loader::includeModule("iblock");
$realestateList = \Bitrix\Iblock\ElementTable::getList(array(
	"order" => array("SORT" => "ASC"),
	"select" => array("ID", "NAME", "IBLOCK_ID"),
	"filter" => array("IBLOCK_ID" => 19),
	"group" => array(),
	"limit" => 1000,
	"offset" => 0,
	"cache" => array(
		"ttl" => 3600,
		"cache_joins" => true
	),
))->fetchAll();
?>