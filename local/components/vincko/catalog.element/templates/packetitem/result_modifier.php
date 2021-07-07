<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

//комплект оборудования в пакете (по умолчанию - выбор первого комплекта из общего списка комплектов, если их несколько)
$complectID = $_REQUEST["eq"] ? intval($_REQUEST["eq"]) : 0;
$packetComplect = CCatalogProduct::GetByIDEx($arResult["DISPLAY_PROPERTIES"]["P_COMPLECT"]["VALUE"][$complectID]);
//информация о содержимом комплекта оборудования
$complectInfo = CCatalogProductSet::getAllSetsByProduct($arResult["DISPLAY_PROPERTIES"]["P_COMPLECT"]["VALUE"][$complectID], CCatalogProductSet::TYPE_SET);
//чтобы не вычислять id полученного массива - просто вытаскиваем первый элемент (больше 1 элемента не должно быть)
$equipmentArrayFirst = array_shift($complectInfo);
$equipmentArrID = array();
//сбор всех ID оборудования
foreach ($equipmentArrayFirst["ITEMS"] as $ci){
	$equipmentArrID[] = $ci["ITEM_ID"];
}
//получаю наименование оборудования
$equipmentArrName = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 10, "ID" => $equipmentArrID), false, false, array("ID", "IBLOCK_ID", "NAME"));
$arResult["COMPLECT_EQUIPMENT"] = array();
while ($eq = $equipmentArrName->Fetch()){
	$arResult["COMPLECT_EQUIPMENT"][] = $eq["NAME"];
}
//скидки на комплекты оборудования
//учитывать скидку при добавлении товара в корзину (/ajax/basket.php)
//скидки на абонплату и страховку необходимо высчитывать отдельно по новому тз
$equipmentDiscounts = CCatalogDiscount::GetDiscountByProduct($packetComplect["ID"], $USER->GetUserGroupArray(), "N", 1, "v1");
if ($equipmentDiscounts !== false){
	//если есть скидка, то устанавливаем лучшую цену
	$equipmentPrice = CCatalogProduct::CountPriceWithDiscount($packetComplect["PRICES"][1]["PRICE"], $packetComplect["PRICES"][1]["CURRENCY"], $equipmentDiscounts);
} else {
	//если нет скидок, то цена не меняется
	$equipmentPrice = $packetComplect["PRICES"][1]["PRICE"];
}
$arResult["PACKET_COMPLECT_COUNT"] = count($arResult["DISPLAY_PROPERTIES"]["P_COMPLECT"]["VALUE"]);
$arResult["PACKET_COMPLECT"] = array(
	"ID" => $packetComplect["ID"],
	"NAME" => $packetComplect["NAME"],
	"PREVIEW_TEXT" => $packetComplect["PREVIEW_TEXT"],
	"DETAIL_PAGE_URL" => $packetComplect["DETAIL_PAGE_URL"],
	"PRICE" => $equipmentPrice
);
//данные по ЧОПу
$chopID = intval($_REQUEST["op"]);
if (!empty($chopID)){
	$chopAllRate = \Bitrix\Iblock\Elements\ElementChopcityTable::getByPrimary($chopID, array('select'=>array('NAME', 'CITY_ID')))->fetch();
	//если выбранный ЧОП для данного пакета с таким ID найден, то найден и имя для него - работаем дальше
	if ($chopAllRate["NAME"]){
		//узнаем город ЧОПа в пакете
		$chopCity = \Bitrix\Iblock\Elements\ElementCityTable::getByPrimary($chopAllRate["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CITY_ID_VALUE"],array('select'=>array('NAME')))->fetch();
		//список торговых предложений-абонплат для выбранного ЧОПа
		$chopPacketAbonplata = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 25, "PROPERTY_CPA_CHOP" => $chopID, "PROPERTY_CPA_PACKET" => $arResult["ID"]), false, array(), array("ID", "PROPERTY_CPA_ABONPLATA"));
		$abonplataSKU = array();
		while ($cpap = $chopPacketAbonplata->GetNextElement()){
			$abonplata = CCatalogSKU::getOffersList(array($cpap->fields["PROPERTY_CPA_ABONPLATA_VALUE"]), 13, array(), array("NAME", "CATALOG_PRICE_1"), array());
			//print_r ($abonplata);die;
			foreach ($abonplata[$cpap->fields["PROPERTY_CPA_ABONPLATA_VALUE"]] as $ap){
				$abonplataSKU[] = array(
					"NAME" => $ap["NAME"],
					"ID" => $ap["ID"],
					"IBLOCK_ID" => $ap["IBLOCK_ID"],
					"PRICE" => ceil($ap["CATALOG_PRICE_1"]),
					"PARENT_ID" => $ap["PARENT_ID"]
				);
			}
			//$abonplataSKU = $abonplata[$cpap->fields["PROPERTY_CPA_ABONPLATA_VALUE"]];
		};
		if (!empty($abonplataSKU)){
			$arResult["CHOP_INFO"] = array(
				"NAME" => $chopAllRate["NAME"],
				"CITY_NAME" => $chopCity["NAME"],
				"ABONPLATA" => $abonplataSKU
			);
		}
	}
}
//print_r ($chopAllRate);die;
//абонплату получаем от выбранного ЧОПа. ЧОП должен задаваться в параметрах адресной строки
/*$abonPlata = CCatalogProduct::GetByIDEx($arResult["DISPLAY_PROPERTIES"]["P_ABONENTPLATA"]["VALUE"]);
$arResult["PACKET_ABONPLATA"] = array(
	"ID" => $abonPlata["ID"],
	"NAME" => $abonPlata["NAME"]
);*/

//CATALOG_GROUP_1 - базовая цена
$strahovkaSKU = CCatalogSKU::getOffersList(array($arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]), 14, array(), array("NAME", "CATALOG_PRICE_1"), array());
foreach ($strahovkaSKU[$arResult["DISPLAY_PROPERTIES"]["P_STRAHOVKA"]["VALUE"]] as $sSKU){
	$arResult["P_STRAHOVKA_SKU"][] = array(
		"NAME" => $sSKU["NAME"],
		"ID" => $sSKU["ID"],
		"PRICE" => ceil($sSKU["CATALOG_PRICE_1"])
	);
}
//print_r ($arResult);die;