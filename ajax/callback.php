<?
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['phone']) && !empty($_POST['phone'])) {
	$phoneNumber = $_POST['phone'];
	$phoneNumber = trim($phoneNumber);
	$phoneNumber = strip_tags($phoneNumber);
	$phoneNumber = htmlspecialchars($phoneNumber);
	if (preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $phoneNumber)){
		$activeFrom = date('d.m.Y H:i:s', time());
		$title = 'Заказ на обратный звонок с сайта vincko.ru';
		$titleUser = 'С сайта vincko.ru была отправлена новая заявка на обратный звонок!';
		$imsg = '
		<b>Данные заявки с сайта <a href="https://vincko.ru/" target="_blank">vincko.ru</a></b><br/>
		Номер: <b>'.$phoneNumber.'</b><br/>
		Время отправления: <b>'.$activeFrom.'</b><br/>';
		require 'class.phpmailer.php';
		$mail = new PHPMailer(); 
		$mail->From = 'noreply@vincko.ru';
		$mail->FromName = 'Vincko - федеральный маркетплейс охраны';
		$mail->AddAddress('info@vincko.ru', '');
		$mail->IsHTML(true);
		$mail->Subject = $title;
		$mail->Body = $imsg; 
		if (!$mail->Send()) die ('Ошибка при отправке сообщения: '.$mail->ErrorInfo);

		require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
		if(CModule::IncludeModule("iblock")){
			$el = new CIBlockElement; 

			$arLoadProductArray = Array(
				"IBLOCK_SECTION_ID" => false, 
				"IBLOCK_ID"       => 23,
				"NAME"            => $phoneNumber, 
				"PROPERTY_VALUES" => array(),
				"ACTIVE"          => "Y"
			);     
			if ($elID = $el->Add($arLoadProductArray)) {
				echo json_encode(array('success' => true)); exit;
			} else {
				echo json_encode(array('success' => false, 'error' => $el->LAST_ERROR)); exit;
			}
		}
	} else {
		echo json_encode(array('success' => false, 'error' => 'Проверьте корректность указания номера телефона')); exit;
	}

}
?>