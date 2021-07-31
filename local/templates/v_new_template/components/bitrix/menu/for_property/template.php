<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="header__submenu-item header__submenu-item--down">
        <div class="h3">
            Для охраны коммерческой недвижимости
        </div>
        <ul>
            <?
            foreach ($arResult as $arItem):
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <? if ($arItem["SELECTED"]): ?>
                <li><a class="active" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
            <? else: ?>
                <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
            <? endif ?>

            <? endforeach ?>
        </ul>
    </div>
<? endif ?>