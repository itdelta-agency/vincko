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

<section class="equipment__manufacturers">
    <div class="container">
        <h2><span>Производители</span> оборудования</h2>
        <div class="equipment__manufacturers_items equipment__manufacturers_slider-js">
            <? foreach($arResult["ITEMS"] as $item): ?>
            <div class="equipment__manufacturers_item">
                <div class="item__content">
                    <div class="item__top">
                        <div class="item__top_img">
                            <picture>
                                <source type="image/webp" srcset="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
                                <source type="image/png" srcset="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
                                <img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="img" loading="lazy">
                            </picture>
                        </div>
                        <div class="item__top_about">
                            <span><?=$item["PROPERTIES"]["TEXT_ABOUT_COMPANY"]["~VALUE"]["TEXT"]?></span>
                        </div>
                    </div>
                    <div class="item__review">
                        <div class="item__review_name">
                            <span><?=$item["PROPERTIES"]["APPLYING"]["VALUE"]?></span>
                        </div>
                        <div class="item__review_position">
                            <span><?=$item["PROPERTIES"]["POSITION_APPLICANT"]["VALUE"]?></span>
                        </div>
                        <? if($item["PROPERTIES"]["TEXT_APPLICANT"]["~VALUE"]["TEXT"]): ?>
                        <div class="item__review_text">
                            <span class="icon">
                                <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 10L2.85714 0H7.41497L6.22449 10H0ZM7.58503 10L10.4422 0H15L13.8095 10H7.58503Z"
                                        fill="#005DFF" />
                                </svg>
                            </span>
                            <p><?=$item["PROPERTIES"]["TEXT_APPLICANT"]["~VALUE"]["TEXT"]?></p>
                        </div>
                        <? endif; ?>
                    </div>
                </div>
                <? if($item["PROPERTIES"]["TEXT_APPLICANT"]["~VALUE"]["TEXT"]): ?>
                <div class="item__video">
                    <div class="item__video_img">
                        <div class="item__video_img--pseudo"></div>
                        <picture>
                            <source type="image/webp" srcset="<?=CFile::GetPath($item["PROPERTIES"]["PHOTO_FOR_VIDEO"]["VALUE"])?>">
                            <source type="image/png" srcset="<?=CFile::GetPath($item["PROPERTIES"]["PHOTO_FOR_VIDEO"]["VALUE"])?>">
                            <img src="<?=CFile::GetPath($item["PROPERTIES"]["PHOTO_FOR_VIDEO"]["VALUE"])?>" alt="img" loading="lazy">
                        </picture>
                    </div>
                    <a data-fancybox href="<?=$item["PROPERTIES"]["LINK_FOR_VIDEO"]["VALUE"]?>">
                        <div class="item__video_btn">
                            <span class="item__video_btn--btn_circle">
                                <span class="item__video_btn--btn_icon">
                                    <svg width="21" height="25" viewBox="0 0 21 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.500002 0.879492L20.0225 12.5L0.500001 24.1205L0.500002 0.879492Z"
                                            stroke="white" />
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </a>
                    <div class="item__video_description">
                        <span>Видеообращение к покупателям</span>
                    </div>
                </div>
                <? endif; ?>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</section>