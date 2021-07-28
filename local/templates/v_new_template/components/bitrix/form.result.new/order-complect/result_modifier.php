<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Sale;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

function getPaymentSystem()
{
    \CModule::IncludeModule("main");
    \CModule::IncludeModule("sale");

    $obPaySystem = \CSalePaySystemAction::GetList(
        ["SORT" => "ASC"],
        ["ACTIVE" => "Y"],
        false,
        false,
        [
            "PS_DESCRIPTION",
            "NAME",
            "LOGOTIP"
        ]
    );
    while ($arPaySystemTmp = $obPaySystem->Fetch()) {
        $arPayIcon = \CFile::GetFileArray($arPaySystemTmp["LOGOTIP"]);
        $arPaySystem[$arPaySystemTmp["ID"]] = $arPaySystemTmp;
        $arPaySystem[$arPaySystemTmp["ID"]]["ICON"] = $arPayIcon["SRC"];
    }
    return $arPaySystem;
}
//корзину получить для текущего юзера
$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$basketItems = $basket->getBasketItems();

//if ($_SERVER['REMOTE_ADDR'] == '46.147.123.63') {
//    foreach ($basket as $basketItem) {
//        echo $basketItem->getField('NAME') . ' - ' . $basketItem->getQuantity() . '<br />';
//    }
//
//    }

// получим варианты доставки
$arResult["DELIVERY"] = \Bitrix\Sale\Delivery\Services\Manager::getActiveList();
// получим варианты оплаты
$arResult["PAYMENT"] = getPaymentSystem();

// отредактируем некоторые поля
foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] != 'hidden') {
        $idAnsw = $arQuestion['STRUCTURE'][0]["ID"];
        $arQuestion["CAPTION"] = ($arQuestion["REQUIRED"] == "Y" ? $arQuestion["CAPTION"] . " *" : $arQuestion["CAPTION"]);

        switch ($arQuestion['STRUCTURE'][0]['FIELD_TYPE']) {
            case "radio":
                $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = "";
                $name = "form_radio_" . $FIELD_SID;
                $i = 0;
                foreach ($arQuestion['STRUCTURE'] as $arAnsw) {
                    $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] .= '<input type="radio"  id="' . $arAnsw["ID"] . '" name="' . $name . '" value="' . $arAnsw["ID"] . '" ' . ($i == 0 ? " checked" : "") . '>
																	<label for="' . $arAnsw["ID"] . '"></label>
																	<label for="' . $arAnsw["ID"] . '">' . $arAnsw["MESSAGE"] . '</label>
																	' . ($FIELD_SID == 'POLICY_ADDRESS' ? '<br />' : '');
                    $i++;
                }
                break;
            case "date":
                $name = "form_date_" . $idAnsw;
                $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input' . ($arResult["arrVALUES"][$name] ? ' value="' . $arResult["arrVALUES"][$name] . '"' : '') . ' class="date js-check-valid-field' . (!empty($arResult['FORM_ERRORS'][$FIELD_SID]) ? ' error' : '') . '" data-field="' . $FIELD_SID . '" type="text" name="' . $name . '" placeholder="' . $arQuestion["CAPTION"] . '" onfocus="(this.type=\'date\')" onblur="(this.type=\'text\')">';
                break;
            case "email":
                $name = "form_email_" . $idAnsw;
                $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input' . ($arResult["arrVALUES"][$name] ? ' value="' . $arResult["arrVALUES"][$name] . '"' : '') . ' class="js-check-valid-field' . (!empty($arResult['FORM_ERRORS'][$FIELD_SID]) ? ' error' : '') . '" data-field="' . $FIELD_SID . '" type="text" name="' . $name . '" placeholder="' . $arQuestion["CAPTION"] . '" value="">';
                break;
            case "text":
                $name = "form_text_" . $idAnsw;
                $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input' . ($arResult["arrVALUES"][$name] ? ' value="' . $arResult["arrVALUES"][$name] . '"' : '') . ' class="js-check-valid-field' . (!empty($arResult['FORM_ERRORS'][$FIELD_SID]) ? ' error' : '') . '" data-field="' . $FIELD_SID . '" type="text" name="' . $name . '" placeholder="' . $arQuestion["CAPTION"] . '" value="">';
                break;
            case "checkbox":
                $name = "form_checkbox_" . $FIELD_SID . "[]";
                $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input' . ($arResult["arrVALUES"][$name] ? ' value="' . $arResult["arrVALUES"][$name] . '"' : '') . ' class="js-check-valid-field' . (!empty($arResult['FORM_ERRORS'][$FIELD_SID]) ? ' error' : '') . '" data-field="' . $FIELD_SID . '" type="checkbox" name="' . $name . '" id="' . $idAnsw . '" value="' . $idAnsw . '">
				                                					<label for="' . $idAnsw . '">' . $arQuestion["CAPTION"] . '</label>';
                break;

        }


    }
}