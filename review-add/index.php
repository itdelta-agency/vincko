<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление отзыва");
$arSelect = array("ID");
$arFilter = array("IBLOCK_ID" => 33, "PROPERTY_OU_USER" => $USER->GetID(), "PROPERTY_OU_CHOP" => intval($_REQUEST["op"]));
$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>50), $arSelect);
$reviewRate = ($arItem = $res->GetNext()) ? true : false;
if (intval($_REQUEST["op"])){
	$chopCityData = \Bitrix\Iblock\Elements\ElementChopcityTable::getByPrimary(intval($_REQUEST["op"]), array('select'=>array('NAME', 'CITY_ID')))->fetch();
	$cityData = \Bitrix\Iblock\Elements\ElementCityTable::getByPrimary($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CITY_ID_VALUE"], array('select'=>array('NAME')))->fetch();
	//если ранее был оставлен отзыв с указанием оценок, то далее не принимать такие отзывы
	$userReviewHistory = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 16, "PROPERTY_R_USER_ID" => $USER->GetID(), "PROPERTY_R_REVIEW_VERIFY" => 36, "PROPERTY_R_CHOP" => intval($_REQUEST["op"])), false, array(), array("ID"));
	$checkUserReview = ($arRevItem = $userReviewHistory->GetNext()) ? true : false;
}
?>
<?if ($checkUserReview){?>
<div class="r__select">
	<div class="r__select-title"><?=$chopCityData["NAME"]?></div>
	<div class="r__select-city"><?=$cityData["NAME"]?></div>
	<div class="r__select-link">
		<a href="/review-add/company/">Выбрать другую компанию</a>
	</div>
</div>
<div class="r__rate-title">Вы уже оценивали работу данной компании ранее.</div>
<?}else{?>
<div class="r__select"><?if ($_REQUEST["op"]){?>
	<div class="r__select-title"><?=$chopCityData["NAME"]?></div>
	<div class="r__select-city"><?=$cityData["NAME"]?></div>
	<div class="r__select-link">
		<a href="/review-add/company/">Выбрать другую компанию</a>
	</div>
	<?}else{?>
	<div class="r__select-title">Выберите компанию для оценки</div>
	<div class="r__select-link">
		<a href="/review-add/company/">Перейти к выбору компании</a>
	</div>
	<?}?>
</div>
<?if ($_REQUEST["op"]):?>
<div class="r__rate-title">Оцените работу организации по нижеприведенным характеристикам:</div>
<?if ($reviewRate){?>
<div class="r__rate-preview">Этот отзыв влияет на позицию охранной компании в рейтинге, так как вы являетесь покупателем услуг данной охранной компании.</div>
<div class="r__rate-notify">В случае, если вы не сталкивались с какими-то из качеств или ваше сотрудничество их не подразумевает - выберите пункт «не могу оценить». Это позволит нам сформировать честный рейтинг.</div>
<?} else {?>
<div class="r__rate-preview r__rate-error">Этот отзыв не влияет на позицию охранной компании в рейтинге, так как вы не являетесь покупателем услуг данной компании в выбранном городе.</div>
<?}?>
<div class="r__form">
	<form method="POST" action="/ajax/review.php" id="js-r-form">
		<?
		echo bitrix_sessid_post();
		if ($arResult['PREPAY_ADIT_FIELDS'] <> ''){
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="chop" value="<?=intval($_REQUEST["op"])?>">
		<?if ($reviewRate):?>
		<div class="r__form-block">
			<div class="r__form-label">Забота о клиенте<a href="#" title="Оцените заботу о клиенте от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="zabota" id="zabota1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="zabota1">1</label>
					<input type="radio" name="zabota" id="zabota2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="zabota2">2</label>
					<input type="radio" name="zabota" id="zabota3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="zabota3">3</label>
					<input type="radio" name="zabota" id="zabota4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="zabota4">4</label>
					<input type="radio" name="zabota" id="zabota5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="zabota5">5</label>
					<input type="radio" name="zabota" id="zabota6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="zabota6">6</label>
					<input type="radio" name="zabota" id="zabota7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="zabota7">7</label>
					<input type="radio" name="zabota" id="zabota8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="zabota8">8</label>
					<input type="radio" name="zabota" id="zabota9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="zabota9">9</label>
					<input type="radio" name="zabota" id="zabota10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="zabota10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="zabota" id="zabota0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="zabota0">не могу оценить</label>
				</div>
			</div>
		</div>
		<div class="r__form-block">
			<div class="r__form-label">Скорость спасения<a href="#" title="Оцените скорость спасения от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="skorost" id="skorost1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="skorost1">1</label>
					<input type="radio" name="skorost" id="skorost2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="skorost2">2</label>
					<input type="radio" name="skorost" id="skorost3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="skorost3">3</label>
					<input type="radio" name="skorost" id="skorost4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="skorost4">4</label>
					<input type="radio" name="skorost" id="skorost5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="skorost5">5</label>
					<input type="radio" name="skorost" id="skorost6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="skorost6">6</label>
					<input type="radio" name="skorost" id="skorost7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="skorost7">7</label>
					<input type="radio" name="skorost" id="skorost8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="skorost8">8</label>
					<input type="radio" name="skorost" id="skorost9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="skorost9">9</label>
					<input type="radio" name="skorost" id="skorost10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="skorost10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="skorost" id="skorost0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="skorost0">не могу оценить</label>
				</div>
			</div>
		</div>
		<div class="r__form-block">
			<div class="r__form-label">Финансовая надежность<a href="#" title="Оцените финансовую надежность от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="finance" id="finance1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="finance1">1</label>
					<input type="radio" name="finance" id="finance2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="finance2">2</label>
					<input type="radio" name="finance" id="finance3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="finance3">3</label>
					<input type="radio" name="finance" id="finance4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="finance4">4</label>
					<input type="radio" name="finance" id="finance5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="finance5">5</label>
					<input type="radio" name="finance" id="finance6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="finance6">6</label>
					<input type="radio" name="finance" id="finance7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="finance7">7</label>
					<input type="radio" name="finance" id="finance8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="finance8">8</label>
					<input type="radio" name="finance" id="finance9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="finance9">9</label>
					<input type="radio" name="finance" id="finance10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="finance10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="finance" id="finance0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="finance0">не могу оценить</label>
				</div>
			</div>
		</div>
		<div class="r__form-block">
			<div class="r__form-label">Честный договор<a href="#" title="Оцените честность договора от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="dogovor" id="dogovor1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="dogovor1">1</label>
					<input type="radio" name="dogovor" id="dogovor2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="dogovor2">2</label>
					<input type="radio" name="dogovor" id="dogovor3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="dogovor3">3</label>
					<input type="radio" name="dogovor" id="dogovor4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="dogovor4">4</label>
					<input type="radio" name="dogovor" id="dogovor5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="dogovor5">5</label>
					<input type="radio" name="dogovor" id="dogovor6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="dogovor6">6</label>
					<input type="radio" name="dogovor" id="dogovor7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="dogovor7">7</label>
					<input type="radio" name="dogovor" id="dogovor8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="dogovor8">8</label>
					<input type="radio" name="dogovor" id="dogovor9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="dogovor9">9</label>
					<input type="radio" name="dogovor" id="dogovor10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="dogovor10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="dogovor" id="dogovor0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="dogovor0">не могу оценить</label>
				</div>
			</div>
		</div>
		<div class="r__form-block">
			<div class="r__form-label">Рекомендации сотрудников<a href="#" title="Оцените рекомендации сотрудников от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="recommend" id="recommend1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="recommend1">1</label>
					<input type="radio" name="recommend" id="recommend2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="recommend2">2</label>
					<input type="radio" name="recommend" id="recommend3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="recommend3">3</label>
					<input type="radio" name="recommend" id="recommend4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="recommend4">4</label>
					<input type="radio" name="recommend" id="recommend5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="recommend5">5</label>
					<input type="radio" name="recommend" id="recommend6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="recommend6">6</label>
					<input type="radio" name="recommend" id="recommend7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="recommend7">7</label>
					<input type="radio" name="recommend" id="recommend8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="recommend8">8</label>
					<input type="radio" name="recommend" id="recommend9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="recommend9">9</label>
					<input type="radio" name="recommend" id="recommend10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="recommend10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="recommend" id="recommend0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="recommend0">не могу оценить</label>
				</div>
			</div>
		</div>
		<div class="r__form-block">
			<div class="r__form-label">Онлайн сервисы<a href="#" title="Оцените работу онлайн сервисов от 1 до 10" class="r__form-label-info inline-block"></a></div>
			<div class="r__form-rate-flex">
				<div class="r__form-radio-list">
					<input type="radio" name="online" id="online1" class="r__form-radio_hidden" value="1">
					<label class="r__label-rate inline-block" for="online1">1</label>
					<input type="radio" name="online" id="online2" class="r__form-radio_hidden" value="2">
					<label class="r__label-rate inline-block" for="online2">2</label>
					<input type="radio" name="online" id="online3" class="r__form-radio_hidden" value="3">
					<label class="r__label-rate inline-block" for="online3">3</label>
					<input type="radio" name="online" id="online4" class="r__form-radio_hidden" value="4">
					<label class="r__label-rate inline-block" for="online4">4</label>
					<input type="radio" name="online" id="online5" class="r__form-radio_hidden" value="5">
					<label class="r__label-rate inline-block" for="online5">5</label>
					<input type="radio" name="online" id="online6" class="r__form-radio_hidden" value="6">
					<label class="r__label-rate inline-block" for="online6">6</label>
					<input type="radio" name="online" id="online7" class="r__form-radio_hidden" value="7">
					<label class="r__label-rate inline-block" for="online7">7</label>
					<input type="radio" name="online" id="online8" class="r__form-radio_hidden" value="8">
					<label class="r__label-rate inline-block" for="online8">8</label>
					<input type="radio" name="online" id="online9" class="r__form-radio_hidden" value="9">
					<label class="r__label-rate inline-block" for="online9">9</label>
					<input type="radio" name="online" id="online10" class="r__form-radio_hidden" value="10">
					<label class="r__label-rate inline-block" for="online10">10</label>
				</div>
				<div class="r__form-rate-no">
					<input type="radio" name="online" id="online0" class="r__form-radio_hidden" value="0">
					<label class="r__label-rate-no" for="online0">не могу оценить</label>
				</div>
			</div>
		</div>
		<?endif;?>
		<div class="r__rate-comment">
			<div class="r__rate-title">Комментарий</div>
			<div class="r__rate-comment-label">Перед отправкой отзыва убедитесь, что он не нарушает правил модерации: не содержит ссылок на сторонние ресурсы и оскорблений.</div>
			<textarea class="r__form-textarea" name="comment"></textarea>
			<div id="js-r-err" style="color: #c00; font-size: 16px;"></div>
			<input type="submit" class="r__form-submit" value="Оставить отзыв">
		</div>
	</form>
	<div id="js-r-ok"></div>
</div>
<?endif;?>
<?}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>