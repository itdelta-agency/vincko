<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/*IncludeTemplateLangFile(__FILE__);*/
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?
	Bitrix\Main\Page\Asset::getInstance()->addCss("/local/css/slick.css");
	Bitrix\Main\Page\Asset::getInstance()->addCss("/local/css/slick-theme.css");
	Bitrix\Main\Page\Asset::getInstance()->addCss("/local/css/choices.min.css");
	?>
	<?$APPLICATION->ShowHead();?>
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
<header class="header">
        <div class="header__top container">
            <div class="header__top-left__block">
                <div class="header__top-menu">
                    <div class="header__top-menu--burger burger-js"><span></span></div>
                    <div class="header__top-menu--submenu submenu-js">
                        <nav>
                            <ul>
                                <li><a href="">Пакеты охранных услуг</a></li>
                                <li><a href="">Комплекты оборудования</a></li>
                                <li><a href="">Рейтинг охранных компаний</a></li>
                                <li><a href="">Страхование</a></li>
                                <li><a href="">vincКОМБО</a></li>
                                <li><a href="">О компании</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header__top-logo">
                    <a href="/">
                        <picture>
                            <source type="image/webp" srcset="/images/header/logo.webp">
                            <source type="image/png" srcset="/images/header/logo.png">
                            <img src="/images/header/logo.png" alt="logo__img" loading="lazy">
                        </picture>
                    </a>
                </div>
                <div class="header__top-info">
                    <ul>
                        <li class="tel"><a href="tel:+7861205-01-31">
                                <span class="icon">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41333 5.19333C3.37333 7.08 4.92 8.62 6.80667 9.58667L8.27333 8.12C8.45333 7.94 8.72 7.88 8.95333 7.96C9.7 8.20667 10.5067 8.34 11.3333 8.34C11.7 8.34 12 8.64 12 9.00667V11.3333C12 11.7 11.7 12 11.3333 12C5.07333 12 0 6.92667 0 0.666667C0 0.3 0.3 0 0.666667 0H3C3.36667 0 3.66667 0.3 3.66667 0.666667C3.66667 1.5 3.8 2.3 4.04667 3.04667C4.12 3.28 4.06667 3.54 3.88 3.72667L2.41333 5.19333Z" fill="black" />
                                    </svg>
                                </span>
                                <span class="text">+7 (861) 205-01-31</span>
                            </a>
                        </li>
                        <li class="location" data-modal-target="#header__top-info"><a href="">
                                <span class="icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 1.5C6.0975 1.5 3.75 3.8475 3.75 6.75C3.75 10.6875 9 16.5 9 16.5C9 16.5 14.25 10.6875 14.25 6.75C14.25 3.8475 11.9025 1.5 9 1.5ZM9 8.625C8.50272 8.625 8.02581 8.42746 7.67418 8.07583C7.32254 7.7242 7.125 7.24728 7.125 6.75C7.125 6.25272 7.32254 5.77581 7.67418 5.42418C8.02581 5.07254 8.50272 4.875 9 4.875C9.49728 4.875 9.9742 5.07254 10.3258 5.42418C10.6775 5.77581 10.875 6.25272 10.875 6.75C10.875 7.24728 10.6775 7.7242 10.3258 8.07583C9.9742 8.42746 9.49728 8.625 9 8.625Z" fill="black" />
                                    </svg>
                                </span>
                                <span class="text">Петропавловск-Камчатский</span>
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
            <div class="header__top-search">
                <form>
                    <input type="search" placeholder="Найти компанию" class="input__control">
                    <button>
                        <span class="icon">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.71 16.29L14.31 12.9C15.407 11.5025 16.0022 9.77666 16 8C16 6.41775 15.5308 4.87103 14.6518 3.55544C13.7727 2.23985 12.5233 1.21447 11.0615 0.608967C9.59966 0.00346625 7.99113 -0.15496 6.43928 0.153721C4.88743 0.462403 3.46197 1.22433 2.34315 2.34315C1.22433 3.46197 0.462403 4.88743 0.153721 6.43928C-0.15496 7.99113 0.00346625 9.59966 0.608967 11.0615C1.21447 12.5233 2.23985 13.7727 3.55544 14.6518C4.87103 15.5308 6.41775 16 8 16C9.77666 16.0022 11.5025 15.407 12.9 14.31L16.29 17.71C16.383 17.8037 16.4936 17.8781 16.6154 17.9289C16.7373 17.9797 16.868 18.0058 17 18.0058C17.132 18.0058 17.2627 17.9797 17.3846 17.9289C17.5064 17.8781 17.617 17.8037 17.71 17.71C17.8037 17.617 17.8781 17.5064 17.9289 17.3846C17.9797 17.2627 18.0058 17.132 18.0058 17C18.0058 16.868 17.9797 16.7373 17.9289 16.6154C17.8781 16.4936 17.8037 16.383 17.71 16.29ZM2 8C2 6.81332 2.3519 5.65328 3.01119 4.66658C3.67047 3.67989 4.60755 2.91085 5.7039 2.45673C6.80026 2.0026 8.00666 1.88378 9.17055 2.11529C10.3344 2.3468 11.4035 2.91825 12.2426 3.75736C13.0818 4.59648 13.6532 5.66558 13.8847 6.82946C14.1162 7.99335 13.9974 9.19975 13.5433 10.2961C13.0892 11.3925 12.3201 12.3295 11.3334 12.9888C10.3467 13.6481 9.18669 14 8 14C6.4087 14 4.88258 13.3679 3.75736 12.2426C2.63214 11.1174 2 9.5913 2 8Z" fill="#818181" />
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
            <div class="header__top-cabinet">
                <div class="present">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.625 5.26562H15.1656C15.4844 4.76406 15.6719 4.16875 15.6719 3.53125C15.6719 1.74766 14.2211 0.296875 12.4375 0.296875C11.4672 0.296875 10.593 0.728125 10 1.40781C9.40703 0.728125 8.53281 0.296875 7.5625 0.296875C5.77891 0.296875 4.32812 1.74766 4.32812 3.53125C4.32812 4.16875 4.51328 4.76406 4.83438 5.26562H1.375C0.960156 5.26562 0.625 5.60078 0.625 6.01562V10.7031C0.625 10.8062 0.709375 10.8906 0.8125 10.8906H1.75V18.9531C1.75 19.368 2.08516 19.7031 2.5 19.7031H17.5C17.9148 19.7031 18.25 19.368 18.25 18.9531V10.8906H19.1875C19.2906 10.8906 19.375 10.8062 19.375 10.7031V6.01562C19.375 5.60078 19.0398 5.26562 18.625 5.26562ZM10.7969 3.53125C10.7969 2.62656 11.5328 1.89062 12.4375 1.89062C13.3422 1.89062 14.0781 2.62656 14.0781 3.53125C14.0781 4.43594 13.3422 5.17188 12.4375 5.17188H10.7969V3.53125ZM7.5625 1.89062C8.46719 1.89062 9.20312 2.62656 9.20312 3.53125V5.17188H7.5625C6.65781 5.17188 5.92188 4.43594 5.92188 3.53125C5.92188 2.62656 6.65781 1.89062 7.5625 1.89062ZM2.21875 9.29688V6.85938H9.20312V9.29688H2.21875ZM3.34375 10.8906H9.20312V18.1094H3.34375V10.8906ZM16.6562 18.1094H10.7969V10.8906H16.6562V18.1094ZM17.7812 9.29688H10.7969V6.85938H17.7812V9.29688Z" fill="black" />
                        </svg>
                    </span>
                    <span class="text">
                        <span class="number">10 000</span>бонусов
                    </span>
                </div>
                <div class="link">
					<a href="/lk/orders/">Личный кабинет</a>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container">
                <div class="header__bottom-form">
                    <form>
                        <span class="text">Я хочу охранять</span>
                        <div class="header__bottom-form-select">
                            <select name="" id="header__select_town-js">
                                <option value="1">Коммерческая недвижимость</option>
                                <option value="2">Коммерческая недвижимость</option>
                                <option value="3">Коммерческая недвижимость</option>
                            </select>
                        </div>
                        <span class="text">где</span>
                        <div class="header__bottom-form-select location">
                            <select name="" id="header__select_location-js">
                                <option value="1">Петропавловск-Камчатский</option>
                                <option value="2">Петропавловск-Камчатский</option>
                                <option value="3">Петропавловск-Камчатский</option>
                            </select>
                        </div>
                        <div class="header__bottom-form-btn">
                            <input type="submit" value="НАЙТИ КОМПАНИЮ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="main container">
    <div class="breadcumbs">
        <nav>
            <ul>
                <li><a href="/">Главная </a></li>
                <li><a href="">Пакеты</a></li>
                <li><a href="">Vinкомбо</a></li>
            </ul>
        </nav>
    </div>
    <section class="bonuses__condition">
        <div class="bonuses__condition-head">
            <h1><?=$APPLICATION->ShowTitle(false);?></h1>
            <div class="bonuses__condition-head_right">
                <p><a href="/loyalty/">Перейти к <br> “Програме лояльности”</a></p>
                <div class="bonuses__btn">
					<a class="button" href="/loyalty/">Перейти</a>
                </div>
            </div>
        </div>
		