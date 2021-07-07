<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/*IncludeTemplateLangFile(__FILE__);*/
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/upload/fonts/stylesheet.css" type="text/css"/>
	<link rel="stylesheet" href="/local/templates/v_content/uikit.css" type="text/css"/>
	<?$APPLICATION->ShowHead();?>
	<link rel="stylesheet" href="/local/templates/v_content/mobile.css?v=16" type="text/css"/>
	<?/*<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/print_style.css"?>" type="text/css" media="print" />*/?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--noindex-->
	<link rel="stylesheet" type="text/css" href="/local/templates/v_content/cookieconsent.min.css?v=2" />
	<script src="/local/templates/v_content/cookieconsent.min.js"></script>
	<script>
		window.addEventListener("load", function(){
		window.cookieconsent.initialise({
			"palette": {
				"popup": {
					"background": "#005dff"
				},
				"button": {
					"background": "#005dff"
				}
			},
			"showLink": false,
			"content": {
				"message": "Этот сайт использует cookie для хранения данных. Продолжая использовать сайт, Вы даете свое согласие на работу с этими файлами.",
				"dismiss": "Ок"
			}
		})});
	</script>
	<!--/noindex-->
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeFile('/include/vincko_menu-mobile.php');?>
<div class="header">
    <div class="wrap">
        <div class="header__logo">
			<a href="/" class="header__logo-svg"></a>
        </div>
		<?$APPLICATION->IncludeFile('/include/vincko_header.php');?>
    </div>
