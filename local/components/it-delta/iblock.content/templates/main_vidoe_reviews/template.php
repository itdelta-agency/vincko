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
?>

<section class="about__us">
    <div class="container">
        <h2>Что говорят <span>наши клиенты</span></h2>
        <div class="about__us_items about__us_slider-js">
            <? foreach($arResult["ITEMS"] as $item): ?>
            <div class="item__video">
                <div class="item__video_top">
                    <? $userName = CUser::GetByID($item["PROPERTIES"]["USER_ID_VIDEO"]["VALUE"])->fetch(); ?>
                    <span class="name"><?=$userName["NAME"].' '.$userName["LAST_NAME"];?></span>
                    <span class="position">покупатель</span>
                </div>
                <div class="item__video_img">
                    <div class="item__video_img--pseudo"></div>
                    <picture>
                        <source type="image/webp" srcset="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
                        <source type="image/png" srcset="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
                        <img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="img" loading="lazy">
                    </picture>
                </div>
                <a data-fancybox href="<?=$item["PROPERTIES"]["LINK_VIDEO"]["VALUE"]?>">
                    <div class="item__video_btn">
                        <span class="item__video_btn--btn_circle">
                            <span class="item__video_btn--btn_icon">
                                <svg width="21" height="25" viewBox="0 0 21 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.500002 0.879492L20.0225 12.5L0.500001 24.1205L0.500002 0.879492Z"
                                        stroke="white" />
                                </svg>
                            </span>
                        </span>
                    </div>
                </a>
                <div class="item__video_description">
                    <? $company = CIBlockElement::GetList(array("SORT"=>"ASC"), array("ID" => $item["PROPERTIES"]["CHOP_IN_VIDEO"]["VALUE"]), false, false, array("NAME", "PROPERTY_CITY_ID"))->fetch();?>
                    <? $cityCompany = CIBlockElement::GetList(array("SORT"=>"ASC"), array("ID" => $company["PROPERTY_CITY_ID_VALUE"]), false, false, array("NAME"))->fetch();?>
                    <span class="company_name"><?=$company["NAME"]?></span>
                    <span class="company_city"><?=$cityCompany["NAME"]?></span>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</section>