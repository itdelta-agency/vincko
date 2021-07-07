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
//print_r ($arResult["ITEMS"]);die;
?>
<div class="lk-columns">
	<div class="wrap">
		<div class="lk-columns__left">
			<ul class="lk-menu">
				<li><a class="active" href="#">Заказы и заявки</a></li>
				<li><a href="/lk/prof/">Мои данные</a></li>
				<li><a href="/lk/bonuses/">Бонусный счет</a></li>
			</ul>
		</div>
		<div class="lk-columns__right">
			<div class="lk-orders">
				<div class="lk-orders__header">
					<ul class="lk-orders__tab">
						<li class="inline-block"><a href="/lk/orders/">Все заказы</a></li>
						<li class="inline-block"><a class="active" href="/lk/zayavka/">Индивидуальные заявки</a></li>
						<li class="inline-block"><a href="/zayavka/">Новая заявка</a></li>
					</ul>
				</div>
				<div class="lk-orders__list">
					<div class="lk-izayavka">
						<?foreach($arResult["ITEMS"] as $arItem):?>
						<div class="lk-izayavka__item">
							<div class="lk-izayavka__data">
								<div class="lk-izayavka__data-title">Заявка <?=$arItem["ID"]?></div>
								<div class="lk-izayavka__data-ohrana-type"><?=$arItem["DISPLAY_PROPERTIES"]["IND_OHRANA"]["LINK_ELEMENT_VALUE"][$arItem["DISPLAY_PROPERTIES"]["IND_OHRANA"]["VALUE"]]["NAME"]?></div>
								<?foreach ($arItem["DISPLAY_PROPERTIES"]["IND_CHOP"]["LINK_ELEMENT_VALUE"] as $chopItem):?>
								<div class="lk-izayavka__data-chop"><?=$chopItem["NAME"]?></div>
								<?endforeach;?>
								<div class="lk-izayavka__data-date">от <?echo FormatDateFromDB($arItem["DATE_CREATE"], "DD MMMM YYYY");?></div>
							</div>
							<div class="lk-izayavka__status">
								<div class="lk-izayavka__status-text <?if ($arItem["DISPLAY_PROPERTIES"]["IND_STATUS"]["VALUE_ENUM_ID"] == 53){?>lk-izayavka__status-end<?}else{?>lk-izayavka__status-work<?}?> inline-block"><?=$arItem["DISPLAY_PROPERTIES"]["IND_STATUS"]["DISPLAY_VALUE"]?></div>
							</div>
						</div>
						<?endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>