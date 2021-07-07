<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$packetID = $arResult["ID"];
$iblockID = $arResult["IBLOCK_ID"];
//print_r ($arResult);die;
/*в новом ядре ещё не научились выводить свойства и фильтровать по ним, поэтому юзаем старый API*/
/*\Bitrix\Main\Loader::includeModule('iblock');
$reviews = \Bitrix\Iblock\ElementTable::getList(array("order" => array("SORT" => "ASC"), "select" => array("ID", "PREVIEW_TEXT", "PREVIEW_PICTURE", "NAME"), "filter" => array("IBLOCK_ID" => 15, "ACTIVE" => "Y"), "group" => array(), 'limit' => 3, 'offset' => 0));
*/
/*if ($_REQUEST["id"]){
	$reviews = CIBlockElement::GetList(array("PROPERTY_R_DATETIME" => "DESC"), array("IBLOCK_ID" => 16, "ACTIVE" => "Y", "PROPERTY_R_CHOP" => $chopID), false, Array("nPageSize" => 5), array("IBLOCK_ID", "ID", "NAME", "PROPERTY_R_RATING_SUM", "PROPERTY_R_CHOP", "PROPERTY_R_DATETIME", "PROPERTY_R_CITY", "PROPERTY_R_RATING_SUM", "PROPERTY_R_RATING_ZABOTA", "PROPERTY_R_RATING_SPASENIE", "PROPERTY_R_RATING_FINANCE", "PROPERTY_R_RATING_DOGOVOR", "PROPERTY_R_RATING_RECOMMEND", "PROPERTY_R_RATING_SERVICES", "PROPERTY_R_COMMENT", "PROPERTY_R_REVIEW_VERIFY"));
} else {
	$citiesChops = CIBlockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 9, "ACTIVE" => "Y", "PROPERTY_CHOP_ID" => $chopID), false, Array(), array("ID"));
	$allCities = array();
	while ($cChop = $citiesChops->fetch()){
		$allCitiesIDs[] = $cChop["ID"];
}*/
	//если надо будет добавить ID ЧОПа по всей России для случаев, когда оставили отзыв без привязки к региону
	//$allCitiesIDs[] = $chopID;
/*	$reviews = CIBlockElement::GetList(array("PROPERTY_R_DATETIME" => "DESC"), array("IBLOCK_ID" => 16, "ACTIVE" => "Y", "PROPERTY_R_CHOP" => $allCitiesIDs), false, Array("nPageSize" => 5), array("IBLOCK_ID", "ID", "NAME", "PROPERTY_R_RATING_SUM", "PROPERTY_R_CHOP", "PROPERTY_R_DATETIME", "PROPERTY_R_CITY", "PROPERTY_R_RATING_SUM", "PROPERTY_R_RATING_ZABOTA", "PROPERTY_R_RATING_SPASENIE", "PROPERTY_R_RATING_FINANCE", "PROPERTY_R_RATING_DOGOVOR", "PROPERTY_R_RATING_RECOMMEND", "PROPERTY_R_RATING_SERVICES", "PROPERTY_R_COMMENT", "PROPERTY_R_REVIEW_VERIFY"));
}
$res = array();
while ($rev = $reviews->fetch()){
	$res[] = $rev;
}
$arResult["CHOP_REVIEWS"] = $res;
*/
?>