<div id="submenu-mobile-nav" class="submenu__dropdown-mobile uk-offcanvas" uk-offcanvas="mode: slide; flip: true">
	<ul class="submenu__list">
		<li><a href="/pakety-okhrannykh-uslug/">Пакеты охранных услуг</a></li>
		<li><a href="/komplekty-oborudovaniya/">Комплекты оборудования</a></li>
		<li><a href="/ohrannye-predpriyatiya/">Рейтинг охранных компаний</a></li>
		<li><a href="/strahovanie/">Страхование</a></li>
		<li><a href="/vinckombo/">vincКОМБО</a></li>
		<li><a href="/about/">О компании</a></li>
	</ul>
	<ul class="submenu__mobile-top">
		<?if (!$USER->IsAuthorized()){?><li><a href="/login/">Вход/регистрация</a></li><?}else{?>
		<li><a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array());?>">Выйти</a></li><?}?>
		<?/*<li><a href="">Заказы</a></li>*/?>
	</ul>
	<a class="submenu__mobile-phone" href="tel:88000000000">8(800)000-00-00</a>
</div>