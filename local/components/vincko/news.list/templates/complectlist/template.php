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
<div class="complects__list">
	<div class="complects__sort">
		<div class="complects__sort-left">Бренд: <a class="sort__icon-arrow-bot" href="#">AJAX</a></div>
		<div class="complects__sort-right">Сортировка: <a class="sort__icon-arrow-bot" href="#">цена</a></div>
	</div>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="good__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="good__item-pic">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?echo $arItem["NAME"]?>">
		</div>
		<div class="good__item-data">
			<div class="good__item-info">
				<div class="good__item-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
				<div class="good__item-description"><?echo $arItem["PREVIEW_TEXT"];?></div>
				<div class="good__item-props">
					<div class="good__item-property good__item-property-auto">Автоматизирует безопасность сценариями</div>
					<div class="good__item-property good__item-property-photo">Подключается к пульту охранной компании</div>
					<div class="good__item-property good__item-property-wifi">Присылает анимированную серию фотографий</div>
					<div class="good__item-property good__item-property-light">Всегда онлайн благодаря трем каналам связи</div>
					<div class="good__item-property good__item-property-auto">Автоматизирует безопасность сценариями</div>
				</div>
			</div>
			<div class="good__item-price">
				<div class="good__item-startprice">от 19 990 ₽</div>
				<div class="good__item-discount">
					<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
					<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
					<div class="good__item-discount-item">скидка 10% при покупке абонплаты</div>
				</div>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="good__item-link">Подробнее</a>
			</div>
		</div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
