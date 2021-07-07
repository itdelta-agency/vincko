<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div id="slider-main" class="promo-main__bb">
<?foreach($arResult["ITEMS"] as $k => $arItem):?>
<div class="promo-main__bb-item promo-main__bb-item-blue<?if ($k==0):?> loaded<?endif;?>" id="js-mainslide<?=$arItem['ID'];?>">
	<a href="<?=$arItem["DISPLAY_PROPERTIES"]["S_LINK"]["VALUE"]?>" class="absolute-link"><?=$arItem["DISPLAY_PROPERTIES"]["S_TITLE"]["VALUE"]?></a>
	<div class="promo-main__bb-pic"><img<?if ($k == 0){?> data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"<?}else{?> data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" src="#"<?}?> id="js-mainslidepic<?=$k?>" <?/*srcset="/upload/images/main-banner1@2x.png 2x"*/?> alt="<?=$arItem["DISPLAY_PROPERTIES"]["S_TITLE"]["VALUE"]?>"></div>
	<div class="promo-main__bb-text">
		<?if ($arItem["DISPLAY_PROPERTIES"]["S_TITLE"]["VALUE"]):?><div class="promo-main__bb-text-title"><?=$arItem["DISPLAY_PROPERTIES"]["S_TITLE"]["VALUE"]?></div><?endif;?>
		<div class="promo-main__bb-text-announce"><?=$arItem["PREVIEW_TEXT"]?></div>
	</div>
	<div class="promo-main__bb-linkwrap">
		<a href="<?=$arItem["DISPLAY_PROPERTIES"]["S_LINK"]["VALUE"]?>" class="promo-main__bb-link inline-block">Подробнее</a>
	</div>
</div>
<?endforeach;?>
</div>