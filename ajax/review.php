<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
/*
 *	добавление отзыва
 * 	добавляется отдельно отзыв в инфоблок "Отзывы"
 * 	проверка пользователя на заказ ранее у данного охранного предприятия (через инфоблок Отзывы Пользователь-ЧОП, куда заносится запись, если заказ выполнен и услуги охранного предприятия были включены в него)
 *	если пользователь не заказывал, то отзыв не считается верифицированным и выдается только комментарий
 *	если пользователь является заказчиком услуг охранного предприятия, то добавляется рейтинг и обновляется рейтинг у компании в городе и компании в целом
 */
use Bitrix\Main\Context;
\Bitrix\Main\Loader::includeModule('iblock');
global $USER;
$USER = new CUser();
$userID = $USER->GetID();
if ($USER->isAuthorized()){
	//оформление заказа только для авторизованных пользователей
	if (check_bitrix_sessid()){
		$el = new CIBlockElement; 
		$request = Context::getCurrent()->getRequest();
			
		$NAME = $USER->GetFullName();
		$chopID = intval($request["chop"]);
		$PROP = array();
		$PROPCHOPCITY = array();
		$PROPCHOPALL = array();
		//пользователь
		$PROP["R_USER_ID"] = array("n0" => $userID);
		$PROP["R_USER_NAME"] = $USER->GetFullName();
		//чоп
		$PROP["R_CHOP"] = array("n0" => $chopID);
		//комментарий
		$PROP["R_COMMENT"] = array("VALUE" => array("TEXT" => $request["comment"], "TYPE" => "text"));
		
		//проверка пользователя на заказ ранее у данного охранного предприятия (инфоблок ID = 33)
		$arSelect = array("ID");
		$arFilter = array("IBLOCK_ID" => 33, "PROPERTY_OU_USER" => $userID, "PROPERTY_OU_CHOP" => $chopID);
		$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>50), $arSelect);
		if ($arItem = $res->GetNext()){
			//пользователь заказывал ранее услуги у охранного предприятия
			$PROP["R_REVIEW_VERIFY"] = array("VALUE" => 36);
			//город
			$PROP["R_CHOP"] = array("n0" => $chopID);
			//оценки
			$PROP["R_RATING_ZABOTA"] = $request["zabota"];
			$PROP["R_RATING_SPASENIE"] = $request["skorost"];
			$PROP["R_RATING_FINANCE"] = $request["finance"];
			$PROP["R_RATING_DOGOVOR"] = $request["dogovor"];
			$PROP["R_RATING_RECOMMEND"] = $request["recommend"];
			$PROP["R_RATING_SERVICES"] = $request["online"];
			//возможно, все эти действия лучше делать в обработчике события после добавления записи в инфоблок Отзывы (ID 16)
			//получаю данные по охранному предприятию в конкретном городе
			$chopCityData = \Bitrix\Iblock\Elements\ElementChopcityTable::getByPrimary($chopID, array('select'=>array('NAME', 'CITY_ID', 'CHOP_ID', 'CH_RATING_SUM', 'CH_RATING_ZABOTA', 'CH_RATING_SPASENIE', 'CH_RATING_FINANCE', 'CH_RATING_DOGOVOR', 'CH_RATING_RECOMMEND', 'CH_RATING_SERVICES', 'CH_RATING_COUNT', 'CH_RATING_COUNT_ZABOTA', 'CH_RATING_COUNT_SPASENIE', 'CH_RATING_COUNT_FINANCE', 'CH_RATING_COUNT_DOGOVOR', 'CH_RATING_COUNT_RECOMMEND', 'CH_RATING_COUNT_SERVICES')))->fetch();
			$chopAllData = \Bitrix\Iblock\Elements\ElementChopTable::getByPrimary($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CHOP_ID_VALUE"], array('select'=>array('NAME', 'CH_RATING_SUM', 'CH_RATING_ZABOTA', 'CH_RATING_SPASENIE', 'CH_RATING_FINANCE', 'CH_RATING_DOGOVOR', 'CH_RATING_RECOMMEND', 'CH_RATING_SERVICES', 'CH_RATING_COUNT', 'CH_RATING_COUNT_ZABOTA', 'CH_RATING_COUNT_SPASENIE', 'CH_RATING_COUNT_FINANCE', 'CH_RATING_COUNT_DOGOVOR', 'CH_RATING_COUNT_RECOMMEND', 'CH_RATING_COUNT_SERVICES')))->fetch();
			//количество отзывов у охранного предприятия в выбранном городе (инфоблок Компании-Город)
			$chopCityReviewCount = number_format($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_VALUE"],0,'.','');
			//количество отзывов у охранного предприятия (по всей стране - инфоблок Компании)
			$chopAllReviewCount = number_format($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_VALUE"],0,'.','');
			//подсчет количества и суммы значений параметров, по которым были выставлены оценки в добавляемом отзыве
			$chopCityReviewNewCount = 0;
			$chopCityReviewSummary = 0;
			/* 
			 * изменение оценки для охранного предприятия в выбранном городе
			 * у любого значения оценки есть средний балл и количество проголосовавших
			 * количество проголосовавших по каждому критерию важно, т.к. есть функционал, допускающий отсутствие оценки по любому из параметров
			 * поэтому добавляя новые значения, необходимо учитывать старые значения при построении среднего арифмитического у каждого из параметров
			 * и необходимо считать, сколько параметров сейчас было оценено, чтобы получить среднюю оценку по формуле - сумма всех ненулевых параметров / количество ненулевых параметров
			 * код так себе. После обкатки - оптимизировать и перенести в обработчик события добавления отзыва
			 */
			if ($PROP["R_RATING_ZABOTA"] > 0){
				//забота о клиенте
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_ZABOTA"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_ZABOTA_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_ZABOTA_VALUE"], $PROP["R_RATING_ZABOTA"]);
				$PROPCHOPCITY["CH_RATING_ZABOTA"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_ZABOTA"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_ZABOTA_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_ZABOTA_VALUE"], $PROP["R_RATING_ZABOTA"]);
				$PROPCHOPALL["CH_RATING_ZABOTA"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_ZABOTA"] = $chopAllRes["COUNT"];
			}
			if ($PROP["R_RATING_SPASENIE"] > 0){
				//скорость спасения
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_SPASENIE"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_SPASENIE_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_SPASENIE_VALUE"], $PROP["R_RATING_SPASENIE"]);
				$PROPCHOPCITY["CH_RATING_SPASENIE"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_SPASENIE"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_SPASENIE_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_SPASENIE_VALUE"], $PROP["R_RATING_SPASENIE"]);
				$PROPCHOPALL["CH_RATING_SPASENIE"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_SPASENIE"] = $chopAllRes["COUNT"];
			}
			if ($PROP["R_RATING_FINANCE"] > 0){
				//финансы
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_FINANCE"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_FINANCE_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_FINANCE_VALUE"], $PROP["R_RATING_FINANCE"]);
				$PROPCHOPCITY["CH_RATING_FINANCE"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_FINANCE"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_FINANCE_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_FINANCE_VALUE"], $PROP["R_RATING_FINANCE"]);
				$PROPCHOPALL["CH_RATING_FINANCE"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_FINANCE"] = $chopAllRes["COUNT"];
			}
			if ($PROP["R_RATING_DOGOVOR"] > 0){
				//договор
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_DOGOVOR"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_DOGOVOR_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_DOGOVOR_VALUE"], $PROP["R_RATING_DOGOVOR"]);
				$PROPCHOPCITY["CH_RATING_DOGOVOR"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_DOGOVOR"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_DOGOVOR_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_DOGOVOR_VALUE"], $PROP["R_RATING_DOGOVOR"]);
				$PROPCHOPALL["CH_RATING_DOGOVOR"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_DOGOVOR"] = $chopAllRes["COUNT"];
			}
			if ($PROP["R_RATING_RECOMMEND"] > 0){
				//рекомендации
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_RECOMMEND"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_RECOMMEND_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_RECOMMEND_VALUE"], $PROP["R_RATING_RECOMMEND"]);
				$PROPCHOPCITY["CH_RATING_RECOMMEND"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_RECOMMEND"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_RECOMMEND_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_RECOMMEND_VALUE"], $PROP["R_RATING_RECOMMEND"]);
				$PROPCHOPALL["CH_RATING_RECOMMEND"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_RECOMMEND"] = $chopAllRes["COUNT"];
			}
			if ($PROP["R_RATING_SERVICES"] > 0){
				//онлайн сервисы
				$chopCityReviewNewCount++;
				$chopCityReviewSummary += $PROP["R_RATING_SERVICES"];
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_SERVICES_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_SERVICES_VALUE"], $PROP["R_RATING_SERVICES"]);
				$PROPCHOPCITY["CH_RATING_SERVICES"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT_SERVICES"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_SERVICES_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_SERVICES_VALUE"], $PROP["R_RATING_SERVICES"]);
				$PROPCHOPALL["CH_RATING_SERVICES"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT_SERVICES"] = $chopAllRes["COUNT"];
			}
			if ($chopCityReviewNewCount > 0){
				//суммарное значение
				$chopSummary = round($chopCityReviewSummary/$chopCityReviewNewCount,1);
				//охранное предприятие в выбранном городе
				$chopCityRes = reCountRate($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_SUM_VALUE"], $chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CH_RATING_COUNT_VALUE"], $chopSummary);
				$PROPCHOPCITY["CH_RATING_SUM"] = $chopCityRes["RATE"];
				$PROPCHOPCITY["CH_RATING_COUNT"] = $chopCityRes["COUNT"];
				//охранное предприятие - головной офис
				$chopAllRes = reCountRate($chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_SUM_VALUE"], $chopAllData["IBLOCK_ELEMENTS_ELEMENT_CHOP_CH_RATING_COUNT_VALUE"], $chopSummary);
				$PROPCHOPALL["CH_RATING_SUM"] = $chopAllRes["RATE"];
				$PROPCHOPALL["CH_RATING_COUNT"] = $chopAllRes["COUNT"];
			}
		}
		
		$arLoadReview = Array(
			"IBLOCK_SECTION_ID" => false, 
			"IBLOCK_ID"       => 16,
			"DATE_CREATE"     => date("d.m.Y H:i:s"),
			"NAME"            => $NAME, 
			"PROPERTY_VALUES" => $PROP,
			"ACTIVE"          => "Y"
		);     
		if ($elID = $el->Add($arLoadReview)) {
			//апдейт оценок и количества отзывов для охранного предприятия в выбранном городе
			CIBlockElement::SetPropertyValuesEx($chopID, 9, $PROPCHOPCITY);
			//апдейт оценок и количества отзывов для охранного предприятия в головном офисе
			CIBlockElement::SetPropertyValuesEx($chopCityData["IBLOCK_ELEMENTS_ELEMENT_CHOPCITY_CHOP_ID_VALUE"], 8, $PROPCHOPALL);
			echo json_encode(array('success' => true, 'msg' => 'Отзыв успешно добавлен')); exit;
		} else {
			echo json_encode(array('success' => false, 'msg' => 'Произошла ошибка при добавлении отзыва', 'error' => $el->LAST_ERROR)); exit;
		}
	} else {
		echo json_encode(array('success' => false, 'msg' => 'Неправильный идентификатор сессии')); exit;
	}
} else {
	echo json_encode(array('success' => false, 'msg' => 'Пользователь не зарегистрирован')); exit;
}

//подсчет итогового среднего значения по выбранным параметрам
function reCountRate($paramRate, $paramCount, $paramNewVal){
	$chopCityRate = number_format($paramRate,1,'.','');
	$chopCityRateCount = number_format($paramCount,0,'.','');
	$chopCityRateNew = ($chopCityRate*$chopCityRateCount + $paramNewVal)/($chopCityRateCount + 1);
	$resArr = array(
		"RATE" => number_format($chopCityRateNew,1,'.',''),
		"COUNT" => ($chopCityRateCount + 1)
	);
	return $resArr;
}