<div class="header__info">
	<div class="header__contacts">
		<div class="header__contacts-phone"><a href="tel:88000000000">8 (800) 000-00-00</a></div>
		<div class="header__contacts-city"><a href="#" uk-toggle="target: #city-modal"><?=$GLOBALS["GEOCITY"]["NAME"]?></a></div>
	</div>
	<div class="header__authlinks">
		<?if (!$USER->IsAuthorized()){?><div class="header__authlinks-item"><a href="/login/">Вход/Регистрация</a></div><?}else{?>
		<div class="header__authlinks-item"><a href="/lk/orders/">Заказы</a></div>
		<div class="header__authlinks-item"><a href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), array("login","logout","register","forgot_password","change_password"));?>">Выйти</a></div>
		<?}?>
	</div>
</div>