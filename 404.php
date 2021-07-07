<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

<div class="page404">
	<div class="page404__icon"></div>
	<div class="page404__title">Страница не найдена</div>
	<div class="page404__description">К сожалению, страница, которую вы запросили, не была найдена<br/>(ошибка 404). Вы можете перейти на <a href="/">главную страницу</a> или<br/>воспользоваться <a href="/pakety-okhrannykh-uslug/">списком пакетов</a>.</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>