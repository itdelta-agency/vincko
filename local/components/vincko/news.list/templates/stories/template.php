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

<?/*<div class="main__article-item">
	<div class="main__article-item-pic"></div>
	<div class="main__article-item-title">Как составляются рейтинги?</div>
</div>*/?>
<?/*CFile::ResizeImageGet($idpo["PREVIEW_PICTURE"], array("width" => 24, "height" => 30), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false)*/?>
	
<div class="main__articles-block">
	<div id="stories-main" class="main__story">
	<?foreach($arResult["ITEMS"] as $k => $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="main__story-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<img src="<?=$arItem["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["MINI"]?>" alt="<?=$arItem["NAME"]?>">
			<?/*<a href="#stories<?=$k?>" uk-toggle><img src="<?=$arItem["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["MINI"]?>" alt="<?=$arItem["NAME"]?>"></a>*/?>
		</div>
	<?endforeach;?>
	</div>
	<div class="clear"></div>
</div>
<?/*
<?foreach($arResult["ITEMS"] as $i => $arItem):?>
<div id="stories<?=$i?>" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
			<ul class="uk-slider-items">
				<li>
					<img src="<?=$arItem["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["MINI"]?>" alt="">
				</li>
				<li>
					<img src="<?=$arItem["DISPLAY_PROPERTIES"]["PZ_PIC"]["FILE_VALUE"][0]["MINI"]?>" alt="">
				</li>
			</ul>
		</div>
    </div>
</div>
<?endforeach;?>
*/?>