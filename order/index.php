<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");

use \Vincko\Order;

$session = \Bitrix\Main\Application::getInstance()->getSession();
$orderData = $session->get('orderData');


//if(empty($orderItems))
//    LocalRedirect("/");


$orderData = (array)($orderData);
$orderItems = $orderData['items'];
$complectObj = $orderItems[0];
$subscriptionFeeObj = $orderItems[1];
$policyObj = $orderItems[2];
$totalObj = $orderData['total'];
echo '<pre>';
print_r($orderData);
echo '</pre>';
$arResult["PAYMENT"] = Order::getPaymentSystem();

?>

<? // УБРАТЬ БЛОК ПРИ ПЕРЕНОСЕ НА БОЙ ?>
<div id="test" style="cursor:pointer" xmlns="http://www.w3.org/1999/html">Заполнить тестовыми данными</div>
<script>
    $(document).ready(function () {
        $("#test").click(function (){
            $("input").each(function(index){
                console.log( index + ": " + $(this).attr("name") );
                var name = $(this).attr("name");
                if(name!== undefined && $(this).attr("type")!="hidden") {
                    if ($(this).attr("text")!=-1) {
                        $(this).val($(this).attr("placeholder"));
                    }
                        if ($(this).attr("name")=="date") {
                        $(this).val("2020-07-21");
                    }
                        if ($(this).attr("name")=="orderProps[EMAIL]") {
                        $(this).val("test@test.ru");
                    }
                }
            });
        });

    })
</script>
<?// УБРАТЬ БЛОК ПРИ ПЕРЕНОСЕ НА БОЙ?>

<?if(isset($_GET['ORDER_ID'])):?>
    <?$APPLICATION->IncludeComponent(
        "vincko:sale.order.ajax",
        "vincko",
        array(
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
            "PRODUCT_COLUMNS_HIDDEN" => array(
            ),
            "PRODUCT_COLUMNS_VISIBLE" => array(
                0 => "DISCOUNT_PRICE_PERCENT_FORMATED",
                1 => "PRICE_FORMATED",
            ),
            "PROPS_FADE_LIST_3" => array(
                0 => "20",
                1 => "21",
                2 => "22",
            ),
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
            "USE_YM_GOALS" => "N",
            "COMPONENT_TEMPLATE" => "vincko",
            "SHOW_MAP_FOR_DELIVERIES" => array(
                0 => "7",
                1 => "9",
            )
        ),
        false
    );?>
