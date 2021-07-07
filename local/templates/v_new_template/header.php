<?php
use Bitrix\Main\Page\Asset;
$Asset = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title><?= $APPLICATION->ShowTitle(); ?></title>
	<?= $APPLICATION->ShowHead(); ?>

	<!-- Add you library here -->
	<? $Asset->addJs(SITE_TEMPLATE_PATH . "/js/custom.js"); ?>
	<? $Asset->addCss(SITE_TEMPLATE_PATH . "/css/custom.css"); ?>

</head>
<body>
<div id="panel"><?= $APPLICATION->ShowPanel(); ?></div>