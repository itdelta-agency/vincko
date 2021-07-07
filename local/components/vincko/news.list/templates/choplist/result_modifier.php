<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
//инфоблок с компаниями (по России, а не по городам)
//$iblock = \Bitrix\Iblock\Iblock::wakeUp(8);

foreach ($arResult["ITEMS"] as &$ari){
	$chopAllRate = \Bitrix\Iblock\Elements\ElementChopTable::getByPrimary($ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"],array('select'=>array('CH_RATING_SUM')))->fetch();
	$ari["CH_ALL"] = number_format($chopAllRate["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_SUM_VALUE"],1,'.','');
	
	//$chopAllCount = \Bitrix\Iblock\Elements\ElementChopcityTable::getList(array("filter" => array("ACTIVE" => "Y", "PROPERTY_CHOP_ID.ID" => $ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"]), "select" => array("ID","NAME")))->fetchAll();
	$chopAllCount = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 9, "ACTIVE" => "Y", "PROPERTY_CHOP_ID" => $ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["LINK_ELEMENT_VALUE"][$ari["DISPLAY_PROPERTIES"]["CHOP_ID"]["VALUE"]]["ID"]), false, array(), array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_CITY_ID.NAME"));
	$arCity = array();
	while ($el = $chopAllCount->GetNextElement()){
		$res = $el->GetFields();
		$arCity[] = array(
			"NAME" => $res["NAME"],
			"CITY_NAME" => $res["PROPERTY_CITY_ID_NAME"],
			"DETAIL_PAGE_URL" => $res["DETAIL_PAGE_URL"]
		);
	}
	//$res = $chopAllCount->fetchAll();
	//print_r ($res);die;
	$ari["CH_ALL_COUNT"] = $chopAllCount->SelectedRowsCount();
	$ari["CH_ALL_LIST"] = $arCity;
}