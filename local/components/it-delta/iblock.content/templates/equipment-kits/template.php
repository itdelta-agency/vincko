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
    .equipmnet-kits {
        display: flex;
        text-align: center;
        justify-content: center;
        flex-flow: column;
    }
    .equipmnet-kits__item {
        margin: 25px 25px;
    }
    .equipmnet-kits-variants {
        display: flex;
    }
</style>
<div class="equipmnet-kits">
    <?php foreach ($arResult['SECTIONS'] as $section):?>
    <?if(!empty($section['EQUIPMENT-KITS'])):?>
    <div class="equipmnet-kits__item">
        <div class="equipmnet-kits-title"><?=$section['NAME']?></div>
            <div class="equipmnet-kits-variants">
                <?php foreach ($section['EQUIPMENT-KITS'] as $item):?>
                <div class="equipmnet-kits-variants__item">
                    <div class="equipmnet-kits-variant-title"><?=$item['NAME']?></div>
                    <img class="equipmnet-kits-variant-image" src="<?=$item['PICTURE_SRC']?>" alt="">
                    <div class="equipmnet-kits-variant-description"><?=$item['PREVIEW_TEXT']?></div>
                </div>
                <?php endforeach;?>
            </div>

    </div>
    <?endif;?>
    <?php endforeach;?>
</div>
