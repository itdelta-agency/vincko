<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<!-- ***************** END CONTENT  ********************-->


	<!-- ***************** FOOTER  ********************-->
	<div style="display: block; background: #fff; padding: 24px 0; text-align: center; margin: 24px 0 0 0;">
		<a href="https://vincko.market" style="display: block; width: 277px; height: 38px; margin: 0 auto;"><img src="https://vincko.market/upload/images/mail/mail_footer-logo.png" alt="Vincko"></a>
		<div style="display: block; color: #000; font-size: 18px; line-height: 21px; margin: 16px 0 0 0; text-align: center;">Первый федеральный маркетплейс охраны</div>
		<div style="display: block; color: #020202; margin: 36px 0 0 0; font-weight: 600; font-size: 16px; line-height: 19px; text-align: center;">Служба заботы о клиентах</div>
		<div style="display: block; color: #020202; margin: 8px 0 0 0; font-weight: bold; font-size: 24px; line-height: 29px; text-align: center;">8 800 000 00 00</div>
	</div>
</div>
<? if (\Bitrix\Main\Loader::includeModule('mail')) : ?>
<?=\Bitrix\Mail\Message::getQuoteEndMarker(true); ?>
<? endif; ?>
</body>
</html>
<!-- ***************** END FOOTER  ********************-->