</div>
<div class="search">
	<div class="wrap">
		<div class="search__mobile-flex">
			<div class="mobile__search-logo">
				<a href="/" class="mobile__logo"></a>
			</div>
			<div class="search__flex">
				<?$APPLICATION->IncludeFile('/include/vincko_menu.php');?>
				<?$APPLICATION->IncludeFile('/include/vincko_searchmain.php');?>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="promo-main">
		<div class="wrap">
				<?$APPLICATION->IncludeComponent(
					"vincko:news.list",
					"slider",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", ""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "27",
						"IBLOCK_TYPE" => "references",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "N",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "20",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"PROPERTY_CODE" => array("S_TITLE", "S_LINK", ""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "SORT",
						"SORT_BY2" => "ID",
						"SORT_ORDER1" => "ASC",
						"SORT_ORDER2" => "DESC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>
			<?/*<div id="slider-main" class="promo-main__bb">
					<div class="promo-main__bb-item promo-main__bb-item-blue">
						<a href="/pakety-okhrannykh-uslug/" class="absolute-link">Маркетплейс охраны</a>
						<div class="promo-main__bb-pic"><img src="/upload/images/main-banner1.png" alt="Маркетплейс охраны"></div>
						<div class="promo-main__bb-text">
							<div class="promo-main__bb-text-title">Маркетплейс охраны</div>
							<div class="promo-main__bb-text-announce">Обеспечиваем охрану квартир, домов и загородной недвижимости. Сотрудничаем с надежными охранными компаниями по всей стране.</div>
						</div>
						<div class="promo-main__bb-linkwrap">
							<a href="/pakety-okhrannykh-uslug/" class="promo-main__bb-link inline-block">Подробнее</a>
						</div>
					</div>
					<div class="promo-main__bb-item promo-main__bb-item-blue">
						<a href="/pakety-okhrannykh-uslug/" class="absolute-link">Маркетплейс охраны</a>
						<div class="promo-main__bb-pic"><img src="/upload/images/banner1.png" alt="Маркетплейс охраны"></div>
						<div class="promo-main__bb-text">
							<div class="promo-main__bb-text-title">Маркетплейс охраны</div>
							<div class="promo-main__bb-text-announce">Обеспечиваем охрану квартир, домов и загородной недвижимости. Сотрудничаем с надежными охранными компаниями по всей стране.</div>
						</div>
						<div class="promo-main__bb-linkwrap">
							<a href="/pakety-okhrannykh-uslug/" class="promo-main__bb-link inline-block">Подробнее</a>
						</div>
					</div>
					<div class="promo-main__bb-item promo-main__bb-item-blue">
						<a href="/pakety-okhrannykh-uslug/" class="absolute-link">Маркетплейс охраны</a>
						<div class="promo-main__bb-pic"><img src="/upload/images/banner_2.png" alt="Маркетплейс охраны"></div>
						<div class="promo-main__bb-text">
							<div class="promo-main__bb-text-title">Маркетплейс охраны</div>
							<div class="promo-main__bb-text-announce">Обеспечиваем охрану квартир, домов и загородной недвижимости. Сотрудничаем с надежными охранными компаниями по всей стране.</div>
						</div>
						<div class="promo-main__bb-linkwrap">
							<a href="/pakety-okhrannykh-uslug/" class="promo-main__bb-link inline-block">Подробнее</a>
						</div>
					</div>
	</div>*/?>
			<div class="promo-main__sec">
				<div class="promo-main__sec-left">
					<div class="promo-main__sec-left-banner promo-main__sec-left-banner-blue">
						<a href="/ohrannye-predpriyatiya/" class="absolute-link">Лидеры рынка охраны</a>
						<div class="promo-main__sec-left-banner-pic">
							<img class="main-banner__pc" src="/upload/images/main-banner2.png" srcset="/upload/images/main-banner2@2x.png 2x" alt="Лидеры рынка охраны">
							<img class="main-banner__mobi" src="/upload/images/main-banner2_mobi.png" srcset="/upload/images/main-banner2_mobi@2x.png 2x" alt="Лидеры рынка охраны">
						</div>
						<div class="promo-main__sec-left-banner-title">Лидеры рынка охраны</div>
						<div class="promo-main__sec-left-banner-linkwrap">
							<a href="/ohrannye-predpriyatiya/" class="promo-main__sec-left-banner-link inline-block">Подробнее</a>
						</div>
					</div>
					<div class="promo-main__sec-left-banner promo-main__sec-left-banner-green">
						<a href="/komplekty-oborudovaniya/" class="absolute-link"></a>
						<div class="promo-main__sec-left-banner-pic">
							<img class="main-banner__pc" src="/upload/images/main-banner3.png" srcset="/upload/images/main-banner3@2x.png 2x" alt="Комплекты оборудования">
							<img class="main-banner__mobi" src="/upload/images/main-banner3_mobi.png" srcset="/upload/images/main-banner3_mobi@2x.png 2x" alt="Комплекты оборудования">
						</div>
						<div class="promo-main__sec-left-banner-title">Комплекты оборудования</div>
						<div class="promo-main__sec-left-banner-linkwrap">
							<a href="/komplekty-oborudovaniya/" class="promo-main__sec-left-banner-link inline-block">Подробнее</a>
						</div>
					</div>
				</div>
				<div class="promo-main__sec-right">
					<div class="promo-main__sec-right-banner">
						<a href="/vinckombo/" class="absolute-link"></a>
						<div class="promo-main__sec-right-banner-pic">
							<img src="/upload/images/main-banner4.png" srcset="/upload/images/main-banner4@2x.png 2x" alt="vincКОМБО">
						</div>
						<div class="promo-main__sec-right-banner-title">vincКОМБО</div>
						<div class="promo-main__sec-right-banner-announce">Обеспечиваем охрану квартир, домов и загородной недвижимости. Сотрудничаем с надежными охранными компаниями по всей стране.</div>
						<div class="clear"></div>
						<div class="promo-main__sec-right-banner-linkwrap">
							<a href="/vinckombo/" class="promo-main__sec-right-banner-link inline-block">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main__packets">
		<div class="wrap">
			<div class="h1-title">Хиты продаж</div>
			<?$packetMainFilter = array("PROPERTY_P_HIT_VALUE" => "Да");
			$APPLICATION->IncludeComponent(
				"vincko:catalog.section",
				"mainpacketlist",
				Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "N",
					"BACKGROUND_IMAGE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "Y",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_COMPARE" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "STRICT",
					"FILTER_NAME" => "packetMainFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "12",
					"IBLOCK_TYPE" => "equipment",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array("P_COMPLECT_WITH","P_ABONENTPLATA_Y","P_ABONENTPLATA_WITH","P_STRAHOVKA_WITH","P_HIT"),
					"LABEL_PROP_MOBILE" => array("P_COMPLECT_WITH","P_ABONENTPLATA_Y","P_ABONENTPLATA_WITH","P_STRAHOVKA_WITH","P_HIT"),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "N",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_LIMIT" => "5",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "3",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array("BASE"),
					"PRICE_VAT_INCLUDE" => "N",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE_MOBILE" => array("P_ABONENTPLATA_Y","P_STRAHOVKA","P_HIT"),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "",
					"SECTION_CODE_PATH" => "",
					"SECTION_ID" => "31",
					"SECTION_ID_VARIABLE" => "",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("",""),
					"SEF_MODE" => "Y",
					"SEF_RULE" => "",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "N",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "N",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
				)
			);?>
		</div>
	</div>
	
	<div class="main__promo-solo">
		<div class="wrap">
			<div class="main__promo-solo-item main__promo-solo-blue">
				<div class="main__promo-solo-text">
					<div class="main__promo-solo-title">Подписка «Бесплатная замена оборудования»</div>
					<div class="main__promo-solo-announce">Всего  49 руб./мес. и в случае поломки, вы получаете бесплатно любой вышедший из строя датчик</div>
					<div class="main__promo-solo-linkwrap">
						<a href="#" class="main__promo-solo-link inline-block">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main__rate">
		<div class="wrap">
			<div class="main__rate-h1title">Из чего складывается рейтинг охранных компаний?</div>
			<div class="main__rate-flex">
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-finance.png" srcset="/upload/images/rate-finance@2x.png 2x" alt="Финансовая надежность" width="68">
					</div>
					<div class="main__rate-title">Финансовая надежность</div>
					<div class="main__rate-announce">Выплаты по возникшему ущербу, выплаты зарплаты сотрудникам, финансовые показатели компании</div>
				</div>
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-zabota.png" srcset="/upload/images/rate-zabota@2x.png 2x" alt="Забота о клиенте" width="66">
					</div>
					<div class="main__rate-title">Забота о клиенте</div>
					<div class="main__rate-announce">Внимательность, скорость реагирования на обращения клиентов, удобство взаимодействия с ЧОП, вежливость сотрудников и качество отработки жалоб</div>
				</div>
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-speed.png" srcset="/upload/images/rate-speed@2x.png 2x" alt="Скорость спасения" width="71">
					</div>
					<div class="main__rate-title">Скорость спасения</div>
					<div class="main__rate-announce">Как быстро приезжает ГБР, их оперативность, оснащение и физическая форма</div>
				</div>
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-dogovor.png" srcset="/upload/images/rate-dogovor@2x.png 2x" alt="Честный договор" width="67">
					</div>
					<div class="main__rate-title">Честный договор</div>
					<div class="main__rate-announce">Ясность и прозрачность договора, отсутствие скрытых сборов, штрафов, фиксация обязанностей ЧОП и стоимости услуг</div>
				</div>
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-online.png" srcset="/upload/images/rate-online@2x.png 2x" alt="Онлайн сервисы" width="67">
					</div>
					<div class="main__rate-title">Онлайн сервисы</div>
					<div class="main__rate-announce">Наличие онлайн сервисов позволяющих работать оперативнее и облегчить жизнь клиенту: мобильное приложение, оплата онлайн, личный кабинет</div>
				</div>
				<div class="main__rate-item">
					<div class="main__rate-pic">
						<img src="/upload/images/rate-rec.png" srcset="/upload/images/rate-rec@2x.png 2x" alt="Рекомендации сотрудников" width="68">
					</div>
					<div class="main__rate-title">Рекомендации сотрудников</div>
					<div class="main__rate-announce">Как сотрудники компании оценивают ее как партнера, работодателя и рекомендуют ли в нее обращаться</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main__promo-solo">
		<div class="wrap">
			<div class="main__promo-solo-item main__promo-solo-green">
				<div class="main__promo-solo-text">
					<div class="main__promo-solo-title">Попробуй любой комплект бесплатно!</div>
					<div class="main__promo-solo-announce">Гарантия возврата денег в течении 14 дней тест-драйва!</div>
					<div class="main__promo-solo-linkwrap">
						<a href="/komplekty-oborudovaniya/" class="main__promo-solo-link inline-block">Список комплектов</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main__articles">
		<div class="wrap">
			<div class="main__articles-h1title">Полезно знать</div>
			<?$APPLICATION->IncludeComponent(
				"vincko:news.list",
				"stories",
				Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "N",
					"DISPLAY_PICTURE" => "N",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array("",""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "28",
					"IBLOCK_TYPE" => "Articles",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "N",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "60",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Полезно знать",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("PZ_TEXT","PZ_PIC",""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "ID",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "DESC",
					"STRICT_SECTION_CHECK" => "N"
				)
			);?>
		</div>
	</div>
	
	<div class="main__homesmart">
		<div class="wrap">
			<div class="main__homesmart-block">
				<div class="main__homesmart-promo">
					<div class="main__homesmart-pic">
						<img src="/upload/images/main-smart.png" srcset="/upload/images/main-smart@2x.png" width="361" alt="Умный дом доступен каждому">
					</div>
					<div class="main__homesmart-text-flex">
						<div class="main__homesmart-text">
							<div class="main__homesmart-title">Умный дом доступен каждому</div>
							<div class="main__homesmart-announce">Комплект "Умный дом": пусть дом заботится о вас, где бы вы не были!</div>
						</div>
					</div>
				</div>
				<div class="main__homesmart-items">
					<div class="main__homesmart-items-flex">
						<div class="main__homesmart-item">
							<div class="main__homesmart-item-pic"></div>
							<div class="main__homesmart-item-text">Позволяет обезопасить себя от неприятных последствий затопления дома или соседей, утечки газа или пожара</div>
						</div>
						<div class="main__homesmart-item">
							<div class="main__homesmart-item-pic"></div>
							<div class="main__homesmart-item-text">Предоставляет возможность удаленного управления бытовыми приборами в доме</div>
						</div>
						<div class="main__homesmart-item">
							<div class="main__homesmart-item-pic"></div>
							<div class="main__homesmart-item-text">Обеспечивает защищенность дома от несанкционированного проникновения</div>
						</div>
						<div class="main__homesmart-item">
							<div class="main__homesmart-item-pic"></div>
							<div class="main__homesmart-item-text">Удобное управление безопасностью и комфортом в понятном и удобном приложении на смартфоне</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main__brands">
		<div class="wrap">
			<div class="main__brands-title">Производители оборудования</div>
			<div class="main__brands-flex">
				<div class="main__brands-item">
					<a href="/komplekty-oborudovaniya/?b=636"><img src="/upload/images/ajax.png" width="206" alt="AJAX"></a>
				</div>
				<div class="main__brands-item">
					<a href="/komplekty-oborudovaniya/?b=637"><img src="/upload/images/cnord.png" width="211" alt="C.Nord"></a>
				</div>
				<div class="main__brands-item">
					<a href="/komplekty-oborudovaniya/?b=638"><img src="/upload/images/livicom.png" width="223" alt="Livicom"></a>
				</div>
			</div>
		</div>
	</div>
	
	