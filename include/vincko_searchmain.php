<div class="search__form-wrap">
	<button type="button" class="search__mobile-icon uk-button uk-button-default"></button>
	<?$APPLICATION->IncludeFile('/include/vincko_searchmain-mobile.php');?>
	<form class="search__form-tag" action="/ohrannye-predpriyatiya/" method="GET">
		<div class="search__form">
			<div class="search__form-text">Я хочу охранять</div>
			<div class="search__form-select select-icon__home">
			<select name="object" class="search__select uk-select">
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
			</select></div>
			<div class="search__form-text">где</div>
			<div class="search__form-select select-icon__place">
			<select name="city" class="search__select uk-select">
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
			<div class="search__form-button"><input type="submit" class="search__button" value="Показать"></div>
		</div>
	</form>
</div>