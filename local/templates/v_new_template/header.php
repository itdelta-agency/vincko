<?php

use Bitrix\Main\Page\Asset;

$Asset = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?= $APPLICATION->ShowTitle(); ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vinco - отзывы</title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon-precomposed"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024"
          href="<?= SITE_TEMPLATE_PATH ?>/img/favicons/apple-touch-icon-1024x1024.png">


    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/slick/slick.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/slick/slick-theme.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/select/styles/choices.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/funcy_box/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/range/component.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/range/ion.rangeSlider.min.css" rel="stylesheet">
    <link href="<?= SITE_TEMPLATE_PATH ?>/libs/swiper/swiper.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/styles/main.css">


    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/slick/slick.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/select/scripts/choices.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/funcy_box/jquery.fancybox.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/range/ion.rangeSlider.min.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/libs/swiper/swiper.min.js"></script>
    
    <? $Asset->addCss(SITE_TEMPLATE_PATH . "/css/custom.css"); ?>
    <?
    $currentCity = CIBlockElement::GetList(
        array("SORT" => "ASC"),
        array("ACTIVE" => "Y", "IBLOCK_ID" => '20', 'ID' => $_COOKIE['selected_city']),
        false,
        false,
        array('NAME', 'ID')
    )->GetNext()['NAME'];
    ?>
    <?= $APPLICATION->ShowHead(); ?>
</head>

