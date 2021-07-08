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
//
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>
<style>
    .packages-container {
        display: flex;
        text-align: center;
        justify-content: center;
        flex-flow: column;
    }
    .packages-container__item {
        margin: 25px 25px;
    }
    .packages-variants {
        display: flex;
    }
</style>
<div class="packages-container">
    <?php foreach ($arResult['SECTIONS'] as $section):?>
    <div class="packages-container__item">
        <img class="packages-image" src="<?=$section['PICTURE_SRC']?>" alt="">
        <div class="packages-title"><?=$section['NAME']?></div>
        <div class="packages-description"><?=$section['DESCRIPTION']?></div>
            <div class="packages-variants">
                <?php foreach ($section['ITEMS'] as $item):?>
                <div class="packages-variants__item">
                    <img class="packages-variant-image" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
                    <div class="packages-variant-title"><?=$item['NAME']?></div>
                    <div class="packages-variant-description"><?=$item['PREVIEW_TEXT']?></div>
                </div>
                <?php endforeach;?>
            </div>

    </div>
    <?php endforeach;?>
</div>
