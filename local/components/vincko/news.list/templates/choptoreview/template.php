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
<div class="wrap">
	<h1><?=$APPLICATION->ShowTitle(false);?></h1>
	<div class="filter">
		<form action="/review-add/company/" method="GET">
			<div class="filter__flex">
				<div class="filter__item">
					<div class="filter__item-title">Населенный пункт</div>
					<div class="filter__item-picker">
						<div class="filter__item-picker-place">
							<select name="city" class="filter__select filter__select-place uk-select">
								<option value="">Не выбрано</option>
								<?
								\Bitrix\Main\Loader::includeModule("iblock");
								$cityList = \Bitrix\Iblock\ElementTable::getList(array(
									"order" => array("SORT" => "ASC"),
									"select" => array("ID", "NAME", "IBLOCK_ID"),
									"filter" => array("IBLOCK_ID" => 20, "ACTIVE" => "Y"),
									"group" => array(),
									"limit" => 1000,
									"offset" => 0,
									"cache" => array(
										"ttl" => 3600,
										"cache_joins" => true
									),
								))->fetchAll();
								?>
								<?foreach ($cityList as $aCity):?>
								<option value="<?=$aCity["ID"]?>"<?if ($GLOBALS["GEOCITY"]["ID"] == $aCity["ID"]):?> selected="selected"<?endif;?>><?=$aCity["NAME"]?></option>
								<?endforeach;?>
							</select>
						</div>
					</div>
				</div>
				<div class="filter__item">
					<div class="filter__item-title">Тип охраны</div>
					<div class="filter__item-picker">
						<select name="s" class="filter__select filter__select-type uk-select">
							<option value="">Не выбрано</option>
							<?
							\Bitrix\Main\Loader::includeModule("iblock");
							$ohranaList = \Bitrix\Iblock\ElementTable::getList(array(
								"order" => array("SORT" => "ASC"),
								"select" => array("ID", "NAME", "IBLOCK_ID"),
								"filter" => array("IBLOCK_ID" => 21, "ACTIVE" => "Y"),
								"group" => array(),
									"limit" => 1000,
								"offset" => 0,
								"cache" => array(
									"ttl" => 3600,
									"cache_joins" => true
								),
							))->fetchAll();
							?>
							<?foreach ($ohranaList as $aOhrana):?>
							<option value="<?=$aOhrana["ID"]?>"<?if ($_REQUEST["s"] == $aOhrana["ID"]):?> selected="selected"<?endif;?>><?=$aOhrana["NAME"]?></option>
							<?endforeach;?>
						</select>
					</div>
				</div>
				<div class="filter__item">
					<div class="filter__item-title">Что охраняем</div>
					<div class="filter__item-picker">
						<select name="object" class="filter__select filter__select-object uk-select">
							<option value="">Не выбрано</option>
							<?
							\Bitrix\Main\Loader::includeModule("iblock");
							$realestateList = \Bitrix\Iblock\ElementTable::getList(array(
								"order" => array("SORT" => "ASC"),
								"select" => array("ID", "NAME", "IBLOCK_ID"),
								"filter" => array("IBLOCK_ID" => 19, "ACTIVE" => "Y"),
								"group" => array(),
								"limit" => 1000,
								"offset" => 0,
								"cache" => array(
									"ttl" => 3600,
									"cache_joins" => true
								),
							))->fetchAll();
							?>
							<?foreach ($realestateList as $aEstate):?>
							<option value="<?=$aEstate["ID"]?>"<?if ($_REQUEST["object"] == $aEstate["ID"]):?> selected="selected"<?endif;?>><?=$aEstate["NAME"]?></option>
							<?endforeach;?>
						</select>
					</div>
				</div>
				<div class="filter__item">
					<div class="filter__item-button">
						<input type="submit" class="filter__submit" value="Показать">
					</div>
				</div>
			</div>
		</form>
	</div>
	<?if (!empty($arResult["ITEMS"])){?>
	<div class="chop__list">
		<form id="js-form-submit-onchange" method="GET" action="<?=$APPLICATION->GetCurUri();?>">
			<div class="chop__sort">Сортировка: 
				<div uk-form-custom="target: > * > span:last-child" class="sort__icon-arrow-bot">
					<select name="rate" class="js-packet-filter-reload">
						<option value="">нет</option>
						<option value="ASC"<?if ($_REQUEST["rate"] == "ASC"):?> selected<?endif;?>>рейтинг (по возрастанию)</option>
						<option value="DESC"<?if ($_REQUEST["rate"] == "DESC"):?> selected<?endif;?>>рейтинг (по убыванию)</option>
					</select>
					<span class="uk-link">
						<span></span>
						<span uk-icon="icon: triangle-down"></span>
					</span>
				</div>
			</div>
		</form>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="chop__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="chop__flex">
				<div class="chop__rate">
					<div class="chop__rate-flex">
						<div class="chop__rate-full">
							<div class="chop__rate-item">
								<div class="chop__rate-value chop__rate-value-place"><?=number_format((float)$arItem["DISPLAY_PROPERTIES"]["CH_RATING_SUM"]["VALUE"],1,'.','');?></div>
								<div class="chop__rate-place"><?=$arItem["DISPLAY_PROPERTIES"]["CITY_ID"]["LINK_ELEMENT_VALUE"][$arItem["DISPLAY_PROPERTIES"]["CITY_ID"]["VALUE"]]["NAME"]?></div>
							</div>
							<div class="chop__rate-item">
								<div class="chop__rate-value"><?=$arItem["CH_ALL"]?></div>
								<div class="chop__rate-place">по России</div>
							</div>
						</div>
						<div class="chop__rate-how">Как считается рейтинг?</div>
					</div>
				</div>
				<div class="chop__info">
					<div class="chop__title"><a title="Выбрать" href="/review-add/<?=$arResult["PACKET_CODE"]?>/?op=<?=$arItem["ID"]?>"><?echo $arItem["NAME"]?></a></div>
					<div class="chop__icons">
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_ZABOTA"]["VALUE"]>=8):?>
						<div class="chop__icon-item" title="Забота о клиенте">
							<div class="chop__icon-item-client"></div>
						</div>
						<?endif;?>
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_SPASENIE"]["VALUE"]>=8):?>
						<div class="chop__icon-item" title="Скорость спасения">
							<div class="chop__icon-item-spasenie"></div>
						</div>
						<?endif;?>
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_FINANCE"]["VALUE"]>=8):?>
						<div class="chop__icon-item" title="Финансовая надежность">
							<div class="chop__icon-item-rouble"></div>
						</div>
						<?endif;?>
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_DOGOVOR"]["VALUE"]>=8):?>
						<div class="chop__icon-item" title="Честный договор">
							<div class="chop__icon-item-dogovor"></div>
						</div>
						<?endif;?>
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_RECOMMEND"]["VALUE"]>=8):?>
						<div class="chop__icon-item" title="Рекомендации сотрудников">
							<div class="chop__icon-item-recommend"></div>
						</div>
						<?endif;?>
						<?if ($arItem["DISPLAY_PROPERTIES"]["CH_RATING_SERVICES"]["VALUE"]>=8):?>
						<div class="chop__icon-item" id="Онлайн сервисы">
							<div class="chop__icon-item-online"></div>
						</div>
						<?endif;?>
					</div>
					<?if (!empty($arItem["DISPLAY_PROPERTIES"]["CH_SERVICES"])):?>
					<div class="chop__service">
						<?foreach ($arItem["DISPLAY_PROPERTIES"]["CH_SERVICES"]["VALUE"] as $acr):?>
						<a class="chop__service-item inline-block"><?=$arItem["DISPLAY_PROPERTIES"]["CH_SERVICES"]["LINK_ELEMENT_VALUE"][$acr]["NAME"]?></a>
						<?endforeach;?>
					</div>
					<?endif;?>
					<div class="chop__announce">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
					<div class="chop__cities">Присутствует в <a href="#"><?=$arItem["CH_ALL_COUNT"]?> городах</a></div>
				</div>
				<div class="chop__detail">
					<div class="chop__detail-item">
						<div class="chop__detail-title">Стоимость обслуживания</div>
						<div class="chop__detail-value"><?=$arItem["DISPLAY_PROPERTIES"]["CH_SERVICES_PRICE"]["VALUE"]?></div>
					</div>
					<div class="chop__detail-item">
						<div class="chop__detail-title">Подключение и монтаж</div>
						<div class="chop__detail-value"><?=$arItem["DISPLAY_PROPERTIES"]["CH_MONTAZHPODKL"]["VALUE"]?></div>
					</div>
					<div class="chop__detail-button">
						<a class="chop__detail-link" href="/review-add/<?=$arResult["PACKET_CODE"]?>/?op=<?=$arItem["ID"]?><?if ($_REQUEST["eq"]):?>&eq=<?=intval($_REQUEST["eq"])?><?endif;?>">Выбрать</a>
					</div>
				</div>
			</div>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
	</div>
	<?}else{?>
	<p>Охранных предприятий, соответствующих данному запросу, не найдено.</p>
	<?}?>
</div>