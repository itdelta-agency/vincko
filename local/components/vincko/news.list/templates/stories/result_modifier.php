<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
foreach ($arResult["ITEMS"] as &$item){
	//первые элементы - это обложка
	$miniPic = CFile::ResizeImageGet($item["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["ID"], array("width" => 217, "height" => 385), BX_RESIZE_IMAGE_EXACT, false);
	$item["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["MINI"] = $miniPic["src"];
}
unset($item);