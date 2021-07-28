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
<div id="header__top-info" class="header__top-info--popup modal">
    <div class="modal__content">
        <div data-close-button class="close-button"></div>
        <div class="modal__content-body">
            <h4>Выберите город</h4>
            <ul class="menu__list">
                <?foreach ($cityList as $aCity):?>
                <li class="<?=$GLOBALS["GEOCITY"]["ID"] == $aCity["ID"] ? 'active' : ''?>"><a data-id="<?=$aCity["ID"]?>" class="js-get-city" href="#"><?=$aCity["NAME"]?></a></li>
                <?endforeach;?>
            </ul>
        </div>
    </div>
</div>