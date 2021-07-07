<?
//require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
/*
 * запрос за данными из справочника, которые подгружаются на всех страницах: тип охраны, тип недвижимости, города
 */
class Sprav{
	public static function spravochnikCity(){
		\Bitrix\Main\Loader::includeModule("iblock");
		$cityList = \Bitrix\Iblock\ElementTable::getList(array(
			"order" => array("SORT" => "ASC"),
			"select" => array("ID", "NAME", "IBLOCK_ID"),
			"filter" => array("IBLOCK_ID" => 20),
			"group" => array(),
			"limit" => 1000,
			"offset" => 0,
			"cache" => array(
				"ttl" => 3600,
				"cache_joins" => true
			),
		))->fetchAll();
		return $cityList;
	}
	
	public static function spravochnikOhrana(){
		\Bitrix\Main\Loader::includeModule("iblock");
		$ohranaList = \Bitrix\Iblock\ElementTable::getList(array(
			"order" => array("SORT" => "ASC"),
			"select" => array("ID", "NAME", "IBLOCK_ID"),
			"filter" => array("IBLOCK_ID" => 21),
			"group" => array(),
			"limit" => 1000,
			"offset" => 0,
			"cache" => array(
				"ttl" => 3600,
				"cache_joins" => true
			),
		))->fetchAll();
		return $ohranaList;
	}
	
	public static function spravochnikRealestate(){
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
		return $realestateList;
	}
}