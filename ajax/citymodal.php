<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('iblock');
$cityID = intval($_REQUEST["city"]);
$geoCityItem = \Bitrix\Iblock\ElementTable::getList(array(
	'order' => array(),
	'select' => array('ID', 'NAME', 'IBLOCK_ID'),
	'filter' => array('IBLOCK_ID' => 20, 'ID' => $cityID, "ACTIVE" => "Y"),
	'group' => array(),
	'limit' => 1,
	'offset' => 0,
	'count_total' => 1,
	'runtime' => array(),
	'data_doubling' => false,
	'cache' => array('ttl' => 3600,'cache_joins' => true),
));
$geoData = $geoCityItem->fetch();
if (!empty($geoData["NAME"])){
	$geoCookie = array("city" => $geoData["NAME"]);
} else {
	$geoCookie = array("city" => "Москва");
}
setcookie('geo', serialize($geoCookie), time() + 3600 * 24 * 7, '/');