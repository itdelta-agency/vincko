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
CModule::IncludeModule("sale");
$userBonuses = CSaleUserAccount::GetByUserID($USER->GetID(), "BNS");
?>
<div class="lk-columns">
	<div class="lk-columns__left">
		<ul class="lk-menu">
			<li><a href="/lk/orders/">Заказы и заявки</a></li>
			<li><a href="/lk/prof/">Мои данные</a></li>
			<li><a class="active" href="/lk/bonuses/">Бонусный счет</a></li>
		</ul>
	</div>
	<div class="lk-columns__right">
		<div class="lk-orders">
			<div class="lk-orders__header">
				<div class="lk-bonus__ballance">Ваш баланс: <span><?=\SaleFormatCurrency($userBonuses["CURRENT_BUDGET"], $userBonuses["CURRENCY"], true);?> бонусов</span></div>
			</div>
			<div class="lk-orders__list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<div class="lk-bonus__item">
					<div class="lk-bonus__item-data">
						<div class="lk-bonus__item-number">№<?=$arItem["ID"]?></div>
						<div class="lk-bonus__item-date">от <?echo ConvertDateTime($arItem["TIMESTAMP_X"], "DD.MM.YYYY", "ru");?></div>
					</div>
					<div class="lk-bonus__item-comment"><?=$arItem["DISPLAY_PROPERTIES"]["B_COMMENT"]["VALUE"]["TEXT"]?></div>
					<?if ($arItem["DISPLAY_PROPERTIES"]["B_ACTION"]["VALUE"] == "Начисление"){?>
					<div class="lk-bonus__item-count lk-bonus__item-plus">+<?=$arItem["DISPLAY_PROPERTIES"]["B_COUNT"]["VALUE"]?> бонусов</div>
					<?}else{?>
					<div class="lk-bonus__item-count lk-bonus__item-minus">-<?=$arItem["DISPLAY_PROPERTIES"]["B_COUNT"]["VALUE"]?> бонусов</div>
					<?}?>
				</div>
			<?endforeach;?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>