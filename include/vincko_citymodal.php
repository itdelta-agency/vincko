<?\Bitrix\Main\Loader::includeModule("iblock");
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
<div id="city-modal" class="uk-flex-top" uk-modal>
	<div class="modal__city-wrap uk-modal-dialog uk-margin-auto-vertical">
		<div class="modal__city-close uk-modal-close"></div>
		<div class="modal__city-title">Выберите город</div>
		<div class="modal__city-list">
			<?foreach ($cityList as $aCity):?>
			<div class="modal__city-item">
				<a data-id="<?=$aCity["ID"]?>" href="#" class="js-get-city modal__city-item-link<?if ($GLOBALS["GEOCITY"]["ID"] == $aCity["ID"]):?> selected<?endif;?>"><?=$aCity["NAME"]?></a>
			</div>
			<?endforeach;?>
		</div>
	</div>
</div>