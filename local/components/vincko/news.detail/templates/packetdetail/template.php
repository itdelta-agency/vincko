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
<div class="packet__promo">
	<div class="packet__promo-pic">
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>">
	</div>
	<div class="packet__promo-text">
		<h1><?=$arResult["NAME"]?></h1>
		<div class="packet__promo-announce"><?=$arResult["FIELDS"]["PREVIEW_TEXT"]?></div>
	</div>
</div>
<div class="packet__config-title">Конфигурация пакета</div>
<div class="packet__config-flex">
		<div class="packet__config">
			<div class="packet__config-item">
				<div class="packet__switcher">
					<label class="packet__label-switcher inline-block" for="packet-complect"><input type="checkbox" id="packet-complect" checked><div class="packet__label-switcher-slider"></div></label>
				</div>
				<div class="packet__config-item-flex">
					<div class="packet__config-item-left">
						<div class="packet__config-item-title">Комплект оборудования</div>
						<div class="packet__config-item-name">AJAX SmartHome</div>
						<a href="#" class="packet__config-item-name-link">Подробнее о комплекте</a>
					</div>
					<div class="packet__config-item-mid">
						<div class="packet__config-item-mid-text">Защитит входную группу от вторжения через окна и двери, позволяет видеть объект в реальном режиме по видеонаблюдению, определит за долю секунды возникающую протечку</div>
					</div>
					<div class="packet__config-item-right">
						<div class="packet__config-item-price">20 630 ₽<span class="packet__config-item-price-old">50 630 ₽</span></div>
						<div class="packet__config-item-discount">скидка 10% при покупке абонплаты</div>
					</div>
				</div>
				<div class="packet__config-item-title-invisible">Комплект оборудования</div>
			</div>
			<div class="packet__config-item">
				<div class="packet__switcher">
					<label class="packet__label-switcher inline-block" for="packet-chop"><input type="checkbox" id="packet-chop" checked><div class="packet__label-switcher-slider"></div></label>
				</div>
				<div class="packet__config-item-flex">
					<div class="packet__config-item-left">
						<div class="packet__config-item-title">Услуги охранной компании</div>
						<div class="packet__config-item-name">&laquo;Единый ЧОП мониторинг объектов&raquo;</div>
						<div class="packet__config-item-gray">г. Краснодар</div>
						<a href="#" class="packet__config-item-another-chop inline-block">Выбрать другую</a>
					</div>
					<div class="packet__config-item-mid">
						<div class="packet__config-item-selecter">
							<div class="packet__config-select">
								<input type="radio" class="input__radio inline-block" id="chop-service1" name="chop-service"><label for="chop-service1" class="packet__label-radio">3 мес - 500 руб. <span class="packet__label-radio-gray">1.5руб/день</span></label>
								<input type="radio" class="input__radio inline-block" id="chop-service2" name="chop-service"><label for="chop-service2" class="packet__label-radio">6 мес - 1000 руб. <span class="packet__label-radio-gray">1.5руб/день</span></label>
								<input type="radio" class="input__radio inline-block" id="chop-service3" name="chop-service"><label for="chop-service3" class="packet__label-radio">12 мес - 1500 руб. <span class="packet__label-radio-gray">1.5руб/день</span></label>
							</div>
						</div>
					</div>
					<div class="packet__config-item-right">
						<div class="packet__config-item-price">1500 ₽<span class="packet__config-item-price-old">2500 ₽</span></div>
						<div class="packet__config-item-discount">скидка 50% при покупке оборудования и страховки</div>
					</div>
				</div>
			<div class="packet__config-item-title-invisible">Услуги охранной компании</div>
		</div>
		<div class="packet__config-item">
			<div class="packet__switcher">
				<label class="packet__label-switcher inline-block" for="packet-strahovka"><input type="checkbox" id="packet-strahovka" checked><div class="packet__label-switcher-slider"></div></label>
			</div>
			<div class="packet__config-item-flex">
				<div class="packet__config-item-left">
					<div class="packet__config-item-title">Страхование</div>
					<div class="packet__config-item-name">Страховая выплата при хищении или разрушении имущества в размере 2 млн. руб.</div>
					<a href="#" class="packet__config-item-name-link">Подробнее о страховке</a>
				</div>
				<div class="packet__config-item-mid">
					<div class="packet__config-item-selecter">
						<input type="radio" class="input__radio inline-block" id="strahovka-service1" name="strahovka-service"><label for="strahovka-service1" class="packet__label-radio">1 000 000 страховая сумма</label>
						<input type="radio" class="input__radio inline-block" id="strahovka-service2" name="strahovka-service"><label for="strahovka-service2" class="packet__label-radio">2 000 000 страховая сумма</label>
						<input type="radio" class="input__radio inline-block" id="strahovka-service3" name="strahovka-service"><label for="strahovka-service3" class="packet__label-radio">3 000 000 страховая сумма</label>
					</div>
				</div>
				<div class="packet__config-item-right">
					<div class="packet__config-item-price">20 000 ₽<span class="packet__config-item-price-old">30 000 ₽</span></div>
					<div class="packet__config-item-discount">скидка 25% на стоимость страховки при покупке абонплаты на 25 месяцев и оборудования</div>
				</div>
			</div>
			<div class="packet__config-item-title-invisible">Страхование</div>
		</div>
	</div>
	<div class="packet__price">
		<div class="packet__price-itogo">Итого</div>
		<div class="packet__price-value">20 630 ₽<span class="packet__price-value-old">50 630 ₽</span></div>
		<div class="packet__price-abonplata-info">
			абонплата <span>3 мес х 100 руб.</span> по выбранной опции производится непосредственно охранной компании при заключении договора охранных услуг
		</div>
		<a href="#" class="packet__price-linkgo">Подключить охрану</a>
		<div class="packet__price-summary">В пакет входит:</div>
		<div class="packet__price-summary-list">
			<div class="packet__price-summary-row">
				<div class="packet__price-summary-title">Комплект оборудования AJAX SmartHome</div>
				<div class="packet__price-summary-value">20 630</div>
			</div>
			<div class="packet__price-summary-row">
				<div class="packet__price-summary-title">«Единый ЧОП мониторинг объектов» 12 мес </div>
				<div class="packet__price-summary-value">по договору</div>
			</div>
			<div class="packet__price-summary-row">
				<div class="packet__price-summary-title">Страховая выплата при хищении или разрушении имущества в размере 2 млн. руб.</div>
				<div class="packet__price-summary-value">1000</div>
			</div>
		</div>
	</div>
</div>