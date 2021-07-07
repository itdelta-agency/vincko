<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/*IncludeTemplateLangFile(__FILE__);*/
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/upload/fonts/stylesheet.css" type="text/css"/>
	<link rel="stylesheet" href="/bitrix/templates/v_content/uikit.css" type="text/css"/>
	<?$APPLICATION->ShowHead();?>
	<link rel="stylesheet" href="/bitrix/templates/v_content/mobile.css?v=15" type="text/css"/>
	<?/*<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/print_style.css"?>" type="text/css" media="print" />*/?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--noindex-->
	<link rel="stylesheet" type="text/css" href="/bitrix/templates/v_content/cookieconsent.min.css?v=2" />
	<script src="/bitrix/templates/v_content/cookieconsent.min.js"></script>
	<script>
		window.addEventListener("load", function(){
		window.cookieconsent.initialise({
			"palette": {
				"popup": {
					"background": "#005dff"
				},
				"button": {
					"background": "#005dff"
				}
			},
			"showLink": false,
			"content": {
				"message": "Этот сайт использует cookie для хранения данных. Продолжая использовать сайт, Вы даете свое согласие на работу с этими файлами.",
				"dismiss": "Ок"
			}
		})});
	</script>
	<!--/noindex-->
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeFile('/include/vincko_menu-mobile.php');?>
<div class="header">
    <div class="wrap">
        <div class="header__logo">
			<a href="/" class="header__logo-svg"></a>
        </div>
		<?$APPLICATION->IncludeFile('/include/vincko_header.php');?>
    </div>
</div>
<div class="search">
	<div class="wrap">
		<div class="search__mobile-flex">
			<div class="mobile__search-logo">
				<a href="/" class="mobile__logo"></a>
			</div>
			<div class="search__flex">
				<?$APPLICATION->IncludeFile('/include/vincko_menu.php');?>
				<?$APPLICATION->IncludeFile('/include/vincko_searchmain.php');?>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="wrap">
		<?$APPLICATION->IncludeComponent("vincko:breadcrumb", "vincko", array(
			"START_FROM" => "0",
			"PATH" => "",
			"SITE_ID" => "-"
		), false);?>
	</div>
	