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

//echo '<pre>';
//print_r($arResult);
//echo '</pre>';

?>

<div class="header__bottom">
    <div class="container">
        <div class="header__bottom-form">
            <form id="b-header_filter" method="post">
                <span class="text">Я хочу охранять</span>
                <div class="header__bottom-form-select">
                    <select name="selected_estate" id="header__select_town-js">
                        <?php foreach ($arResult['ESTATES'] as $item):?>
                        <option <?=$_COOKIE['selected_estate']==$item['ID'] ? 'selected':'';?> value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <span class="text">где</span>
                <div class="header__bottom-form-select location">
                    <select name="selected_city" id="header__select_location-js">
                        <?php foreach ($arResult['ITEMS'] as $item):?>
                            <option <?=$_COOKIE['selected_city']==$item['ID'] ? 'selected':'';?> value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="header__bottom-form-btn">
                    <input onclick='return HeaderFilter.setFilter()' type="submit" value="НАЙТИ КОМПАНИЮ">

                </div>
            </form>
        </div>
    </div>
</div>