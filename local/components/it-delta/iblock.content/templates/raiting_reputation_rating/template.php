<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * Bitrix component iblock.content (webgsite.ru)
 * Компонент для битрикс, работа с инфоблоком одностраничный вывод
 *
 * @author    Falur <ienakaev@ya.ru>
 * @link      https://github.com/falur/bitrix.com.iblock.content
 * @copyright 2015 - 2016 webgsite.ru
 * @license   GNU General Public License http://www.gnu.org/licenses/gpl-2.0.html
 */

// Получаем активные разделы из инфоблока городов, они будут являтся городами
$cities = CIBlockElement::GetList(
    array("SORT"=>"ASC"),
    array("IBLOCK_ID" => 20, "ACTIVE" => "Y"),
    false,
    false,
    array("ID", "NAME")
);
?>

<div class="container">
    <div class="rating-center" id="rating-center">
        <div class="rating-center__title">
            <span>Репутационный рейтинг</span><br>
            <span>охранных компаний</span>
        </div>
        <div class="rating-center__subtitle">
            <div class="rating-center__subtitle_top">
                <img src="/upload/rating/endorsements-icon.svg" alt="img">
                <span>Одобренные компании</span>
            </div>
            <div class="rating-center__subtitle_text">
                При заказе услуг компаний, одобренных <a href="#">vincko:</a>
                вы получаете наши <a href="#guarantee">гарантии</a> и подарки
            </div>
        </div>
        <div class="rating-center__search">
            <div class="rating-center__search_item item-one">
                <div class="rating-center__search_item-title">
                    Город поиска
                </div>
                <div class="rating-center__search_form">
                    <form action="#">
                        <button class="rating-center__search_form-btn">
                            <img src="/upload/rating/rating-center__search_select-icon.svg" alt="img">
                        </button>
                        <div class="rating-center__search_form-select">
                            <? //while($city = $cities->GetNext()): ?>
                                <? //if($_COOKIE['selected_city'] == $city['ID']): ?>
                                    <input type="text" placeholder="<?=$city["NAME"]?>">
                                <? //endif ?>
                            <? //endwhile ?>
                        </div>
                        <div class="searchForm__modal">
                            <div class="searchForm__modal_closed">
                                <img src="/upload/rating/closed-icon.svg" alt="img">
                            </div>
                            <div class="searchForm__modal_input">
                                <input type="text" id="filterCity" placeholder="Поиск по названию">
                                <button>
                                    <img src="/upload/rating/search-icon.svg" alt="img">
                                </button>
                            </div>

                            <div class="searchForm__modal_wrapper">
                                <div class="searchForm__modal_topChek active">
                                    <div class="searchForm__modal_item topChekItem">
                                        <input type="checkbox" class="checkbox">
                                        <span class="itemText">Санкт-Петербург</span>
                                    </div>
                                </div>
                                <div class="searchForm__modal_centerChek">
                                    <div class="searchForm__modal_item">
                                        <input type="checkbox" class="checkbox">
                                        <span class="itemText">Санкт-Петербург</span>
                                    </div>
                                </div>
                                <div class="searchForm__modal_bottomChek">
                                    <? while($city = $cities->GetNext()): ?>
                                        <div class="searchForm__modal_item bottomChekItem">
                                            <input type="checkbox" class="checkbox">
                                            <span class="itemText"><?=$city["NAME"]?></span>
                                        </div>
                                    <? endwhile ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="rating-center__search_item item-two">
                <div class="rating-center__search_item-title">
                    Найдите компании по названию
                </div>
                <div class="rating-center__search_form">
                    <form action="#">
                        <button class="rating-center__search_form-btn">
                            <img src="/upload/rating/search-icon.svg" alt="img">
                        </button>
                        <div class="rating-center__search_form-input">
                            <input type="text" placeholder="Найти компанию">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="rating-center__items">
            <div class="rating-center__items_top">
                <div class="rating-center__items_top-title title-all">
                    <span>Рейтинг</span><br>
                    <span>Репутационный</span>
                    <div class="icon-info icon-info_cli">
                        <img src="/upload/rating/icon-info.svg" alt="img">
                        <div class="icon-info_modal modal-mini">
                            <div class="modal-mini__title">
                                Общий балл
                                <span>Репутационного рейтинга</span>
                            </div>
                            <div class="modal-mini__text">
                                образуется на основании отзывов клиентов охранных компаний, которые оценивают свой опыт
                                взаимодействия с ними по трем
                                критериямм:<br><br>
                                <div>
                                    <span>Клиентоориентированность</span>
                                </div>
                                <div>
                                    <span>Безопасность</span>
                                </div>
                                <div>
                                    <span>Комфорт</span>
                                </div>
                                <a href="#formation">Как формируется Рейтинг</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__items_top-title title-two">
                    <span>Рейтинг</span><br>
                    <span>комфорта</span>
                    <div class="icon-info icon-info_cli">
                        <img src="/upload/rating/icon-info.svg" alt="img">
                        <div class="icon-info_modal modal-mini">
                            <div class="modal-mini__title">
                                Оценки по критерию
                                <span>Комфорта:</span>
                            </div>
                            <div class="modal-mini__text">
                                отражают, насколько клиентам охранной компании удобно взаимодействовать с организацией
                                онлайн:<br><br>
                                <div>
                                    <span>онлайн оплаты</span> и история взаиморасчетов
                                </div>
                                <div>
                                    <span>подача заявок,</span> жалоб
                                </div>
                                <div>
                                    <span>отслеживание статуса</span> охраняемых объектов в приложении и др.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__items_top-title title-three title-act">
                    <span>Рейтинг</span><br>
                    <span>клиентоориентированности</span>
                    <div class="icon-info icon-info_cli">
                        <img src="/upload/rating/icon-info.svg" alt="img">
                        <div class="icon-info_modal modal-mini">
                            <div class="modal-mini__title">
                                Оценки по критерию<br>
                                <span>Клиентоориентированность:</span>
                            </div>
                            <div class="modal-mini__text">
                                отражают, насколько клиенты охранной компании удовлетворены:<br>
                                <div>
                                    качеством, вежливостью и скоростью <span>реагирования сотрудников</span>
                                    на их запросы, жалобы, пожелания
                                </div>
                                <div>
                                    удобством и разнообразием <span>каналов коммуникации</span> с охранной компанией:
                                    колл-центр,
                                    мессенджеры, чат на сайте или в
                                    приложении и др.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__items_top-title title-one ">
                    <span>Рейтинг</span><br>
                    <span>безопасности</span>
                    <div class="icon-info icon-info_cli">
                        <img src="/upload/rating/icon-info.svg" alt="img">
                        <div class="icon-info_modal modal-mini">
                            <div class="modal-mini__title">
                                Оценки по критерию
                                <span>Безопасность:</span>
                            </div>
                            <div class="modal-mini__text">
                                отражают, насколько клиенты охранной компании удовлетворены скоростью и качеством:<br>
                                <div>
                                    <span>приезда ГБР</span> (группы быстрого реагирования)
                                </div>
                                <div>
                                    реагирования на <span>тревожные события</span>
                                </div>
                                <div>
                                    устранения <span>технических сложностей</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__items_top-btns">
                    <div class="rating-center__items_top-btn tab-all_btn">
                        <div class="rating-center__items_top-btn_circle">
                            <svg height="58" width="58">
                                <circle cx="28.5" cy="28.5" r="24" style="stroke-dashoffset: 72.5;" />
                            </svg>
                        </div>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.53611e-07 4.57741L7.06537e-07 5.65433C6.97173e-07 5.86855 0.0842864 6.07399 0.234316 6.22546C0.384345 6.37693 0.587827 6.46203 0.800001 6.46203L15.2 6.46203C15.4122 6.46203 15.6157 6.37693 15.7657 6.22546C15.9157 6.07399 16 5.86855 16 5.65433L16 4.57741C16 4.3632 15.9157 4.15776 15.7657 4.00629C15.6157 3.85482 15.4122 3.76972 15.2 3.76972L0.800001 3.76972C0.587828 3.76972 0.384345 3.85481 0.234316 4.00629C0.0842865 4.15776 7.62974e-07 4.3632 7.53611e-07 4.57741ZM3.7702e-07 13.1928L4.24094e-07 12.1159C4.33457e-07 11.9017 0.0842862 11.6962 0.234315 11.5447C0.384345 11.3933 0.587827 11.3082 0.800001 11.3082L12.5333 11.3082C12.7455 11.3082 12.949 11.3933 13.099 11.5447C13.249 11.6962 13.3333 11.9017 13.3333 12.1159L13.3333 13.1928C13.3333 13.407 13.249 13.6124 13.099 13.7639C12.949 13.9154 12.7455 14.0005 12.5333 14.0005L0.800001 14.0005C0.587827 14.0005 0.384344 13.9154 0.234315 13.7639C0.0842861 13.6124 3.67656e-07 13.407 3.7702e-07 13.1928ZM5.88852e-07 8.34664L5.41778e-07 9.42357C5.32415e-07 9.63778 0.0842863 9.84322 0.234315 9.99469C0.384345 10.1462 0.587827 10.2313 0.800001 10.2313L8.8 10.2313C9.01217 10.2313 9.21566 10.1462 9.36569 9.99469C9.51571 9.84322 9.6 9.63778 9.6 9.42357L9.6 8.34664C9.6 8.13243 9.51571 7.92699 9.36569 7.77552C9.21566 7.62405 9.01217 7.53895 8.8 7.53895L0.800001 7.53895C0.587827 7.53895 0.384345 7.62405 0.234316 7.77552C0.0842863 7.92699 5.98216e-07 8.13243 5.88852e-07 8.34664ZM9.18369e-07 0.80818L8.71295e-07 1.8851C8.61932e-07 2.09932 0.0842866 2.30476 0.234316 2.45623C0.384345 2.6077 0.587828 2.6928 0.800001 2.6928L5.6 2.6928C5.81217 2.6928 6.01566 2.6077 6.16569 2.45623C6.31571 2.30476 6.4 2.09932 6.4 1.8851L6.4 0.80818C6.4 0.593967 6.31571 0.388527 6.16569 0.237055C6.01566 0.0855838 5.81217 0.000487836 5.6 0.000487827L0.800001 0.000487617C0.587828 0.000487608 0.384345 0.0855835 0.234316 0.237055C0.0842867 0.388527 9.27733e-07 0.593967 9.18369e-07 0.80818Z"
                                  fill="#93B6FF" />
                        </svg>
                    </div>
                    <div class="rating-center__items_top-btn tab-one_btn">
                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.92659 19.9429C2.79743 19.8812 2.6901 19.7725 2.62153 19.6342C2.55296 19.4958 2.52705 19.3355 2.5479 19.1786L3.6966 10.7144H0.648129C0.551483 10.7173 0.455532 10.6951 0.367678 10.6494C0.279825 10.6038 0.202417 10.5359 0.141428 10.451C0.0804394 10.3661 0.0374991 10.2665 0.0159209 10.1598C-0.00565726 10.0532 -0.0052966 9.94232 0.0169749 9.83584L1.91044 0.550248C1.94375 0.390443 2.0247 0.248508 2.13966 0.148335C2.25461 0.0481613 2.39656 -0.00413278 2.54159 0.000255291H8.85313C8.94742 -0.000107542 9.04058 0.0234433 9.12578 0.0691775C9.21097 0.114912 9.28602 0.181667 9.34543 0.264538C9.40567 0.348345 9.44833 0.446525 9.47019 0.551689C9.49206 0.656852 9.49256 0.766259 9.47166 0.871673L8.37976 6.42874H11.3777C11.496 6.42848 11.612 6.46584 11.7124 6.53656C11.8129 6.60728 11.8937 6.70853 11.9458 6.82874C11.991 6.94412 12.0084 7.07101 11.9962 7.19648C11.984 7.32195 11.9427 7.44152 11.8764 7.54302L3.67136 19.6857C3.6159 19.7787 3.54186 19.8557 3.45523 19.9103C3.3686 19.9649 3.27183 19.9956 3.17274 20C3.08829 19.9982 3.00485 19.9788 2.92659 19.9429ZM6.80188 7.8573L8.06419 1.42881H3.04651L1.44338 9.28585H5.1735L4.16997 16.6286L10.1154 7.8573H6.80188Z"
                                fill="#93B6FF" />
                        </svg>
                    </div>
                    <div class="rating-center__items_top-btn tab-three_btn act">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.66671 5.49441C8.17336 5.82405 7.59334 6 7 6C6.20435 6 5.44129 5.68393 4.87868 5.12132C4.31607 4.55871 4 3.79565 4 3C4 2.40666 4.17595 1.82664 4.50559 1.33329C4.83524 0.839943 5.30377 0.455425 5.85195 0.228363C6.40013 0.0012998 7.00333 -0.0581103 7.58527 0.0576457C8.16721 0.173401 8.70176 0.459123 9.12132 0.87868C9.54088 1.29824 9.8266 1.83279 9.94235 2.41473C10.0581 2.99667 9.9987 3.59987 9.77164 4.14805C9.54457 4.69623 9.16006 5.16476 8.66671 5.49441ZM7.83335 1.7528C7.58668 1.58797 7.29667 1.5 7 1.5C6.60217 1.5 6.22064 1.65804 5.93934 1.93934C5.65803 2.22064 5.5 2.60218 5.5 3C5.5 3.29667 5.58797 3.58668 5.75279 3.83336C5.91762 4.08003 6.15188 4.27229 6.42597 4.38582C6.70006 4.49935 7.00166 4.52906 7.29263 4.47118C7.5836 4.4133 7.85088 4.27044 8.06066 4.06066C8.27044 3.85088 8.4133 3.58361 8.47118 3.29264C8.52905 3.00167 8.49935 2.70006 8.38582 2.42598C8.27229 2.15189 8.08003 1.91762 7.83335 1.7528ZM2.44184 8.66888C3.71602 7.60669 5.3268 7.01639 6.99583 7C8.66953 7.01493 10.285 7.60701 11.5617 8.67339C12.8384 9.73977 13.6956 11.2131 13.9843 12.8373C14.0076 12.9664 14.0049 13.0987 13.9763 13.2268C13.9477 13.3548 13.8938 13.4761 13.8176 13.5836C13.7414 13.6911 13.6445 13.7827 13.5323 13.8533C13.4201 13.9238 13.295 13.9719 13.1639 13.9948H12.9917C12.7505 13.9983 12.5158 13.9167 12.3302 13.7649C12.1445 13.6131 12.0199 13.4009 11.9789 13.1666C11.7675 12.0163 11.1528 10.9756 10.2421 10.2262C9.33134 9.47687 8.18242 9.06636 6.99583 9.06636C5.80924 9.06636 4.66033 9.47687 3.7496 10.2262C2.83887 10.9756 2.22416 12.0163 2.01275 13.1666C1.9907 13.2966 1.94274 13.421 1.87162 13.5326C1.80051 13.6443 1.70765 13.7409 1.59841 13.817C1.48918 13.893 1.36573 13.9471 1.23519 13.9759C1.10465 14.0047 0.969615 14.0077 0.837875 13.9848C0.705819 13.962 0.579675 13.9136 0.466759 13.8424C0.353843 13.7712 0.256402 13.6786 0.180087 13.57C0.103773 13.4614 0.0501032 13.3389 0.022192 13.2097C-0.00572009 13.0805 -0.00731845 12.9472 0.0174885 12.8174C0.31015 11.1984 1.16766 9.73108 2.44184 8.66888Z"
                                  fill="#93B6FF" />
                        </svg>
                    </div>
                    <div class="rating-center__items_top-btn tab-two_btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0 8C0 3.5888 3.5888 0 8 0C12.4112 0 16 3.5888 16 8C16 12.4112 12.4112 16 8 16C3.5888 16 0 12.4112 0 8ZM1.45455 8C1.45455 11.6092 4.39079 14.5455 8 14.5455C11.6092 14.5455 14.5455 11.6092 14.5455 8C14.5455 4.39084 11.6092 1.45455 8 1.45455C4.39079 1.45455 1.45455 4.39084 1.45455 8ZM6.73905 9.35248L11.395 5.0239C11.7165 4.72507 12.2376 4.72512 12.559 5.02395C12.8804 5.32279 12.8804 5.80725 12.559 6.10609L7.32101 10.9757C7.16666 11.1192 6.95733 11.1998 6.73905 11.1998H6.739C6.52072 11.1998 6.31139 11.1192 6.15704 10.9757L3.44116 8.45063C3.11973 8.1518 3.11973 7.66733 3.44116 7.3685C3.76259 7.06972 4.28375 7.06977 4.60513 7.36855L6.73905 9.35248Z"
                                  fill="#93B6FF" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rating-center__items-wrapper">
                <div class="rating-center__item-wrapper">
                    <div class="rating-center__item">
                        <div class="rating-center__item_wrappers">
                            <div class="rating-center__item_circle">
                                <span>5</span>
                                <svg height="40" width="40">
                                    <circle cx="20.5" cy="20.5" r="18" style="stroke-dashoffset: 14.5;" />
                                </svg>
                            </div>
                            <div class="rating-center__item_num">
                                1
                            </div>
                            <div class="rating-center__item_name">
                                ООО “Максимилиан Макс...
                            </div>
                            <div class="rating-center__item_icon">
                                <div class="rating-center__item_icon-one">
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                </div>
                                <div class="rating-center__item_icon-two">
                                    <img src="/upload/rating/icon-arrow-down.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="num">5</div>
                    </div>
                    <div class="rating-center__item-rating">
                        <div style="width: 100%;"></div>
                    </div>
                    <div class="itemRating-open">
                        <button class="itemRating-open__closed">
                            <img src="/upload/rating/closed-icon.svg" alt="img">
                        </button>
                        <div class="itemRating-open__top">
                            <div class="itemRating-open__left_top">
                                <div class="itemRating-open__left_num">
                                    <span class="num">6</span> <span>в Рейтинге</span>
                                    <p>г.Москва</p>
                                </div>
                                <div class="itemRating-open__left_endorsements">
                                    <span>Компания одобрена</span>
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                    <div class="endorsements_modal modal-mini">
                                        <div class="modal-mini__title">
                                            <span>Охранные услуги</span> одобренной компании
                                        </div>
                                        <div class="modal-mini__text">
                                            Вы можете <span>заказать на платформе:</span> конфортно, без переплат,
                                            скрытых платежей
                                            за монтаж оборудования и с гарантиями <span>vincko:</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_deal">
                                    <a href="#guarantee">Безопасная сделка</a>
                                    <img src="/upload/rating/deal-icon.svg" alt="img">
                                    <div class="deal_modal modal-mini">
                                        <div class="modal-mini__title">
                                            <span>Безопасная сделка</span> при покупке услуг охраны
                                        </div>
                                        <div class="modal-mini__text">
                                            <span>vincko:</span> предоставляет дополнительные гарантии при покупке услуг
                                            <span class="green">одобренных</span>
                                            охранных компаний на платформе
                                            <a href="#guarantee">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__left_name">
                                ООО Собака Съела
                            </div>
                            <div class="itemRating-open__showRating">
                                <div class="itemRating-open__showRating_title">
                                    Показать рейтинг, услуги и отзывы для города:
                                    <div class="itemRating-open__showRating_title-modal">
                                        <img src="/upload/rating/icon-info.svg" alt="img">
                                        <div class="modal-mini itemRating-open__showRating_title-modalShow">
                                            <div class="modal-mini__text">
                                                Охранная компания работает в нескольких городах:<span>Москва, Орел,
                                                    Воркута.</span>
                                                Рейтинг, стоимость, содержание и качество услуг
                                                этой компании<span>могут значительно отличаться</span> в зависимости от
                                                города
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="itemRating-open__showRating_radio">
                                    <div class="itemRating-open__showRating_radio-item">
                                        <input type="radio" class="radio" name="radio">
                                        <span>Москва</span>
                                        <p>32 отзыва</p>
                                    </div>
                                    <div class="itemRating-open__showRating_radio-item">
                                        <input type="radio" class="radio" name="radio">
                                        <span>Орел</span>
                                        <p>5 отзывов</p>
                                    </div>
                                    <div class="itemRating-open__showRating_radio-item">
                                        <input type="radio" class="radio" name="radio">
                                        <span>Воркута</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="itemRating-open__wrapper">
                            <div class="itemRating-open__left">
                                <div class="itemRating-open__left_info">
                                    <div class="info-block-one">
                                        <div class="info-block-one__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div class="info-block-one__left_icon">
                                                <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                            </div>
                                        </div>
                                        <div class="info-block-one__right">
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Оценка по критериям <a href="#">vincko:</a>
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon2.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Безопасность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon1.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Клиентоориентированность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon3.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Комфорт
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-block-two">
                                        <div class="info-block-two__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div>
                                                Внешний
                                                рейтинг
                                            </div>
                                        </div>
                                        <div class="info-block-two__right">
                                            <div class="info-block-two__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Другие оценки
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon1.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon2.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon3.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__tab">
                                    <div class="tabs-wrapper links-tab">
                                        <a class="tab tab-one tab_active" href="#">
                                            Охрана квартиры
                                        </a>
                                        <a class="tab tab-two" href="#">
                                            Охрана дома
                                        </a>
                                        <a class="tab tab-three" href="#">
                                            Охрана коммерческой недвижимости
                                        </a>
                                    </div>
                                    <div class="tabs-wrapper content-tab">
                                        <div class="tabs-content content-one tabs-content_active">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column width220">
                                                <div class="tabs-content__column_title">
                                                    Стандартные<br>
                                                    периоды обслуживания
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>3 месяца 3 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>6 месяцев 6 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>12 месяцев 12 000 ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Подарки при заказе услуг<br>
                                                    на <a href="#">vincko:</a>
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span class="red">1-3 мес.</span><span>обслуживания
                                                            бесплатно</span>
                                                    </div>
                                                    <div>
                                                        <span class="red">до 2 000 000 руб</span><span>страховая
                                                            выплата</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-two">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_title">
                                                    Решение индивидуальных задач
                                                </div>
                                                <div class="tabs-content__column_text">
                                                    Мы понимаем уникальность <a href="#">частных домов,</a><br>
                                                    потому предлагаем создать заявку и описать нам задачу. Мы<br>
                                                    проведем
                                                    анализ вариантов и предоставим готовое решение<br>
                                                    для Вашего дома.
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <a href="#">Создать индивидуальную заявку</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-three">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_title">
                                                    Решение индивидуальных задач
                                                </div>
                                                <div class="tabs-content__column_text">
                                                    Мы понимаем уникальность <a href="#">коммерческих объектов,</a><br>
                                                    потому предлагаем создать заявку и описать нам задачу. Мы<br>
                                                    проведем
                                                    анализ вариантов и предоставим готовое решение<br>
                                                    для Вашей коммерческой недвижимости.
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <a href="#">Создать индивидуальную заявку</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_bottom">
                                    <div class="itemRating-open__left_bottom-mobilLinks">
                                        <a href="#">Читать все <span>32</span> отзыва</a>
                                        <span class="closed-card">Закрыть карточку</span>
                                    </div>
                                    <div class="itemRating-open__left_bottom-btns">
                                        <a href="#" class="itemRating-open__left_bottom-btn">
                                            к компании
                                        </a>
                                        <a href="#" class="itemRating-open__left_bottom-btn">
                                            Заказать услуги
                                        </a>
                                    </div>
                                    <div class="itemRating-open__left_bottom-text">
                                        Производители, с оборудованием которых работает компания:
                                        <div>
                                            <span>Livicom</span><span>C.nord</span><span>AJAX</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__right">
                                <div class="itemRating-open__right_top">
                                    <a href="#">Читать все <span>32</span> отзыва</a>
                                </div>
                                <div class="itemRating-open__right_wrapper">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="itemRating-open__right_bottom">
                                    <a class="itemRating-open__right_bottom-btn" href="#">Оставить свой отзыв</a>
                                    <div class="itemRating-open__right_bottom-text">
                                        <span>источник</span>
                                        <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__item-wrapper item-rating-hide">
                    <div class="rating-center__item">
                        <div class="rating-center__item_wrappers">
                            <div class="rating-center__item_circle">
                                <span>4</span>
                                <svg height="40" width="40">
                                    <circle cx="20.5" cy="20.5" r="18" style="stroke-dashoffset: 45;" />
                                </svg>
                            </div>
                            <div class="rating-center__item_num">
                                4
                            </div>
                            <div class="rating-center__item_name">
                                Пупсень & Вупсень
                            </div>
                            <div class="rating-center__item_icon">
                                <div class="rating-center__item_icon-one">
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                </div>
                                <div class="rating-center__item_icon-two">
                                    <img src="/upload/rating/icon-arrow-down.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="num">
                            4,1
                        </div>
                    </div>
                    <div class="rating-center__item-rating">
                        <div style="width: 41%;"></div>
                    </div>
                    <div class="itemRating-open">
                        <button class="itemRating-open__closed">
                            <img src="/upload/rating/closed-icon.svg" alt="img">
                        </button>
                        <div class="itemRating-open__top">
                            <div class="itemRating-open__left_top">
                                <div class="itemRating-open__left_num">
                                    <span class="num">6</span> <span>в Рейтинге</span>
                                    <p>г.Москва</p>
                                </div>
                                <div class="itemRating-open__left_No-endorsements">
                                    <span>Компания не одобрена</span>
                                    <img src="/upload/rating/No-endorsements-icon_mini.svg" alt="img">
                                </div>
                            </div>
                            <div class="itemRating-open__left_name">
                                ООО Собака Съела
                            </div>
                        </div>
                        <div class="itemRating-open__wrapper">
                            <div class="itemRating-open__left">
                                <div class="itemRating-open__left_info">
                                    <div class="info-block-one">
                                        <div class="info-block-one__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div class="info-block-one__left_icon">
                                                <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                            </div>
                                        </div>
                                        <div class="info-block-one__right">
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Оценка по критериям <a href="#">vincko:</a>
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon2.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Безопасность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon1.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Клиентоориентированность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon3.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Комфорт
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-block-two">
                                        <div class="info-block-two__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div>
                                                Внешний
                                                рейтинг
                                            </div>
                                        </div>
                                        <div class="info-block-two__right">
                                            <div class="info-block-two__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Другие оценки
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon1.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon2.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon3.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_text">
                                    <div class="itemRating-open__left_text-top">
                                        <span>О компании есть отзывы на платформе, но компания не одобрена</span><a
                                            href="#">vincko:</a>
                                    </div>
                                    <div class="itemRating-open__left_text-bottom">
                                        Для вас мы постарались найти оценки и отзывы о компании и в сторонних
                                        источниках,<br>
                                        но этого оказалось недостаточно, чтобы распространить <a
                                            href="#guarantee">гарантии
                                            vincko:</a> на услуги этой компании.
                                    </div>
                                    <div class="itemRating-open__left_text-mobilLinks">
                                        <a href="#">Читать все <span>32</span> отзыва</a>
                                        <span class="closed-card">Закрыть карточку</span>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__right">
                                <div class="itemRating-open__right_top">
                                    <a href="#">Читать все <span>32</span> отзыва</a>
                                </div>
                                <div class="itemRating-open__right_wrapper">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="itemRating-open__right_bottom">
                                    <a class="itemRating-open__right_bottom-btn" href="#">Оставить свой отзыв</a>
                                    <div class="itemRating-open__right_bottom-text">
                                        <span>источник</span>
                                        <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__item-wrapper">
                    <div class="rating-center__item">
                        <div class="rating-center__item_wrappers">
                            <div class="rating-center__item_circle">
                                <span>4,0</span>
                                <svg height="40" width="40">
                                    <circle cx="20.5" cy="20.5" r="18" style="stroke-dashoffset: 79;" />
                                </svg>
                            </div>
                            <div class="rating-center__item_num">
                                6
                            </div>
                            <div class="rating-center__item_name" id="rating-center__item_name">
                                ООО Собака Съела
                            </div>
                            <div class="rating-center__item_icon">
                                <div class="rating-center__item_icon-one">
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                </div>
                                <div class="rating-center__item_icon-two">
                                    <img src="/upload/rating/icon-arrow-down.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="num">
                            4,0
                        </div>
                    </div>
                    <div class="rating-center__item-rating">
                        <div style="width: 40%;"></div>
                    </div>
                    <div class="itemRating-open">
                        <button class="itemRating-open__closed">
                            <img src="/upload/rating/closed-icon.svg" alt="img">
                        </button>
                        <div class="itemRating-open__top">
                            <div class="itemRating-open__left_top">
                                <div class="itemRating-open__left_num">
                                    <span class="num">6</span> <span>в Рейтинге</span>
                                    <p>г.Москва</p>
                                </div>
                                <div class="itemRating-open__left_endorsements">
                                    <span>Компания одобрена</span>
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                    <div class="endorsements_modal modal-mini">
                                        <div class="modal-mini__title">
                                            <span>Охранные услуги</span> одобренной компании
                                        </div>
                                        <div class="modal-mini__text">
                                            Вы можете <span>заказать на платформе:</span> конфортно, без переплат,
                                            скрытых платежей
                                            за монтаж оборудования и с гарантиями <span>vincko:</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_deal">
                                    <a href="#guarantee">Безопасная сделка</a>
                                    <img src="/upload/rating/deal-icon.svg" alt="img">
                                    <div class="deal_modal modal-mini">
                                        <div class="modal-mini__title">
                                            <span>Безопасная сделка</span> при покупке услуг охраны
                                        </div>
                                        <div class="modal-mini__text">
                                            <span>vincko:</span> предоставляет дополнительные гарантии при покупке услуг
                                            <span class="green">одобренных</span>
                                            охранных компаний на платформе
                                            <a href="#">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__left_name">
                                ООО Собака Съела
                            </div>
                            <div class="itemRating-open__showRating">
                                <div class="itemRating-open__showRating_title">
                                    Показать рейтинг, услуги и отзывы для города: <span>г.Москва</span>
                                </div>
                            </div>
                        </div>
                        <div class="itemRating-open__wrapper">
                            <div class="itemRating-open__left">
                                <div class="itemRating-open__left_info">
                                    <div class="info-block-one">
                                        <div class="info-block-one__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div class="info-block-one__left_icon">
                                                <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                            </div>
                                        </div>
                                        <div class="info-block-one__right">
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Оценка по критериям <a href="#">vincko:</a>
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon2.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Безопасность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon1.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Клиентоориентированность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon3.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Комфорт
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-block-two">
                                        <div class="info-block-two__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div>
                                                Внешний
                                                рейтинг
                                            </div>
                                        </div>
                                        <div class="info-block-two__right">
                                            <div class="info-block-two__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Другие оценки
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon1.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon2.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon3.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__tab">
                                    <div class="tabs-wrapper links-tab">
                                        <a class="tab tab-one tab_active" href="#">
                                            Охрана квартиры
                                        </a>
                                        <a class="tab tab-two" href="#">
                                            Охрана дома
                                        </a>
                                        <a class="tab tab-three" href="#">
                                            Охрана коммерческой недвижимости
                                        </a>
                                    </div>
                                    <div class="tabs-wrapper content-tab">
                                        <div class="tabs-content content-one tabs-content_active">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column width220">
                                                <div class="tabs-content__column_title">
                                                    Стандартные<br>
                                                    периоды обслуживания
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>3 месяца 3 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>6 месяцев 6 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>12 месяцев 12 000 ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Подарки при заказе услуг<br>
                                                    на <a href="#">vincko:</a>
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span class="red">1-3 мес.</span><span>обслуживания
                                                            бесплатно</span>
                                                    </div>
                                                    <div>
                                                        <span class="red">до 2 000 000 руб</span><span>страховая
                                                            выплата</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-two">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_title">
                                                    Решение индивидуальных задач
                                                </div>
                                                <div class="tabs-content__column_text">
                                                    Мы понимаем уникальность <a href="#">частных домов,</a><br>
                                                    потому предлагаем создать заявку и описать нам задачу. Мы<br>
                                                    проведем
                                                    анализ вариантов и предоставим готовое решение<br>
                                                    для Вашего дома.
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <a href="#">Создать индивидуальную заявку</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-three">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_title">
                                                    Решение индивидуальных задач
                                                </div>
                                                <div class="tabs-content__column_text">
                                                    Мы понимаем уникальность <a href="#">коммерческих объектов,</a><br>
                                                    потому предлагаем создать заявку и описать нам задачу. Мы<br>
                                                    проведем
                                                    анализ вариантов и предоставим готовое решение<br>
                                                    для Вашей коммерческой недвижимости.
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <a href="#">Создать индивидуальную заявку</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_bottom">
                                    <div class="itemRating-open__left_bottom-mobilLinks">
                                        <a href="#">Читать все <span>32</span> отзыва</a>
                                        <span class="closed-card">Закрыть карточку</span>
                                    </div>
                                    <div class="itemRating-open__left_bottom-btns">
                                        <a href="#" class="itemRating-open__left_bottom-btn">
                                            к компании
                                        </a>
                                        <a href="#" class="itemRating-open__left_bottom-btn">
                                            Заказать услуги
                                        </a>
                                    </div>
                                    <div class="itemRating-open__left_bottom-text">
                                        Производители, с оборудованием которых работает компания:
                                        <div>
                                            <span>Livicom</span><span>C.nord</span><span>AJAX</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__right">
                                <div class="itemRating-open__right_top">
                                    <a href="#">Читать все <span>32</span> отзыва</a>
                                </div>
                                <div class="itemRating-open__right_wrapper">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="itemRating-open__right_bottom">
                                    <a class="itemRating-open__right_bottom-btn" href="#">Оставить свой отзыв</a>
                                    <div class="itemRating-open__right_bottom-text">
                                        <span>источник</span>
                                        <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__item-wrapper item-rating-hide reviews-non">
                    <div class="rating-center__item">
                        <div class="rating-center__item_wrappers">
                            <div class="rating-center__item_circle">
                                <span>4,1</span>
                                <svg height="40" width="40">
                                    <circle cx="20.5" cy="20.5" r="18" style="stroke-dashoffset: 40;" />
                                </svg>
                            </div>
                            <div class="rating-center__item_num">
                                9
                            </div>
                            <div class="rating-center__item_name">
                                Пупсень & Вупсень
                            </div>
                            <div class="rating-center__item_icon">
                                <div class="rating-center__item_icon-one">
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                </div>
                                <div class="rating-center__item_icon-two">
                                    <img src="/upload/rating/icon-arrow-down.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="num">
                            4,1
                        </div>
                    </div>
                    <div class="rating-center__item-rating">
                        <div style="width: 41%;"></div>
                    </div>
                    <div class="itemRating-open">
                        <button class="itemRating-open__closed">
                            <img src="/upload/rating/closed-icon.svg" alt="img">
                        </button>
                        <div class="itemRating-open__top">
                            <div class="itemRating-open__left_top">
                                <div class="itemRating-open__left_num">
                                    <span class="num">6</span> <span>в Рейтинге</span>
                                    <p>г.Москва</p>
                                </div>
                                <div class="itemRating-open__left_No-endorsements">
                                    <span>Компания не одобрена</span>
                                    <img src="/upload/rating/No-endorsements-icon_mini.svg" alt="img">
                                </div>
                            </div>
                            <div class="itemRating-open__left_name">
                                ООО Собака Съела
                            </div>
                        </div>
                        <div class="itemRating-open__wrapper">
                            <div class="itemRating-open__left">
                                <div class="itemRating-open__left_text">
                                    <div class="itemRating-open__left_text-top">
                                        <span>О компании нет отзывов на платформе, Компания не одобрена</span><a
                                            href="#">vincko:</a>
                                    </div>
                                    <div class="itemRating-open__left_text-bottom">
                                        Для вас мы постарались найти оценки и отзывы о компании и в сторонних
                                        источниках,<br>
                                        но этого оказалось недостаточно, чтобы распространить <a
                                            href="#guarantee">гарантии
                                            vincko:</a> на услуги этой компании.
                                    </div>
                                    <div class="itemRating-open__left_text-sources">
                                        <span>Мы также искали в источниках:</span>
                                        <div>
                                            <img src="/upload/rating/info-block-two__right_row-icon1.svg" alt="img">
                                            <img src="/upload/rating/info-block-two__right_row-icon2.svg" alt="img">
                                            <img src="/upload/rating/info-block-two__right_row-icon3.svg" alt="img">
                                        </div>
                                    </div>
                                    <div class="itemRating-open__left_text-mobiltext">
                                        Вы можете
                                        стать первым!
                                    </div>
                                    <a class="itemRating-open__left_text-btn" href="#">Оставить свой отзыв</a>
                                </div>
                            </div>
                            <div class="itemRating-open__right">
                                <div class="itemRating-open__right_wrapper">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>К сожалению, отзывов о компании нет.</span>
                                                        <div class="itemRating-open__review_bottom-sources">
                                                            <span>Мы также искали в источниках:</span>
                                                            <div>
                                                                <img src="/upload/rating/info-block-two__right_row-icon1.svg"
                                                                     alt="img">
                                                                <img src="/upload/rating/info-block-two__right_row-icon2.svg"
                                                                     alt="img">
                                                                <img src="/upload/rating/info-block-two__right_row-icon3.svg"
                                                                     alt="img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__right_bottom">
                                    <a class="itemRating-open__right_bottom-btn" href="#">Оставить свой отзыв</a>
                                    <div class="itemRating-open__right_bottom-text">
                                        Вы можете
                                        стать первым!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating-center__item-wrapper no-approved">
                    <div class="rating-center__item">
                        <div class="rating-center__item_wrappers">
                            <div class="rating-center__item_circle">
                                <span>3,3</span>
                                <svg height="40" width="40">
                                    <circle cx="20.5" cy="20.5" r="18" style="stroke-dashoffset: 29;" />
                                </svg>
                            </div>
                            <div class="rating-center__item_num">
                                10
                            </div>
                            <div class="rating-center__item_name" id="rating-center__item_name">
                                ИП Блондинка и Большая Ко
                            </div>
                            <div class="rating-center__item_icon">
                                <div class="rating-center__item_icon-one">
                                    <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                </div>
                                <div class="rating-center__item_icon-two">
                                    <img src="/upload/rating/icon-arrow-down.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="num">
                            3,3
                        </div>
                    </div>
                    <div class="rating-center__item-rating">
                        <div style="width: 33%;"></div>
                    </div>
                    <div class="itemRating-open">
                        <button class="itemRating-open__closed">
                            <img src="/upload/rating/closed-icon.svg" alt="img">
                        </button>
                        <div class="itemRating-open__top">
                            <div class="itemRating-open__left_top">
                                <div class="itemRating-open__left_num">
                                    <span class="num">6</span> <span>в Рейтинге</span>
                                    <p>г.Москва</p>
                                </div>
                                <div class="itemRating-open__left_no-approved">
                                    <span>Компания еще не имеет статус одобренной</span>
                                    <img src="/upload/rating/itemRating-open__left_no-approved.svg" alt="img">
                                </div>
                            </div>
                            <div class="itemRating-open__left_name">
                                ООО Собака Съела
                            </div>
                            <div class="itemRating-open__showRating">
                                <div class="itemRating-open__showRating_title">
                                    Показать рейтинг, услуги и отзывы для города: <span>г.Москва</span>
                                    <img src="/upload/rating/icon-info.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="itemRating-open__wrapper">
                            <div class="itemRating-open__left">
                                <div class="itemRating-open__left_info">
                                    <div class="info-block-one">
                                        <div class="info-block-one__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div class="info-block-one__left_icon">
                                                <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                            </div>
                                        </div>
                                        <div class="info-block-one__right">
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Оценка по критериям <a href="#">vincko:</a>
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon2.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Безопасность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon1.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Клиентоориентированность
                                            </div>
                                            <div class="info-block-one__right_row">
                                                <img src="/upload/rating/info-block-one__left_right-row_icon3.svg"
                                                     alt="img">
                                                <span>10</span>
                                                Комфорт
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-block-two">
                                        <div class="info-block-two__left">
                                            <span>4,0</span>
                                            <svg height="60" width="60">
                                                <circle cx="30.5" cy="24.5" r="24" style="stroke-dashoffset: 39;" />
                                            </svg>
                                            <div>
                                                Внешний
                                                рейтинг
                                            </div>
                                        </div>
                                        <div class="info-block-two__right">
                                            <div class="info-block-two__right_row">
                                                <img src="/upload/rating/icon-info.svg" alt="img">
                                                Другие оценки
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon1.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon2.svg" alt="img">
                                            </div>
                                            <div class="info-block-two__right_row">
                                                <span>5,0</span>
                                                <img src="/upload/rating/info-block-two__right_row-icon3.svg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__tab">
                                    <div class="tabs-wrapper links-tab">
                                        <a class="tab tab-one tab_active" href="#">
                                            Охрана квартиры
                                        </a>
                                        <a class="tab tab-two" href="#">
                                            Охрана дома
                                        </a>
                                        <a class="tab tab-three" href="#">
                                            Охрана коммерческой недвижимости
                                        </a>
                                    </div>
                                    <div class="tabs-wrapper content-tab">
                                        <div class="tabs-content content-one tabs-content_active">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column width220">
                                                <div class="tabs-content__column_title">
                                                    Стандартные<br>
                                                    периоды обслуживания
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>3 месяца 3 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>6 месяцев 6 000 ₽</span>
                                                    </div>
                                                    <div>
                                                        <span>12 месяцев 12 000 ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Подарки при заказе услуг<br>
                                                    на <a href="#">vincko:</a>
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span class="red">1-3 мес.</span><span>обслуживания
                                                            бесплатно</span>
                                                    </div>
                                                    <div>
                                                        <span class="red">до 2 000 000 руб</span><span>страховая
                                                            выплата</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-two">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_text">
                                                    <div>
                                                        Можно ли заказать охранные услуги этой компании на платформе?
                                                    </div>
                                                    <div>
                                                        На платформе <span>vincko:</span> можно заказать охранные услуги
                                                        только
                                                    </div>
                                                    <div>
                                                        одобренной компании
                                                        <img src="/upload/rating/endorsements-icon_mini.svg" alt="img">
                                                    </div>
                                                    <div>
                                                        Мы можем оповестить Вас, когда услуги этой охранной компании
                                                        станет возможным заказывать на <span>vincko:</span>
                                                    </div>
                                                </div>
                                                <div class="tabs-content__column_lists test">
                                                    <div class="act-nohide">
                                                        <span>Оповестить меня о возможности заказать услуги этой
                                                            компании</span>
                                                    </div>
                                                    <div class="hide">
                                                        <span>Мы оповестим Вас</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-content content-three">
                                            <div class="tabs-content__column">
                                                <div class="tabs-content__column_title">
                                                    Услуги
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <span>Мобильная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Мониторинг</span>
                                                    </div>
                                                    <div>
                                                        <span>Пожарная охрана</span>
                                                    </div>
                                                    <div>
                                                        <span>Физическая охрана</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tabs-content__column border-none">
                                                <div class="tabs-content__column_title">
                                                    Решение индивидуальных задач
                                                </div>
                                                <div class="tabs-content__column_text">
                                                    Мы понимаем уникальность <a href="#">коммерческих объектов,</a><br>
                                                    потому предлагаем создать заявку и описать нам задачу. Мы<br>
                                                    проведем
                                                    анализ вариантов и предоставим готовое решение<br>
                                                    для Вашей коммерческой недвижимости.
                                                </div>
                                                <div class="tabs-content__column_lists">
                                                    <div>
                                                        <a href="#">Создать индивидуальную заявку</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="itemRating-open__left_bottom">
                                    <div class="itemRating-open__left_bottom-mobilLinks">
                                        <a href="#">Читать все <span>32</span> отзыва</a>
                                        <span class="closed-card">Закрыть карточку</span>
                                    </div>
                                    <div class="itemRating-open__left_bottom-btns">
                                        <a href="#" class="itemRating-open__left_bottom-btn">
                                            подробнее
                                        </a>
                                    </div>
                                    <div class="itemRating-open__left_bottom-text">
                                        Производители, с оборудованием которых работает компания:
                                        <div>
                                            <span>Livicom</span><span>C.nord</span><span>AJAX</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="itemRating-open__right">
                                <div class="itemRating-open__right_top">
                                    <a href="#">Читать все <span>32</span> отзыва</a>
                                </div>
                                <div class="itemRating-open__right_wrapper">
                                    <div class="swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="itemRating-open__review">
                                                    <div class="itemRating-open__review_top">
                                                        <div class="itemRating-open__review_top-icon">
                                                            <img src="/upload/rating/itemRating-open__review_top-icon.svg"
                                                                 alt="img">
                                                        </div>
                                                        <div class="itemRating-open__review_top-text">
                                                            <span class="name">Владимир С.</span>
                                                            <span class="city">Ростов-на-Дону</span>
                                                            <span class="buyer">покупатель</span>
                                                            <img src="/upload/rating/icon-info.svg" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="itemRating-open__review_bottom">
                                                        <span>Комментарий пользователя:</span>
                                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице
                                                        с
                                                        начала XVI века. В то время некий безымянный печатник
                                                        создал большую коллекцию размеров и форм шрифтов, используя
                                                        Lorem
                                                        Ipsum для распечатки образц...
                                                        <button>Читать далее</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="itemRating-open__right_bottom">
                                    <a class="itemRating-open__right_bottom-btn" href="#">Оставить свой отзыв</a>
                                    <div class="itemRating-open__right_bottom-text">
                                        <span>источник</span>
                                        <img src="/upload/rating/info-block-one__left_icon.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rating-center__items_bottom">
                <a href="#rating-center" class="rating-center__items_bottom-btnTop">
                    Подняться к фильтрам
                </a>
                <div class="rating-center__items_bottom-pagin">
                    <a href="#" class="rating-center__items_bottom-arrow">
                        <img src="/upload/rating/pagin-arrow-left.svg" alt="img">
                    </a>
                    <div class="rating-center__items_bottom-links">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a class="active" href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">7</a>
                    </div>
                    <a href="#" class="rating-center__items_bottom-arrow">
                        <img src="/upload/rating/pagin-arrow-right.svg" alt="img">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?
if($_SERVER["REMOTE_ADDR"] == "46.147.123.63"){
    echo "<pre>";
    print_r($arResult);
    echo "</pre>";
}
?>