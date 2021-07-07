
		<div class="izayavka">
			<div class="izayavka__title">Данные заявки</div>
			<div class="izayavka__form">
				<form method="POST" action="/ajax/izayavka.php">
					<div class="izayavka__form-block">
						<label for="iz-type" class="izayavka__label">Тип охраны</label>
						<select class="izayavka__select" name="type" id="iz-type">
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
					<div class="izayavka__form-block">
						<label for="iz-object" class="izayavka__label">Тип недвижимости</label>
						<select class="izayavka__select" name="object" id="iz-object">
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
					<div class="izayavka__form-block">
						<label for="iz-city" class="izayavka__label">Населенный пункт</label>
						<select class="izayavka__select" name="city" id="iz-city">
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
							<option>Выберите город</option>
							<?foreach ($cityList as $aCity):?>
							<option value="<?=$aCity["ID"]?>"<?if ($_REQUEST["city"] == $aCity["ID"]):?> selected="selected"<?endif;?>><?=$aCity["NAME"]?></option>
							<?endforeach;?>
						</select>
					</div>
					<div class="izayavka__form-block">
						<label for="iz-comment" class="izayavka__label">Комментарий</label>
						<textarea id="iz-comment" class="izayavka__textarea" name="comment" placeholder="Например: необходимо обеспечить охрану и пожарную безопасность коммерческого помещения в г.Суздаль"></textarea>
					</div>
					<div class="izayavka__chop">
						<div class="izayavka__title">Охранные организации</div>
						<div class="izayavka__chop-description">Вы можете выбрать одну или несколько охранных компаний, работающих в вашем городе и добавить их в заявку. Мы совместно с сотрудниками каждой из компаний подготовим индивидуальные предложения персонально для вас.</div>
						<div class="clear"></div>
						<a href="#" class="izayavka__chop-link inline-block">Перейти в список</a>
						<div class="clear"></div>
						<div class="izayavka__chop-list">
							<div class="izayavka__chop-count">Организации не выбраны</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="izayavka__submit">
			<a href="#" class="izayavka__submit-link inline-block" id="iz-submit">Отправить</a>
		</div>
	</div>
	<?$APPLICATION -> IncludeFile('/include/vincko_callback.php');?>
</div>
<div class="prefooter">
	<div class="wrap">
		<div class="prefooter__flex">
			<div class="prefooter__logo"></div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="wrap">
		<?$APPLICATION -> IncludeFile('/include/vincko_footer.php');?>
	</div>
</div>
<div class="copyrights">
	<div class="wrap">
		<div class="copyrights__flex">
			<div class="copyrights__flex-left"><?=date("Y")?> Vincko</div>
		</div>
	</div>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	ym(74474422, "init", {
		clickmap:true,
		trackLinks:true,
		accurateTrackBounce:true,
		webvisor:true,
		ecommerce:"dataLayer"
	});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/74474422" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script src="/local/templates/v_content/jquery.min.js"></script>
<script src="/local/templates/v_content/uikit.min.js"></script>
<script src="/local/templates/v_content/site.js?v=10"></script>
</body>
</html>