<?else:?>
<main class="container main">
    <section class="installment insurance-policy order">
        <form method="post" action="/ajax/addorder.php">
        <div class="installment__left-column">
            <h2 class="installment__page-title">Оформление заказа</h2>

            <div class="ready-pack__item-wrapper ready-pack__item-mobile" id="fix-card">
                <div class="ready-pack__item ready-pack__item--short">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/ready-des2/item-head.svg">
                            <img src="../img/ready-des2/item-head.svg" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Комфорт
                            </div>
                            <div class="price"><span>Всего</span> <span>12 000 ₽</span></div>
                        </div>
                    </div>
                    <div class="ready-pack__details">
                        <div class="hide-details hidden">
                            <span>Скрыть детали</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.89604 5.17989L12.3358 8.95144C12.5547 9.19135 12.5547 9.58034 12.3358 9.82014C12.1171 10.06 11.7623 10.06 11.5436 9.82014L8.49994 6.4829L5.45638 9.82004C5.23756 10.0599 4.88284 10.0599 4.66411 9.82004C4.4453 9.58022 4.4453 9.19126 4.66411 8.95134L8.10393 5.1798C8.21335 5.05989 8.3566 5 8.49992 5C8.64332 5 8.78668 5.06 8.89604 5.17989Z"
                                      fill="#005DFF"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ready-pack__mid ready-pack__mid--short hidden">
                        <div class="ready-pack__mid--short-title">
                            Вариант решения включает:
                        </div>
                        <div class="ready-pack__short-list">
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                              fill="#005DFF"/>
                                    </svg>

                                </div>

                                <div class="ready-pack__short-title">
                                    Оборудование
                                    <div class="ready-pack__subscription">
                                        Подписка
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0003 1.66669C5.40033 1.66669 1.66699 5.40002 1.66699 10C1.66699 14.6 5.40033 18.3334 10.0003 18.3334C14.6003 18.3334 18.3337 14.6 18.3337 10C18.3337 5.40002 14.6003 1.66669 10.0003 1.66669ZM10.7587 15.125C10.7004 15.1821 10.6267 15.2209 10.5467 15.2365C10.4666 15.2521 10.3837 15.2438 10.3083 15.2128C10.2329 15.1817 10.1682 15.1292 10.1224 15.0618C10.0765 14.9943 10.0515 14.9149 10.0503 14.8334V14.1667H10.0003C8.93366 14.1667 7.86699 13.7584 7.05033 12.95C6.48452 12.3828 6.09403 11.6647 5.92556 10.8814C5.75709 10.0982 5.81776 9.28302 6.10033 8.53335C6.25866 8.10835 6.81699 8.00002 7.13366 8.32502C7.31699 8.50835 7.35866 8.77502 7.27533 9.00835C6.89199 10.0417 7.10866 11.2417 7.94199 12.075C8.52533 12.6584 9.29199 12.9334 10.0587 12.9167V12.1334C10.0587 11.7584 10.5087 11.575 10.767 11.8417L12.117 13.1917C12.2837 13.3584 12.2837 13.6167 12.117 13.7834L10.7587 15.125ZM12.867 11.6834C12.7809 11.5947 12.7218 11.4833 12.6967 11.3623C12.6716 11.2413 12.6815 11.1156 12.7253 11C13.1087 9.96669 12.892 8.76669 12.0587 7.93335C11.4753 7.35002 10.7087 7.06669 9.95033 7.08335V7.86669C9.95033 8.24169 9.50033 8.42502 9.24199 8.15835L7.88366 6.81669C7.71699 6.65002 7.71699 6.39169 7.88366 6.22502L9.23366 4.87502C9.2919 4.81792 9.36561 4.77917 9.44567 4.76357C9.52572 4.74797 9.6086 4.7562 9.68401 4.78726C9.75943 4.81831 9.82407 4.87082 9.86993 4.93826C9.91579 5.00571 9.94085 5.08513 9.94199 5.16669V5.84169C11.0253 5.82502 12.117 6.21669 12.942 7.05002C13.5078 7.61721 13.8983 8.33535 14.0668 9.11859C14.2352 9.90183 14.1746 10.717 13.892 11.4667C13.7337 11.9 13.1837 12.0084 12.867 11.6834Z"
                                                  fill="#3CBA54"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-h blue">
                                    Nord WRL
                                </div>
                            </div>
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                              fill="#005DFF"/>
                                    </svg>


                                </div>

                                <div class="ready-pack__short-title">
                                    Договор с охранной компанией
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-h">
                                    ООО Собака Съела Товар
                                    <br>
                                    на 3 мес
                                </div>
                            </div>
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="white"/>
                                        <path d="M9.338 5.04486C8.38559 5.30735 7.11663 5.81082 6.17798 6.11892C6.09227 6.14668 6.01608 6.19796 5.95809 6.26691C5.9001 6.33586 5.86264 6.41972 5.84998 6.50892C5.29598 10.6659 6.36063 14.135 7.88763 16.133C8.53415 16.9874 9.84341 18.2852 10.713 18.9112C11.059 19.1552 11.365 19.3312 11.606 19.4442C11.726 19.5012 11.824 19.5392 11.899 19.5622C11.9318 19.5737 11.9656 19.582 12 19.5872C12.034 19.5816 12.0674 19.5733 12.1 19.5622C12.176 19.5392 12.274 19.5012 12.394 19.4442C12.634 19.3312 12.941 19.1542 13.287 18.9112C14.1566 18.2852 15.4658 16.9874 16.1124 16.133C17.6394 14.136 18.704 10.6659 18.15 6.50892C18.1375 6.41968 18.1001 6.33577 18.042 6.2668C17.984 6.19783 17.9078 6.14658 17.822 6.11892C17.171 5.90592 15.749 5.34086 14.662 5.04586C13.552 4.74486 12.531 4.52186 12 4.52186C11.47 4.52186 10.448 4.74486 9.338 5.04586V5.04486ZM9.072 4.56C10.157 4.265 11.31 4 12 4C12.69 4 13.843 4.265 14.928 4.56C16.038 4.86 17.157 5.215 17.815 5.43C18.0901 5.52085 18.334 5.68747 18.5187 5.9107C18.7034 6.13394 18.8213 6.40474 18.859 6.692C19.455 11.169 18.072 14.487 16.394 16.682C15.6824 17.621 14.834 18.4479 13.877 19.135C13.5461 19.3728 13.1955 19.5819 12.829 19.76C12.549 19.892 12.248 20 12 20C11.752 20 11.452 19.892 11.171 19.76C10.8045 19.5819 10.4539 19.3728 10.123 19.135C9.16603 18.4478 8.31758 17.621 7.606 16.682C5.928 14.487 4.54501 11.169 5.14101 6.692C5.17869 6.40474 5.29665 6.13394 5.48132 5.9107C5.666 5.68747 5.9099 5.52085 6.185 5.43C7.1402 5.11681 8.10281 4.82672 9.072 4.56Z"
                                              fill="#005DFF" stroke="#005DFF"/>
                                        <path d="M14.9755 9.17508L11.5805 12.5568L10.0245 11.0068C9.79017 10.7734 9.41016 10.7734 9.17578 11.0068C8.94141 11.2403 8.94141 11.6187 9.17578 11.8522L11.1561 13.8249C11.2687 13.937 11.4213 14 11.5805 14C11.5805 14 11.5805 14 11.5805 14C11.7397 14 11.8923 13.937 12.0048 13.8249L15.8242 10.0205C16.0586 9.78707 16.0586 9.40858 15.8242 9.17512C15.5898 8.94165 15.2099 8.94161 14.9755 9.17508Z"
                                              fill="#005DFF"/>
                                    </svg>


                                </div>

                                <div class="ready-pack__short-title">
                                    Страхование недвижимости
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-text">
                                    Полис “Расширенный с очень что-то что не видно"
                                    <br>
                                    на 3 900 000 руб
                                </div>
                            </div>
                        </div>


                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    <div class="short-rd__price hidden">
                        <div class="short-rd__price-title">Всего</div>
                        <div class="short-rd__price-old">50 630 ₽</div>
                        <div class="short-rd__cost">30 000 ₽</div>
                    </div>
                    <div class="short-rd__footer hidden">
                        <a href="" class="short-rd-another">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.29289 11.7071C5.68342 12.0976 6.31658 12.0976 6.70711 11.7071C7.09763 11.3166 7.09763 10.6834 6.70711 10.2929L3.41421 7L13 7C13.5523 7 14 6.55228 14 6C14 5.44771 13.5523 5 13 5L3.41421 5L6.70711 1.70711C7.09763 1.31658 7.09763 0.683417 6.70711 0.292893C6.31658 -0.0976321 5.68342 -0.0976322 5.29289 0.292893L0.293739 5.29205C0.291278 5.2945 0.28883 5.29697 0.286396 5.29945C0.109253 5.47987 5.48388e-07 5.72718 5.24537e-07 6C5.12683e-07 6.13559 0.0269866 6.26488 0.0758796 6.38278C0.12432 6.49986 0.195951 6.6096 0.290776 6.70498M5.29289 11.7071L0.293092 6.7073L5.29289 11.7071Z"
                                      fill="#005DFF"/>
                            </svg>
                            Изменить выбор
                        </a>
                    </div>
                    <div class="ready-pack__details">
                        <div class="show-details">
                            <span>Смотреть детали</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.10396 9.82011L4.66419 6.04856C4.44527 5.80865 4.44527 5.41966 4.66419 5.17986C4.88292 4.94004 5.23768 4.94004 5.45639 5.17986L8.50006 8.5171L11.5436 5.17996C11.7624 4.94014 12.1172 4.94014 12.3359 5.17996C12.5547 5.41978 12.5547 5.80874 12.3359 6.04866L8.89607 9.8202C8.78665 9.94011 8.6434 10 8.50007 10C8.35668 10 8.21332 9.94 8.10396 9.82011Z"
                                      fill="#005DFF"/>
                            </svg>
                        </div>
                        <div class="hide-details hidden">
                            <span>Скрыть детали</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.89604 5.17989L12.3358 8.95144C12.5547 9.19135 12.5547 9.58034 12.3358 9.82014C12.1171 10.06 11.7623 10.06 11.5436 9.82014L8.49994 6.4829L5.45638 9.82004C5.23756 10.0599 4.88284 10.0599 4.66411 9.82004C4.4453 9.58022 4.4453 9.19126 4.66411 8.95134L8.10393 5.1798C8.21335 5.05989 8.3566 5 8.49992 5C8.64332 5 8.78668 5.06 8.89604 5.17989Z"
                                      fill="#005DFF"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="forms">
                <div class="form" id="form-1">
                    <div class="h4 form__title">
                        <span class="form__title-blue">Страхование</span>
                        <span class="form__title-step">Шаг 1</span>
                    </div>

                    <div class="form__content">
                            <div class="form__section">
                                <div class="h4">
                                    Общая информация для оформления полиса
                                    <span class="form__required">Заполните обязательные поля *</span>
                                </div>
                                <div class="form__section__content sex">
                                    <span>Пол *</span>
                                    <input type="radio" name="sex" value="male" id="male">
                                    <label for="male"></label>
                                    <label for="male">Мужской</label>
                                    <input type="radio" name="sex" value="female" id="female">
                                    <label for="female"></label>
                                    <label for="female">Женский</label>
                                </div>
                                <div class="form__section__content name">
                                    <input type="text" name="surname" placeholder="Фамилия *" class="text-field">
                                    <input type="text" name="name" placeholder="Имя *" class="text-field">
                                    <input type="text" name="patronomic" placeholder="Отчество" class="text-field">
                                    <input type="text" name="date" placeholder="Дата рождения *"
                                           onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"
                                           class="date">
                                    <input type="text" name="place" placeholder="Место рождения *"
                                           class="address-field"><br>
                                    <input type="text" name="mail" placeholder="E-mail *" id="email-field"><br>
                                    <input type="text" name="phone" placeholder="Телефон *" id="phone-field">
                                </div>
                            </div>
                            <div class="form__section">
                                <div class="h4">Паспортные данные</div>

                                <div class="form__section__content passport">
                                    <input type="text" name="number" placeholder="Серия и номер паспорта *"
                                           id="passport">
                                    <input class="date" type="text" name="date" placeholder="Дата выдачи *"
                                           onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"><br>
                                    <input type="text" name="whom" placeholder="Кем выдан *" class="text-field">
                                    <input type="text" name="code" placeholder="Код подразделения *" id="code">
                                    <input type="text" name="inn" placeholder="ИНН" id="inn">
                                </div>
                            </div>
                            <div class="form__section">
                                <div class="h4">Адрес регистрации</div>
                                <div class="form__section__content address-registration">
                                    <input type="text" name="city" placeholder="Город/населенный пункт *"
                                           class="address-field">
                                    <input type="text" name="street" placeholder="Улица *" class="street-field"><br>
                                    <input type="text" name="house" placeholder="Дом *" class="house-field">
                                    <input type="text" name="housing" placeholder="Корпус" class="text-field">
                                    <input type="text" name="flat" placeholder="Квартира" class="flat-field"><br>
                                    <input class="date" type="text" name="date" placeholder="Дата регистрации *"
                                           onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                    <input type="text" name="index" placeholder="Индекс" class="index-field">
                                </div>
                                <div class="h4">Адрес фактического проживания</div>
                                <div class="form__section__content address-residense">
                                    <input type="checkbox" name="same" id="same" checked>
                                    <label for="same">Совпадает с адресом постоянной регистрации</label>
                                    <div class="no-checked address-registration">
                                        <input type="text" name="city" placeholder="Город/населенный пункт *"
                                               class="address-field">
                                        <input type="text" name="street" placeholder="Улица *" class="street-field"><br>
                                        <input type="text" name="house" placeholder="Дом *" class="house-field">
                                        <input type="text" name="housing" placeholder="Корпус" class="text-field">
                                        <input type="text" name="flat" placeholder="Квартира" class="flat-field"><br>
                                        <input class="date" type="text" name="date" placeholder="Дата регистрации *"
                                               onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                        <input type="text" name="index" placeholder="Индекс" class="index-field">
                                    </div>
                                    <p>Если адрес фактического проживания не совпадает с адресом регистрации - снимите
                                        галочку и укажите
                                        достоверную информацию. Это важно.</p>
                                </div>
                                <div class="h4">Адрес квартиры, для которой вы оформляете страховку</div>
                                <div class="form__section__content address-installment">
                                    <div class="radio-wrapper">
                                        <input checked type="radio" name="address-installment" value="1" id="permanent">
                                        <label for="permanent"></label>
                                        <label for="permanent">Совпадает с адресом постоянной регистрации</label>
                                    </div>
                                    <div class="radio-wrapper">
                                        <input type="radio" name="address-installment" value="1" id="actual">
                                        <label for="actual"></label>
                                        <label for="actual">Совпадает с адресом фактического проживания</label>
                                    </div>
                                    <input type="radio" name="address-installment" value="1" id="other">
                                    <label for="other"></label>
                                    <label for="other">Указать другой адрес</label>
                                    <p>Если адрес объекта страхования не совпадает с адресом регистрации или адресом
                                        фактического
                                        проживания - выберите пункт <span>“Указать другой адрес”</span>. Это важно.</p>
                                    <div class="address-registration address-installment-other">
                                        <input type="text" name="city" placeholder="Город/населенный пункт *"
                                               class="address-field">
                                        <input type="text" name="street" placeholder="Улица *" class="street-field"><br>
                                        <input type="text" name="house" placeholder="Дом *" class="house-field">
                                        <input type="text" name="housing" placeholder="Корпус" class="text-field">
                                        <input type="text" name="flat" placeholder="Квартира" class="flat-field"><br>
                                        <input class="date" type="text" name="date" placeholder="Дата регистрации *"
                                               onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                        <input type="text" name="index" placeholder="Индекс" class="index-field">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form__bottom">
                        <button type="button" type="button" class="blue-button form__next-button"><span>Далее</span></button>
                        <div class="form__complete hidden">
                            <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.13132 7.88963L1.04946 4.78001L0 5.83147L4.13132 10L13 1.05145L11.9579 0L4.13132 7.88963Z"
                                      fill="#005DFF"/>
                            </svg>
                            <span>Данные введены</span>
                        </div>
                    </div>
                </div>
                <div class="form def-close" id="form-2">
                    <div class="h4 form__title">
                        <span class="form__title-blue">Доставка</span>
                        <span class="form__title-step">Шаг 2</span>
                    </div>
                    <div class="form__content">
                            <div class="form__section">
                                <div class="h4">
                                    Данные контактного лица
                                    <span class="form__required">Заполните обязательные поля *</span>
                                </div>
                                <div class="form__section__content">
                                    <input type="checkbox" name="same-name" id="same-name" checked>
                                    <label for="same-name">Совпадает с указанными данными в “Шаге 1”</label>
                                    <div class="form__contact-person">
                                        <div class="contact-person__name contact-person__data">
                                            Иванов Иван Иванович
                                        </div>
                                        <div class="contact-person__email contact-person__data">
                                            mailmy@mail.com
                                        </div>
                                        <div class="contact-person__phone contact-person__data">
                                            +7 (000) 000 - 00 - 00
                                        </div>
                                    </div>
                                    <div class="form__contact-person no-checked">
                                        <input type="text" name="surname" placeholder="Фамилия *" class="text-field">
                                        <input type="text" name="name" placeholder="Имя *" class="text-field">
                                        <input type="text" name="patronomic" placeholder="Отчество" class="text-field">
                                        <br>
                                        <input type="text" name="mail" placeholder="E-mail *" class="email-field"><br>
                                        <input type="text" name="phone" placeholder="Телефон *" class="phone-field">
                                    </div>
                                </div>
                            </div>
                            <div class="form__section">
                                <div class="h4">
                                    Адрес доставки
                                    <span class="form__delivery">СДЭК
                                        <span class="form__delivery-cost">Бесплатно</span>
                                    </span>
                                </div>
                                <div class="form__section__content address-installment">
                                    <div class="radio-wrapper">
                                        <input checked type="radio" name="address-installment" value="1"
                                               id="permanent-delivery">
                                        <label for="permanent-delivery"></label>
                                        <label for="permanent-delivery">Совпадает с адресом постоянной
                                            регистрации</label>
                                    </div>
                                    <div class="radio-wrapper">
                                        <input type="radio" name="address-installment" value="1" id="actual-delivery">
                                        <label for="actual-delivery"></label>
                                        <label for="actual-delivery">Совпадает с адресом фактического проживания</label>
                                    </div>
                                    <input type="radio" name="address-installment" value="1" id="other-delivery">
                                    <label for="other-delivery"></label>
                                    <label for="other-delivery">Указать другой адрес</label>
                                    <div class="input-address">
                                        Россия, Москва, переулок Свободы, дом 21, квартира 12
                                    </div>
                                    <div class="address-registration address-installment-other">
                                        <input type="text" name="city" placeholder="Город/населенный пункт *"
                                               class="address-field">
                                        <input type="text" name="street" placeholder="Улица *" class="street-field"><br>
                                        <input type="text" name="house" placeholder="Дом *" class="house-field">
                                        <input type="text" name="housing" placeholder="Корпус" class="text-field">
                                        <input type="text" name="flat" placeholder="Квартира" class="flat-field"><br>
                                        <input type="text" name="index" placeholder="Индекс" class="index-field">
                                    </div>
                                    <textarea placeholder="Комментарий к заказу"></textarea>
                                </div>
                                <div class="h4">
                                    Дата и время монтажа оборудования
                                    <span class="form__delivery-cost">Бесплатно</span>
                                </div>
                                <input class="date date-install" type="text" name="date-install"
                                       placeholder="Дата и время">
                            </div>
                    </div>
                    <div class="form__bottom">
                        <button type="button" type="button" class="blue-button form__next-button"><span>Далее</span></button>
                        <div class="form__complete hidden">
                            <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.13132 7.88963L1.04946 4.78001L0 5.83147L4.13132 10L13 1.05145L11.9579 0L4.13132 7.88963Z"
                                      fill="#005DFF"/>
                            </svg>
                            <span>Данные введены</span>
                        </div>
                    </div>
                </div>
                <div class="form form__payment def-close" id="form-3">
                    <div class="h4 form__title">
                        <span class="form__title-blue">Оплата</span>
                        <span class="form__title-step">Шаг 3</span>
                    </div>

                    <div class="form__content">
                            <div class="form__section">
                                <h4>Способ оплаты</h4>
                                <div class="form__section__content payment-method">
                                    <div class="payment-method-left">
                                        <div class="radio-wrapper" id="card-radio">
                                            <input type="radio" name="payment-method" value="card" id="card" checked>
                                            <label for="card"></label>
                                            <label for="card">Картой онлайн</label>
                                        </div>
                                        <div class="radio-wrapper" id="installment-radio">
                                            <input type="radio" name="payment-method" value="installment"
                                                   id="installment">
                                            <label for="installment"></label>
                                            <label for="installment">Рассрочка без процентов ПАО Сбербанк</label>
                                        </div>
                                    </div>

                                    <div class="payment-method-right">
                                        <div class="payment-method__card active">
                                            <h4>Всего</h4>
                                            <div class="payment-method__old-price">50 630 ₽</div>
                                            <div class="payment-method__price">55 000 ₽</div>
                                        </div>
                                        <div class="payment-method__installment">
                                            <div class="payment-method__installment-title">
                                                <span>Проценты <br> платит <span>vincko:</span></span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.7857 2.10172L18.4082 5.85759L21.9898 7.59929L20.1837 11.0049L22 14.4104L18.3878 16.1521L17.7653 19.908L13.7959 19.3145L10.9694 22L8.13265 19.2755L4.19388 19.8983L3.56122 16.1132L0 14.3812L1.81633 10.9757L0.0102041 7.59929L3.59184 5.83813L4.21429 2.11146L8.16327 2.73419L11 0L13.8265 2.69527L17.7857 2.10172ZM8.44898 6.13976C8.04304 6.13976 7.65372 6.29353 7.36667 6.56725C7.07963 6.84096 6.91837 7.2122 6.91837 7.59929C6.91837 7.98638 7.07963 8.35762 7.36667 8.63134C7.65372 8.90505 8.04304 9.05882 8.44898 9.05882C8.85492 9.05882 9.24424 8.90505 9.53129 8.63134C9.81833 8.35762 9.97959 7.98638 9.97959 7.59929C9.97959 7.2122 9.81833 6.84096 9.53129 6.56725C9.24424 6.29353 8.85492 6.13976 8.44898 6.13976ZM13.551 12.9509C13.1451 12.9509 12.7558 13.1047 12.4687 13.3784C12.1817 13.6521 12.0204 14.0233 12.0204 14.4104C12.0204 14.7975 12.1817 15.1688 12.4687 15.4425C12.7558 15.7162 13.1451 15.87 13.551 15.87C13.957 15.87 14.3463 15.7162 14.6333 15.4425C14.9204 15.1688 15.0816 14.7975 15.0816 14.4104C15.0816 14.0233 14.9204 13.6521 14.6333 13.3784C14.3463 13.1047 13.957 12.9509 13.551 12.9509ZM7.33673 15.87L16.102 7.51172L14.6633 6.13976L5.89796 14.498L7.33673 15.87Z"
                                                          fill="#FF5252"/>
                                                </svg>
                                            </div>
                                            <div class="payment-method__price-month">1 000 ₽/мес</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form__section form__pay-info">
                                <div class="form__section__content">
                                    <p>Выберите способ оплаты. В случае оплаты картой, после нажатия кнопки
                                        “Оформить заказ” Вы будете перенаправлены на сайт банка для совершения оплаты
                                        заказа.
                                        В случае выбора способа оплаты “Рассрочкой без процентов ПАО Сбербанк”
                                        Вы будете перенаправлены на сайт ПАО Сбербанк для оформления рассрочки.</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="installment__right-column order__right-column">
            <div class="ready-pack__item-wrapper">
                <div class="ready-pack__item ready-pack__item--short">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="<?=$complectObj->package_info->picture_src?>">
                            <img src="<?=$complectObj->package_info->picture_src?>" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                <?=$complectObj->name1?>
                            </div>
                        </div>
                    </div>
                    <div class="ready-pack__mid ready-pack__mid--short">
                        <div class="ready-pack__mid--short-title">
                            Вариант решения включает:
                        </div>
                        <div class="ready-pack__short-list">
                            <?if($complectObj->active):?>
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                              fill="#005DFF"/>
                                    </svg>

                                </div>

                                <div class="ready-pack__short-title">
                                    Оборудование
                                    <div class="ready-pack__subscription">
                                        Подписка
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.0003 1.66669C5.40033 1.66669 1.66699 5.40002 1.66699 10C1.66699 14.6 5.40033 18.3334 10.0003 18.3334C14.6003 18.3334 18.3337 14.6 18.3337 10C18.3337 5.40002 14.6003 1.66669 10.0003 1.66669ZM10.7587 15.125C10.7004 15.1821 10.6267 15.2209 10.5467 15.2365C10.4666 15.2521 10.3837 15.2438 10.3083 15.2128C10.2329 15.1817 10.1682 15.1292 10.1224 15.0618C10.0765 14.9943 10.0515 14.9149 10.0503 14.8334V14.1667H10.0003C8.93366 14.1667 7.86699 13.7584 7.05033 12.95C6.48452 12.3828 6.09403 11.6647 5.92556 10.8814C5.75709 10.0982 5.81776 9.28302 6.10033 8.53335C6.25866 8.10835 6.81699 8.00002 7.13366 8.32502C7.31699 8.50835 7.35866 8.77502 7.27533 9.00835C6.89199 10.0417 7.10866 11.2417 7.94199 12.075C8.52533 12.6584 9.29199 12.9334 10.0587 12.9167V12.1334C10.0587 11.7584 10.5087 11.575 10.767 11.8417L12.117 13.1917C12.2837 13.3584 12.2837 13.6167 12.117 13.7834L10.7587 15.125ZM12.867 11.6834C12.7809 11.5947 12.7218 11.4833 12.6967 11.3623C12.6716 11.2413 12.6815 11.1156 12.7253 11C13.1087 9.96669 12.892 8.76669 12.0587 7.93335C11.4753 7.35002 10.7087 7.06669 9.95033 7.08335V7.86669C9.95033 8.24169 9.50033 8.42502 9.24199 8.15835L7.88366 6.81669C7.71699 6.65002 7.71699 6.39169 7.88366 6.22502L9.23366 4.87502C9.2919 4.81792 9.36561 4.77917 9.44567 4.76357C9.52572 4.74797 9.6086 4.7562 9.68401 4.78726C9.75943 4.81831 9.82407 4.87082 9.86993 4.93826C9.91579 5.00571 9.94085 5.08513 9.94199 5.16669V5.84169C11.0253 5.82502 12.117 6.21669 12.942 7.05002C13.5078 7.61721 13.8983 8.33535 14.0668 9.11859C14.2352 9.90183 14.1746 10.717 13.892 11.4667C13.7337 11.9 13.1837 12.0084 12.867 11.6834Z"
                                                  fill="#3CBA54"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-h blue">
                                    <?=$complectObj->name2?>
                                </div>
                            </div>
                            <?endif;?>
                            <?if($subscriptionFeeObj->active):?>
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                              fill="#005DFF"/>
                                    </svg>


                                </div>

                                <div class="ready-pack__short-title">
                                    Договор с охранной компанией
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-h">
                                    <?=$subscriptionFeeObj->name2?>
                                    <br>
                                    на <?=$subscriptionFeeObj->name1?>
                                </div>
                            </div>
                            <?endif;?>
                            <?if($policyObj->active):?>
                            <div class="ready-pack__short-item">
                                <div class="ready-pack__short-img">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="white"/>
                                        <path d="M9.338 5.04486C8.38559 5.30735 7.11663 5.81082 6.17798 6.11892C6.09227 6.14668 6.01608 6.19796 5.95809 6.26691C5.9001 6.33586 5.86264 6.41972 5.84998 6.50892C5.29598 10.6659 6.36063 14.135 7.88763 16.133C8.53415 16.9874 9.84341 18.2852 10.713 18.9112C11.059 19.1552 11.365 19.3312 11.606 19.4442C11.726 19.5012 11.824 19.5392 11.899 19.5622C11.9318 19.5737 11.9656 19.582 12 19.5872C12.034 19.5816 12.0674 19.5733 12.1 19.5622C12.176 19.5392 12.274 19.5012 12.394 19.4442C12.634 19.3312 12.941 19.1542 13.287 18.9112C14.1566 18.2852 15.4658 16.9874 16.1124 16.133C17.6394 14.136 18.704 10.6659 18.15 6.50892C18.1375 6.41968 18.1001 6.33577 18.042 6.2668C17.984 6.19783 17.9078 6.14658 17.822 6.11892C17.171 5.90592 15.749 5.34086 14.662 5.04586C13.552 4.74486 12.531 4.52186 12 4.52186C11.47 4.52186 10.448 4.74486 9.338 5.04586V5.04486ZM9.072 4.56C10.157 4.265 11.31 4 12 4C12.69 4 13.843 4.265 14.928 4.56C16.038 4.86 17.157 5.215 17.815 5.43C18.0901 5.52085 18.334 5.68747 18.5187 5.9107C18.7034 6.13394 18.8213 6.40474 18.859 6.692C19.455 11.169 18.072 14.487 16.394 16.682C15.6824 17.621 14.834 18.4479 13.877 19.135C13.5461 19.3728 13.1955 19.5819 12.829 19.76C12.549 19.892 12.248 20 12 20C11.752 20 11.452 19.892 11.171 19.76C10.8045 19.5819 10.4539 19.3728 10.123 19.135C9.16603 18.4478 8.31758 17.621 7.606 16.682C5.928 14.487 4.54501 11.169 5.14101 6.692C5.17869 6.40474 5.29665 6.13394 5.48132 5.9107C5.666 5.68747 5.9099 5.52085 6.185 5.43C7.1402 5.11681 8.10281 4.82672 9.072 4.56Z"
                                              fill="#005DFF" stroke="#005DFF"/>
                                        <path d="M14.9755 9.17508L11.5805 12.5568L10.0245 11.0068C9.79017 10.7734 9.41016 10.7734 9.17578 11.0068C8.94141 11.2403 8.94141 11.6187 9.17578 11.8522L11.1561 13.8249C11.2687 13.937 11.4213 14 11.5805 14C11.5805 14 11.5805 14 11.5805 14C11.7397 14 11.8923 13.937 12.0048 13.8249L15.8242 10.0205C16.0586 9.78707 16.0586 9.40858 15.8242 9.17512C15.5898 8.94165 15.2099 8.94161 14.9755 9.17508Z"
                                              fill="#005DFF"/>
                                    </svg>


                                </div>

                                <div class="ready-pack__short-title">
                                    Страхование недвижимости
                                </div>

                                <div class="ready-pack__short-content ready-pack__short-content-text">
                                    Полис “<?=$policyObj->policy_name?>"
                                    <br>
                                    на <?=$policyObj->name2?>
                                </div>
                            </div>
                            <?endif;?>
                        </div>


                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    <div class="short-rd__price">
                        <div class="short-rd__price-title">Всего</div>
                        <?if(intval($totalObj->total_sum)!=intval($totalObj->total_old_sum)):?>
                        <div class="short-rd__price-old"><?=$totalObj->total_old_sum?> ₽</div>
                        <div class="short-rd__cost"><?=$totalObj->total_sum?> ₽</div>
                        <?else:?>
                        <div class="short-rd__cost"><?=$totalObj->total_old_sum?>
                        <?endif;?>
                    </div>
                    <div class="short-rd__footer">
                        <a href="" class="short-rd-another">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.29289 11.7071C5.68342 12.0976 6.31658 12.0976 6.70711 11.7071C7.09763 11.3166 7.09763 10.6834 6.70711 10.2929L3.41421 7L13 7C13.5523 7 14 6.55228 14 6C14 5.44771 13.5523 5 13 5L3.41421 5L6.70711 1.70711C7.09763 1.31658 7.09763 0.683417 6.70711 0.292893C6.31658 -0.0976321 5.68342 -0.0976322 5.29289 0.292893L0.293739 5.29205C0.291278 5.2945 0.28883 5.29697 0.286396 5.29945C0.109253 5.47987 5.48388e-07 5.72718 5.24537e-07 6C5.12683e-07 6.13559 0.0269866 6.26488 0.0758796 6.38278C0.12432 6.49986 0.195951 6.6096 0.290776 6.70498M5.29289 11.7071L0.293092 6.7073L5.29289 11.7071Z"
                                      fill="#005DFF"/>
                            </svg>
                            Изменить выбор
                        </a>
                    </div>
                </div>
            </div>

            <div class="installment__rules installment__rules--active">
                <div class="installment__rules-wall"></div>
                <label for="view-agree" class="installment__rules-mobile" id="label-view-agree">
                    <span><span class="show">Показать</span><span class="hide">Скрыть</span> текст с условиями САО “ВСК”</span>
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.10396 9.82011L4.66419 6.04856C4.44527 5.80865 4.44527 5.41966 4.66419 5.17986C4.88292 4.94004 5.23768 4.94004 5.45639 5.17986L8.50006 8.5171L11.5436 5.17996C11.7624 4.94014 12.1172 4.94014 12.3359 5.17996C12.5547 5.41978 12.5547 5.80874 12.3359 6.04866L8.89607 9.8202C8.78665 9.94011 8.6434 10 8.50007 10C8.35668 10 8.21332 9.94 8.10396 9.82011Z"
                              fill="#A0A0A0"/>
                    </svg>
                </label>
                <input type="checkbox" name="view-agree" id="view-agree">
                <p class="installment__rules-text">
                    Я даю согласие САО «ВСК», находящемуся по адресу 121552, г. Москва, ул. Островная, д. 4, на
                    обработку моих персональных данных, включая сбор, систематизацию, накопление, хранение, уточнение
                    (обновление, изменение), использование, распространение (в том числе передачу), обезличивание,
                    блокирование, уничтожение, внесение в информационную систему, обработку с использованием средств
                    автоматизации или без использования таких средств, в том числе на основании исключительно
                    автоматизированной обработки, персональных данных указанных в заявлении (договоре, полисе), в
                    соответствие с Федеральным законом от 27.07.2006 г. №152-ФЗ «О персональных данных». Указанные
                    данные предоставляются в целях заключения и исполнения договора страхования, а также разработки,
                    продвижения и получения информации о новых страховых продуктах и услугах, получения мной
                    рекламно-информационных рассылок. Согласие предоставляется с момента подписания настоящего полиса и
                    действует в течение пяти лет после исполнения обязательств. Согласие может быть отозвано путём
                    письменного заявления в САО «ВСК». Подтверждаю ознакомление и согласие
                    <a class="installment__rules-agree" href="">с правилами страховки</a>
                    За достоверность указанных в заявлении персональных данных страхователя, включая серию и номер
                    паспорта, мобильный телефон, e-mail ответственность несет страхователь.
                </p>
                <input type="checkbox" id="agreement">
                <label for="agreement" class="installment__rules-agreement">
                    Я даю согласие и подтверждаю достоверность указанных данных
                </label>

                <label for="view-agree-two" class="installment__rules-mobile" id="label-view-agree-two">
                    <span><span class="show">Показать</span><span class="hide">Скрыть</span> текст с условиями обработки данных и договором оферты</span>
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.10396 9.82011L4.66419 6.04856C4.44527 5.80865 4.44527 5.41966 4.66419 5.17986C4.88292 4.94004 5.23768 4.94004 5.45639 5.17986L8.50006 8.5171L11.5436 5.17996C11.7624 4.94014 12.1172 4.94014 12.3359 5.17996C12.5547 5.41978 12.5547 5.80874 12.3359 6.04866L8.89607 9.8202C8.78665 9.94011 8.6434 10 8.50007 10C8.35668 10 8.21332 9.94 8.10396 9.82011Z"
                              fill="#A0A0A0"/>
                    </svg>
                </label>
                <input type="checkbox" name="view-agree" id="view-agree-two">
                <p class="installment__rules-text">
                    За достоверность указанных в заказе персональных данных ответственность несете Вы. Нажимая на кнопку
                    “Оформить заказ” Вы подтверждает, что ознакомились и согласны с
                    <a class="installment__rules-agree" href="">условиями обработки персональных данных</a>
                    <a class="installment__rules-agree" href="">договором оферты</a>
                </p>

                <input type="checkbox" id="agreement-two">
                <label for="agreement-two" class="installment__rules-agreement">
                    Я согласен с условиями и договором
                </label>
                <?foreach ($orderItems as $orderItem):?>
                    <?if($orderItem->active):?>
                        <input type="hidden" name="orderItemsIds[]" value="<?=$orderItem->id?>">
                    <?endif;?>
                <?endforeach;?>
                <button type="submit" type="submit" class="button yellow-button">Оформить страховой полис</button>
            </div>
        </div>
        </form>
    </section>

    <?/*<form method="post" action="/ajax/addorder.php">
    <div class="installment">

        <div class="installment__left-column">
            <h2 class="installment__page-title">Оформление заказа</h2>
            <h3 class="installment__title">
                <span class="installment__title-lvl1">Готовое решение “Спокойствие”</span>
                <span class="installment__title-lvl2">Вариант Комфорт</span>
            </h3>
            (\/\/при оформления рассрочки добавляется блок внизу\/\/)
            <a href="#short-rd" class="to-short-rd">Подробнее</a>
            <div class="installment__calculator">
                <div class="section-result__price-bonuses-container">
                    <div class="installment__bonuses-title">Список компонентов заказа, к которому можно применить оплату
                        бонусами
                    </div>
                    <div class="section-result__price-title">
                        <div class="section-result__price-title-item">Наименование,<br>
                            стоимость
                        </div>
                        <div class="section-result__price-title-item">Будет оплачено <br>
                            бонусами
                        </div>
                        <div class="section-result__price-title-item">Остаток <br>
                            к оплате, руб
                        </div>
                        <div class="section-result__price-title-item">Курс <br>
                            руб/бонус
                        </div>

                    </div>

                    <div class="section-result__price-item">
                        <div class="section-result__price-item-name">
                            <div class="section-result__price-item-name-name">Датчик такой-то для того Датчик такой-то
                                для того
                            </div>
                            <div class="section-result__price-item-name-cost">1 200 руб / 1400 бонусов</div>
                        </div>
                        <div class="section-result__price-item-bonus-cost">1 199 бонусов</div>
                        <div class="section-result__price-item-rub-cost">1 руб</div>
                        <div class="section-result__price-item-rate">1 / 1,4</div>
                    </div>
                    <div class="section-result__price-item">
                        <div class="section-result__price-item-name">
                            <div class="section-result__price-item-name-name">Датчик такой-то для того Датчик такой-то
                                для того
                            </div>
                            <div class="section-result__price-item-name-cost">1 200 руб / 1400 бонусов</div>
                        </div>
                        <div class="section-result__price-item-bonus-cost">1 199 бонусов</div>
                        <div class="section-result__price-item-rub-cost">1 руб</div>
                        <div class="section-result__price-item-rate">1 / 1,4</div>
                    </div>


                </div>

                <div class="installment__calculator-left vis">
                    <div class="installment__calculator-first-pay">
                        <div class="installment__calculator-sub-head">
                            <span class="installment__calculator-sub-title">Первый взнос</span> <span
                                class="installment__calculator-sub-value installment__calculator-sub-value-1">135 руб</span>
                        </div>
                        <div class="polzunok-container-2">
                            <div class="polzunok-1"><span tabindex="0"
                                                          class="ui-slider-handle ui-corner-all ui-state-default"><span
                                        class="polzunok__number polzunok__number-1">0</span> </span></div>
                        </div>
                        <div class="installment__calculator-footer">
                            50%
                        </div>
                    </div>

                    <div class="installment__calculator-time">
                        <div class="installment__calculator-sub-head">
                            <span class="installment__calculator-sub-title">Срок кредитования</span> <span
                                class="installment__calculator-sub-value installment__calculator-sub-value-2">0</span>
                        </div>
                        <div class="polzunok-container-2">
                            <div class="polzunok-2"><span tabindex="0"
                                                          class="ui-slider-handle ui-corner-all ui-state-default"> </span>
                            </div>
                            <div class="installment__calculator-footer">
                                12 мес
                            </div>
                        </div>
                    </div>

                    <div class="installment__calculator-info">
                        <h4>Ежемесячный платеж</h4>
                        <div class="installment__calculator-info-month">1 456 руб</div>

                    </div>


                </div>

                <div class="installment__calculator-right">
                    <div class="section-result__right">

                        <div class="price__bonuses">
                            <h3>Сколько оплатить бонусами?

                            </h3>
                            <div class="price__bonuses-cost">
                                <div class="blue">3 000</div>
                                <div class="price__bonuses-info vis">
                                    <div>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="4" fill="#93B6FF"/>
                                            <path d="M15 9C13.8133 9 12.6533 9.35189 11.6666 10.0112C10.6799 10.6705 9.91085 11.6075 9.45673 12.7039C9.0026 13.8003 8.88378 15.0067 9.11529 16.1705C9.3468 17.3344 9.91825 18.4035 10.7574 19.2426C11.5965 20.0818 12.6656 20.6532 13.8295 20.8847C14.9933 21.1162 16.1997 20.9974 17.2961 20.5433C18.3925 20.0891 19.3295 19.3201 19.9888 18.3334C20.6481 17.3467 21 16.1867 21 15C21 14.2121 20.8448 13.4319 20.5433 12.7039C20.2417 11.9759 19.7998 11.3145 19.2426 10.7574C18.6855 10.2002 18.0241 9.75825 17.2961 9.45672C16.5681 9.15519 15.7879 9 15 9ZM15 18.6C14.8813 18.6 14.7653 18.5648 14.6667 18.4989C14.568 18.433 14.4911 18.3392 14.4457 18.2296C14.4003 18.12 14.3884 17.9993 14.4115 17.8829C14.4347 17.7666 14.4918 17.6596 14.5757 17.5757C14.6596 17.4918 14.7666 17.4347 14.8829 17.4115C14.9993 17.3884 15.12 17.4003 15.2296 17.4457C15.3392 17.4911 15.433 17.568 15.4989 17.6667C15.5648 17.7653 15.6 17.8813 15.6 18C15.6 18.1591 15.5368 18.3117 15.4243 18.4243C15.3117 18.5368 15.1591 18.6 15 18.6ZM15.6 15.504V16.2C15.6 16.3591 15.5368 16.5117 15.4243 16.6243C15.3117 16.7368 15.1591 16.8 15 16.8C14.8409 16.8 14.6883 16.7368 14.5757 16.6243C14.4632 16.5117 14.4 16.3591 14.4 16.2V15C14.4 14.8409 14.4632 14.6883 14.5757 14.5757C14.6883 14.4632 14.8409 14.4 15 14.4C15.178 14.4 15.352 14.3472 15.5 14.2483C15.648 14.1494 15.7634 14.0089 15.8315 13.8444C15.8996 13.68 15.9174 13.499 15.8827 13.3244C15.848 13.1498 15.7623 12.9895 15.6364 12.8636C15.5105 12.7377 15.3502 12.652 15.1756 12.6173C15.001 12.5826 14.82 12.6004 14.6556 12.6685C14.4911 12.7366 14.3506 12.852 14.2517 13C14.1528 13.148 14.1 13.322 14.1 13.5C14.1 13.6591 14.0368 13.8117 13.9243 13.9243C13.8117 14.0368 13.6591 14.1 13.5 14.1C13.3409 14.1 13.1883 14.0368 13.0757 13.9243C12.9632 13.8117 12.9 13.6591 12.9 13.5C12.8984 13.1102 13.0054 12.7276 13.2089 12.3951C13.4124 12.0627 13.7045 11.7934 14.0524 11.6175C14.4002 11.4416 14.7902 11.366 15.1786 11.3992C15.567 11.4323 15.9386 11.5729 16.2516 11.8053C16.5646 12.0376 16.8068 12.3525 16.951 12.7146C17.0952 13.0768 17.1358 13.472 17.0681 13.8559C17.0005 14.2398 16.8274 14.5973 16.5681 14.8884C16.3088 15.1795 15.9736 15.3926 15.6 15.504Z"
                                                  fill="white"/>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="price__bonuses-desc">
                                На счету 5 000 бонусов
                            </div>
                            <div class="price__bonuses-close">
                                <div>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.88173 5.9864L11.8557 1.0257C11.954 0.911231 12.0054 0.76398 11.9996 0.613378C11.9937 0.462776 11.9311 0.319916 11.8243 0.213345C11.7174 0.106774 11.5742 0.0443419 11.4232 0.0385248C11.2722 0.0327077 11.1245 0.0839342 11.0097 0.181967L6.03573 5.14266L1.06173 0.175983C0.948744 0.063303 0.795507 0 0.635726 0C0.475945 0 0.322708 0.063303 0.209726 0.175983C0.0967439 0.288663 0.0332711 0.44149 0.0332711 0.600844C0.0332711 0.760197 0.0967439 0.913024 0.209726 1.0257L5.18973 5.9864L0.209726 10.9471C0.146917 11.0007 0.0959048 11.0668 0.0598909 11.141C0.0238769 11.2152 0.00363881 11.2961 0.000447115 11.3785C-0.00274458 11.4609 0.0111787 11.5431 0.0413434 11.6199C0.0715082 11.6967 0.117263 11.7664 0.175736 11.8247C0.234209 11.8831 0.304137 11.9287 0.381132 11.9588C0.458127 11.9889 0.540527 12.0027 0.623158 11.9996C0.70579 11.9964 0.786869 11.9762 0.861308 11.9403C0.935747 11.9044 1.00194 11.8535 1.05573 11.7908L6.03573 6.83014L11.0097 11.7908C11.1245 11.8889 11.2722 11.9401 11.4232 11.9343C11.5742 11.9285 11.7174 11.866 11.8243 11.7595C11.9311 11.6529 11.9937 11.51 11.9996 11.3594C12.0054 11.2088 11.954 11.0616 11.8557 10.9471L6.88173 5.9864Z"
                                              fill="#005DFF"/>
                                    </svg>

                                </div>
                            </div>
                            <div class="price__result vis">
                                <h4>Итоговая сумма рассрочки</h4>
                                <div class="price__result-num">11 456 руб</div>
                            </div>
                            <div class="price__bonuses-info-m">
                                Платформа автоматически определяет товары для оплаты бонусами.
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="installment__calculator-info-footer">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.4026 2.29279L20.0816 6.39009L23.9889 8.29014L22.0186 12.0053L24 15.7205L20.0594 17.6205L19.3803 21.7178L15.0501 21.0703L11.9666 24L8.87198 21.0279L4.57514 21.7072L3.88497 17.5781L0 15.6886L1.98145 11.9735L0.0111317 8.29014L3.91837 6.36886L4.5974 2.30341L8.90538 2.98275L12 0L15.0835 2.94029L19.4026 2.29279ZM9.21707 6.69792C8.77422 6.69792 8.34951 6.86567 8.03637 7.16427C7.72323 7.46287 7.54731 7.86786 7.54731 8.29014C7.54731 8.71242 7.72323 9.11741 8.03637 9.41601C8.34951 9.7146 8.77422 9.88235 9.21707 9.88235C9.65991 9.88235 10.0846 9.7146 10.3978 9.41601C10.7109 9.11741 10.8868 8.71242 10.8868 8.29014C10.8868 7.86786 10.7109 7.46287 10.3978 7.16427C10.0846 6.86567 9.65991 6.69792 9.21707 6.69792ZM14.7829 14.1283C14.3401 14.1283 13.9154 14.296 13.6022 14.5946C13.2891 14.8932 13.1132 15.2982 13.1132 15.7205C13.1132 16.1428 13.2891 16.5477 13.6022 16.8463C13.9154 17.1449 14.3401 17.3127 14.7829 17.3127C15.2258 17.3127 15.6505 17.1449 15.9636 16.8463C16.2768 16.5477 16.4527 16.1428 16.4527 15.7205C16.4527 15.2982 16.2768 14.8932 15.9636 14.5946C15.6505 14.296 15.2258 14.1283 14.7829 14.1283ZM8.00371 17.3127L17.5659 8.1946L15.9963 6.69792L6.43414 15.816L8.00371 17.3127Z"
                          fill="#FF5252"/>
                </svg>
                <span>все проценты за вас платит <span class="blue">vincko:</span></span>
            </div>
            (/\/\здесь заканчивается/\/\)
            <div class="forms">
                <?if($policyObj->active):?>
                <div class="form" id="form-1">
                    <h4>Шаг 1. Регион доставки</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>

                    <div class="form__content">

                            <div class="form__section">

                                <h4>Адрес доставки</h4>
                                <div class="form__section__content address-registration">
                                    <input type="text" name="orderProps[CITY]" placeholder="Город/населенный пункт">
                                    <input type="text" name="street" placeholder="Улица"><br>
                                    <input type="text" name="house" placeholder="Дом">
                                    <input type="text" name="housing" placeholder="Корпус">
                                    <input type="text" name="flat" placeholder="Квартира">
                                    <input type="text" name="orderProps[ZIP]" placeholder="Индекс"><br>
                                </div>

                                <div class="form__section">
                                    <h4>Паспортные данные</h4>

                                    <div class="form__section__content passport">

                                        <input type="text" name="number" placeholder="Серия и номер паспорта">
                                        <input class="date" type="text" name="date" placeholder="Дата выдачи"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input type="text" name="whom" placeholder="Кем выдан">
                                        <input type="text" name="code" placeholder="Код подразделения">
                                        <div class="address-registration">
                                            <input type="text" name="birthday" placeholder="Дата рождения">
                                            <input type="text" name="place" placeholder="Место рождения"><br>
                                        </div>

                                    </div>
                                </div>
                                <div class="form__section">
                                    <h4>Адрес регистрации</h4>
                                    <div class="form__section__content address-registration">
                                        <input type="text" name="city1" placeholder="Город/населенный пункт">
                                        <input type="text" name="street1" placeholder="Улица"><br>
                                        <input type="text" name="house1" placeholder="Дом">
                                        <input type="text" name="housing1" placeholder="Корпус">
                                        <input type="text" name="flat1" placeholder="Квартира"><br>
                                        <input class="date" type="text" name="date1" placeholder="Дата регистрации"
                                               onfocus="(this.type='date')"
                                               onblur="(this.type='text')" onmouseover="(this.type='date')"
                                               onmouseout="(this.type='text')">
                                        <input type="text" name="index1" placeholder="Индекс">
                                    </div>
                                    <h4>Адрес фактического проживания</h4>
                                    <div class="form__section__content address-residense">
                                        <input type="checkbox" name="same" id="same" checked>
                                        <label for="same">Совпадает с адресом постоянной регистрации</label>
                                        <div class="no-checked address-registration">
                                            <input type="text" name="city2" placeholder="Город/населенный пункт">
                                            <input type="text" name="street2" placeholder="Улица"><br>
                                            <input type="text" name="house2" placeholder="Дом">
                                            <input type="text" name="housing2" placeholder="Корпус">
                                            <input type="text" name="flat2" placeholder="Квартира"><br>
                                            <input class="date" type="text" name="date2" placeholder="Дата регистрации"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')">
                                            <input type="text" name="index2" placeholder="Индекс">
                                        </div>
                                        <p>Если адрес фактического проживания не совпадает с адресом регистрации -
                                            снимите
                                            галочку и укажите
                                            достоверную информацию. Это важно.</p>
                                    </div>
                                    <h4>Адрес квартиры, для которой вы оформляете страховку</h4>
                                    <div class="form__section__content address-installment">
                                        <input checked type="radio" name="address-installment" value="1" id="permanent">
                                        <label for="permanent"></label>
                                        <label for="permanent">Совпадает с адресом постоянной регистрации</label>
                                        <br>
                                        <input type="radio" name="address-installment" value="1" id="actual">
                                        <label for="actual"></label>
                                        <label for="actual">Совпадает с адресом фактического проживания</label>
                                        <br>
                                        <input type="radio" name="address-installment" value="1" id="other">
                                        <label for="other"></label>
                                        <label for="other">Указать другой адрес</label>
                                        <p>Если адрес объекта страхования не совпадает с адресом регистрации или адресом
                                            фактического
                                            проживания - выберите пункт <span>“Указать другой адрес”</span>. Это важно.
                                        </p>
                                        <div class="address-registration address-installment-other">
                                            <input type="text" name="city" placeholder="Город/населенный пункт">
                                            <input type="text" name="street" placeholder="Улица"><br>
                                            <input type="text" name="house" placeholder="Дом">
                                            <input type="text" name="housing" placeholder="Корпус">
                                            <input type="text" name="flat" placeholder="Квартира"><br>
                                            <input class="date" type="text" name="date" placeholder="Дата регистрации"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')">
                                            <input type="text" name="index" placeholder="Индекс">
                                        </div>
                                    </div>
                                </div>

                            </div>



                    </div>
                </div>
                <?endif;?>
                <?if($complectObj->active):?>
                <div class="form" id="form-2">
                    <h4>Шаг 2. Контактная информация</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>

                    <div class="form__content">

                            <div class="form__section">
                                <h4>Ваши персональные данные для связи</h4>
                                <div class="form__section__content name">
                                    <input type="text" name="surname" placeholder="Фамилия">
                                    <input type="text" name="name" placeholder="Имя">
                                    <input type="text" name="patronomic" placeholder="Отчество">
                                    <input type="text" name="orderProps[EMAIL]" placeholder="E-mail"><br>
                                    <input type="text" name="orderProps[PHONE]" placeholder="Телефон">
                                    <button type="button" class="button blue-border-button">Отправить sms</button>
                                    <p>Для продолжения оформления на указанный номер телефона будет отправлен
                                        SMS-код.</p>
                                </div>
                            </div>

                    </div>
                </div>
                <?endif;?>
                <div class="form" id="form-3">
                    <h4>Шаг 3. Оформление</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>
<!--                    <div class="form__content">-->
<!--                            <div class="form__section">-->
<!--                                <h4>Доставка</h4>-->
<!--                                <div class="form__section__content education">-->
<!--                                    <div class="select-wrapper">-->
<!--                                        <select required>-->
<!--                                            <option value="" disabled selected hidden>Тип доставки-->
<!--                                            </option>-->
<!--                                            <option value="1">Самовывоз</option>-->
<!--                                            <option value="2">СДЭК</option>-->
<!--                                            <option value="3">ПЭК</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                    </div>-->
                    <div class="form__content">

                            <div class="form__section">
                                <h4>Оплата</h4>
                                <div class="form__section__content">

                                    <div class="select-wrapper">
                                        <select name="payment_id" required>
                                            <option value="" disabled selected hidden>Тип оплаты
                                            </option>
                                            <?foreach ($arResult['PAYMENT'] as $key => $arPaySystem):?>
                                            <option value="<?=$arPaySystem['ID']?>"><?=$arPaySystem['NAME']?></option>
                                            <?endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="installment__right-column">
            <div class="short-rd ">
                <div id="short-rd" class="short-rd__item hidden">
                    <div class="short-rd__head">
                        <picture class="short-rd__head-pic">
                            <img src="<?=$complectObj->package_info->picture_src?>" alt="main-pic">
                        </picture>

                        <div class="short-rd__title">
                            <div class="short-rd__title-up"><?=$complectObj->package_info->name?></div>
                            <div class="short-rd__title-down"><?=$complectObj->name1?></div>
                        </div>
                    </div>
                    <div class="short-rd__body">
                        <div class="short-rd__body-start">
                            Вариант решения включает:
                        </div>
                        <div class="short-rd__body-items">
                            <?if($complectObj->active):?>
                            <div class="short-rd__body-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                          fill="#005DFF"/>
                                </svg>
                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Оборудование
                                    </div>
                                    <div class="short-rd__body-li-product"><?=$complectObj->name2?></div>
                                </div>
                            </div>
                            <?endif;?>
                            <?if($subscriptionFeeObj->active):?>
                            <div class="short-rd__body-item">
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                          fill="#005DFF"/>
                                </svg>

                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Договор с охранной компанией
                                    </div>
                                    <div class="short-rd__body-li-product"><?=$subscriptionFeeObj->name2?></div>
                                    <div class="short-rd__body-li-desc"><?=$subscriptionFeeObj->name1?> (с 06.05.2021)</div>
                                </div>
                            </div>

                            <?endif;?>
                            <?if($policyObj->active):?>

                            (\/\/при оформления рассрочки добавляется блок внизу\/\/)

                            <div class="short-rd__body-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.5663 3.5761C11.9377 3.42088 12.2972 3.24758 12.6039 3.05756C12.909 2.86847 13.2074 2.63536 13.3957 2.34899C13.603 2.0336 13.684 1.6318 13.4769 1.22695C13.2975 0.876124 12.9414 0.608665 12.5078 0.388826C11.5891 -0.0770006 10.7591 -0.101562 10.0456 0.194426C9.35762 0.479842 8.85074 1.03333 8.48768 1.58556C8.29384 1.88042 8.13243 2.18795 8 2.47943C7.86758 2.18795 7.70616 1.88042 7.51232 1.58556C7.14926 1.03333 6.64238 0.479842 5.95436 0.194426C5.24085 -0.101562 4.41091 -0.0770006 3.49215 0.388826C3.05856 0.608665 2.70245 0.876124 2.52306 1.22695C2.31605 1.6318 2.397 2.0336 2.60435 2.34899C2.79262 2.63536 3.09102 2.86847 3.39615 3.05756C3.70278 3.24758 4.06233 3.42088 4.43369 3.5761H0.533333C0.238781 3.5761 0 3.81488 0 4.10943V6.81354C0 7.10809 0.238781 7.34687 0.533333 7.34687H1.06667V15.4667C1.06667 15.7612 1.30545 16 1.6 16H14.4C14.6946 16 14.9333 15.7612 14.9333 15.4667V7.34687H15.4667C15.7612 7.34687 16 7.10809 16 6.81354V4.10943C16 3.81488 15.7612 3.5761 15.4667 3.5761H11.5663ZM7.46667 4.64276V6.2802H1.06667V4.64276H7.46667ZM8.53333 6.2802V4.64276H14.9333V6.2802H8.53333ZM7.46667 7.34687H2.13333V14.9333H7.46667V7.34687ZM8.53333 14.9333V7.34687H13.8667V14.9333H8.53333ZM7.2136 3.36714C7.07356 2.99482 6.87813 2.56261 6.62102 2.17153C6.31741 1.70972 5.95762 1.35058 5.54564 1.17968C5.15915 1.01935 4.65576 0.994786 3.97452 1.34019C3.60811 1.52597 3.49755 1.66412 3.47277 1.71257L3.4709 1.71638C3.47362 1.7242 3.48023 1.73956 3.49565 1.76302C3.55738 1.85691 3.70065 1.99139 3.95802 2.15088C4.20601 2.30456 4.51917 2.45681 4.87103 2.60277C5.57415 2.89445 6.38281 3.14107 7.0238 3.31607C7.08905 3.33389 7.15242 3.35092 7.2136 3.36714ZM8.7864 3.36714C8.84758 3.35092 8.91095 3.33389 8.9762 3.31607C9.61719 3.14107 10.4259 2.89445 11.129 2.60277C11.4808 2.45681 11.794 2.30456 12.042 2.15088C12.2994 1.99139 12.4426 1.85691 12.5044 1.76302C12.5198 1.73956 12.5264 1.7242 12.5291 1.71637L12.5272 1.71257C12.5025 1.66412 12.3919 1.52597 12.0255 1.34019C11.3442 0.994786 10.8409 1.01935 10.4544 1.17968C10.0424 1.35058 9.68259 1.70972 9.37898 2.17153C9.12187 2.56261 8.92644 2.99482 8.7864 3.36714Z"
                                          fill="#FF5252"/>
                                </svg>


                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Страхование недвижимости
                                    </div>
                                    <div class="short-rd__body-li-product"><?=$policyObj->company_name?></div>
                                    <div class="short-rd__body-li-desc">
                                        Полис на 12 месяцев (с 06.05.2021)<br>
                                        Выплата <?=$policyObj->name2?>
                                    </div>
                                </div>

                            </div>

                            <?endif;?>

                            (/\/\здесь заканчивается/\/\)

                        </div>

                    </div>
                    <div class="short-rd__gift">
                        <div class="short-rd__gift-title">
                            В подарок:
                        </div>

                        <div class="short-rd__gift-items">
                            <span class="short-rd__gift-item">1 мес. охранных услуг</span>
                            <span class="short-rd__gift-item">страховка</span>
                            <span class="short-rd__gift-item">доставка</span>
                            <span class="short-rd__gift-item">монтаж</span>
                        </div>
                    </div>

                    <div class="short-rd__footer">

                        <a href="" class="short-rd-another">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.29289 11.7071C5.68342 12.0976 6.31658 12.0976 6.70711 11.7071C7.09763 11.3166 7.09763 10.6834 6.70711 10.2929L3.41421 7L13 7C13.5523 7 14 6.55228 14 6C14 5.44771 13.5523 5 13 5L3.41421 5L6.70711 1.70711C7.09763 1.31658 7.09763 0.683417 6.70711 0.292893C6.31658 -0.0976321 5.68342 -0.0976322 5.29289 0.292893L0.293739 5.29205C0.291278 5.2945 0.28883 5.29697 0.286396 5.29945C0.109253 5.47987 5.48388e-07 5.72718 5.24537e-07 6C5.12683e-07 6.13559 0.0269866 6.26488 0.0758796 6.38278C0.12432 6.49986 0.195951 6.6096 0.290776 6.70498M5.29289 11.7071L0.293092 6.7073L5.29289 11.7071Z"
                                      fill="#005DFF"/>
                            </svg>
                            Выбрать другое
                        </a>
                    </div>

                </div>
            </div>

            <div class="installment__rules installment__rules--active">
                <div class="installment__rules-wall"></div>
                <p>
                    Я даю согласие САО «ВСК», находящемуся по адресу 121552, г. Москва, ул. Островная, д. 4, на
                    обработку моих персональных данных, включая сбор, систематизацию, накопление, хранение, уточнение
                    (обновление, изменение), использование, распространение (в том числе передачу), обезличивание,
                    блокирование, уничтожение, внесение в информационную систему, обработку с использованием средств
                    автоматизации или без использования таких средств, в том числе на основании исключительно
                    автоматизированной обработки, персональных данных указанных в заявлении (договоре, полисе), в
                    соответствие с Федеральным законом от 27.07.2006 г. №152-ФЗ «О персональных данных». Указанные
                    данные предоставляются в целях заключения и исполнения договора страхования, а также разработки,
                    продвижения и получения информации о новых страховых продуктах и услугах, получения мной
                    рекламно-информационных рассылок. Согласие предоставляется с момента подписания настоящего полиса и
                    действует в течение пяти лет после исполнения обязательств. Согласие может быть отозвано путём
                    письменного заявления в САО «ВСК». Подтверждаю ознакомление и согласие
                    <a class="installment__rules-agree" href="">с правилами страховки</a>
                    За достоверность указанных в заявлении персональных данных страхователя, включая серию и номер
                    паспорта, мобильный телефон, e-mail ответственность несет страхователь.
                </p>
                <input type="checkbox" id="agreement">
                <label for="agreement" class="installment__rules-agreement">
                    Я даю согласие и подтверждаю достоверность указанных данных
                </label>
                <?foreach ($orderItems as $orderItem):?>
                <?if($orderItem->active):?>
                <input type="hidden" name="orderItemsIds[]" value="<?=$orderItem->id?>">
                <?endif;?>
                <?endforeach;?>
                <input type="submit"  class="button yellow-button" value="Оформить заказ">
            </div>
        </div>

    </div>
    </form>*/?>

</main>
<?endif;?>

<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
