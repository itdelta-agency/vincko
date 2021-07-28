<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
//инфоблок с компаниями (по России, а не по городам)
//$iblock = \Bitrix\Iblock\Iblock::wakeUp(8);

// local php_interface init.php
$getPacketElementCode = ExtraElement::getElementCodeByID((int)$_REQUEST["packetID"]);
$arResult["PACKET_CODE"] = $getPacketElementCode;

foreach ($arResult["ITEMS"] as &$ari){
//    if ($ari["DISPLAY_PROPERTIES"]["CHOP_ID"]['ACTIVE'] == 'Y') {
//        unset($ari);
//        continue;
//    }

	$chopAllRate = \Bitrix\Iblock\Elements\ElementChopTable::getByPrimary($ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"],array('select'=>array('CH_RATING_SUM', 'ACTIVE')))->fetch();
	$ari["CH_ALL"] = number_format($chopAllRate["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_SUM_VALUE"],1,'.','');

	//$chopAllCount = \Bitrix\Iblock\Elements\ElementChopcityTable::getList(array("filter" => array("ACTIVE" => "Y", "PROPERTY_CHOP_ID.ID" => $ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"]), "select" => array("ID","NAME")))->fetchAll();
	$chopAllCount = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 9, "ACTIVE" => "Y", "PROPERTY_CHOP_ID" => $ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"]), false, array(), array("ID", "NAME"));
	$ari["CH_ALL_COUNT"] = $chopAllCount->SelectedRowsCount();
}