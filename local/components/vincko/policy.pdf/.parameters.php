<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"PARAMETERS" => array(
		"FONT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PDF_FONT"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
		"FPDF_FONTPATH" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PDF_FPDF_FONTPATH"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	)
);
