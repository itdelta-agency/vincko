<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>

<?  if (empty($arResult["ERROR"])): ?>
	<? include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/success.php'); ?>
<? else: ?>
	<? include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/error.php'); ?>
<? endif; ?>