<?php

$arTemplateParameters = array(
	"TITLE_LEFT"   => array(
		"PARENT" => "BASE",
		"NAME"   => "Заголовок в левом блоке",
		"TYPE"   => "STRING",
	),
	"IMG_LEFT_TOP" => array(
		"PARENT" => "BASE",
		"NAME"   => "Изображение сверху в левом блоке",
		"TYPE"   => "FILE",
		"FD_TARGET"         => "F",
		"FD_UPLOAD"         => true,
		"FD_USE_MEDIALIB"   => true,
		"FD_MEDIALIB_TYPES" => array('image'),
	),

	"IMG_LEFT_BOTTOM"   => array(
		"PARENT" => "BASE",
		"NAME"   => "Изображение внизу в левом блоке",
		"TYPE"   => "FILE",
		"FD_TARGET"         => "F",
		"FD_UPLOAD"         => true,
		"FD_USE_MEDIALIB"   => true,
		"FD_MEDIALIB_TYPES" => array('image'),
	),
	"DESCRIPTION_LEFT"  => array(
		"PARENT" => "BASE",
		"NAME"   => "Текст в левом блоке",
		"TYPE"   => "STRING",
	),
	"TITLE_RIGHT"       => array(
		"PARENT" => "BASE",
		"NAME"   => "Заголовок в правом блоке",
		"TYPE"   => "STRING",
	),
	"DESCRIPTION_RIGHT" => array(
		"PARENT" => "BASE",
		"NAME"   => "Текст в правом блоке",
		"TYPE"   => "STRING",
	),
	"BUTTON_RIGHT"      => array(
		"PARENT" => "BASE",
		"NAME"   => "Надпись на кнопке в правом блоке",
		"TYPE"   => "STRING",
	),
	"IMG_RIGHT_BOTTOM"  => array(
		"PARENT" => "BASE",
		"NAME"   => "Изображение в правом блоке",
		"TYPE"   => "FILE",
		"FD_TARGET"         => "F",
		"FD_UPLOAD"         => true,
		"FD_USE_MEDIALIB"   => true,
		"FD_MEDIALIB_TYPES" => array('image'),
	)
);