<body>
<div id="panel"><?= $APPLICATION->ShowPanel(); ?></div>
<header class="header">
    <div class="header__top container">
        <div class="header__top-left__block">
            <div class="header__top-menu">
                <div class="header__top-menu--burger burger-js"><span></span></div>

            </div>

            <div class="header__top-menu--open">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M5.91294 8.00001L1.27385e-05 13.913L2.08694 16L7.99987 10.087L13.9128 16L15.9998 13.913L10.0868 8.00001L15.9998 2.08695L13.9129 0L7.99987 5.91306L2.08693 4.40557e-05L0 2.08699L5.91294 8.00001Z"
                          fill="#005DFF"/>
                </svg>
            </div>
            <div class="header__top-logo">
                <a href="/">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/logo_header.php"
                        )
                    ); ?>
                </a>
            </div>
            <div class="header__top-info">
                <ul>
                    <li class="tel"><a href="tel:+7861205-01-31">
            <span class="icon">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.41333 5.19333C3.37333 7.08 4.92 8.62 6.80667 9.58667L8.27333 8.12C8.45333 7.94 8.72 7.88 8.95333 7.96C9.7 8.20667 10.5067 8.34 11.3333 8.34C11.7 8.34 12 8.64 12 9.00667V11.3333C12 11.7 11.7 12 11.3333 12C5.07333 12 0 6.92667 0 0.666667C0 0.3 0.3 0 0.666667 0H3C3.36667 0 3.66667 0.3 3.66667 0.666667C3.66667 1.5 3.8 2.3 4.04667 3.04667C4.12 3.28 4.06667 3.54 3.88 3.72667L2.41333 5.19333Z"
                          fill="black"/>
                </svg>
            </span>
                            <span class="text"><? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/contact_header.php"
                                    )
                                ); ?></span>
                        </a>
                    </li>
                    <li class="location" data-modal-target="#header__top-info">
                        <a href="">
            <span class="icon">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1.5C6.0975 1.5 3.75 3.8475 3.75 6.75C3.75 10.6875 9 16.5 9 16.5C9 16.5 14.25 10.6875 14.25 6.75C14.25 3.8475 11.9025 1.5 9 1.5ZM9 8.625C8.50272 8.625 8.02581 8.42746 7.67418 8.07583C7.32254 7.7242 7.125 7.24728 7.125 6.75C7.125 6.25272 7.32254 5.77581 7.67418 5.42418C8.02581 5.07254 8.50272 4.875 9 4.875C9.49728 4.875 9.9742 5.07254 10.3258 5.42418C10.6775 5.77581 10.875 6.25272 10.875 6.75C10.875 7.24728 10.6775 7.7242 10.3258 8.07583C9.9742 8.42746 9.49728 8.625 9 8.625Z"
                          fill="black"/>
                </svg>
            </span>
                            <span class="text"><?= $currentCity ?></span>
                        </a>
                    </li>
                </ul>


            </div>
        </div>
        <div id="header__top-info" class="header__top-info--popup modal">
            <div class="modal__content">
                <div data-close-button class="close-button"></div>
                <div class="modal__content-body">
                    <h4>Выберите город</h4>
                    <ul class="menu__list">
                        <li class="active"><a href="">Москва</a></li>
                        <li><a href="">Санкт-Петербург</a></li>
                        <li><a href="">Екатеринбург</a></li>
                        <li><a href="">Челябинск</a></li>
                        <li><a href="">Краснодар</a></li>
                        <li><a href="">Ростов-на-Дону</a></li>
                        <li><a href="">Чита</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <? $APPLICATION->IncludeComponent(
            "bitrix:search.title",
            "header_search",
            array(
                "CATEGORY_0" => array("no"),
                "CATEGORY_0_TITLE" => "",
                "CHECK_DATES" => "N",
                "CONTAINER_ID" => "title-search",
                "CONVERT_CURRENCY" => "N",
                "INPUT_ID" => "title-search-input",
                "NUM_CATEGORIES" => "1",
                "ORDER" => "date",
                "PAGE" => "#SITE_DIR#search/index.php",
                "PREVIEW_HEIGHT" => "75",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PREVIEW_WIDTH" => "75",
                "PRICE_CODE" => array(),
                "PRICE_VAT_INCLUDE" => "Y",
                "SHOW_INPUT" => "Y",
                "SHOW_OTHERS" => "N",
                "SHOW_PREVIEW" => "Y",
                "TOP_COUNT" => "5",
                "USE_LANGUAGE_GUESS" => "Y"
            )
        ); ?>

        <? $APPLICATION->IncludeComponent(
            "vincko:main.auth.form",
            "vincko",
            array(
                "AUTH_FORGOT_PASSWORD_URL" => "/personal/recovery/",
                "AUTH_REGISTER_URL" => "/personal/private/",
                "AUTH_SUCCESS_URL" => "/personal/"
            )
        ); ?>


    </div>
    <div class="header__submenu">
        <div class="container">
            <div class="header__submenu-up">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "main_section",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "main_section",
                        "USE_EXT" => "N"
                    )
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "for_flats",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "for_flats",
                        "USE_EXT" => "N"
                    )
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "advantages",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "advantages",
                        "USE_EXT" => "N"
                    )
                ); ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "for_house",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "for_house",
                        "USE_EXT" => "N"
                    )
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "for_property",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "for_property",
                        "USE_EXT" => "N"
                    )
                ); ?>


            </div>

            <div class="header__submenu-down">
                <div class="header__submenu-location">
                    <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 0.5C3.0975 0.5 0.75 2.8475 0.75 5.75C0.75 9.6875 6 15.5 6 15.5C6 15.5 11.25 9.6875 11.25 5.75C11.25 2.8475 8.9025 0.5 6 0.5ZM6 7.625C5.50272 7.625 5.02581 7.42746 4.67418 7.07583C4.32254 6.7242 4.125 6.24728 4.125 5.75C4.125 5.25272 4.32254 4.77581 4.67418 4.42418C5.02581 4.07254 5.50272 3.875 6 3.875C6.49728 3.875 6.9742 4.07254 7.32583 4.42418C7.67746 4.77581 7.875 5.25272 7.875 5.75C7.875 6.24728 7.67746 6.7242 7.32583 7.07583C6.9742 7.42746 6.49728 7.625 6 7.625Z"
                              fill="#005DFF"/>
                    </svg>

                    <a>
                        <?= $currentCity ?>
                    </a>
                </div>

                <div class="header__submenu-question">
                        <span class="header__submenu-question-content">
                            Это ваш город?
                        </span>

                    <span class="header__submenu-question-yes">Да</span>
                    <a class="header__submenu-question-no">Нет, выбрать другой</a>

                </div>

                <div class="header__submenu-close">
                    Скрыть меню
                    <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.39604 0.179893L7.83581 3.95144C8.05473 4.19135 8.05473 4.58034 7.83581 4.82014C7.61708 5.05995 7.26232 5.05995 7.04361 4.82014L3.99994 1.4829L0.956381 4.82004C0.737564 5.05986 0.382842 5.05986 0.164113 4.82004C-0.0547043 4.58022 -0.0547043 4.19126 0.164113 3.95134L3.60393 0.179796C3.71335 0.059887 3.8566 4.59895e-08 3.99992 4.76986e-08C4.14332 4.94086e-08 4.28668 0.0600033 4.39604 0.179893Z"
                              fill="#A0A0A0"/>
                    </svg>

                </div>
            </div>
        </div>
    </div>
    <? $APPLICATION->IncludeComponent(
        "it-delta:iblock.content",
        "header_filter",
        array(
            "ACTIVE_DATE" => "N",
            "ADD_CACHE_STRING" => "",
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "IBLOCK_ID" => "20",
            "ESTATE_IB_ID" => "19",
            "IBLOCK_TYPE" => "references",
            "PAGE_ELEMENT_COUNT" => "10",
            "RAND_ELEMENTS" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC"
        )
    ); ?>

</header>
<div class="header__wall"></div>
<? $APPLICATION->IncludeComponent(
    "vincko:breadcrumb",
    "vincko",
    array(
        "PATH" => "",
        "SITE_ID" => "v1",
        "START_FROM" => "0"
    )
); ?>



