<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(CModule::IncludeModule("iblock")){
	$el = new CIBlockElement; 
	$userID = $USER->GetID();
	$NAME = "Заявка от пользователя ".$USER->GetFullName().". Номер: ".$USER->GetLogin()." (ID: ".$USER->GetID().")";
	$PROP = array();
	//пользователь
	$PROP[134] = array("n0" => $userID);
	//тип охраны
	$PROP[135] = array("n0" => intval($_REQUEST["iz_type"]));
	//тип недвижимости
	$PROP[136] = array("n0" => intval($_REQUEST["iz_object"]));
	//населенный пункт
	$PROP[137] = array("n0" => intval($_REQUEST["iz_city"]));
	//комментарий
	$PROP[138] = array("VALUE" => array("TEXT" => $_REQUEST["iz_comment"], "TYPE" => "text"));
	//охранные организации
	foreach ($_REQUEST["iz_chop"] as $num => $rchop){
		$PROP[139]["n".$num] = $rchop;
	}
	$arLoadiZayavkaArray = Array(
		"IBLOCK_SECTION_ID" => false, 
		"IBLOCK_ID"       => 29,
		"NAME"            => $NAME, 
		"PROPERTY_VALUES" => $PROP,
		"ACTIVE"          => "Y"
	);     
	if ($elID = $el->Add($arLoadiZayavkaArray)) {
		echo json_encode(array('success' => true, 'msg' => 'Заявка отправлена')); exit;
	} else {
		echo json_encode(array('success' => false, 'error' => $el->LAST_ERROR)); exit;
	}
}