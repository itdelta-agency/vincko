<?php
namespace Vincko;

use Vincko\Order;
class Events
{
	// событие после добавления результата формы
	public static function afterResultAdd($formId, $resultId)
	{
		$arAnswers = \CFormResult::GetDataByID($resultId, [], $arResult, $arAnswers2);

		switch ($formId){
			case 1 :

				// сформируем необходимый мыссив для передачи в заказ
				$arPolicyField = [
					"POLICY" => [
						"ID" => $arAnswers["POLICY_ID"][0]["USER_TEXT"]
					]
				];

				foreach($arAnswers as  $arValue){
					$arPolicyField["PROPS"][] = [
						"NAME"  => $arValue[0]["TITLE"],
						"CODE"  => $arValue[0]["SID"],
						"VALUE" => $arValue[0]["USER_TEXT"]
					];
				}

				$request = Application::getInstance()->getContext()->getRequest();

				$arPayment = $request["PAYMENT"];

				if ($orderId = Order::createOrderPolicy($arPolicyField, $arPayment, 1, false)) {
					\CFormResult::SetField($resultId, "ORDER_ID", $orderId);
				}
		}
	}

	// событие оплаты заказа
	public static function OnSaleOrderPaid($order)
	{
		if(!$order->isPaid() || $order->isPaid()==false) {
			return false;
		}
		Order::orderPolicyPay($orderId);

	}

}