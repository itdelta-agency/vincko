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
<div class="complect-item">
			<div class="complect-item__pic">
				<a href="#"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>"></a>
			</div>
			<div class="complect-item__text">
				<h1><?=$arResult["NAME"]?></h1>
				<div class="complect-item__announce"><?=$arResult["FIELDS"]["PREVIEW_TEXT"]?></div>
				<div class="complect-item__brand">Бренд: <span>AJAX</span></div>
				<div class="complect-item__description">
					<?echo $arResult["DETAIL_TEXT"];?>
				</div>
			</div>
			<div class="complect-item__data">
				<div class="complect-item__data-price">19 850 р.</div>
				<div class="complect-item__data-bonus">
					<div class="complect-item__data-bonus-item">Бесплатная доставка</div>
					<div class="complect-item__data-bonus-item">Может, что-то еще</div>
					<div class="complect-item__data-bonus-item">Бесплатная доставка</div>
					<div class="complect-item__data-bonus-item">Может, что-то еще</div>
				</div>
				<a href="#" class="complect-item__data-link">Выбрать пакеты услуг</a>
			</div>
		</div>
<div class="complect-item__options">
			<div class="complect-item__property good__item-property-auto">Автоматизирует безопасность сценариями</div>
			<div class="complect-item__property good__item-property-photo">Подключается к пульту охранной компании</div>
			<div class="complect-item__property good__item-property-wifi">Присылает анимированную серию фотографий</div>
			<div class="complect-item__property good__item-property-light">Всегда онлайн благодаря трем каналам связи</div>
			<div class="complect-item__property good__item-property-auto">Автоматизирует безопасность сценариями</div>
			<div class="complect-item__property good__item-property-light">Всегда онлайн благодаря трем каналам связи</div>
		</div>
		
		<div class="complect-item__ob">
			<div class="h1-title">Комплектация</div>
			<div class="complect-item__ob-list">
				<div class="complect-item__ob-item">
					<div class="complect-item__ob-item-pic">
						<img src="/upload/images/ex/ex-complect1.png" alt="">
					</div>
					<div class="complect-item__ob-item-info">
						<div class="complect-item__ob-item-title">Панель управления</div>
						<div class="complect-item__ob-item-description">Помогает защитить входную группу от вторжения через окна и двери</div>
					</div>
				</div>
				<div class="complect-item__ob-item">
					<div class="complect-item__ob-item-pic">
						<img src="/upload/images/ex/ex-complect2.png" alt="">
					</div>
					<div class="complect-item__ob-item-info">
						<div class="complect-item__ob-item-title">Датчик движения</div>
						<div class="complect-item__ob-item-description">Помогает защитить входную группу от вторжения через окна и двери</div>
					</div>
				</div>
				<div class="complect-item__ob-item">
					<div class="complect-item__ob-item-pic">
						<img src="/upload/images/ex/ex-complect3.png" alt="">
					</div>
					<div class="complect-item__ob-item-info">
						<div class="complect-item__ob-item-title">Брелок управления</div>
						<div class="complect-item__ob-item-description">Помогает защитить входную группу от вторжения через окна и двери</div>
					</div>
				</div>
				<div class="complect-item__ob-item">
					<div class="complect-item__ob-item-pic">
						<img src="/upload/images/ex/ex-complect4.png" alt="">
					</div>
					<div class="complect-item__ob-item-info">
						<div class="complect-item__ob-item-title">Датчик открытия двери</div>
						<div class="complect-item__ob-item-description">Помогает защитить входную группу от вторжения через окна и двери</div>
					</div>
				</div>
			</div>
		</div>