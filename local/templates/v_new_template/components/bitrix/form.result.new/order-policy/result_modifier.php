<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Vincko\Policy;

// получим передаваемые значения
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

$arResult["POLICY_ID"] = $request->getPost('POLICY_ID');

// если ID полиса нет то перебрасываем на выбор полиса
if (empty($arResult["POLICY_ID"])) {
	LocalRedirect($arParams["BACK_LINK"]);
}

// если полис не выбран, то перекидываем пользователя на выборку
// отредактируем некоторые поля
foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] != 'hidden') {
		$idAnsw = $arQuestion['STRUCTURE'][0]["ID"];
		$arQuestion["CAPTION"] = ($arQuestion["REQUIRED"] == "Y" ? $arQuestion["CAPTION"] . " *" : $arQuestion["CAPTION"]);

		switch ($arQuestion['STRUCTURE'][0]['FIELD_TYPE']) {
			case "radio":
				$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = "";

				foreach ($arQuestion['STRUCTURE'] as $arAnsw) {
					$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] .= '<input type="radio" class="js-check-valid-field" data-field="'.$FIELD_SID.'" id="' . $arAnsw["ID"] . '" name="form_radio_' . $FIELD_SID . '" value="' . $arAnsw["ID"] . '">
																	<label for="' . $arAnsw["ID"] . '"></label>
																	<label for="' . $arAnsw["ID"] . '">' . $arAnsw["MESSAGE"] . '</label>
																	' . ($FIELD_SID == 'POLICY_ADDRESS' ? '<br />' : '');
				}
				break;
			case "date":
				$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input class="date js-check-valid-field" data-field="'.$FIELD_SID.'" type="text" name="form_date_'.$idAnsw.'" placeholder="' . $arQuestion["CAPTION"] . '" onfocus="(this.type=\'date\')" onblur="(this.type=\'text\')">';
				break;
			case "email":
				$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input class="js-check-valid-field" data-field="'.$FIELD_SID.'" type="text" name="form_email_'.$idAnsw.'" placeholder="' . $arQuestion["CAPTION"] . '" value="">';
				break;
			case "text":
				$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input class="js-check-valid-field" data-field="'.$FIELD_SID.'" type="text" name="form_text_'.$idAnsw.'" placeholder="' . $arQuestion["CAPTION"] . '" value="">';
				break;
			case "checkbox":
				$arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = '<input class="js-check-valid-field" data-field="'.$FIELD_SID.'" type="checkbox" name="form_checkbox_' . $FIELD_SID . '[]" id="' . $idAnsw . '" value="' . $idAnsw . '">
				                                					<label for="' . $idAnsw . '">' . $arQuestion["CAPTION"] . '</label>';
				break;

		}
	}
}


// получим информацию о полисе(торговом предложении)
$arOffer = CIBlockElement::GetList(
	[],
	[
		"IBLOCK_ID" => 24,
		"ID"        => $arResult["POLICY_ID"]
	],
	false,
	[],
	[
		"IBLOCK_ID",
		"ID",
		"NAME",
		"PROPERTY_ILL",
		"PROPERTY_MAX_PRICE",
		"PROPERTY_PAYMENT_OPTIONS",
		"PROPERTY_PAYMENT_PRICE",
		"PROPERTY_CML2_LINK"
	]
)->GetNext();

// получим информацию о страховой(товаре) предлагающей полис
$arInsurance = CIBlockElement::GetList(
	[],
	[
		"IBLOCK_ID" => 14,
		"ID"        => $arOffer["PROPERTY_CML2_LINK_VALUE"]
	],
	false,
	[],
	[
		"IBLOCK_ID",
		"ID",
		"NAME"
	]
)->GetNext();

// получим варианты выплаты по основным пунктам страховки
$arAllPaymentOptions = Policy::getPaymentOptions($arOffer["PROPERTY_PAYMENT_OPTIONS_VALUE"]);

//соберем массив полиса
$arResult["POLICY"] = Policy::formatPolicy($arOffer, $arAllPaymentOptions, $arInsurance);

$arResult["PAYMENT"] = Policy::getPaymentSystem();
?>
