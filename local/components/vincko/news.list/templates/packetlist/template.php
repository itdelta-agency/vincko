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
<div class="packets__list">
	<div class="packets__flex">
		<div class="packets__sort">Город: <a class="sort__icon-arrow-bot" href="#">Краснодар</a></div>
		<div class="packets__filter-switcher">
			<label class="label__switcher inline-block" for="filter-p-discount">Есть акции <input type="checkbox" id="filter-p-discount"><div class="label__switcher-slider"></div></label>
		</div>
		<div class="packets__filter-switcher">
			<label class="label__switcher inline-block" for="filter-p-equipment">С оборудованием <input type="checkbox" id="filter-p-equipment"><div class="label__switcher-slider"></div></label>
		</div>
		<div class="packets__filter-switcher">
			<label class="label__switcher inline-block" for="filter-p-abonplata">С абонплатой <input type="checkbox" id="filter-p-abonplata"><div class="label__switcher-slider"></div></label>
		</div>
		<div class="packets__filter-switcher">
			<label class="label__switcher inline-block" for="filter-p-strahovka">Со страховкой <input type="checkbox" id="filter-p-strahovka"><div class="label__switcher-slider"></div></label>
		</div>
	</div>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="good__item">
		<div class="good__item-pic">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>">
		</div>
		<div class="good__item-data">
			<div class="good__item-info">
				<div class="good__item-title"><?echo $arItem["NAME"]?></div>
				<div class="good__item-description"><?echo $arItem["PREVIEW_TEXT"];?></div>
				<div class="good__item-complect">
					<div class="good__item-complect-item">
						<div class="good__item-complect-item-title">Базовый комплект:</div>
						<div class="good__item-complect-item-values">
							<div class="good__item-complect-item-val">AJAX SmartHome</div>
						</div>
					</div>
					<div class="good__item-complect-item">
						<div class="good__item-complect-item-title">Абонплата:</div>
						<div class="good__item-complect-item-values">
							<div class="good__item-complect-item-val">3 мес - 500 руб.</div>
							<div class="good__item-complect-item-val">6 мес - 1000 руб.</div>
							<div class="good__item-complect-item-val">12 мес - 1500 руб.</div>
						</div>
					</div>
					<div class="good__item-complect-item">
						<div class="good__item-complect-item-title">Страховка:</div>
						<div class="good__item-complect-item-values">
							<div class="good__item-complect-item-val">12 мес - 1500 руб.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="good__item-price">
				<div class="good__item-startprice">от 47 630 ₽</div>
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
