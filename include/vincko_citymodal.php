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
<!--    <div class="modal__content">-->
        <div data-close-button class="close-button"></div>
        <div class="modal__content-body searchForm__modal">
<!--            <h4>Выберите город</h4>-->
<!--            <ul class="menu__list">-->
<!--                <li class="--><?//=$GLOBALS["GEOCITY"]["ID"] == $aCity["ID"] ? 'active' : ''?><!--"><a data-id="--><?//=$aCity["ID"]?><!--" class="js-get-city" href="#">--><?//=$aCity["NAME"]?><!--</a></li>-->
<!--            </ul>-->
            <div data-close-button class="close-button"></div>
            <div class="searchForm__modal_input">
                <input type="text" id="filterCity" placeholder="Поиск по названию">
                <button>
                    <img src="../img/header/search-icon.svg" alt="img">
                </button>
            </div>
            <div class="searchForm__modal_wrapper">
                <div class="searchForm__modal_topChek active">
                    <div class="searchForm__modal_item topChekItem">
                        <input type="checkbox" class="checkbox">
                        <span class="itemText">Санкт-Петербург</span>
                    </div>
                </div>
                <div class="searchForm__modal_centerChek">
                    <div class="searchForm__modal_item">
                        <input type="checkbox" class="checkbox">
                        <span class="itemText">Санкт-Петербург</span>
                    </div>
                </div>
                <div class="searchForm__modal_bottomChek">
                    <?foreach ($cityList as $aCity):?>
                        <div class="searchForm__modal_item bottomChekItem">
                            <input type="checkbox" class="checkbox" value="<?=$aCity["ID"]?>">
                            <span class="itemText"><?=$aCity["NAME"]?></span>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
<!--    </div>-->
</div>