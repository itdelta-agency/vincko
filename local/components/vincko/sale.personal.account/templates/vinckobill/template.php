<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$userBonuses = CSaleUserAccount::GetByUserID($USER->GetID(), "BNS");
$userTransactList = CSaleUserTransact::GetList(Array("ID" => "DESC"), array("USER_ID" => $USER->GetID()));
if (is_array($arResult["ACCOUNT_LIST"]))
{
	?>
<div class="lk-columns">
	<div class="lk-columns__left">
		<ul class="lk-menu">
			<li><a href="/lk/orders/">Заказы и заявки</a></li>
			<li><a href="/lk/prof/">Мои данные</a></li>
			<li><a class="active" href="/lk/bonuses/">Бонусный счет</a></li>
		</ul>
	</div>
	<div class="lk-columns__right">
		<div class="lk-orders">
			<div class="lk-orders__header">
				<div class="lk-bonus__ballance">Ваш баланс: <span><?=\SaleFormatCurrency($userBonuses["CURRENT_BUDGET"], $userBonuses["CURRENCY"], true);?> бонусов</span></div>
			</div>
			<div class="lk-orders__list">
				<?while ($arUTL = $userTransactList->Fetch()){?>
				<div class="lk-bonus__item">
					<div class="lk-bonus__item-data">
						<div class="lk-bonus__item-number">№<?=$arUTL["ID"]?></div>
						<div class="lk-bonus__item-date">от <?echo ConvertDateTime($arUTL["TRANSACT_DATE"], "DD.MM.YYYY", "ru");?></div>
					</div>
					<div class="lk-bonus__item-comment"><?=$arUTL["NOTES"]?></div>
					<?if ($arUTL["DEBIT"] == "Y"){?>
					<div class="lk-bonus__item-count lk-bonus__item-plus">+<?=ceil($arUTL["AMOUNT"])?> бонусов</div>
					<?}else{?>
					<div class="lk-bonus__item-count lk-bonus__item-minus">-<?=ceil($arUTL["AMOUNT"])?> бонусов</div>
					<?}?>
				</div>
				<?}?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?/*
	<div class="sale-personal-account-wallet-container">
		<div class="sale-personal-account-wallet-title">
			<?=Bitrix\Main\Localization\Loc::getMessage('SPA_BILL_AT')?>
			<?=$arResult["DATE"];?>
		</div>
		<div class="sale-personal-account-wallet-list-container">
			<div class="sale-personal-account-wallet-list">
				<?
					foreach($arResult["ACCOUNT_LIST"] as $accountValue)
					{
						?>
						<div class="sale-personal-account-wallet-list-item">
							<div class="sale-personal-account-wallet-sum"><?=$accountValue['SUM']?></div>
							<div class="sale-personal-account-wallet-currency">
								<div class="sale-personal-account-wallet-currency-item"><?=$accountValue['CURRENCY']?></div>
								<div class="sale-personal-account-wallet-currency-item"><?=$accountValue["CURRENCY_FULL_NAME"]?></div>
							</div>
						</div>
						<?
					}
				?>
			</div>
		</div>
	</div>
	*/?>
	<?
}