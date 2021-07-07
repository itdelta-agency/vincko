<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа 2");
use Bitrix\Sale;
Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");
$siteId = Bitrix\Main\Context::getCurrent()->getSite();
$fuser = Sale\Fuser::getId();
$basket = Sale\Basket::loadItemsForFUser($fuser, $siteId);
$basketElems = $basket->getBasketItems();
//это для 1 товара. Если пакет добавляется, то надо перебирать возможность оплаты у всех
$props = $basketElems[0]->getPropertyCollection();

if ($props->getPropertyValues()["BONUSPAYMENT"]["VALUE"] == 1){
	//если можно оплатить бонусами, то ищем стоимость товара в бонусах
	$bonusPrice = $props->getPropertyValues()["BONUSPRICE"]["VALUE"];
}

$basketItems = $basket->getListOfFormatText();
$basePrice = $basket->getBasePrice();
$userBonuses = CSaleUserAccount::GetByUserID($fuser, "BNS");
?>
<h2>Список товаров в корзине</h2>
<?foreach ($basketItems as $bi):?>
<div style="margin: 0 0 25px 0; font-size: 18px;">
<?=$bi?>
</div>
<?endforeach;?>
<form id="js-testorder" method="POST" action="/ajax/order2.php">
	<?
		echo bitrix_sessid_post();
		if ($arResult['PREPAY_ADIT_FIELDS'] <> ''){
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
	?>
	<input id="ID_PAY_SYSTEM_ID_10" name="PAY_SYSTEM_ID" type="hidden" class="bx-soa-pp-company-checkbox" value="10">
	<input id="ID_DELIVERY_ID_35" name="DELIVERY_ID" type="hidden" class="bx-soa-pp-company-checkbox" value="35">
	<label>ФИО: <input type="text" size="40" name="ORDER_PROP_20" id="soa-property-20" autocomplete="name" placeholder="" class="form-control bx-soa-customer-input bx-ios-fix"></label>
	<label>E-mail: <input type="text" size="40" name="ORDER_PROP_21" id="soa-property-21" autocomplete="email" placeholder="" class="form-control bx-soa-customer-input bx-ios-fix"></label>
	<label>Телефон: <input type="text" size="30" name="ORDER_PROP_22" id="soa-property-22" autocomplete="tel" placeholder="" class="form-control bx-soa-customer-input bx-ios-fix"></label>
	<label>Адрес доставки: <textarea cols="30" rows="3" name="ORDER_PROP_26" id="soa-property-26" autocomplete="address" placeholder="" class="form-control bx-ios-fix"></textarea></label>
	<label>Комментарий к заказу: <textarea id="orderDescription" cols="4" class="form-control bx-soa-customer-textarea bx-ios-fix" name="ORDER_DESCRIPTION"></textarea></label>
	<div style="margin: 0 0 25px 0; font-size: 16px;">Стоимость заказа без учета скидок: <span style="font-weight: bold; font-size: 18px;"><?=$basePrice?> руб</span></div>
	<div style="margin: 0 0 25px 0; font-size: 16px;">Стоимость заказа в бонусах: <span style="font-weight: bold; font-size: 18px;"><?=$bonusPrice?></span></div>
	<div style="margin: 0 0 25px 0; font-size: 16px;">Количество бонусов на счету: <span style="font-weight: bold; font-size: 18px;"><?=\SaleFormatCurrency($userBonuses["CURRENT_BUDGET"], $userBonuses["CURRENCY"], true);?></span></div>
	<label>Количество бонусов для оплаты заказа (не более <?=\SaleFormatCurrency($userBonuses["CURRENT_BUDGET"], $userBonuses["CURRENCY"], true);?>): <input type="text" size="30" name="ORDER_BONUSES" class="form-control bx-soa-customer-input bx-ios-fix"></label>
	<div style="height: 50px; clear: both;"></div>
	<input type="submit" style="cursor: pointer; display: inline-block; outline: 0; border: 0; padding: 0 50px; line-height: 48px; color: #fff; background: #005dff; text-decoration: none;" value="Оформить заказ">
</form>
<?/*$APPLICATION->IncludeComponent(
	"vincko:sale.order.ajax",
	"",
	Array(
		"ACTION_VARIABLE" => "soa-action",
		"ADDITIONAL_PICT_PROP_10" => "-",
		"ADDITIONAL_PICT_PROP_11" => "-",
		"ADDITIONAL_PICT_PROP_12" => "-",
		"ADDITIONAL_PICT_PROP_13" => "-",
		"ADDITIONAL_PICT_PROP_14" => "-",
		"ADDITIONAL_PICT_PROP_15" => "-",
		"ADDITIONAL_PICT_PROP_24" => "-",
		"ALLOW_APPEND_ORDER" => "Y",
		"ALLOW_AUTO_REGISTER" => "Y",
		"ALLOW_NEW_PROFILE" => "N",
		"ALLOW_USER_PROFILES" => "N",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"BASKET_POSITION" => "before",
		"COMPATIBLE_MODE" => "N",
		"DELIVERIES_PER_PAGE" => "9",
		"DELIVERY_FADE_EXTRA_SERVICES" => "N",
		"DELIVERY_NO_AJAX" => "N",
		"DELIVERY_NO_SESSION" => "Y",
		"DELIVERY_TO_PAYSYSTEM" => "p2d",
		"DISABLE_BASKET_REDIRECT" => "N",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"HIDE_ORDER_DESCRIPTION" => "N",
		"MESS_ADDITIONAL_PROPS" => "Дополнительные свойства",
		"MESS_AUTH_BLOCK_NAME" => "Авторизация",
		"MESS_AUTH_REFERENCE_1" => "Символом \"звездочка\" (*) отмечены обязательные для заполнения поля.",
		"MESS_AUTH_REFERENCE_2" => "После регистрации вы получите информационное письмо.",
		"MESS_AUTH_REFERENCE_3" => "Личные сведения, полученные в распоряжение интернет-магазина при регистрации или каким-либо иным образом, не будут без разрешения пользователей передаваться третьим организациям и лицам за исключением ситуаций, когда этого требует закон или судебное решение.",
		"MESS_BACK" => "Назад",
		"MESS_BASKET_BLOCK_NAME" => "Состав заказа",
		"MESS_BUYER_BLOCK_NAME" => "Контакты покупателя",
		"MESS_COUPON" => "Купон",
		"MESS_DELIVERY_BLOCK_NAME" => "Вид доставки",
		"MESS_DELIVERY_CALC_ERROR_TEXT" => "Вы можете продолжить оформление заказа, а чуть позже менеджер магазина свяжется с вами и уточнит информацию по доставке.",
		"MESS_DELIVERY_CALC_ERROR_TITLE" => "Не удалось рассчитать стоимость доставки.",
		"MESS_ECONOMY" => "Экономия",
		"MESS_EDIT" => "изменить",
		"MESS_FAIL_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически.<br />Обратите внимание на развернутый блок с информацией о заказе. Здесь вы можете внести необходимые изменения или оставить как есть и нажать кнопку \"#ORDER_BUTTON#\".",
		"MESS_FURTHER" => "Продолжить",
		"MESS_INNER_PS_BALANCE" => "На вашем пользовательском счете:",
		"MESS_NAV_BACK" => "Назад",
		"MESS_NAV_FORWARD" => "Вперед",
		"MESS_NEAREST_PICKUP_LIST" => "Ближайшие пункты:",
		"MESS_ORDER" => "Оформить заказ",
		"MESS_ORDER_DESC" => "Комментарии к заказу:",
		"MESS_PAYMENT_BLOCK_NAME" => "Оплата",
		"MESS_PAY_SYSTEM_PAYABLE_ERROR" => "Вы сможете оплатить заказ после того, как менеджер проверит наличие полного комплекта товаров на складе. Сразу после проверки вы получите письмо с инструкциями по оплате. Оплатить заказ можно будет в персональном разделе сайта.",
		"MESS_PERIOD" => "Срок доставки",
		"MESS_PERSON_TYPE" => "Тип плательщика",
		"MESS_PICKUP_LIST" => "Пункты самовывоза:",
		"MESS_PRICE" => "Стоимость",
		"MESS_PRICE_FREE" => "бесплатно",
		"MESS_REGION_BLOCK_NAME" => "Регион доставки",
		"MESS_REGION_REFERENCE" => "Выберите свой город в списке. Если вы не нашли свой город, выберите \"другое местоположение\", а город впишите в поле \"Город\"",
		"MESS_REGISTRATION_REFERENCE" => "Если вы впервые на сайте, и хотите, чтобы мы вас помнили и все ваши заказы сохранялись, заполните регистрационную форму.",
		"MESS_REG_BLOCK_NAME" => "Регистрация",
		"MESS_SELECT_PICKUP" => "Выбрать",
		"MESS_SELECT_PROFILE" => "Выберите профиль",
		"MESS_SUCCESS_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически.<br />Если все заполнено верно, нажмите кнопку \"#ORDER_BUTTON#\".",
		"MESS_USE_COUPON" => "Применить купон",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"PATH_TO_AUTH" => "/reg/",
		"PATH_TO_BASKET" => "",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_PERSONAL" => "index.php",
		"PAY_FROM_ACCOUNT" => "Y",
		"PAY_SYSTEMS_PER_PAGE" => "9",
		"PICKUPS_PER_PAGE" => "5",
		"PICKUP_MAP_TYPE" => "yandex",
		"PRODUCT_COLUMNS_HIDDEN" => array(),
		"PRODUCT_COLUMNS_VISIBLE" => array("DISCOUNT_PRICE_PERCENT_FORMATED","PRICE_FORMATED"),
		"PROPS_FADE_LIST_3" => array("20","21","22","41"),
		"SEND_NEW_USER_NOTIFY" => "N",
		"SERVICES_IMAGES_SCALING" => "adaptive",
		"SET_TITLE" => "Y",
		"SHOW_BASKET_HEADERS" => "N",
		"SHOW_COUPONS" => "N",
		"SHOW_COUPONS_BASKET" => "Y",
		"SHOW_COUPONS_DELIVERY" => "Y",
		"SHOW_COUPONS_PAY_SYSTEM" => "Y",
		"SHOW_DELIVERY_INFO_NAME" => "Y",
		"SHOW_DELIVERY_LIST_NAMES" => "Y",
		"SHOW_DELIVERY_PARENT_NAMES" => "Y",
		"SHOW_MAP_FOR_DELIVERIES" => array("7","9"),
		"SHOW_MAP_IN_PROPS" => "Y",
		"SHOW_NEAREST_PICKUP" => "Y",
		"SHOW_NOT_CALCULATED_DELIVERIES" => "N",
		"SHOW_ORDER_BUTTON" => "final_step",
		"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
		"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
		"SHOW_PICKUP_MAP" => "Y",
		"SHOW_STORES_IMAGES" => "Y",
		"SHOW_TOTAL_ORDER_BUTTON" => "N",
		"SHOW_VAT_PRICE" => "N",
		"SKIP_USELESS_BLOCK" => "N",
		"SPOT_LOCATION_BY_GEOIP" => "Y",
		"TEMPLATE_LOCATION" => "popup",
		"TEMPLATE_THEME" => "site",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "Y",
		"USE_CUSTOM_ERROR_MESSAGES" => "Y",
		"USE_CUSTOM_MAIN_MESSAGES" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PHONE_NORMALIZATION" => "Y",
		"USE_PRELOAD" => "N",
		"USE_PREPAYMENT" => "N",
		"USE_YM_GOALS" => "N"
	)
);*/?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>