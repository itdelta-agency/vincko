<?
defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED === true || die ();

	LocalRedirect($arParams['PAY_TO_LIST'] . "?ORDER_ID=" . $arResult["ORDER_ID"]);
?>