<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//header('Content-Type: application/pdf');
use setasign\FpdiProtection\FpdiProtection;

define('FPDF_FONTPATH', Bitrix\Main\Application::getDocumentRoot() . $arParams["FPDF_FONTPATH"]);
$pdf = new FpdiProtection();

// добавляем шрифт
$pdf->AddFont('font', '', $arParams["FONT"]);
// цвет текста по умолчанию
$colorText = [0, 0, 0];
//размер текста по умолчанию
$sizeText = 8;
//обрабатываемый шаблон
// TODO из за симлинка пришлось вставить путь так, при переносе на бой заменить на DOCUMENT_ROOT
$pageCount = $pdf->setSourceFile("/home/bitrix/ext_www/stage.vincko.market" . $arResult["PAGE"]["FILE"]);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
	//добавляем страницу
	$pdf->AddPage();
	$tplId = $pdf->importPage($pageNo);
	$pdf->useTemplate($tplId);

	//перебираем данные шаблона
	foreach ($arResult["PAGE"]["DATA"][$pageNo - 1] as $fieldName => $arField) {
		if(!empty($arField["COLOR"])){
			$colorText = $arField["COLOR"];
			$sizeText = $arField["SIZE"];
		}
		$pdf->SetTextColor($colorText[0],$colorText[1],$colorText[3]);
		$pdf->SetFont('font', '', $sizeText);

		$text = iconv('utf-8', 'windows-1251', trim($arField["TEXT"], " "));

		if (empty($text)) {
			$text = "-";
		}

		$coordinateX = $arField["COORDINATES"][0];
		$coordinateY = $arField["COORDINATES"][1];

		// когда ограничение только по оси X и выравнивание
		if(!empty($arField["LENGTH"])){
			if($arField["ALIGN"] == "center") {
				$сharacters = ($arField["LENGTH"] - strlen($text)) / 1.8;
				$coordinateX = $arField["COORDINATES"][0] + $сharacters;

			}
			if($arField["ALIGN"] == "left") {
				// если строка превышает количество возможных символов, то разбиваем на две строки
				if (strlen($text) > $arField["LENGTH"]) {
					// текст в две строки
					$arText = explode(" ", trim($text));
					$сharacters = 0;
					$resultText = [];
					foreach ($arText as $word) {
						$сharacters = $сharacters + strlen($word);
						if ($сharacters > $arField["LENGTH"] * 2) {
							//ошибка и можно зарегистрировать событие для ручного формирования полиса
						} elseif ($сharacters < $arField["LENGTH"]) {
							$i = 0;
						} else {
							$i = 1;
						}
						$resultText[$i] .= $word . " ";
					}
					$coordinateX = [$coordinateX,$coordinateX];
					$coordinateY = [$arField["COORDINATES"][1] - 1.5, $arField["COORDINATES"][1]+1.5];
					$text = $resultText;
				}
			}
		}

		if(is_array($text)){

			foreach ($text as $curr => $val){
				$pdf->SetXY($coordinateX[$curr], $coordinateY[$curr]);
				$pdf->Write(0, $val);
			}
		}else{
			$pdf->SetXY($coordinateX, $coordinateY);
			$pdf->Write(0, $text);
		}

	}
}

$ownerPassword = $pdf->setProtection( FpdiProtection::PERM_PRINT );
$pdf->Output();
