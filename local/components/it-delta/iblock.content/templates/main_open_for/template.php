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

<section class="open__for">
    <div class="container">
        <h2>Откройте для себя <span>vincko:</span></h2>
        <ul class="open__for-items">
            <? foreach($arResult["ITEMS"] as $elementId => $params): ?>
            <li class="open__for-item">
                <a href="<?=$params["PROPERTIES"]["S_LINK"]["VALUE"]?>">
                    <p class="top">
                        <span class="icon">
                            <picture>
                                <source type="image/webp" srcset="<?=CFile::GetPath($params["PROPERTIES"]["PREVIEW_PICTURE_WEBP"]["VALUE"])?>">
                                <source type="image/png" srcset="<?=$params["PREVIEW_PICTURE"]["SRC"]?>">
                                <img src="<?=$params["PREVIEW_PICTURE"]["SRC"]?>" alt="alt" loading="lazy">
                            </picture>
                        </span>
                        <span class="text"><?=$params["PROPERTIES"]["TITLE_BLOCK"]["~VALUE"]["TEXT"]?></span>
                        <span class="link"><?=$params["PROPERTIES"]["S_BUTTON_TEXT"]["VALUE"]?></span>
                    </p>
                    <? if($params["PREVIEW_TEXT"]): ?>
                    <p class="text__adout">
                        <?=$params["PREVIEW_TEXT"]?>
                    </p>
                    <?endif;?>
                </a>
            </li>
            <? endforeach; ?>
        </ul>
    </div>
</section>