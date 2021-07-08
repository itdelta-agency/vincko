<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix component iblock.content (webgsite.ru)
 * Компонент для битрикс, работа с инфоблоком одностраничный вывод
 *
 * @author    Falur <ienakaev@ya.ru>
 * @link      https://github.com/falur/bitrix.com.iblock.content
 * @copyright 2015 - 2016 webgsite.ru
 * @license   GNU General Public License http://www.gnu.org/licenses/gpl-2.0.html
 */

//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>
<style>
    .tasks-container {
        display: flex;
        text-align: center;
        justify-content: center;
    }

    .tasks-container__item {
        margin: 0 25px;
    }
</style>

<div class="tasks-container">
    <?php foreach ($arResult['ITEMS'] as $item):
        $params = $item['PROPERTIES']['PACKAGES']['VALUE']; ?>
        <a href="#0" onclick='return Itd.viewSotulion(<?= json_encode($params) ?>)'>
            <div class="tasks-container__item">
                <img class="tasks-image" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="">
                <div class="task-title"><?= $item['NAME'] ?></div>
                <div class="tasks-description"><?= $item['PREVIEW_TEXT'] ?></div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
