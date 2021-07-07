<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
/*Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
$this->addExternalCss("/bitrix/css/main/bootstrap.css");*/
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS']))
	{
		if ($_REQUEST["filter_history"] == 'Y')
		{
			if ($_REQUEST["show_canceled"] == 'Y')
			{
				?>
				<h3 style="display: none;"><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
				<?
			}
			else
			{
				?>
				<h3 style="display: none;"><?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
				<?
			}
		}
		else
		{
			?>
			<h3 style="display: none;"><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></h3>
			<?
		}
	}
	
	?>
<div class="lk-columns">
	<div class="lk-columns__left">
		<ul class="lk-menu">
			<li><a class="active" href="/lk/orders/">Заказы и заявки</a></li>
			<li><a href="/lk/prof/">Мои данные</a></li>
			<li><a href="/lk/bonuses/">Бонусный счет</a></li>
		</ul>
	</div>
	<div class="lk-columns__right">
		<div class="lk-orders">
			<div class="lk-orders__header">
				<ul class="lk-orders__tab">
					<li class="inline-block"><a class="active" href="/lk/orders/">Все заказы</a></li>
					<li class="inline-block"><a href="/lk/zayavka/">Индивидуальные заявки</a></li>
					<li class="inline-block"><a href="/zayavka/">Новая заявка</a></li>
				</ul>
			</div>
			<div class="lk-orders__list">
	<?
	if (!count($arResult['ORDERS']))
	{
		?>
		<div class="lk-orders__item">
			<p><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></p>
			<?/*<a href="<?=htmlspecialcharsbx($arParams['PATH_TO_CATALOG'])?>" class="sale-order-history-link">
				<?=Loc::getMessage('SPOL_TPL_LINK_TO_CATALOG')?>
			</a>*/?>
		</div>
		<?
	}

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$paymentChangeData = array();
		$orderHeaderStatus = null;
		foreach ($arResult['ORDERS'] as $key => $order){
			?>
			<div class="lk-orders__item">
				<div class="lk-orders__flex">
					<div class="lk-orders__data">
						<div class="lk-orders__number"><?=Loc::getMessage('SPOL_TPL_ORDER')?> <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?></div>
						<div class="lk-orders__date">Дата оформления: <span><?=$order['ORDER']['DATE_INSERT_FORMATED']?></span></div>
						<?/*<div class="lk-orders__date">Дата получения: <span></span></div>*/?>
						<?foreach ($order["BASKET_ITEMS"] as $basketItem){?>
						<div class="lk-orders__packet"><?=$basketItem["NAME"]?></div>
						<?/*<div class="lk-orders__packet-item">Наименование комплекта оборудования</div>
						<div class="lk-orders__packet-item">Охранная организация</div>
						<div class="lk-orders__packet-item">Страховка</div>*/?>
						<?}?>
						<div class="lk-orders__buttons">
							<a class="lk-orders__button lk-orders__button-white inline-block" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>"><?=Loc::getMessage('SPOL_TPL_MORE_ON_ORDER')?></a>
							<?foreach ($order["PAYMENT"] as $payment){?>
							<?if ($payment["PAID"] == "N"):?><a class="lk-orders__button lk-orders__button-blue inline-block" target="_blank" href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>"><?=Loc::getMessage('SPOL_TPL_PAY')?></a><?endif;?>
							<?}?>
						</div>
					</div>
					<div class="lk-orders__price">
						<div class="lk-orders__price-value"><?=$payment['FORMATED_SUM']?></div>
						<?/*<div class="lk-orders__status lk-orders__status-gray" title="Текущий статус заказа">Выполнен</div>
						<div class="lk-orders__status lk-orders__status-red" title="Текущий статус заказа">Ожидает оплату</div>
						<div class="lk-orders__status lk-orders__status-green" title="Текущий статус заказа">Принят в работу</div>*/?>
					</div>
				</div>
			</div>
			<?
		}
	}
	else
	{
		$orderHeaderStatus = null;
		foreach ($arResult['ORDERS'] as $key => $order)
		{
			?>
			<div class="lk-orders__item">
				<div class="lk-orders__flex">
					<div class="lk-orders__data">
						<div class="lk-orders__number"><?=Loc::getMessage('SPOL_TPL_ORDER')?> <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?></div>
						<div class="lk-orders__date">Дата оформления: <span><?=$order['ORDER']['DATE_INSERT_FORMATED']?></span></div>
						<?/*<div class="lk-orders__date">Дата получения: <span></span></div>*/?>
						<?foreach ($order["BASKET_ITEMS"] as $basketItem){?>
						<div class="lk-orders__packet"><?=$basketItem["NAME"]?></div>
						<div class="lk-orders__packet-item">Наименование комплекта оборудования</div>
						<div class="lk-orders__packet-item">Охранная организация</div>
						<div class="lk-orders__packet-item">Страховка</div>
						<?}?>
						<div class="lk-orders__buttons">
							<a class="lk-orders__button lk-orders__button-white inline-block" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>"><?=Loc::getMessage('SPOL_TPL_MORE_ON_ORDER')?></a>
							<?foreach ($order["PAYMENT"] as $payment){?>
							<?if ($payment["PAID"] == "N"):?><a class="lk-orders__button lk-orders__button-blue inline-block" target="_blank" href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>"><?=Loc::getMessage('SPOL_TPL_PAY')?></a><?endif;?>
							<?}?>
						</div>
					</div>
					<div class="lk-orders__price">
						<div class="lk-orders__price-value"><?=$payment['FORMATED_SUM']?></div>
						<?/*<div class="lk-orders__status lk-orders__status-gray" title="Текущий статус заказа">Выполнен</div>
						<div class="lk-orders__status lk-orders__status-red" title="Текущий статус заказа">Ожидает оплату</div>
						<div class="lk-orders__status lk-orders__status-green" title="Текущий статус заказа">Принят в работу</div>*/?>
					</div>
				</div>
			</div>
			<?
		}
	}
	?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData,
			"returnUrl" => CUtil::JSEscape($arResult["RETURN_URL"]),
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}
?>
