<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<style type="text/css">
		/* Client-specific Styles */

		#outlook a {padding:0;}
		body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
		.ExternalClass {width:100%;}
		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,
		.ExternalClass td,
		.ExternalClass div {line-height: 100%;}
		#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}

		/* End reset */
	</style>
<?
/*
This is commented to avoid Project Quality Control warning
$APPLICATION->ShowHead();
$APPLICATION->ShowTitle();
$APPLICATION->ShowPanel();
*/
?>
</head>
<body>
<?if (\Bitrix\Main\Loader::includeModule('mail')) : ?>
<?=\Bitrix\Mail\Message::getQuoteStartMarker(true); ?>
<? endif;?>
<?
$protocol = \Bitrix\Main\Config\Option::get("main", "mail_link_protocol", 'https', $arParams["SITE_ID"]);
$serverName = $protocol."://".$arParams["SERVER_NAME"];
?>
<div style="background: #f8faff; width: 1092px; margin: 0 auto; padding: 19px 27px 28px;">
	<div style="width: 1092px; height: 141px; margin: 0 auto; border-radius: 5px;">
		<a href="https://vincko.market" style="display: block; width: 1092px; height: 141px;"><img src="https://vincko.market/upload/images/mail/mail_header.png" alt="Vincko"></a>
	</div>
			<!-- ***************** END HEADER  ********************-->


			<!-- ***************** CONTENT  ********************-->			<!-- CONTENT -->
