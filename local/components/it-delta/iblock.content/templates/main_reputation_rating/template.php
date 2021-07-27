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

<section class="reputation__rating">
    <div class="container">
        <div class="reputation__rating_top">
            <div class="left">
                <h2><span>Репутационный рейтинг</span> охранных компаний</h2>
                <p class="description">Рейтинг формируется на основании отзывов об охранных организациях,
                    которые пользователи оставляют на платформе <span>vincko:</span></p>
            </div>
            <div class="right">
                <a href="" class="button">СМОТРЕТЬ весь РЕЙТИНГ</a>
            </div>
        </div>
        <div class="reputation__rating-mobil__show">
            <picture>
                <source type="image/png" srcset="<?=SITE_TEMPLATE_PATH?>/img/first__page/raiting/raiting_bg.png">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/first__page/raiting/raiting_bg.png" alt="img">
            </picture>
        </div>
        <div class="reputation__rating_center"
            style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/first__page/raiting/raiting_bg.png);">
            <div class="reputation__rating_center-form">
                <form onchange="return reputationRatingFilter.setFilter();">
                    <select class="reputation__rating_select-js">
                        <? while($city = $cities->GetNext()): ?>
                        <option <?=$_COOKIE['selected_city'] == $city['ID'] ? 'selected' : '';?> value="<?=$city['ID']?>"><?=$city["NAME"]?></option>
                        <? endwhile; ?>
                    </select>
                </form>
            </div>
            <div class="reputation__rating_center-items">
                <?$i = 0?>
                <? foreach($arResult["ITEMS"] as $item): ?>
                <? if($_COOKIE['selected_city'] == $item["PROPERTIES"]["CITY_ID"]["VALUE"]): ?>
                <?++$i?>
                <div class="reputation__rating_center-item <?=($i > 5) ? "hide" : ""?>">
                    <div class="info__block">
                        <div class="item_left">
                            <span class="icon">
                                <? if((100/5)*$item["PROPERTIES"]["CH_RATING_SUM"]["VALUE"] == 100): ?>
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="17" fill="white" stroke="#005DFF" stroke-width="2" />
                                </svg>
                                <? else: ?>
                                <svg width="54" height="44" viewBox="0 0 54 44" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M52 17.0646C52 21.0211 51.0561 24.9209 49.2462 28.4416C47.4363 31.9623 44.8125 35.0029 41.5914 37.3122C38.3704 39.6214 34.6447 41.133 30.7221 41.7221C26.7995 42.3112 22.7927 41.9607 19.0328 40.6998C15.2728 39.4389 11.8677 37.3037 9.09867 34.4706C6.32967 31.6376 4.27634 28.1879 3.10832 24.4068C1.94031 20.6257 1.69115 16.6216 2.38143 12.7254C3.07172 8.82926 4.68163 5.15286 7.07814 2"
                                        stroke="#005DFF" stroke-width="4" />
                                </svg>
                                <? endif; ?>
                            </span>
                            <span class="text"><?=$item["PROPERTIES"]["CH_RATING_SUM"]["VALUE"]?></span>
                        </div>
                        <div class="item_center">
                            <span class="item_center-company_numder"><?=$i?></span>
                            <span class="item_center-company_name"><?=$item["NAME"]?></span>
                            <? if($item["PROPERTIES"]["STATUS"]["VALUE"] == "odobreno"): ?>
                            <span class="icon">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.025 2.83597C20.573 2.74749 21.0883 3.12238 21.1727 3.67109L21.6783 6.95622C21.7266 7.27024 21.9212 7.5426 22.2027 7.69L25.1238 9.21976C25.6045 9.4715 25.7967 10.0606 25.557 10.5474L24.0716 13.5636C23.9341 13.8429 23.9345 14.1703 24.0726 14.4492L25.5646 17.4619C25.8064 17.9501 25.6128 18.5421 25.1293 18.7932L22.1813 20.3239C21.8983 20.4709 21.7023 20.7441 21.6538 21.0593L21.1485 24.3427C21.0641 24.8912 20.5491 25.2661 20.0012 25.1779L16.8161 24.665C16.4951 24.6133 16.1691 24.7208 15.9419 24.9533L13.6829 27.2648C13.2891 27.6677 12.6404 27.6659 12.2488 27.2609L9.97802 24.9123C9.74854 24.6749 9.4167 24.5661 9.09124 24.6215L5.95678 25.1552C5.40668 25.2489 4.88635 24.8742 4.80076 24.3228L4.28608 21.0067C4.23743 20.6932 4.04291 20.4214 3.76188 20.2742L0.866026 18.7575C0.384595 18.5053 0.192677 17.9148 0.433867 17.4278L1.92645 14.414C2.06513 14.134 2.06494 13.8052 1.92592 13.5253L0.445508 10.5449C0.204321 10.0594 0.393996 9.47006 0.873127 9.21634L3.80158 7.66559C4.08056 7.51786 4.2734 7.24707 4.32178 6.93511L4.82504 3.69026C4.91055 3.13896 5.43063 2.76424 5.98065 2.85764L9.12653 3.39189C9.45248 3.44725 9.78473 3.33791 10.0141 3.09981L12.2837 0.744012C12.6755 0.33727 13.3263 0.335525 13.7203 0.740159L15.9778 3.05842C16.2051 3.29186 16.5319 3.39991 16.8536 3.34798L20.025 2.83597Z"
                                        fill="white" />
                                    <path
                                        d="M17.5486 6.07827C18.1 5.98643 18.6195 6.36434 18.702 6.91716L18.9875 8.831C19.0339 9.14233 19.2242 9.41363 19.5011 9.56327L21.1548 10.4568C21.6236 10.7101 21.8115 11.2865 21.5819 11.7673L20.7201 13.5729C20.5897 13.8461 20.5901 14.1636 20.721 14.4364L21.586 16.2384C21.8176 16.7208 21.6284 17.3 21.1567 17.5527L19.4873 18.4471C19.2087 18.5963 19.0171 18.8684 18.9704 19.181L18.6852 21.0931C18.6028 21.6457 18.0835 22.0236 17.5323 21.932L15.8119 21.6462C15.4841 21.5917 15.1506 21.7037 14.922 21.945L13.7049 23.2299C13.309 23.6479 12.6428 23.6461 12.2492 23.226L11.0239 21.9184C10.7931 21.6721 10.4536 21.5589 10.1212 21.6173L8.44079 21.9125C7.88735 22.0097 7.36248 21.632 7.27889 21.0763L6.98799 19.1425C6.94123 18.8317 6.75106 18.561 6.47453 18.4115L4.8386 17.5275C4.3691 17.2738 4.18155 16.6961 4.41249 16.215L5.27806 14.4118C5.40954 14.1378 5.40936 13.819 5.27756 13.5452L4.42041 11.7648C4.18949 11.2852 4.37481 10.7087 4.84196 10.4535L6.50314 9.54589C6.77759 9.39594 6.96608 9.12624 7.01257 8.81698L7.29575 6.93316C7.37926 6.37762 7.90388 5.99986 8.45723 6.09682L10.1453 6.3926C10.4783 6.45094 10.8181 6.33714 11.0488 6.09009L12.273 4.77905C12.6669 4.35725 13.335 4.35546 13.7311 4.77515L14.9468 6.06314C15.1755 6.3054 15.5097 6.4179 15.8383 6.36316L17.5486 6.07827Z"
                                        fill="#35A34A" />
                                    <path
                                        d="M15.8291 12.1756L11.9491 15.5573L10.1709 14.0073C9.90306 13.7739 9.46876 13.7739 9.2009 14.0073C8.93303 14.2407 8.93303 14.6192 9.2009 14.8527L11.4641 16.8254C11.5928 16.9375 11.7672 17.0005 11.9491 17.0005C11.9491 17.0005 11.9491 17.0005 11.9491 17.0005C12.131 17.0005 12.3055 16.9375 12.4341 16.8254L16.7991 13.021C17.067 12.7876 17.067 12.4091 16.7991 12.1756C16.5312 11.9421 16.097 11.9421 15.8291 12.1756Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="item_right">
                        <span class="item_right--pseudo" style="width: <?=(100/5)*$item["PROPERTIES"]["CH_RATING_SUM"]["VALUE"]?>%;">
                            <span class="text"><?=$item["PROPERTIES"]["CH_RATING_SUM"]["VALUE"]?></span>
                        </span>
                    </div>
                </div>
                <? endif; ?>
                <? endforeach; ?>
            </div>
            <div class="show__more">
                <span class="button">Еще 5 компаний...</span>
            </div>
        </div>
        <div class="reputation__rating_bottom">
            <p class="top">
                <span class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.7876 2.45603C18.337 2.36618 18.854 2.74232 18.9376 3.29273L19.3326 5.89268C19.3801 6.2056 19.573 6.47755 19.8526 6.62587L22.137 7.83773C22.6128 8.09013 22.8032 8.67398 22.5677 9.15834L21.3968 11.5669C21.2623 11.8436 21.2627 12.1669 21.3978 12.4433L22.5736 14.8482C22.8111 15.3341 22.6193 15.9207 22.1407 16.1725L19.835 17.3853C19.5538 17.5332 19.3596 17.806 19.3119 18.1201L18.9172 20.7183C18.8336 21.2685 18.3168 21.6447 17.7675 21.5551L15.3129 21.1547C14.9891 21.1018 14.66 21.2112 14.4322 21.4473L12.6929 23.25C12.2982 23.6591 11.6424 23.6574 11.2499 23.2462L9.5007 21.4135C9.27066 21.1725 8.93568 21.0618 8.60734 21.1185L6.19799 21.534C5.64651 21.6291 5.12431 21.2532 5.03956 20.7L4.6373 18.0746C4.58943 17.7622 4.3967 17.4908 4.11751 17.3426L1.85463 16.1421C1.37813 15.8893 1.18801 15.3041 1.42492 14.8195L2.60128 12.4133C2.73695 12.1358 2.73676 11.8112 2.60076 11.5338L1.43471 9.15585C1.1978 8.67271 1.38568 8.08872 1.85986 7.83436L4.15166 6.60499C4.42879 6.45633 4.61984 6.18597 4.66743 5.87511L5.06013 3.31028C5.1448 2.75723 5.66675 2.38124 6.21815 2.4761L8.63706 2.89223C8.9659 2.9488 9.30128 2.83763 9.53122 2.59585L11.2793 0.757841C11.672 0.344903 12.3299 0.34314 12.7248 0.753966L14.4625 2.56166C14.6904 2.79873 15.0203 2.9086 15.3449 2.85552L17.7876 2.45603Z"
                            fill="#35A34A" />
                        <path
                            d="M15.6828 9.21009L11.3178 13.2681L9.31723 11.4082C9.01594 11.1281 8.52735 11.128 8.22601 11.4081C7.92466 11.6883 7.92466 12.1425 8.22601 12.4226L10.7721 14.7899C10.9168 14.9244 11.1131 15 11.3177 15C11.3178 15 11.3177 15 11.3178 15C11.5224 15 11.7187 14.9244 11.8634 14.7899L16.774 10.2246C17.0753 9.94448 17.0753 9.4903 16.774 9.21014C16.4727 8.92999 15.9841 8.92994 15.6828 9.21009Z"
                            fill="white" />
                    </svg>
                </span>
                <span class="text">Одобренные компании</span>
            </p>
            <p class="bottom">
                При заказе услуг компаний, одобренных <span>vincko:</span> вы получаете
                наши <a href="">гарантии</a> и подарки.
            </p>
        </div>
    </div>
</section>