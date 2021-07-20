<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->addExternalJS("/local/js/equipitem.js");

if($_GET['itd']=='y')
{

    echo '<pre>';
    print_r($arResult);
    echo '</pre>';
    die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
        ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
        : reset($arResult['OFFERS']);
    $showSliderControls = false;

    foreach ($arResult['OFFERS'] as $offer) {
        if ($offer['MORE_PHOTO_COUNT'] > 1) {
            $showSliderControls = true;
            break;
        }
    }
} else {
    $actualItem = $arResult;
    $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}
?>
    <main class="complect main ">
        <div class="container">
            <div class="container up-top-slider-bg">
                <div class="top-slider-bg ">
                    <picture>
                        <source srcset="<?= $arResult['PREVIEW_PICTURE_RESIZED']['src'] ?>">
                        <img src="<?= $arResult['PREVIEW_PICTURE_RESIZED']['src'] ?>" alt="<?= $arResult['NAME'] ?>">
                    </picture>
                </div>
            </div>
            <section class="complect__slider">
                <div class="complect__slider-wrapper">
                    <div class="solutions-card__circles">
                        <? foreach ($arResult['PACKAGES_CLASSES'] as $key => $class): ?>
                            <div onclick="location.href='/equipment-kits/<?= $arResult['FIRST_LIST_COMPLECTS_SLUGS'][$key]['SLUG'] ?>/'"
                                 class="solutions-card__circles_item <?= $arResult['CURRENT_PACKAGE_CLASS'] == $key ? 'show' : 'hide' ?>">
                                <div class="solutions-card__circles_item-icon">
                                    <img src="<?= $class['ICON']['src'] ?>" alt="<?= $class['NAME'] ?>">
                                </div>
                                <div class="solutions-card__circles_item-text">
                                    <?= $class['NAME'] ?>
                                </div>
                            </div>
                        <? endforeach; ?>
                        <div class="solutions__subscribe">
                            <a href="#subscribe">
                                Подписка
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.00033 0.666626C4.40033 0.666626 0.666992 4.39996 0.666992 8.99996C0.666992 13.6 4.40033 17.3333 9.00033 17.3333C13.6003 17.3333 17.3337 13.6 17.3337 8.99996C17.3337 4.39996 13.6003 0.666626 9.00033 0.666626ZM9.75866 14.125C9.70042 14.1821 9.62671 14.2208 9.54665 14.2364C9.4666 14.252 9.38372 14.2438 9.30831 14.2127C9.23289 14.1817 9.16824 14.1292 9.12239 14.0617C9.07653 13.9943 9.05147 13.9148 9.05033 13.8333V13.1666H9.00033C7.93366 13.1666 6.86699 12.7583 6.05033 11.95C5.48452 11.3828 5.09403 10.6646 4.92556 9.88139C4.75709 9.09815 4.81776 8.28296 5.10033 7.53329C5.25866 7.10829 5.81699 6.99996 6.13366 7.32496C6.31699 7.50829 6.35866 7.77496 6.27533 8.00829C5.89199 9.04163 6.10866 10.2416 6.94199 11.075C7.52533 11.6583 8.29199 11.9333 9.05866 11.9166V11.1333C9.05866 10.7583 9.50866 10.575 9.76699 10.8416L11.117 12.1916C11.2837 12.3583 11.2837 12.6166 11.117 12.7833L9.75866 14.125ZM11.867 10.6833C11.7809 10.5946 11.7218 10.4833 11.6967 10.3623C11.6716 10.2412 11.6815 10.1155 11.7253 9.99996C12.1087 8.96663 11.892 7.76663 11.0587 6.93329C10.4753 6.34996 9.70866 6.06663 8.95033 6.08329V6.86663C8.95033 7.24163 8.50033 7.42496 8.24199 7.15829L6.88366 5.81663C6.71699 5.64996 6.71699 5.39163 6.88366 5.22496L8.23366 3.87496C8.2919 3.81786 8.36561 3.77911 8.44567 3.76351C8.52572 3.7479 8.6086 3.75614 8.68401 3.7872C8.75943 3.81825 8.82407 3.87076 8.86993 3.9382C8.91579 4.00565 8.94085 4.08507 8.94199 4.16663V4.84163C10.0253 4.82496 11.117 5.21663 11.942 6.04996C12.5078 6.61715 12.8983 7.33529 13.0668 8.11853C13.2352 8.90177 13.1746 9.71696 12.892 10.4666C12.7337 10.9 12.1837 11.0083 11.867 10.6833Z"
                                          fill="#3CBA54"/>
                                </svg>

                            </a>
                        </div>
                    </div>
                    <div class="complect__slider-wrapper-item active" data-tab="1">
                        <div class="h3 complect__slider-wrapper-item-title">Комплект оборудования
                            <h1><?= $arResult['NAME'] ?></h1></div>
                        <? if (!empty($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"])): ?>
                            <ul class="complect__slider-wrapper-item-about-top">
                                <? $i = 0; ?>
                                <? foreach ($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"] as $k => $val): ?>
                                    <? if ($i > 1) {
                                        break;
                                    } ?>
                                    <li>
                                        <picture>
                                            <source srcset="<?= $val['PREVIEW_PICTURE']['SRC'] ?>">
                                            <img src="<?= $val['PREVIEW_PICTURE']['SRC'] ?>" alt="fire">
                                        </picture>
                                        <p><?= $val['NAME'] ?></p>
                                    </li>
                                    <? $i++; ?>
                                <? endforeach; ?>
                            </ul>
                            <ul class="complect__slider-wrapper-item-about-bottom">
                                <? $i = 0; ?>
                                <? foreach ($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"] as $k => $val): ?>
                                    <? if ($i < 2) {
                                        $i++;
                                        continue;
                                    } elseif ($i > 3) {
                                        break;
                                    } ?>
                                    <li>
                                        <picture>
                                            <source srcset="<?= $val['PREVIEW_PICTURE']['SRC'] ?>">
                                            <img src="<?= $val['PREVIEW_PICTURE']['SRC'] ?>" alt="fire">
                                        </picture>
                                        <p><?= $val['NAME'] ?></p>
                                    </li>
                                    <? $i++; ?>
                                <? endforeach; ?>
                            </ul>
                        <? endif; ?>
                        <div class="complect__slider-wrapper-item-price">
                            <div class="solutions__bottom_right">
                                <div class="solutions__bottom_column">
                                    <div class="solutions__bottom_column-title">
                                        Всего
                                    </div>
                                    <?if ((int)($arResult["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"])!= (int)($arResult["PRICES"]["BASE"]["PRINT_VALUE"])):?>
                                        <div class="solutions__bottom_column-oldprice">
                                            <?= $arResult["PRICES"]["BASE"]["PRINT_VALUE"] ?>
                                        </div>
                                        <div class="solutions__bottom_column-newprice">
                                            <?= $arResult["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"] ?>
                                        </div>
                                    <?else:?>
                                        <div class="solutions__bottom_column-newprice">
                                            <?= $arResult["PRICES"]["BASE"]["PRINT_VALUE"] ?>
                                        </div>
                                    <?endif;?>

                                </div>
                                <div class="solutions__bottom_column">
                                    <div class="solutions__bottom_column-title">
                                        Рассрочка без процентов
                                    </div>
                                    <div class="solutions__bottom_column-interest">
                                        <p>все проценты<br>
                                            за вас платит <span class="blue-vinco">vincko:</span>
                                        </p>
                                    </div>
                                    <div class="solutions__bottom_column-monthprice">
                                        <div class="solutions__bottom_column-select">
                                            12 мес.
                                        </div>
                                        <p>по</p>
                                        <div class="solutions__bottom_column-price">
                                            1 000 ₽
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="complect__slider-wrapper-item" data-tab="2">
                        <h3 class="complect__slider-wrapper-item-title">Комплект оборудования <br> <span>AJAX StarterKit Cam</span>
                        </h3>
                        <ul class="complect__slider-wrapper-item-about-top">
                            <li>

                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/fire.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/fire.svg" alt="fire">
                                </picture>
                                <p>Сообщает о появлении дыма и резких скачках температуры</p>
                            </li>
                            <li>
                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/flooding-house.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/flooding-house.svg"
                                         alt="flooding-house">
                                </picture>
                                <p>Определяет за миллисекунды первые признаки затопления</p>
                            </li>
                        </ul>
                        <ul class="complect__slider-wrapper-item-about-bottom">
                            <li>
                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/gallery.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/gallery.svg" alt="gallery">
                                </picture>
                                <p>Присылает анимированную серию фотографий</p>
                            </li>
                            <li>
                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/phone.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/phone.svg" alt="phone">
                                </picture>
                                <p>Передает тревоги на смартфон владельца и пульт охраны</p>
                            </li>
                        </ul>
                        <div class="complect__slider-wrapper-item-price">
                            <p>Всего <br> <span>12 000 ₽</span> <br> <span class="opas">или можно в рассрочку</span></p>
                        </div>
                    </div>
                    <div class="complect__slider-wrapper-item" data-tab="3">
                        <h3 class="complect__slider-wrapper-item-title">Комплект оборудования <br> <span>AJAX StarterKit Cam</span>
                        </h3>
                        <ul class="complect__slider-wrapper-item-about-top">
                            <li>

                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/fire.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/fire.svg" alt="fire">
                                </picture>
                                <p>Сообщает о появлении дыма и резких скачках температуры</p>
                            </li>
                            <li>
                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/flooding-house.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/flooding-house.svg"
                                         alt="flooding-house">
                                </picture>
                                <p>Определяет за миллисекунды первые признаки затопления</p>
                            </li>
                        </ul>
                        <ul class="complect__slider-wrapper-item-about-bottom">
                            <li>

                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/gallery.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/gallery.svg" alt="gallery">
                                </picture>
                                <p>Присылает анимированную серию фотографий</p>
                            </li>
                            <li>
                                <picture>
                                    <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/phone.svg">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/phone.svg" alt="phone">
                                </picture>
                                <p>Передает тревоги на смартфон владельца и пульт охраны</p>
                            </li>
                        </ul>
                        <div class="complect__slider-wrapper-item-price">
                            <p>Всего <br> <span>12 000 ₽</span> <br> <span class="opas">или можно в рассрочку</span></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="gotovoe__reshenie-main" class="gotovoe__reshenie-main">
            <div class="container">
                <section class="gotovoe__reshenie">
                    <p class="gotovoe__reshenie-text">
                        Комплект можно купить в рамках Готового решения <br>
                        <span><?= $arResult['PACKAGE_GROUP']['NAME'] ?></span>
                    </p>

                    <a class="gotovoe__reshenie-button c-button"
                       href="/packages/<?= $arResult['PACKAGE_GROUP']['CODE'] ?>">
                        <span>К готовому решению</span>
                    </a>
                </section>
            </div>
        </div>
        <div class="complect__slider-datchiki-main">
            <div class="container">
                <section class="complect__slider-datchiki">
                    <div class="complect__slider-datchiki-color">
                        <div class="complect__slider-datchiki-color-choice">

                            <div class="color black active"></div>
                            <div class="color white"></div>
                        </div>
                        <p class="complect__slider-datchiki-color-text">
                            Цветовое решение <br>
                            <span>Черное</span>
                        </p>
                    </div>
                    <div class="h5 complect__slider-datchiki-title">Датчики, входящие в комплект:</div>
                    <div class="slick-slider-datchiki">
                        <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                            <div class="slide">
                                <div class="slide-box">
                                    <div class="modal-btn" data-key="<?= $key ?>">
                                        <picture>
                                            <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/slide-modal.svg">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/slide-modal.svg"
                                                 alt="slide-modal">
                                        </picture>
                                    </div>
                                    <div class="slide-box-title"><?= $ec["NAME"] ?></div>
                                    <div class="slide-box-slider">
                                        <div class="slide-box-slider-item">

                                            <? // additional photos
                                            if (count($ec["EQUIPMENT_PICTURES"]) > 0):?>
                                                <? foreach ($ec['EQUIPMENT_PICTURES'] as $PHOTO): ?>
                                                    <div class="image">
                                                        <picture>
                                                            <source srcset="<?= $PHOTO["SRC"] ?>">
                                                            <img src="<?= $PHOTO["SRC"] ?>" alt="<?= $ec["NAME"] ?>">
                                                        </picture>
                                                    </div>
                                                <? endforeach ?>
                                            <? endif ?>

                                        </div>
                                    </div>
                                    <ul class="slide-box-about">
                                        <? foreach ($ec['CHARACTERISTICS'] as $ch): ?>
                                            <li><?= $arResult["EQUIP_ITEM_CHARACTERISTICS"][$ch]['NAME'] ?></li>
                                        <? endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="slider__under">

                        <div class="slider__under-block-1 close">
                            <div class="slider__under-block-1-first">
                                <div class="title">Преимущества датчика</div>
                                <div class="line"></div>
                                <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                    <div class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['SENSOR_ADVANTAGES']['TEXT'] ?>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="slider__under-block-1-second">
                                <div class="title">Принцип работы</div>
                                <div class="line"></div>
                                <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                    <div class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['PRINCIPLE_OF_OPERATION']['TEXT'] ?>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="slider__under-block-1-three">
                                <div class="title">Особенности</div>
                                <div class="line"></div>
                                <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                    <div class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['FEATURES_OF_THE']['TEXT'] ?>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="close-btn">Развернуть</div>
                        </div>
                        <div class="slider__under-block-2 close" id="tech">
                            <div class="title">Технические характеристики датчика</div>
                            <ul>
                                <li><span class="slider__under-2-title">Классификация</span>
                                    <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                        <span class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['CLASSIFICATION'] ?>
                                    </span>
                                    <? endforeach; ?>
                                </li>
                                <li><span class="slider__under-2-title">Тип установки</span>
                                    <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                        <span class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['TYPE_OF_INSTALLATION'] ?>
                                    </span>
                                    <? endforeach; ?>
                                </li>
                                <li><span class="slider__under-2-title">Подключаемых устройств</span>
                                    <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                        <span class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['CONNECTED_DEVICES'] ?>
                                    </span>
                                    <? endforeach; ?>
                                </li>
                                <li><span class="slider__under-2-title">Видеонаблюдение</span>
                                    <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
                                        <span class="info <?= $key == 0 ? 'vis' : '' ?>" data-slider-info="<?= $key ?>">
                                        <?= $ec['CCTV'] ?>
                                    </span>
                                    <? endforeach; ?>
                                </li>
                            </ul>
                            <div class="close-btn-2">Развернуть</div>
                        </div>
                    </div>
                </section>

            </div>
            <div id="solutions__center" class="solutions__center">
                <div class="container rating-center">
                    <div class="solutions__center_title">
                        Вы можете купить комплект в рамках готового решения <br>
                        <span><?= $arResult['PACKAGE_GROUP']['NAME'] ?></span>
                    </div>
                    <div class="solutions__center_wrapper">
                        <!--no-subscribe no-circles  -->
                        <div class="solutions-card card-one no-subscribe ">
                            <div class="solutions-card__icon-plus">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/solutions-card__icon-plus.svg"
                                     alt="img">
                                <p>Оборудование</p>
                            </div>
                            <div class="solutions-card__substrate">
                                <div class="solutions-card__substrate_top">
                                    <div class="solutions-card__substrate_top-title">
                                        Оборудование
                                    </div>
                                    <div class="closed-card">

                                        <div class="closed-card__icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/closed-icon.svg"
                                                 alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="solutions-card__center ">
                                    <div class="solutions-card__top">
                                        <div class="solutions-card__top_img">
                                            <img src="<?= $arResult['PREVIEW_PICTURE_RESIZED_SMALL']['src'] ?>"
                                                 alt="img">
                                        </div>
                                        <div class="solutions-card__top_text">
                                            <div class="h4 solutions-card__top_text-title"><?= $arResult['NAME'] ?></div>
                                            <div class="solutions-card__top_text-subtitle">
                                                <div class="solutions-card__subscribe">
                                                    <a href="#subscribe" class="solutions-card__subscribe-in">Подписка
                                                        включена
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.00033 0.666748C4.40033 0.666748 0.666992 4.40008 0.666992 9.00008C0.666992 13.6001 4.40033 17.3334 9.00033 17.3334C13.6003 17.3334 17.3337 13.6001 17.3337 9.00008C17.3337 4.40008 13.6003 0.666748 9.00033 0.666748ZM9.75866 14.1251C9.70042 14.1822 9.62671 14.2209 9.54665 14.2365C9.4666 14.2521 9.38372 14.2439 9.30831 14.2128C9.23289 14.1818 9.16824 14.1293 9.12239 14.0618C9.07653 13.9944 9.05147 13.915 9.05033 13.8334V13.1667H9.00033C7.93366 13.1667 6.86699 12.7584 6.05033 11.9501C5.48452 11.3829 5.09403 10.6647 4.92556 9.88151C4.75709 9.09827 4.81776 8.28308 5.10033 7.53341C5.25866 7.10841 5.81699 7.00008 6.13366 7.32508C6.31699 7.50841 6.35866 7.77508 6.27533 8.00842C5.89199 9.04175 6.10866 10.2417 6.94199 11.0751C7.52533 11.6584 8.29199 11.9334 9.05866 11.9167V11.1334C9.05866 10.7584 9.50866 10.5751 9.76699 10.8417L11.117 12.1917C11.2837 12.3584 11.2837 12.6167 11.117 12.7834L9.75866 14.1251ZM11.867 10.6834C11.7809 10.5948 11.7218 10.4834 11.6967 10.3624C11.6716 10.2413 11.6815 10.1157 11.7253 10.0001C12.1087 8.96675 11.892 7.76675 11.0587 6.93342C10.4753 6.35008 9.70866 6.06675 8.95033 6.08342V6.86675C8.95033 7.24175 8.50033 7.42508 8.24199 7.15841L6.88366 5.81675C6.71699 5.65008 6.71699 5.39175 6.88366 5.22508L8.23366 3.87508C8.2919 3.81798 8.36561 3.77923 8.44567 3.76363C8.52572 3.74803 8.6086 3.75626 8.68401 3.78732C8.75943 3.81837 8.82407 3.87088 8.86993 3.93833C8.91579 4.00577 8.94085 4.0852 8.94199 4.16675V4.84175C10.0253 4.82508 11.117 5.21675 11.942 6.05008C12.5078 6.61727 12.8983 7.33542 13.0668 8.11865C13.2352 8.90189 13.1746 9.71708 12.892 10.4667C12.7337 10.9001 12.1837 11.0084 11.867 10.6834Z"
                                                                  fill="#3CBA54"/>
                                                        </svg>
                                                    </a>

                                                    <a href="#subscribe" class="solutions-card__subscribe-out">
                                                        Подписка исключена
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8 0C3.584 0 0 3.584 0 8C0 12.416 3.584 16 8 16C12.416 16 16 12.416 16 8C16 3.584 12.416 0 8 0ZM8.728 12.92C8.67209 12.9748 8.60133 13.012 8.52447 13.027C8.44762 13.042 8.36806 13.0341 8.29566 13.0043C8.22326 12.9744 8.1612 12.924 8.11718 12.8593C8.07315 12.7945 8.0491 12.7183 8.048 12.64V12H8C6.976 12 5.952 11.608 5.168 10.832C4.62482 10.2875 4.24996 9.59808 4.08823 8.84617C3.92649 8.09426 3.98474 7.31168 4.256 6.592C4.408 6.184 4.944 6.08 5.248 6.392C5.424 6.568 5.464 6.824 5.384 7.048C5.016 8.04 5.224 9.192 6.024 9.992C6.584 10.552 7.32 10.816 8.056 10.8V10.048C8.056 9.688 8.488 9.512 8.736 9.768L10.032 11.064C10.192 11.224 10.192 11.472 10.032 11.632L8.728 12.92ZM10.752 9.616C10.6693 9.5309 10.6126 9.42399 10.5885 9.3078C10.5644 9.19161 10.574 9.07096 10.616 8.96C10.984 7.968 10.776 6.816 9.976 6.016C9.416 5.456 8.68 5.184 7.952 5.2V5.952C7.952 6.312 7.52 6.488 7.272 6.232L5.968 4.944C5.808 4.784 5.808 4.536 5.968 4.376L7.264 3.08C7.31991 3.02518 7.39068 2.98798 7.46753 2.973C7.54438 2.95803 7.62394 2.96594 7.69634 2.99575C7.76874 3.02556 7.8308 3.07596 7.87482 3.14071C7.91885 3.20546 7.9429 3.28171 7.944 3.36V4.008C8.984 3.992 10.032 4.368 10.824 5.168C11.3672 5.7125 11.742 6.40192 11.9038 7.15383C12.0655 7.90574 12.0073 8.68832 11.736 9.408C11.584 9.824 11.056 9.928 10.752 9.616Z"
                                                                  fill="#FF5252"/>
                                                        </svg>
                                                    </a>


                                            </div>
                                        <? if (count($arResult['ALL_LIST_COMPLECTS_IN_PACKAGE'])>1):?>
                                            <div class="select">
                                                <form action="#">
                                                    <input class="select__input" type="hidden" name="solutions-card__top-select">
                                                    <div class="select__head">Выбрать другой комплект</div>
                                                    <div class="select__list" style="display: none;">
                                                        <div class="select__list-item">
                                                            <!-- Выбрано -->
                                                            <div class="select__list-item_title">Выбрано</div>
                                                            <div class="select__list-item_policy">
                                                                <div class="select__list-item_policy-top">
                                                                <span class="font-weight policy-title">
                                                                    Комплект “ <span class="font-weight"><?=$arResult['NAME']?></span> ”
                                                                </span>
                                                                    <span>
                                                                    <?=$arResult['PRICES']['BASE']['DISCOUNT_VALUE']?> руб
                                                                </span>
                                                                </div>
                                                            </div>


                                                            <!-- Все комплекты -->
                                                            <div class="select__list-item_title color-grey">Все комплекты</div>
                                                            <? foreach ($arResult['ALL_LIST_COMPLECTS_IN_PACKAGE'] as $key => $item):?>
                                                            <?if($key==$arResult['ID']){continue;}?>
                                                                <div class="select__list-item_policy">
                                                                <div class="select__list-item_policy-top">
                                                                <span onclick="location.href='/equipment-kits/<?=$item['CODE']?>/#solutions__center'" class="policy-title">Комплект“<span class="p"><?=$item['NAME']?></span>”</span>
                                                                    <span class="opacity"><?=$item['PRICES_INFO']['RESULT_PRICE']['DISCOUNT_PRICE']?> руб</span>
                                                                </div>
                                                            </div>
                                                            <?endforeach;?>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        <?endif;?>
                                        </div>


                                        </div>
                                    </div>
                                    <div class="solutions-card__subtitle">
                                        Выберите Вариант

                                        <div class="products__info">
                                            <div class="products__info-sign">
                                                <picture><img
                                                            src="<?= SITE_TEMPLATE_PATH ?>/img/insurance/product-info.svg"
                                                            alt="info"></picture>
                                            </div>
                                            <div class="products__text-container">
                                                <div class="products__info-text">
                                                    <div class="h4"> Принимается на страхование следующее движимое
                                                        (домашнее) имущество:
                                                    </div>

                                                    <p>под домашним имуществом, принимаемым на страхование в рамках
                                                        настоящего договора, понимается движимое имущество, не имеющие
                                                        особой (культурной, художественной, исторической и т.п.)
                                                        ценности: мебель, предметы интерьера, ковры; теле-, аудио- и
                                                        видеоаппаратура; бытовая и вычислительная техника; осветительные
                                                        приборы (люстры, светильники и т.п.); посуда; одежда и
                                                        обувь.</p>

                                                    <div class="h4">Не принимается на страхование следующее движимое
                                                        (домашнее) имущество:
                                                    </div>

                                                    <p>изделия из меха и кожи, изделия из драгоценных металлов или из
                                                        драгоценных камней; книги, коллекции марок, монет, рисунков,
                                                        картин, скульптур, иные произведения искусства; предметы
                                                        религиозного культа; технические носители информации; средства
                                                        мототранспорта, квадрои гидроциклы, снегоходы, мопеды и лодки;
                                                        малогабаритные строительные, сельскохозяйственные машины;
                                                        садовый инвентарь, строительные инструменты, а также иное
                                                        имущество в соответствии с п. 3.5 Правил № 100</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="solutions-card__circles">
                                        <? foreach ($arResult['PACKAGES_CLASSES'] as $key => $class): ?>

                                            <div onclick="location.href='/equipment-kits/<?= $arResult['FIRST_LIST_COMPLECTS_SLUGS'][$key]['SLUG'] ?>/#solutions__center'"
                                                 class="solutions-card__circles_item <?= $arResult['CURRENT_PACKAGE_CLASS'] == $key ? 'show' : 'hide' ?>">
                                                <div class="solutions-card__circles_item-icon">
                                                    <img src="<?= $class['ICON']['src'] ?>" alt="<?= $class['NAME'] ?>">
                                                </div>
                                                <div class="solutions-card__circles_item-text">
                                                    <?= $class['NAME'] ?>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <div class="solutions-card__info">
                                        <? if (!empty($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"])): ?>
                                            <? foreach ($arResult["DISPLAY_PROPERTIES"]["CO_CHARACTERISTICS_REF"]["LINK_ELEMENT_VALUE"] as $k => $val): ?>
                                                <div class="solutions-card__info_item">
                                                    <div class="solutions-card__info_item-icon">
                                                        <img src="<?= $val['PREVIEW_PICTURE']['SRC'] ?>"
                                                             alt="<?= $val['NAME'] ?>">
                                                    </div>
                                                    <div class="solutions-card__info_item-text"><?= $val['NAME'] ?></div>
                                                </div>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                        <div class="solutions-card__info-bottom">
                                            <div class="solutions-card__info-tech">
                                                <a href="#gotovoe__reshenie-main">Технические характеристики</a>
                                            </div>

                                            <div class="solutions-card__info-switch">
                                                <div class="solutions-card__info-open">Развернуть
                                                    <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                                              fill="#A0A0A0"/>
                                                    </svg>

                                                </div>

                                                <div class="solutions-card__info-close">Свернуть
                                                    <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                                              fill="#A0A0A0"/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="solutions-card__substrate_bottom">
                                    <p class="solutions-card__substrate_bottom-text">
                                        Всего <span>32 000 ₽</span>
                                    </p>
                                    <div class="solutions-card__substrate_bottom-price">
                                        <?= $arResult["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"] ?>
                                    </div>
                                    <div class="solutions-card__substrate_bottom-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/present-icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="solutions-card card-two">
                            <div class="solutions-card__icon-plus">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/solutions-card__icon-plus.svg"
                                     alt="img">
                                <p>Охранные услуги</p>
                            </div>
                            <div class="solutions-card__substrate">
                                <div class="solutions-card__substrate_top">
                                    <div class="solutions-card__substrate_top-title">
                                        Охранные услуги
                                    </div>
                                    <div class="closed-card">

                                        <div class="closed-card__icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/closed-icon.svg"
                                                 alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="solutions-card__center">
                                    <div class="solutions-card__top">
                                        <div class="solutions-card__top_img flex-centr">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/solutions-card__top_img2.svg"
                                                 alt="img">
                                            <span>10,0</span>
                                        </div>
                                        <div class="solutions-card__top_text">
                                            <div class="h4 solutions-card__top_text-title">
                                                ООО “Зубряков Охрана Компа... Охрана
                                            </div>
                                            <div class="itemRating-open__left_deal">
                                                <a href="#guarantee">Безопасная сделка</a>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/rating/deal-icon.svg" alt="img">
                                                <div class="deal_modal modal-mini" style="display: none;">
                                                    <div class="modal-mini__title">
                                                        <span>Безопасная сделка</span> при покупке услуг охраны
                                                    </div>
                                                    <div class="modal-mini__text">
                                                        <span>vincko:</span> предоставляет дополнительные гарантии при
                                                        покупке услуг
                                                        <span class="green">одобренных</span>
                                                        охранных компаний на платформе
                                                        <a href="#guarantee">Подробнее</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="solutions-card__top_text-subtitle">
                                                <div class="select">
                                                    <form action="#">
                                                        <input class="select__input" type="hidden"
                                                               name="solutions-card__top-select">
                                                        <div class="select__head">Выбрать другую компанию</div>
                                                        <div class="select__list" style="display: none;">
                                                            <div class="select__input-search">
                                                                <div class="select__input-search_icon">
                                                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/search-icon.svg"
                                                                         alt="img">
                                                                </div>
                                                                <input type="text" placeholder="Поиск" name="search">
                                                            </div>
                                                            <div class="select__list-item">
                                                                <!-- Топ-3 -->
                                                                <div class="select__list-item_title">Топ-3</div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text color-black">
                                                                        ООО “Беркут Дефенд Ко...
                                                                    </div>
                                                                    <div class="select__item_num">1</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 100%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">2</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 90%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        ООО “Семиголов”
                                                                    </div>
                                                                    <div class="select__item_num">2</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 80%;"></span>
                                                                </div>


                                                                <!-- Все компании -->
                                                                <div class="select__list-item_title color-grey">Все
                                                                    компании
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">4</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 70%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">5</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 65%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">6</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 45%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">5</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 65%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">6</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 45%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">7</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 45%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">8</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 65%;"></span>
                                                                </div>
                                                                <div class="select__item">
                                                                    <div class="select__item_text">
                                                                        Сальса Чача Классно
                                                                    </div>
                                                                    <div class="select__item_num">9</div>
                                                                    <span class="select__item_bg"
                                                                          style="width: 45%;"></span>
                                                                </div>
                                                            </div>
                                                            <div class="box-shadow"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="solutions-card__contract">
                                        <div class="solutions-card__contract_title">
                                            Заключаем договор
                                        </div>
                                        <div class="solutions-card__contract_wrapper">
                                            <div class="contract__item no-active">
                                                <div class="contract__item_top">
                                                    <div class="contract__item_title">
                                                        На 3 месяца
                                                    </div>
                                                    <div class="contract__item_img">
                                                        <svg width="200" height="92" viewBox="0 0 200 92" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path d="M170 25C170 22.2386 167.761 20 165 20H30V52H170V25Z"
                                                                      fill="#F4F4F4"/>
                                                            </g>
                                                            <path d="M170 52L153 52V74L170 52Z" fill="#DADADA"/>
                                                            <defs>
                                                                <filter id="filter0_d" x="0" y="0" width="200"
                                                                        height="92" filterUnits="userSpaceOnUse"
                                                                        color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                             result="BackgroundImageFix"/>
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                                    <feOffset dy="10"/>
                                                                    <feGaussianBlur stdDeviation="15"/>
                                                                    <feColorMatrix type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0.219333 0 0 0 0 0.783333 0 0 0 0.1 0"/>
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                             result="effect1_dropShadow"/>
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                             in2="effect1_dropShadow" result="shape"/>
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                        <span>3 000 ₽</span>
                                                    </div>
                                                </div>
                                                <div class="contract__item_bottom">
                                                    <div class="contract__item_bottom-row">
                                                        <span>В подарок:</span>
                                                    </div>
                                                    <div class="contract__item_bottom-row">
                                                        <span>Страхование имущества на</span><span class="present">600 000
                                                    руб.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contract__item no-active">
                                                <div class="contract__item_top">
                                                    <div class="contract__item_title">
                                                        На 6 месяцев
                                                    </div>
                                                    <div class="contract__item_img">
                                                        <svg width="200" height="92" viewBox="0 0 200 92" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path d="M170 25C170 22.2386 167.761 20 165 20H30V52H170V25Z"
                                                                      fill="#DDE8FF"/>
                                                            </g>
                                                            <path d="M170 52L153 52V74L170 52Z" fill="#93B6FF"/>
                                                            <defs>
                                                                <filter id="filter0_d" x="0" y="0" width="200"
                                                                        height="92" filterUnits="userSpaceOnUse"
                                                                        color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                             result="BackgroundImageFix"/>
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                                    <feOffset dy="10"/>
                                                                    <feGaussianBlur stdDeviation="15"/>
                                                                    <feColorMatrix type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0.219333 0 0 0 0 0.783333 0 0 0 0.1 0"/>
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                             result="effect1_dropShadow"/>
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                             in2="effect1_dropShadow" result="shape"/>
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                        <span>6 000 ₽</span>
                                                    </div>
                                                </div>
                                                <div class="contract__item_bottom">
                                                    <div class="contract__item_bottom-row">
                                                        <span>В подарок:</span>
                                                    </div>
                                                    <div class="contract__item_bottom-row">
                                                        <span>Страхование имущества на</span><span class="present">900 000
                                                    руб.</span>
                                                    </div>
                                                    <div class="contract__item_bottom-row">
                                                        <span>Беспроцентная рассрочка</span><span
                                                                class="heart">12 мес</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contract__item active">
                                                <div class="contract__item_top">
                                                    <div class="contract__item_title">
                                                        На 12 месяцев
                                                    </div>
                                                    <div class="contract__item_img">
                                                        <svg width="200" height="92" viewBox="0 0 200 92" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path d="M170 25C170 22.2386 167.761 20 165 20H30V52H170V25Z"
                                                                      fill="#FEE74C"/>
                                                            </g>
                                                            <path d="M170 52L153 52V74L170 52Z" fill="#983333"/>
                                                            <defs>
                                                                <filter id="filter0_d" x="0" y="0" width="200"
                                                                        height="92" filterUnits="userSpaceOnUse"
                                                                        color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                             result="BackgroundImageFix"/>
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                                    <feOffset dy="10"/>
                                                                    <feGaussianBlur stdDeviation="15"/>
                                                                    <feColorMatrix type="matrix"
                                                                                   values="0 0 0 0 0 0 0 0 0 0.219333 0 0 0 0 0.783333 0 0 0 0.1 0"/>
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                             result="effect1_dropShadow"/>
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                             in2="effect1_dropShadow" result="shape"/>
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                        <span>12 000 ₽</span>
                                                    </div>
                                                </div>
                                                <div class="contract__item_bottom">
                                                    <div class="contract__item_bottom-row">
                                                        <span>В подарок:</span>
                                                    </div>
                                                    <div class="contract__item_bottom-row">
                                                        <span>Страхование имущества на</span><span class="present">1 000 000
                                                    руб.</span>
                                                    </div>
                                                    <div class="contract__item_bottom-row">
                                                        <span>Беспроцентная рассрочка</span><span class="heart">12
                                                    мес</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="solutions-card__substrate_bottom">
                                    <p class="solutions-card__substrate_bottom-text">
                                        Всего <span>32 000 ₽</span>
                                    </p>
                                    <div class="solutions-card__substrate_bottom-price">
                                        12 000 ₽
                                    </div>
                                    <div class="solutions-card__substrate_bottom-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/present-icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="solutions-card card-three">
                            <div class="solutions-card__icon-plus">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/solutions-card__icon-plus.svg"
                                     alt="img">
                                <p>Страхование</p>
                            </div>
                            <div class="solutions-card__substrate ">
                                <div class="solutions-card__substrate_top">
                                    <div class="solutions-card__substrate_top-title">
                                        Страхование
                                    </div>
                                    <div class="closed-card">

                                        <div class="closed-card__icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/closed-icon.svg"
                                                 alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="solutions-card__center  products__item">
                                    <div class="solutions-card__top">
                                        <div class="solutions-card__top_img flex-centr">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/solutions-card__top_img3.svg"
                                                 alt="img">
                                        </div>
                                        <div class="solutions-card__top_text">
                                            <div class="h4 solutions-card__top_text-title">
                                                Расширенный
                                            </div>
                                            <div class="solutions-card__top-subtitle">
                                                Страховой дом ВСК
                                            </div>
                                            <div class="solutions-card__top_text-subtitle">
                                                <div class="select">
                                                    <form action="#">
                                                        <input class="select__input" type="hidden"
                                                               name="solutions-card__top_text-subtitle">
                                                        <div class="select__head">Выбрать другой полис</div>
                                                        <div class="select__list" style="display: none;">
                                                            <div class="select__input-search">
                                                                <div class="select__input-search_icon">
                                                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/solutions/search-icon.svg"
                                                                         alt="img">
                                                                </div>
                                                                <input type="text" placeholder="Поиск" name="search">
                                                            </div>
                                                            <div class="select__list-item">
                                                                <!-- Выбрано -->
                                                                <div class="select__list-item_title">Выбрано</div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="font-weight policy-title">
                                                                    Полис “ <span class="font-weight">Минимум</span> ”
                                                                </span>
                                                                        <span>
                                                                    1 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span>
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>


                                                                <!-- Все полисы -->
                                                                <div class="select__list-item_title color-grey">Все
                                                                    полисы
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                                <div class="select__list-item_policy">
                                                                    <div class="select__list-item_policy-top">
                                                                <span class="policy-title">
                                                                    Полис “ <span class="p">Медиум</span> ”
                                                                </span>
                                                                        <span class="opacity">
                                                                    2 000 руб
                                                                </span>
                                                                    </div>
                                                                    <div class="select__list-item_policy-bottom">
                                                                <span class="policy">
                                                                    СК “СТРАХ & РИСК”
                                                                </span>
                                                                        <span>
                                                                    Сумма выплаты
                                                                </span>
                                                                        <span class="opacity">
                                                                    1 000 000 руб
                                                                </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box-shadow"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="products__max-payment">
                                        <div class="products__container">
                                            <div class="products__gray">Максимальная выплата</div>
                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <picture><img
                                                                src="<?= SITE_TEMPLATE_PATH ?>/img/insurance/product-info.svg"
                                                                alt="info"></picture>
                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products__m-price">100 000 руб</div>

                                    </div>

                                    <div class="products__payment">
                                        <div class="products__gray">
                                            Выплаты по основным пунктам:
                                        </div>

                                        <div class="products__payment-item products__payment-item_active">
                                            <div class="no-stroke products__payment-photo">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.1818 17.1429V0H1.81818V17.1429H0V20H20V17.1429H18.1818ZM16.3636 1.90476V8.57143H14.5455V1.90476H16.3636ZM3.63636 1.90476H5.45455V8.57143H3.63636V1.90476ZM3.63636 17.1429V10.4762H5.45455V17.1429H3.63636ZM7.27273 17.1429V1.90476H12.7273V17.1429H7.27273ZM14.5455 17.1429V10.4762H16.3636V17.1429H14.5455Z"
                                                          fill="#005DFF"/>
                                                </svg>
                                            </div>

                                            <div class="products__payment-name">по конструктивным элементам квариты
                                            </div>
                                            <div class="products__payment-cost">100 000руб.</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0C5.61553 0 4.26215 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32121C0.00303299 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73784 14 8.38447 14 7C14 6.08074 13.8189 5.17049 13.4672 4.32121C13.1154 3.47194 12.5998 2.70026 11.9497 2.05025C11.2997 1.40024 10.5281 0.884626 9.67879 0.532843C8.82951 0.18106 7.91925 0 7 0ZM7 11.2C6.86155 11.2 6.72622 11.1589 6.6111 11.082C6.49599 11.0051 6.40627 10.8958 6.35329 10.7679C6.3003 10.64 6.28644 10.4992 6.31345 10.3634C6.34046 10.2276 6.40713 10.1029 6.50503 10.005C6.60292 9.90712 6.72765 9.84046 6.86344 9.81345C6.99923 9.78644 7.13997 9.8003 7.26788 9.85328C7.39579 9.90626 7.50511 9.99598 7.58203 10.1111C7.65895 10.2262 7.7 10.3615 7.7 10.5C7.7 10.6856 7.62625 10.8637 7.49498 10.995C7.3637 11.1262 7.18565 11.2 7 11.2ZM7.7 7.588V8.4C7.7 8.58565 7.62625 8.7637 7.49498 8.89497C7.3637 9.02625 7.18565 9.1 7 9.1C6.81435 9.1 6.6363 9.02625 6.50503 8.89497C6.37375 8.7637 6.3 8.58565 6.3 8.4V7C6.3 6.81435 6.37375 6.6363 6.50503 6.50502C6.6363 6.37375 6.81435 6.3 7 6.3C7.20767 6.3 7.41068 6.23842 7.58335 6.12304C7.75602 6.00767 7.8906 5.84368 7.97008 5.65182C8.04955 5.45995 8.07034 5.24883 8.02983 5.04515C7.98931 4.84147 7.88931 4.65438 7.74246 4.50754C7.59562 4.36069 7.40853 4.26069 7.20485 4.22017C7.00117 4.17966 6.79005 4.20045 6.59818 4.27992C6.40632 4.3594 6.24233 4.49398 6.12696 4.66665C6.01158 4.83932 5.95 5.04233 5.95 5.25C5.95 5.43565 5.87625 5.6137 5.74498 5.74497C5.6137 5.87625 5.43565 5.95 5.25 5.95C5.06435 5.95 4.8863 5.87625 4.75503 5.74497C4.62375 5.6137 4.55 5.43565 4.55 5.25C4.54817 4.79521 4.67296 4.34889 4.91041 3.961C5.14785 3.57311 5.48858 3.25897 5.89443 3.05375C6.30029 2.84853 6.75526 2.76033 7.2084 2.79901C7.66155 2.8377 8.09498 3.00176 8.46017 3.27281C8.82536 3.54387 9.1079 3.91122 9.27615 4.33375C9.44441 4.75627 9.49173 5.21729 9.41283 5.66518C9.33393 6.11308 9.13191 6.53017 8.8294 6.86977C8.5269 7.20936 8.13583 7.45805 7.7 7.588Z"
                                                              fill="#818181"/>
                                                    </svg>

                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class=" no-fill products__payment-photo">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.6303 7.82267C17.3413 8.10982 16.9505 8.27098 16.5431 8.27098C16.1357 8.27098 15.7449 8.10982 15.4559 7.82267L14.1791 6.54585C13.8917 6.2569 13.7304 5.86592 13.7304 5.45837C13.7304 5.05082 13.8917 4.65984 14.1791 4.37088L17.069 1.47941C17.0748 1.47391 17.079 1.46708 17.0815 1.45953C17.0839 1.45197 17.0844 1.44394 17.083 1.43613C17.0816 1.42833 17.0782 1.421 17.0733 1.4148C17.0683 1.4086 17.0619 1.40372 17.0546 1.4006C15.1892 0.600962 12.7707 1.00847 11.2349 2.53326C9.76548 3.99173 9.68187 6.18544 10.2201 8.09995C10.2965 8.37208 10.2963 8.66005 10.2195 8.93208C10.1427 9.20411 9.99222 9.44963 9.7847 9.64156L1.77909 16.9531C1.54289 17.1626 1.35203 17.4181 1.21822 17.704C1.08442 17.9899 1.01051 18.3002 1.00104 18.6157C0.991571 18.9313 1.04674 19.2454 1.16315 19.5388C1.27956 19.8323 1.45475 20.0988 1.67796 20.322C1.90117 20.5452 2.16768 20.7204 2.46109 20.8368C2.75451 20.9533 3.06864 21.0084 3.38416 20.999C3.69969 20.9895 4.00994 20.9156 4.29584 20.7818C4.58175 20.648 4.83727 20.4571 5.04668 20.2209L12.4401 12.1957C12.6296 11.9916 12.871 11.843 13.1385 11.7657C13.406 11.6884 13.6895 11.6854 13.9586 11.7569C15.8586 12.2658 18.021 12.1702 19.4712 10.7387C21.0324 9.20089 21.3693 6.4829 20.6125 4.92736C20.609 4.92056 20.6041 4.91467 20.5979 4.91017C20.5918 4.90566 20.5847 4.90268 20.5772 4.90146C20.5697 4.90024 20.562 4.90082 20.5548 4.90315C20.5475 4.90548 20.541 4.9095 20.5356 4.91486L17.6303 7.82267Z"
                                                          stroke="#005DFF" stroke-width="1.7" stroke-miterlimit="10"
                                                          stroke-linecap="round"/>
                                                </svg>


                                            </div>
                                            <div class="products__payment-name">По внутренней отделке</div>
                                            <div class="products__payment-cost">нет</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0C5.61553 0 4.26215 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32121C0.00303299 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73784 14 8.38447 14 7C14 6.08074 13.8189 5.17049 13.4672 4.32121C13.1154 3.47194 12.5998 2.70026 11.9497 2.05025C11.2997 1.40024 10.5281 0.884626 9.67879 0.532843C8.82951 0.18106 7.91925 0 7 0ZM7 11.2C6.86155 11.2 6.72622 11.1589 6.6111 11.082C6.49599 11.0051 6.40627 10.8958 6.35329 10.7679C6.3003 10.64 6.28644 10.4992 6.31345 10.3634C6.34046 10.2276 6.40713 10.1029 6.50503 10.005C6.60292 9.90712 6.72765 9.84046 6.86344 9.81345C6.99923 9.78644 7.13997 9.8003 7.26788 9.85328C7.39579 9.90626 7.50511 9.99598 7.58203 10.1111C7.65895 10.2262 7.7 10.3615 7.7 10.5C7.7 10.6856 7.62625 10.8637 7.49498 10.995C7.3637 11.1262 7.18565 11.2 7 11.2ZM7.7 7.588V8.4C7.7 8.58565 7.62625 8.7637 7.49498 8.89497C7.3637 9.02625 7.18565 9.1 7 9.1C6.81435 9.1 6.6363 9.02625 6.50503 8.89497C6.37375 8.7637 6.3 8.58565 6.3 8.4V7C6.3 6.81435 6.37375 6.6363 6.50503 6.50502C6.6363 6.37375 6.81435 6.3 7 6.3C7.20767 6.3 7.41068 6.23842 7.58335 6.12304C7.75602 6.00767 7.8906 5.84368 7.97008 5.65182C8.04955 5.45995 8.07034 5.24883 8.02983 5.04515C7.98931 4.84147 7.88931 4.65438 7.74246 4.50754C7.59562 4.36069 7.40853 4.26069 7.20485 4.22017C7.00117 4.17966 6.79005 4.20045 6.59818 4.27992C6.40632 4.3594 6.24233 4.49398 6.12696 4.66665C6.01158 4.83932 5.95 5.04233 5.95 5.25C5.95 5.43565 5.87625 5.6137 5.74498 5.74497C5.6137 5.87625 5.43565 5.95 5.25 5.95C5.06435 5.95 4.8863 5.87625 4.75503 5.74497C4.62375 5.6137 4.55 5.43565 4.55 5.25C4.54817 4.79521 4.67296 4.34889 4.91041 3.961C5.14785 3.57311 5.48858 3.25897 5.89443 3.05375C6.30029 2.84853 6.75526 2.76033 7.2084 2.79901C7.66155 2.8377 8.09498 3.00176 8.46017 3.27281C8.82536 3.54387 9.1079 3.91122 9.27615 4.33375C9.44441 4.75627 9.49173 5.21729 9.41283 5.66518C9.33393 6.11308 9.13191 6.53017 8.8294 6.86977C8.5269 7.20936 8.13583 7.45805 7.7 7.588Z"
                                                              fill="#818181"/>
                                                    </svg>

                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class="products__payment-photo">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.8931 11.0039L17.0069 1.81239C16.9051 1.57116 16.7356 1.36556 16.5195 1.22113C16.3034 1.07669 16.0502 0.999802 15.7914 1H6.20861C5.94977 0.999802 5.69657 1.07669 5.48047 1.22113C5.26438 1.36556 5.09491 1.57116 4.99312 1.81239L1.10693 11.0039C1.02073 11.2078 0.985784 11.4301 1.00523 11.6511C1.02469 11.872 1.09792 12.0846 1.21838 12.2698C1.33884 12.4549 1.50275 12.6069 1.69542 12.7121C1.88809 12.8173 2.10349 12.8723 2.32232 12.8723H10.4333V17.8511H7.97734C7.82703 17.8511 7.68287 17.9116 7.57659 18.0193C7.4703 18.1271 7.41059 18.2732 7.41059 18.4255C7.41059 18.5779 7.4703 18.724 7.57659 18.8317C7.68287 18.9395 7.82703 19 7.97734 19H14.0227C14.173 19 14.3171 18.9395 14.4234 18.8317C14.5297 18.724 14.5894 18.5779 14.5894 18.4255C14.5894 18.2732 14.5297 18.1271 14.4234 18.0193C14.3171 17.9116 14.173 17.8511 14.0227 17.8511H11.5667V12.8723H16.4786V15.3617C16.4786 15.5141 16.5383 15.6602 16.6446 15.7679C16.7509 15.8756 16.895 15.9362 17.0453 15.9362C17.1956 15.9362 17.3398 15.8756 17.4461 15.7679C17.5524 15.6602 17.6121 15.5141 17.6121 15.3617V12.8723H19.6777C19.8965 12.8723 20.1119 12.8173 20.3046 12.7121C20.4973 12.6069 20.6612 12.4549 20.7816 12.2698C20.9021 12.0846 20.9753 11.872 20.9948 11.6511C21.0142 11.4301 20.9793 11.2078 20.8931 11.0039ZM19.8354 11.6373C19.8185 11.6641 19.7952 11.6861 19.7676 11.7011C19.74 11.7162 19.709 11.7239 19.6777 11.7234H2.32232C2.29106 11.7234 2.26029 11.7155 2.23276 11.7005C2.20524 11.6855 2.18182 11.6638 2.16462 11.6373C2.14741 11.6109 2.13695 11.5805 2.13417 11.5489C2.1314 11.5174 2.13639 11.4856 2.14871 11.4565L6.035 2.26498C6.04954 2.23053 6.07375 2.20116 6.10461 2.18053C6.13548 2.1599 6.17164 2.14892 6.20861 2.14894H15.7914C15.8284 2.14893 15.8645 2.15992 15.8954 2.18055C15.9262 2.20118 15.9504 2.23053 15.965 2.26498L19.8513 11.4565C19.8641 11.4855 19.8693 11.5173 19.8665 11.549C19.8637 11.5806 19.853 11.611 19.8354 11.6373Z"
                                                          fill="#005DFF" stroke="#005DFF"/>
                                                </svg>


                                            </div>
                                            <div class="products__payment-name">По движимому (домашнему) имуществу</div>
                                            <div class="products__payment-cost">нет</div>


                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0C5.61553 0 4.26215 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32121C0.00303299 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73784 14 8.38447 14 7C14 6.08074 13.8189 5.17049 13.4672 4.32121C13.1154 3.47194 12.5998 2.70026 11.9497 2.05025C11.2997 1.40024 10.5281 0.884626 9.67879 0.532843C8.82951 0.18106 7.91925 0 7 0ZM7 11.2C6.86155 11.2 6.72622 11.1589 6.6111 11.082C6.49599 11.0051 6.40627 10.8958 6.35329 10.7679C6.3003 10.64 6.28644 10.4992 6.31345 10.3634C6.34046 10.2276 6.40713 10.1029 6.50503 10.005C6.60292 9.90712 6.72765 9.84046 6.86344 9.81345C6.99923 9.78644 7.13997 9.8003 7.26788 9.85328C7.39579 9.90626 7.50511 9.99598 7.58203 10.1111C7.65895 10.2262 7.7 10.3615 7.7 10.5C7.7 10.6856 7.62625 10.8637 7.49498 10.995C7.3637 11.1262 7.18565 11.2 7 11.2ZM7.7 7.588V8.4C7.7 8.58565 7.62625 8.7637 7.49498 8.89497C7.3637 9.02625 7.18565 9.1 7 9.1C6.81435 9.1 6.6363 9.02625 6.50503 8.89497C6.37375 8.7637 6.3 8.58565 6.3 8.4V7C6.3 6.81435 6.37375 6.6363 6.50503 6.50502C6.6363 6.37375 6.81435 6.3 7 6.3C7.20767 6.3 7.41068 6.23842 7.58335 6.12304C7.75602 6.00767 7.8906 5.84368 7.97008 5.65182C8.04955 5.45995 8.07034 5.24883 8.02983 5.04515C7.98931 4.84147 7.88931 4.65438 7.74246 4.50754C7.59562 4.36069 7.40853 4.26069 7.20485 4.22017C7.00117 4.17966 6.79005 4.20045 6.59818 4.27992C6.40632 4.3594 6.24233 4.49398 6.12696 4.66665C6.01158 4.83932 5.95 5.04233 5.95 5.25C5.95 5.43565 5.87625 5.6137 5.74498 5.74497C5.6137 5.87625 5.43565 5.95 5.25 5.95C5.06435 5.95 4.8863 5.87625 4.75503 5.74497C4.62375 5.6137 4.55 5.43565 4.55 5.25C4.54817 4.79521 4.67296 4.34889 4.91041 3.961C5.14785 3.57311 5.48858 3.25897 5.89443 3.05375C6.30029 2.84853 6.75526 2.76033 7.2084 2.79901C7.66155 2.8377 8.09498 3.00176 8.46017 3.27281C8.82536 3.54387 9.1079 3.91122 9.27615 4.33375C9.44441 4.75627 9.49173 5.21729 9.41283 5.66518C9.33393 6.11308 9.13191 6.53017 8.8294 6.86977C8.5269 7.20936 8.13583 7.45805 7.7 7.588Z"
                                                              fill="#818181"/>
                                                    </svg>

                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class="no-stroke products__payment-photo">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 8C7.79113 8 8.56448 7.76541 9.22228 7.32588C9.88008 6.88635 10.3928 6.26164 10.6955 5.53074C10.9983 4.79983 11.0775 3.99556 10.9231 3.21964C10.7688 2.44372 10.3878 1.73098 9.82843 1.17157C9.26902 0.612164 8.55628 0.231202 7.78036 0.0768607C7.00444 -0.0774802 6.20017 0.00173312 5.46927 0.304484C4.73836 0.607234 4.11365 1.11992 3.67412 1.77772C3.2346 2.43552 3 3.20888 3 4C3 5.06087 3.42143 6.07828 4.17157 6.82843C4.92172 7.57857 5.93913 8 7 8ZM7 2C7.39556 2 7.78224 2.1173 8.11114 2.33706C8.44004 2.55683 8.69638 2.86918 8.84776 3.23463C8.99913 3.60009 9.03874 4.00222 8.96157 4.39018C8.8844 4.77814 8.69392 5.13451 8.41421 5.41422C8.13451 5.69392 7.77814 5.8844 7.39018 5.96157C7.00222 6.03874 6.60009 5.99914 6.23463 5.84776C5.86918 5.69639 5.55682 5.44004 5.33706 5.11114C5.1173 4.78224 5 4.39556 5 4C5 3.46957 5.21071 2.96086 5.58579 2.58579C5.96086 2.21072 6.46957 2 7 2ZM15 10C15.5933 10 16.1734 9.82405 16.6667 9.49441C17.1601 9.16477 17.5446 8.69623 17.7716 8.14805C17.9987 7.59987 18.0581 6.99667 17.9424 6.41473C17.8266 5.83279 17.5409 5.29824 17.1213 4.87868C16.7018 4.45912 16.1672 4.1734 15.5853 4.05765C15.0033 3.94189 14.4001 4.0013 13.8519 4.22836C13.3038 4.45543 12.8352 4.83994 12.5056 5.33329C12.1759 5.82664 12 6.40666 12 7C12 7.79565 12.3161 8.55871 12.8787 9.12132C13.4413 9.68393 14.2044 10 15 10ZM15 6C15.1978 6 15.3911 6.05865 15.5556 6.16853C15.72 6.27841 15.8482 6.43459 15.9239 6.61732C15.9996 6.80004 16.0194 7.00111 15.9808 7.19509C15.9422 7.38907 15.847 7.56726 15.7071 7.70711C15.5673 7.84696 15.3891 7.9422 15.1951 7.98079C15.0011 8.01937 14.8 7.99957 14.6173 7.92388C14.4346 7.84819 14.2784 7.72002 14.1685 7.55557C14.0586 7.39112 14 7.19778 14 7C14 6.73479 14.1054 6.48043 14.2929 6.2929C14.4804 6.10536 14.7348 6 15 6ZM15 11C13.8918 11.0012 12.8155 11.3706 11.94 12.05C10.9605 11.0744 9.71406 10.4106 8.35782 10.1424C7.00159 9.87426 5.59632 10.0137 4.31923 10.5431C3.04213 11.0726 1.95041 11.9683 1.18174 13.1174C0.413069 14.2665 0.00187019 15.6175 0 17C0 17.2652 0.105357 17.5196 0.292893 17.7071C0.48043 17.8946 0.734784 18 1 18C1.26522 18 1.51957 17.8946 1.70711 17.7071C1.89464 17.5196 2 17.2652 2 17C2 15.6739 2.52678 14.4022 3.46447 13.4645C4.40215 12.5268 5.67392 12 7 12C8.32608 12 9.59785 12.5268 10.5355 13.4645C11.4732 14.4022 12 15.6739 12 17C12 17.2652 12.1054 17.5196 12.2929 17.7071C12.4804 17.8946 12.7348 18 13 18C13.2652 18 13.5196 17.8946 13.7071 17.7071C13.8946 17.5196 14 17.2652 14 17C14.0024 15.8284 13.7064 14.6755 13.14 13.65C13.5819 13.3008 14.1132 13.083 14.6731 13.0217C15.233 12.9603 15.7989 13.0578 16.306 13.303C16.813 13.5482 17.2408 13.9312 17.5404 14.4081C17.84 14.8851 17.9993 15.4368 18 16C18 16.2652 18.1054 16.5196 18.2929 16.7071C18.4804 16.8946 18.7348 17 19 17C19.2652 17 19.5196 16.8946 19.7071 16.7071C19.8946 16.5196 20 16.2652 20 16C20 14.6739 19.4732 13.4022 18.5355 12.4645C17.5979 11.5268 16.3261 11 15 11Z"
                                                          fill="#818181"/>
                                                </svg>

                                            </div>
                                            <div class="products__payment-name">По ответственности перед соседями</div>
                                            <div class="products__payment-cost">нет</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0C5.61553 0 4.26215 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32121C0.00303299 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73784 14 8.38447 14 7C14 6.08074 13.8189 5.17049 13.4672 4.32121C13.1154 3.47194 12.5998 2.70026 11.9497 2.05025C11.2997 1.40024 10.5281 0.884626 9.67879 0.532843C8.82951 0.18106 7.91925 0 7 0ZM7 11.2C6.86155 11.2 6.72622 11.1589 6.6111 11.082C6.49599 11.0051 6.40627 10.8958 6.35329 10.7679C6.3003 10.64 6.28644 10.4992 6.31345 10.3634C6.34046 10.2276 6.40713 10.1029 6.50503 10.005C6.60292 9.90712 6.72765 9.84046 6.86344 9.81345C6.99923 9.78644 7.13997 9.8003 7.26788 9.85328C7.39579 9.90626 7.50511 9.99598 7.58203 10.1111C7.65895 10.2262 7.7 10.3615 7.7 10.5C7.7 10.6856 7.62625 10.8637 7.49498 10.995C7.3637 11.1262 7.18565 11.2 7 11.2ZM7.7 7.588V8.4C7.7 8.58565 7.62625 8.7637 7.49498 8.89497C7.3637 9.02625 7.18565 9.1 7 9.1C6.81435 9.1 6.6363 9.02625 6.50503 8.89497C6.37375 8.7637 6.3 8.58565 6.3 8.4V7C6.3 6.81435 6.37375 6.6363 6.50503 6.50502C6.6363 6.37375 6.81435 6.3 7 6.3C7.20767 6.3 7.41068 6.23842 7.58335 6.12304C7.75602 6.00767 7.8906 5.84368 7.97008 5.65182C8.04955 5.45995 8.07034 5.24883 8.02983 5.04515C7.98931 4.84147 7.88931 4.65438 7.74246 4.50754C7.59562 4.36069 7.40853 4.26069 7.20485 4.22017C7.00117 4.17966 6.79005 4.20045 6.59818 4.27992C6.40632 4.3594 6.24233 4.49398 6.12696 4.66665C6.01158 4.83932 5.95 5.04233 5.95 5.25C5.95 5.43565 5.87625 5.6137 5.74498 5.74497C5.6137 5.87625 5.43565 5.95 5.25 5.95C5.06435 5.95 4.8863 5.87625 4.75503 5.74497C4.62375 5.6137 4.55 5.43565 4.55 5.25C4.54817 4.79521 4.67296 4.34889 4.91041 3.961C5.14785 3.57311 5.48858 3.25897 5.89443 3.05375C6.30029 2.84853 6.75526 2.76033 7.2084 2.79901C7.66155 2.8377 8.09498 3.00176 8.46017 3.27281C8.82536 3.54387 9.1079 3.91122 9.27615 4.33375C9.44441 4.75627 9.49173 5.21729 9.41283 5.66518C9.33393 6.11308 9.13191 6.53017 8.8294 6.86977C8.5269 7.20936 8.13583 7.45805 7.7 7.588Z"
                                                              fill="#818181"/>
                                                    </svg>

                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class=" no-fill products__payment-photo">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.6303 7.82267C17.3413 8.10982 16.9505 8.27098 16.5431 8.27098C16.1357 8.27098 15.7449 8.10982 15.4559 7.82267L14.1791 6.54585C13.8917 6.2569 13.7304 5.86592 13.7304 5.45837C13.7304 5.05082 13.8917 4.65984 14.1791 4.37088L17.069 1.47941C17.0748 1.47391 17.079 1.46708 17.0815 1.45953C17.0839 1.45197 17.0844 1.44394 17.083 1.43613C17.0816 1.42833 17.0782 1.421 17.0733 1.4148C17.0683 1.4086 17.0619 1.40372 17.0546 1.4006C15.1892 0.600962 12.7707 1.00847 11.2349 2.53326C9.76548 3.99173 9.68187 6.18544 10.2201 8.09995C10.2965 8.37208 10.2963 8.66005 10.2195 8.93208C10.1427 9.20411 9.99222 9.44963 9.7847 9.64156L1.77909 16.9531C1.54289 17.1626 1.35203 17.4181 1.21822 17.704C1.08442 17.9899 1.01051 18.3002 1.00104 18.6157C0.991571 18.9313 1.04674 19.2454 1.16315 19.5388C1.27956 19.8323 1.45475 20.0988 1.67796 20.322C1.90117 20.5452 2.16768 20.7204 2.46109 20.8368C2.75451 20.9533 3.06864 21.0084 3.38416 20.999C3.69969 20.9895 4.00994 20.9156 4.29584 20.7818C4.58175 20.648 4.83727 20.4571 5.04668 20.2209L12.4401 12.1957C12.6296 11.9916 12.871 11.843 13.1385 11.7657C13.406 11.6884 13.6895 11.6854 13.9586 11.7569C15.8586 12.2658 18.021 12.1702 19.4712 10.7387C21.0324 9.20089 21.3693 6.4829 20.6125 4.92736C20.609 4.92056 20.6041 4.91467 20.5979 4.91017C20.5918 4.90566 20.5847 4.90268 20.5772 4.90146C20.5697 4.90024 20.562 4.90082 20.5548 4.90315C20.5475 4.90548 20.541 4.9095 20.5356 4.91486L17.6303 7.82267Z"
                                                          stroke="#005DFF" stroke-width="1.7" stroke-miterlimit="10"
                                                          stroke-linecap="round"/>
                                                </svg>


                                            </div>
                                            <div class="products__payment-name">По внутренней отделке</div>
                                            <div class="products__payment-cost">нет</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 0C5.61553 0 4.26215 0.410543 3.11101 1.17971C1.95987 1.94888 1.06266 3.04213 0.532846 4.32121C0.00303299 5.6003 -0.13559 7.00776 0.134506 8.36563C0.404603 9.7235 1.07129 10.9708 2.05026 11.9497C3.02922 12.9287 4.2765 13.5954 5.63437 13.8655C6.99224 14.1356 8.3997 13.997 9.67879 13.4672C10.9579 12.9373 12.0511 12.0401 12.8203 10.889C13.5895 9.73784 14 8.38447 14 7C14 6.08074 13.8189 5.17049 13.4672 4.32121C13.1154 3.47194 12.5998 2.70026 11.9497 2.05025C11.2997 1.40024 10.5281 0.884626 9.67879 0.532843C8.82951 0.18106 7.91925 0 7 0ZM7 11.2C6.86155 11.2 6.72622 11.1589 6.6111 11.082C6.49599 11.0051 6.40627 10.8958 6.35329 10.7679C6.3003 10.64 6.28644 10.4992 6.31345 10.3634C6.34046 10.2276 6.40713 10.1029 6.50503 10.005C6.60292 9.90712 6.72765 9.84046 6.86344 9.81345C6.99923 9.78644 7.13997 9.8003 7.26788 9.85328C7.39579 9.90626 7.50511 9.99598 7.58203 10.1111C7.65895 10.2262 7.7 10.3615 7.7 10.5C7.7 10.6856 7.62625 10.8637 7.49498 10.995C7.3637 11.1262 7.18565 11.2 7 11.2ZM7.7 7.588V8.4C7.7 8.58565 7.62625 8.7637 7.49498 8.89497C7.3637 9.02625 7.18565 9.1 7 9.1C6.81435 9.1 6.6363 9.02625 6.50503 8.89497C6.37375 8.7637 6.3 8.58565 6.3 8.4V7C6.3 6.81435 6.37375 6.6363 6.50503 6.50502C6.6363 6.37375 6.81435 6.3 7 6.3C7.20767 6.3 7.41068 6.23842 7.58335 6.12304C7.75602 6.00767 7.8906 5.84368 7.97008 5.65182C8.04955 5.45995 8.07034 5.24883 8.02983 5.04515C7.98931 4.84147 7.88931 4.65438 7.74246 4.50754C7.59562 4.36069 7.40853 4.26069 7.20485 4.22017C7.00117 4.17966 6.79005 4.20045 6.59818 4.27992C6.40632 4.3594 6.24233 4.49398 6.12696 4.66665C6.01158 4.83932 5.95 5.04233 5.95 5.25C5.95 5.43565 5.87625 5.6137 5.74498 5.74497C5.6137 5.87625 5.43565 5.95 5.25 5.95C5.06435 5.95 4.8863 5.87625 4.75503 5.74497C4.62375 5.6137 4.55 5.43565 4.55 5.25C4.54817 4.79521 4.67296 4.34889 4.91041 3.961C5.14785 3.57311 5.48858 3.25897 5.89443 3.05375C6.30029 2.84853 6.75526 2.76033 7.2084 2.79901C7.66155 2.8377 8.09498 3.00176 8.46017 3.27281C8.82536 3.54387 9.1079 3.91122 9.27615 4.33375C9.44441 4.75627 9.49173 5.21729 9.41283 5.66518C9.33393 6.11308 9.13191 6.53017 8.8294 6.86977C8.5269 7.20936 8.13583 7.45805 7.7 7.588Z"
                                                              fill="#818181"/>
                                                    </svg>

                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class="products__payment-photo">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.8931 11.0039L17.0069 1.81239C16.9051 1.57116 16.7356 1.36556 16.5195 1.22113C16.3034 1.07669 16.0502 0.999802 15.7914 1H6.20861C5.94977 0.999802 5.69657 1.07669 5.48047 1.22113C5.26438 1.36556 5.09491 1.57116 4.99312 1.81239L1.10693 11.0039C1.02073 11.2078 0.985784 11.4301 1.00523 11.6511C1.02469 11.872 1.09792 12.0846 1.21838 12.2698C1.33884 12.4549 1.50275 12.6069 1.69542 12.7121C1.88809 12.8173 2.10349 12.8723 2.32232 12.8723H10.4333V17.8511H7.97734C7.82703 17.8511 7.68287 17.9116 7.57659 18.0193C7.4703 18.1271 7.41059 18.2732 7.41059 18.4255C7.41059 18.5779 7.4703 18.724 7.57659 18.8317C7.68287 18.9395 7.82703 19 7.97734 19H14.0227C14.173 19 14.3171 18.9395 14.4234 18.8317C14.5297 18.724 14.5894 18.5779 14.5894 18.4255C14.5894 18.2732 14.5297 18.1271 14.4234 18.0193C14.3171 17.9116 14.173 17.8511 14.0227 17.8511H11.5667V12.8723H16.4786V15.3617C16.4786 15.5141 16.5383 15.6602 16.6446 15.7679C16.7509 15.8756 16.895 15.9362 17.0453 15.9362C17.1956 15.9362 17.3398 15.8756 17.4461 15.7679C17.5524 15.6602 17.6121 15.5141 17.6121 15.3617V12.8723H19.6777C19.8965 12.8723 20.1119 12.8173 20.3046 12.7121C20.4973 12.6069 20.6612 12.4549 20.7816 12.2698C20.9021 12.0846 20.9753 11.872 20.9948 11.6511C21.0142 11.4301 20.9793 11.2078 20.8931 11.0039ZM19.8354 11.6373C19.8185 11.6641 19.7952 11.6861 19.7676 11.7011C19.74 11.7162 19.709 11.7239 19.6777 11.7234H2.32232C2.29106 11.7234 2.26029 11.7155 2.23276 11.7005C2.20524 11.6855 2.18182 11.6638 2.16462 11.6373C2.14741 11.6109 2.13695 11.5805 2.13417 11.5489C2.1314 11.5174 2.13639 11.4856 2.14871 11.4565L6.035 2.26498C6.04954 2.23053 6.07375 2.20116 6.10461 2.18053C6.13548 2.1599 6.17164 2.14892 6.20861 2.14894H15.7914C15.8284 2.14893 15.8645 2.15992 15.8954 2.18055C15.9262 2.20118 15.9504 2.23053 15.965 2.26498L19.8513 11.4565C19.8641 11.4855 19.8693 11.5173 19.8665 11.549C19.8637 11.5806 19.853 11.611 19.8354 11.6373Z"
                                                          fill="#005DFF" stroke="#005DFF"/>
                                                </svg>


                                            </div>
                                            <div class="products__payment-name">По движимому (домашнему) имуществу</div>
                                            <div class="products__payment-cost">нет</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <picture><img
                                                                src="<?= SITE_TEMPLATE_PATH ?>/img/insurance/product-info.svg"
                                                                alt="info"></picture>
                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="products__payment-item">
                                            <div class="no-stroke products__payment-photo">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 8C7.79113 8 8.56448 7.76541 9.22228 7.32588C9.88008 6.88635 10.3928 6.26164 10.6955 5.53074C10.9983 4.79983 11.0775 3.99556 10.9231 3.21964C10.7688 2.44372 10.3878 1.73098 9.82843 1.17157C9.26902 0.612164 8.55628 0.231202 7.78036 0.0768607C7.00444 -0.0774802 6.20017 0.00173312 5.46927 0.304484C4.73836 0.607234 4.11365 1.11992 3.67412 1.77772C3.2346 2.43552 3 3.20888 3 4C3 5.06087 3.42143 6.07828 4.17157 6.82843C4.92172 7.57857 5.93913 8 7 8ZM7 2C7.39556 2 7.78224 2.1173 8.11114 2.33706C8.44004 2.55683 8.69638 2.86918 8.84776 3.23463C8.99913 3.60009 9.03874 4.00222 8.96157 4.39018C8.8844 4.77814 8.69392 5.13451 8.41421 5.41422C8.13451 5.69392 7.77814 5.8844 7.39018 5.96157C7.00222 6.03874 6.60009 5.99914 6.23463 5.84776C5.86918 5.69639 5.55682 5.44004 5.33706 5.11114C5.1173 4.78224 5 4.39556 5 4C5 3.46957 5.21071 2.96086 5.58579 2.58579C5.96086 2.21072 6.46957 2 7 2ZM15 10C15.5933 10 16.1734 9.82405 16.6667 9.49441C17.1601 9.16477 17.5446 8.69623 17.7716 8.14805C17.9987 7.59987 18.0581 6.99667 17.9424 6.41473C17.8266 5.83279 17.5409 5.29824 17.1213 4.87868C16.7018 4.45912 16.1672 4.1734 15.5853 4.05765C15.0033 3.94189 14.4001 4.0013 13.8519 4.22836C13.3038 4.45543 12.8352 4.83994 12.5056 5.33329C12.1759 5.82664 12 6.40666 12 7C12 7.79565 12.3161 8.55871 12.8787 9.12132C13.4413 9.68393 14.2044 10 15 10ZM15 6C15.1978 6 15.3911 6.05865 15.5556 6.16853C15.72 6.27841 15.8482 6.43459 15.9239 6.61732C15.9996 6.80004 16.0194 7.00111 15.9808 7.19509C15.9422 7.38907 15.847 7.56726 15.7071 7.70711C15.5673 7.84696 15.3891 7.9422 15.1951 7.98079C15.0011 8.01937 14.8 7.99957 14.6173 7.92388C14.4346 7.84819 14.2784 7.72002 14.1685 7.55557C14.0586 7.39112 14 7.19778 14 7C14 6.73479 14.1054 6.48043 14.2929 6.2929C14.4804 6.10536 14.7348 6 15 6ZM15 11C13.8918 11.0012 12.8155 11.3706 11.94 12.05C10.9605 11.0744 9.71406 10.4106 8.35782 10.1424C7.00159 9.87426 5.59632 10.0137 4.31923 10.5431C3.04213 11.0726 1.95041 11.9683 1.18174 13.1174C0.413069 14.2665 0.00187019 15.6175 0 17C0 17.2652 0.105357 17.5196 0.292893 17.7071C0.48043 17.8946 0.734784 18 1 18C1.26522 18 1.51957 17.8946 1.70711 17.7071C1.89464 17.5196 2 17.2652 2 17C2 15.6739 2.52678 14.4022 3.46447 13.4645C4.40215 12.5268 5.67392 12 7 12C8.32608 12 9.59785 12.5268 10.5355 13.4645C11.4732 14.4022 12 15.6739 12 17C12 17.2652 12.1054 17.5196 12.2929 17.7071C12.4804 17.8946 12.7348 18 13 18C13.2652 18 13.5196 17.8946 13.7071 17.7071C13.8946 17.5196 14 17.2652 14 17C14.0024 15.8284 13.7064 14.6755 13.14 13.65C13.5819 13.3008 14.1132 13.083 14.6731 13.0217C15.233 12.9603 15.7989 13.0578 16.306 13.303C16.813 13.5482 17.2408 13.9312 17.5404 14.4081C17.84 14.8851 17.9993 15.4368 18 16C18 16.2652 18.1054 16.5196 18.2929 16.7071C18.4804 16.8946 18.7348 17 19 17C19.2652 17 19.5196 16.8946 19.7071 16.7071C19.8946 16.5196 20 16.2652 20 16C20 14.6739 19.4732 13.4022 18.5355 12.4645C17.5979 11.5268 16.3261 11 15 11Z"
                                                          fill="#818181"/>
                                                </svg>

                                            </div>
                                            <div class="products__payment-name">По ответственности перед соседями</div>
                                            <div class="products__payment-cost">нет</div>

                                            <div class="products__info">
                                                <div class="products__info-sign">
                                                    <picture><img
                                                                src="<?= SITE_TEMPLATE_PATH ?>/img/insurance/product-info.svg"
                                                                alt="info"></picture>
                                                </div>
                                                <div class="products__text-container">
                                                    <div class="products__info-text">
                                                        <div class="h4"> Принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>под домашним имуществом, принимаемым на страхование в рамках
                                                            настоящего договора, понимается движимое имущество, не
                                                            имеющие особой (культурной, художественной, исторической и
                                                            т.п.) ценности: мебель, предметы интерьера, ковры; теле-,
                                                            аудио- и видеоаппаратура; бытовая и вычислительная техника;
                                                            осветительные приборы (люстры, светильники и т.п.); посуда;
                                                            одежда и обувь.</p>

                                                        <div class="h4">Не принимается на страхование следующее движимое
                                                            (домашнее) имущество:
                                                        </div>

                                                        <p>изделия из меха и кожи, изделия из драгоценных металлов или
                                                            из драгоценных камней; книги, коллекции марок, монет,
                                                            рисунков, картин, скульптур, иные произведения искусства;
                                                            предметы религиозного культа; технические носители
                                                            информации; средства мототранспорта, квадрои гидроциклы,
                                                            снегоходы, мопеды и лодки; малогабаритные строительные,
                                                            сельскохозяйственные машины; садовый инвентарь, строительные
                                                            инструменты, а также иное имущество в соответствии с п. 3.5
                                                            Правил № 100</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products__payment-bottom">

                                            <div class="products__payment-switch">
                                                <div class="products__payment-open">Развернуть
                                                    <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                                              fill="#A0A0A0"/>
                                                    </svg>

                                                </div>

                                                <div class="products__payment-close">Свернуть
                                                    <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                                              fill="#A0A0A0"/>
                                                    </svg>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="solutions-card__substrate_bottom present">
                                    <p class="solutions-card__substrate_bottom-text">
                                        Всего <span>32 000 ₽</span>
                                    </p>
                                    <div class="solutions-card__substrate_bottom-price">
                                        В подарок
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="solutions__bottom">
                <div class="container">
                    <div class="solutions__bottom_title">
                        Итого, в ваше Готовое решение входит:
                    </div>
                    <div class="solutions__bottom_wrapper">
                        <div class="solutions__bottom_left">
                            <div class="solutions__bottom_row">
                                <p class="solutions__bottom_row-left">Комплект оборудования</p>
                                <div class="solutions__bottom_row-center">
                                    <span>Премиум</span>
                                    <span>AJAX SmartHome</span>
                                </div>
                                <div class="solutions__bottom_row-right">
                                    <span>доставка/монтаж в подарок</span>
                                </div>
                            </div>
                            <div class="solutions__bottom_row">
                                <p class="solutions__bottom_row-left">Охранная компания</p>
                                <div class="solutions__bottom_row-center">
                            <span>
                                12
                                месяев обслуживания
                            </span>
                                    <span>ООО “Зубряков Охрана Компания Ва...</span>
                                </div>
                                <div class="solutions__bottom_row-right">
                                    <span>1 мес. в подарок</span>
                                </div>
                            </div>
                            <div class="solutions__bottom_row">
                                <p class="solutions__bottom_row-left">Страховая выплата</p>
                                <div class="solutions__bottom_row-center">
                            <span>
                                при наступлении страхового случая
                            </span>
                                    <span>
                                2 млн.
                                рублей
                            </span>
                                </div>
                                <div class="solutions__bottom_row-right">
                                    <span>подарок</span>
                                </div>
                            </div>
                        </div>
                        <div class="solutions__bottom_right">
                            <div class="solutions__bottom_column">
                                <div class="solutions__bottom_column-title">
                                    Всего
                                </div>
                                <div class="solutions__bottom_column-oldprice">
                                    50 630 ₽
                                </div>
                                <div class="solutions__bottom_column-newprice">
                                    12 000 ₽
                                </div>
                                <button class="solutions__bottom_column-btn grey">
                                    купить
                                </button>
                            </div>
                            <div class="solutions__bottom_column">
                                <div class="solutions__bottom_column-title">
                                    Рассрочка без процентов
                                </div>
                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span>vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <div class="solutions__bottom_column-select">
                                        12 мес.
                                    </div>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>
                                <button class="solutions__bottom_column-btn yellow">
                                    В рассрочку
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <section class="subscribe" id="subscribe">
                <div class="subscribe__head">
                    <h2 class="h2">Подписка <span>vincko: <br>
                “Замена оборудования”</span>
                    </h2>


                </div>

                <div class="subscribe__content">
                    <div class="subscribe__column">
                        <div class="subscribe__sub-title">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 0.25C7.53 0.25 0.25 7.53 0.25 16.5C0.25 25.47 7.53 32.75 16.5 32.75C25.47 32.75 32.75 25.47 32.75 16.5C32.75 7.53 25.47 0.25 16.5 0.25ZM17.9788 26.4937C17.8652 26.6051 17.7214 26.6807 17.5653 26.7111C17.4092 26.7415 17.2476 26.7254 17.1006 26.6649C16.9535 26.6043 16.8274 26.5019 16.738 26.3704C16.6486 26.2389 16.5997 26.084 16.5975 25.925V24.625H16.5C14.42 24.625 12.34 23.8288 10.7475 22.2525C9.64417 21.1465 8.88272 19.7461 8.55421 18.2188C8.22569 16.6915 8.344 15.1019 8.895 13.64C9.20375 12.8112 10.2925 12.6 10.91 13.2337C11.2675 13.5912 11.3487 14.1113 11.1862 14.5663C10.4387 16.5813 10.8612 18.9212 12.4862 20.5462C13.6237 21.6838 15.1187 22.22 16.6138 22.1875V20.66C16.6138 19.9288 17.4913 19.5713 17.995 20.0912L20.6275 22.7237C20.9525 23.0487 20.9525 23.5525 20.6275 23.8775L17.9788 26.4937ZM22.09 19.7825C21.922 19.6096 21.8068 19.3925 21.7579 19.1565C21.709 18.9205 21.7283 18.6754 21.8138 18.45C22.5613 16.435 22.1388 14.095 20.5138 12.47C19.3763 11.3325 17.8812 10.78 16.4025 10.8125V12.34C16.4025 13.0712 15.525 13.4288 15.0212 12.9087L12.3725 10.2925C12.0475 9.9675 12.0475 9.46375 12.3725 9.13875L15.005 6.50625C15.1186 6.3949 15.2623 6.31934 15.4184 6.28891C15.5745 6.25849 15.7361 6.27456 15.8832 6.33511C16.0303 6.39567 16.1563 6.49805 16.2457 6.62958C16.3352 6.7611 16.384 6.91597 16.3862 7.075V8.39125C18.4988 8.35875 20.6275 9.1225 22.2362 10.7475C23.3396 11.8535 24.101 13.2539 24.4295 14.7812C24.7581 16.3085 24.6397 17.8981 24.0888 19.36C23.78 20.205 22.7075 20.4163 22.09 19.7825Z"
                                      fill="#3CBA54"/>
                            </svg>

                            Что такое подписка “Замена оборудования”

                        </div>

                        <p>
                            Подписка дает вам возможность бесплатно получить новый датчик для комплекта оборудования,
                            купленного на платформе в рамках готового решения.
                        </p>
                    </div>

                    <div class="subscribe__column">
                        <div class="subscribe__sub-title">
                            Почему эта подписка дает уверенность при покупке оборудования
                        </div>

                        <p>
                            В случае, если один из датчиков в комплекте вышел из строя, с этой подпиской Вы просто
                            получите новый взамен, а ваша недвижимость останется под надежной охраной.
                        </p>
                    </div>

                    <div class="subscribe__column subscribe__column-to-buy">
                        <div class="subscribe__sub-title subscribe__sub-title--first">
                            На какой срок оформить подписку?
                        </div>
                        <div class="subscribe__sub-title subscribe__sub-title--ordered">
                            В ваш комплект включена эта подписка
                        </div>
                        <div class="subscribe__column-to-buy-content">
                            <div class="subscribe__conditions">
                                <p>
                                    Длительность гарантии
                                </p>
                                <select name="time-choice" id="time-choice" class="time-choice">
                                    <option value="12">12 месяцев</option>
                                    <option value="6">6 месяцев</option>
                                </select>

                                <div class="subscribe__text">
                                    Спокойствия и уверенности
                                </div>

                                <div class="subscribe__result">
                                    Всего за
                                    <div class="price">
                                        600 ₽
                                    </div>
                                </div>

                            </div>

                            <button class="blue-button to-card-btn">добавить в заказ</a></button>
                            <button class="button button-ordered to-card-btn">Исключить</button>

                        </div>
                    </div>

                    <div class="subscribe__column subscribe__column-bought">
                        <div class="subscribe__column-bought-head">
                    <span>
                        Поздравляем!
                    </span>

                            <svg width="50" height="37" viewBox="0 0 50 37" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.02433 17.998C2.38976 16.6592 4.60355 16.6592 5.96898 17.998L16.0099 28.7236L44.0313 1.00409C45.3967 -0.334696 47.6105 -0.334696 48.9759 1.00409C50.3414 2.34288 50.3414 4.51348 48.9759 5.85227L18.4822 35.9959C17.1168 37.3347 14.903 37.3347 13.5376 35.9959L1.02433 22.8462C-0.341092 21.5074 -0.341093 19.3368 1.02433 17.998Z"
                                      fill="white"/>
                            </svg>

                        </div>
                        <div class="subscribe__column-bought-content">
                            <p>
                                Ранее Вы уже получили подписку “Замена Оборудования”.
                            </p>
                            <p>
                                Она будет действительна до 16.05.2021.
                            </p>
                            <p>
                                У Вас возникли вопросы? Свяжитесь с нами.
                            </p>
                        </div>
                    </div>

                </div>

            </section>
        </div>

        <div class="container">

            <section class="back__call complect">
                <h2>Остались вопросы?</h2>
                <p>Закажите обратный звонок от нашего менеджера</p>
                <div class="back__call-form">
                    <form>
                        <input type="text" class="form__control" placeholder="Телефон">
                        <input type="submit" class="form__control submit" value="отправить">
                    </form>
                </div>
            </section>
        </div>

        <? foreach ($arResult["EQUIP_COMPLECT"] as $key => $ec): ?>
            <div class="slide-modal" data-slider-info="<?= $key ?>">
                <div class="modal-box">
                    <div class="title"><?= $ec["NAME"] ?></div>
                    <div class="close" data-close="<?= $key ?>">
                        <picture>
                            <source srcset="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/close-modal.svg">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/cartochka/close-modal.svg" alt="close-modal">
                        </picture>
                    </div>
                    <div class="modal-slider">
                        <? // additional photos
                        if (count($ec["EQUIPMENT_PICTURES"]) > 0):?>
                            <? foreach ($ec['EQUIPMENT_PICTURES'] as $PHOTO): ?>
                                <picture>
                                    <source srcset="<?= $PHOTO["SRC"] ?>">
                                    <img src="<?= $PHOTO["SRC"] ?>" alt="modal-slide">
                                </picture>
                            <? endforeach ?>
                        <? endif ?>
                    </div>
                    <div class="modal-bottom">
                        <? if (count($ec["EQUIPMENT_PICTURES"]) > 0): ?>
                            <? foreach ($ec['EQUIPMENT_PICTURES'] as $PHOTO): ?>
                                <div class="item">
                                    <picture>
                                        <source srcset="<?= $PHOTO["SRC"] ?>">
                                        <img src="<?= $PHOTO["SRC"] ?>" alt="modal-bottom">
                                    </picture>
                                </div>
                            <? endforeach ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>

        <? endforeach; ?>


        <!--        <form id="b-order-form" action="/order/" method="POST">-->
        <!--            <input type="hidden" value="873" name="order-id[complect_id]">-->
        <!--            <input type="hidden" value="856" name="order-id[guard_id]">-->
        <!--            <input type="hidden" value="781" name="order-id[insurance_id]">-->
        <!--            <input type="submit" value="Купить">-->
        <!--        </form>-->


    </main>


<?
unset($actualItem, $itemIds, $jsParams);