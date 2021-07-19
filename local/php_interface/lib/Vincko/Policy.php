<?php

namespace Vincko;

use Bitrix\Main\LoaderException;
use CIBlockElement;
use Bitrix\Main\Loader;

class Policy
{
	// ИД  инфоблока товаров (страховых компаний)
	const IBLOCK_POLICY = 14;
	// ИД  инфоблока товарных предложений(страховых полисов)
	const IBLOCK_POLICY_OFFER = 24;
	// ИД  инфоблока вариантов выплаты по основным пунктам страховки
	const IBLOCK_PAYMENT_OPTIONS = 35;

	public function __construct($component = null)
	{
		Loader::includeModule('iblock');
	}

	/**
	 * @param $id
	 *
	 * @return array|null
	 * @throws LoaderException
	 */
	public static function getById($id)
	{
		return !is_array($id)
			? current(self::getList([$id]))
			: null;
	}

	/**
	 * @param array $ids
	 * @return array
	 * @throws LoaderException
	 */
	public static function getList($ids)
	{
		\Bitrix\Main\Loader::includeModule("iblock");

		$policy = [];

		$obPolicy = \CIBlockElement::GetList(
			[],
			[
				"IBLOCK_ID" => static::IBLOCK_POLICY_OFFER,
				"ID"        => $ids,
			],
			false,
			false,
			[]
		);

		while ($arPolicy = $obPolicy->GetNextElement()) {
			$fields = $arPolicy->GetFields();
			$props = $arPolicy->GetProperties();

			$policy[$fields["ID"]] = [
				"ID"    => $fields["ID"],
				"NAME"  => $fields["NAME"],
				"PROPS" => $props,
			];

		}

		return $policy;
	}

	/**
	 * Получает весь массив или конкретные варианты выплаты по основным пунктам страховки
	 * @param array $ids
	 * @return array
	 */
	public static function getPaymentOptions($ids = [])
	{


		$obAllPaymentOptions = CIBlockElement::GetList(
			[],
			[
				"IBLOCK_ID" => static::IBLOCK_PAYMENT_OPTIONS,
				"ACTIVE"    => "Y",
			],
			false,
			[],
			[
				"IBLOCK_ID",
				"ID",
				"NAME",
				"PROPERTY_ICON",
				"PROPERTY_TEXT",
			]
		);

		while ($arAllPaymentOptionsTmp = $obAllPaymentOptions->GetNext()) {
			$arAllPaymentOptions[$arAllPaymentOptionsTmp["ID"]] = [
				"NAME" => $arAllPaymentOptionsTmp["NAME"],
				"ICON" => $arAllPaymentOptionsTmp["~PROPERTY_ICON_VALUE"]["TEXT"],
				"TEXT" => $arAllPaymentOptionsTmp["~PROPERTY_TEXT_VALUE"]["TEXT"],
			];
		}
		return $arAllPaymentOptions;
	}

	/**
	 * Форматирует массив с товарным предложением(ТП) и оставляет только необходимые поля
	 * @param array $ids
	 * @return array
	 */
	public static function formatPolicy($arOffer, $arPaymentOptions, $arInsurance = [])
	{
		// цена ТП
		$arOferPrice = \CPrice::GetBasePrice($arOffer["ID"]);

		// изображение ТП
		$arOferImg = \CFile::GetFileArray($arOffer["PROPERTIES"]["ILL"]["VALUE"]);

		// формируем массив
		$arPolicy = [
			"ID"        => $arOffer["ID"],
			"NAME"      => $arOffer["NAME"],
			"IMG"       => $arOferImg["SRC"],
			"MAX_PRICE" => CurrencyFormat($arOffer["PROPERTIES"]["MAX_PRICE"]["VALUE"], 'RUB'),
			"PRICE"     => CurrencyFormat($arOferPrice["PRICE"], 'RUB')
		];

		// если нужна информация о родителе
		if(!empty($arInsurance["NAME"])){
			$arPolicy["INSURANCE_NAME"] = $arInsurance["NAME"];
		}

		// Варианты выплат
		$arPolicy["PAYMENT_OPTIONS"] = [];

		if (!empty($arOffer["PROPERTIES"]["PAYMENT_OPTIONS"])) {
			foreach ($arOffer["PROPERTIES"]["PAYMENT_OPTIONS"]["VALUE"] as $paymentOptionsID => $paymentOptionsValue) {
				$arItemPaymentOptions = $arPaymentOptions[$paymentOptionsValue];
				$paymentOptions = $arItemPaymentOptions;
				$paymentOptions["PRICE"] = $arOffer["PROPERTIES"]["PAYMENT_PRICE"]["VALUE"][$paymentOptionsID];
				$arPolicy["PAYMENT_OPTIONS"][] = $paymentOptions;
			}
		}

		return $arPolicy;
	}


}
