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
<?foreach($arResult["ITEMS"] as $arItem):?>
<div class="izayavka__chop-item" id="js-izayavka-chop<?=$arItem["ID"]?>">
	<input type="hidden" name="iz_chop[<?=$arItem["ID"]?>]" value="<?=$arItem["ID"]?>">
	<div class="izayavka__chop-item-row">
		<div class="izayavka__chop-item-name"><?=$arItem["NAME"]?></div>
		<div class="izayavka__chop-item-flex">
			<div class="izayavka__chop-item-rate-flex">
				<div class="izayavka__chop-item-rate">
					<div class="izayavka__chop-item-rate-block izayavka__chop-item-rate-block-blue"><?=number_format((float)$arItem["DISPLAY_PROPERTIES"]["CH_RATING_SUM"]["VALUE"],1,'.','');?></div>
					<div class="izayavka__chop-item-rate-place"><?=$arItem["DISPLAY_PROPERTIES"]["CITY_ID"]["LINK_ELEMENT_VALUE"][$arItem["DISPLAY_PROPERTIES"]["CITY_ID"]["VALUE"]]["NAME"]?></div>
				</div>
				<div class="izayavka__chop-item-rate">
					<div class="izayavka__chop-item-rate-block"><?=$arItem["CH_ALL"]?></div>
					<div class="izayavka__chop-item-rate-place">по России</div>
				</div>
			</div>
			<div class="izayavka__chop-item-remove">
				<a href="#" data-id="<?=$arItem["ID"]?>" class="js-izayavka-remove izayavka__chop-item-delete">Удалить</a>
			</div>
		</div>		
	</div>
</div>
<?endforeach;?>