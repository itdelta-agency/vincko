<?
defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED === true || die ();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale;

if (!CModule::IncludeModule("sale")) {
	ShowError(GetMessage("SALE_MODULE_NOT_INSTALL"));
	return;
}
?>
<? if ($arResult["isFormNote"] == "Y"): ?>
	<? include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/success.php'); ?>
<? else: ?>
	<style>
		.error_message{display:none}
        .error_message {
            color: red
        }

        .error::-webkit-input-placeholder { /* WebKit browsers */
            color: red;
        }

        .error:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: red;
        }

        .error::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: red;
        }

        .error:-ms-input-placeholder { /* Internet Explorer 10+ */
            color: red;
        }
	</style>
	<?= $arResult["FORM_HEADER"] ?>

	<input type="hidden" name="POLICY_ID" value="<?= $arResult["POLICY_ID"] ?>"/>
	<section class="installment insurance-policy">
		<div class="installment__left-column">
			<h2 class="installment__page-title"><?= $arParams["TITLE"] ?></h2>
			<a href="#short-rd" class="to-short-rd"><?= Loc::getMessage("FORM_POLICY_MORE") ?></a>

			<? // поскольку верстка не стандартная не стоит городить логику, чтобы потом не было трудностей с правкой, а просто отобразим как есть ?>
			<div class="forms">
				<div class="form" id="form-1">
					<div class="h4"><?= Loc::getMessage("FORM_POLICY_STEP_ABOUT") ?></div>
					<div class="close-btn close-btn_hide"><?= Loc::getMessage("FORM_POLICY_EXPAND") ?></div>


					<div class="form__content">
						<div class="form__section">
							<div class="error_message"><p><?= Loc::getMessage("FORM_POLICY_ERROR_MSG") ?></p></div>
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_INFORMATION") ?></div>
							<div class="form__section__content sex">
								<span class="js-check-valid-field"
									  data-field="GENDER"><?= Loc::getMessage("FORM_POLICY_GENDER") ?></span>
								<?= $arResult["QUESTIONS"]["GENDER"]["HTML_CODE"] ?>
							</div>
							<div class="form__section__content name">
								<?= $arResult["QUESTIONS"]["SURNAME"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["NAME"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["PATRONYMIC"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["DATE_OF_BIRTH"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["PLACE_OF_BIRTH"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["EMAIL"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["PHONE"]["HTML_CODE"] ?>
							</div>
						</div>
						<div class="form__section">
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_PASSPORT") ?></div>

							<div class="form__section__content passport">
								<?= $arResult["QUESTIONS"]["PASSPORT"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["PASSPORT_DATE"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["PASSPORT_ISSUED"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["PASSPORT_CODE"]["HTML_CODE"] ?>
							</div>
						</div>
						<div class="form__section">
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_REGISTRATION") ?></div>
							<div class="form__section__content address-registration">
								<?= $arResult["QUESTIONS"]["REGISTRATION_CITY"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["REGISTRATION_STREET"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["REGISTRATION_HOUSE"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["REGISTRATION_HOUSING"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["REGISTRATION_APARTMENT"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["REGISTRATION_DATE"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["REGISTRATION_INDEX"]["HTML_CODE"] ?>
							</div>
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_ACTUAL") ?></div>

							<div class="form__section__content address-residense">
								<?= $arResult["QUESTIONS"]["ACTUAL_ADDRESS"]["HTML_CODE"] ?>

								<div class="no-checked address-registration">
									<?= $arResult["QUESTIONS"]["ACTUAL_CITY"]["HTML_CODE"] ?><br>
									<?= $arResult["QUESTIONS"]["ACTUAL_STREET"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["ACTUAL_HOUSE"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["ACTUAL_HOUSING"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["ACTUAL_APARTMENT"]["HTML_CODE"] ?><br>
									<?= $arResult["QUESTIONS"]["ACTUAL_DATE"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["ACTUAL_INDEX"]["HTML_CODE"] ?>
								</div>
								<p><?= Loc::getMessage("FORM_POLICY_ACTUAL_NOT_REGISTRATION") ?></p>
							</div>
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_ADDRESS") ?></div>
							<div class="form__section__content address-installment">
								<?= $arResult["QUESTIONS"]["POLICY_ADDRESS"]["HTML_CODE"] ?>
								<p><?= Loc::getMessage("FORM_POLICY_ADDRESS_NOT_POLICY") ?></p>
								<div class="address-registration address-installment-other">
									<?= $arResult["QUESTIONS"]["POLICY_CITY"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["POLICY_STREET"]["HTML_CODE"] ?><br/>
									<?= $arResult["QUESTIONS"]["POLICY_HOUSE"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["POLICY_HOUSING"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["POLICY_APARTMENT"]["HTML_CODE"] ?><br/>
									<?= $arResult["QUESTIONS"]["POLICY_DATE"]["HTML_CODE"] ?>
									<?= $arResult["QUESTIONS"]["POLICY_INDEX"]["HTML_CODE"] ?>
								</div>
							</div>
						</div>

					</div>
					<div class="form__bottom">
						<div class="blue-button js-check-form-valid">
							<span><?= Loc::getMessage("FORM_POLICY_NEXT") ?></span></div>
						<?= Loc::getMessage("FORM_POLICY_STEP_AGREEMENT") ?>
					</div>
				</div>
				<div class="form def-close" id="form-2">
					<h4><?= Loc::getMessage("FORM_POLICY_STEP_PAY") ?></h4>
					<div class="close-btn close-btn_hide"><?= Loc::getMessage("FORM_POLICY_EXPAND") ?></div>

					<div class="form__content">
						<div class="form__section">
							<h4><?= Loc::getMessage("FORM_POLICY_PAY") ?></h4>
							<div class="form__section__content">
								<div class="products__payment">
									<div class="products__gray">
										Выберите вариант оплаты:
									</div>
									<? foreach ($arResult["PAYMENT"] as $arPayment): ?>
										<div class="products__payment-item">
											<input type="radio" id="<?= $arPayment["ID"] ?>" name="PAYMENT"
												   value="<?= $arPayment["ID"] ?>"/>
											<label for="<?= $arPayment["ID"] ?>">
												<div class="products__payment-photo">
													<picture>
														<img src="<?= $arPayment["ICON"] ?>">
													</picture>
												</div>
												<div class="products__payment-name">
													<?= $arPayment["NAME"] ?>
												</div>
											</label>
										</div>
									<? endforeach; ?>
								</div>
							</div>
						</div>

					</div>
					<div class="form__bottom">
						<p><?= Loc::getMessage("FORM_POLICY_AGREEMENT") ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="installment__right-column">
			<section class="short-ins ">
				<div id="short-rd" class="short-ins__item products__item hidden">
					<picture class="products__head">
						<img src="<?= $arResult["POLICY"]["IMG"] ?>" alt="<?= $arResult["POLICY"]["NAME"] ?>"/>
					</picture>

					<div class="products__name">
						<div class="products__gray"><?= $arResult["POLICY"]["NAME"] ?></div>
						<div class="h3 products__title">«<?= $arResult["POLICY"]["NAME"] ?>»</div>
					</div>

					<? if ($arResult["POLICY"]["MAX_PRICE"] > 0): ?>
						<div class="products__max-payment">
							<div class="products__container">
								<div class="products__gray"><?= Loc::getMessage("FORM_POLICY_PAYMENT_MAX") ?></div>
								<div class="h3 products__title"><?= $arResult["POLICY"]["MAX_PRICE"] ?></div>
							</div>
						</div>
					<? endif; ?>
					<? if (!empty($arResult["POLICY"]["PAYMENT_OPTIONS"])): ?>
						<div class="products__payment">
							<div class="products__gray">
								<?= Loc::getMessage("FORM_POLICY_PAYMENTS") ?>
							</div>
							<? foreach ($arResult["POLICY"]["PAYMENT_OPTIONS"] as $arPaymentOptions): ?>
								<div class="products__payment-item<?= ($arPaymentOptions["PRICE"] > 0 ? " products__payment-item_active" : "") ?>">
									<div class=" products__payment-photo">
										<picture>
											<img src="<?= $arPaymentOptions["IMG"] ?>"
												 alt="<?= $arPaymentOptions["NAME"] ?>"/>
										</picture>
									</div>
									<div class="products__payment-name"><?= $arPaymentOptions["NAME"] ?></div>
									<div class="products__payment-cost">
										<?= ($arPaymentOptions["PRICE"] > 0 ?
											CurrencyFormat($arPaymentOptions["PRICE"], 'RUB')
											: "нет") ?>
									</div>
								</div>
							<? endforeach; ?>
						</div>
					<? endif; ?>

					<div class="short-rd__footer">
						<a href="<?= $arParams["BACK_LINK"] ?>" class="short-rd-another">
							<svg width="14" height="12" viewBox="0 0 14 12" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									  d="M5.29289 11.7071C5.68342 12.0976 6.31658 12.0976 6.70711 11.7071C7.09763 11.3166 7.09763 10.6834 6.70711 10.2929L3.41421 7L13 7C13.5523 7 14 6.55228 14 6C14 5.44771 13.5523 5 13 5L3.41421 5L6.70711 1.70711C7.09763 1.31658 7.09763 0.683417 6.70711 0.292893C6.31658 -0.0976321 5.68342 -0.0976322 5.29289 0.292893L0.293739 5.29205C0.291278 5.2945 0.28883 5.29697 0.286396 5.29945C0.109253 5.47987 5.48388e-07 5.72718 5.24537e-07 6C5.12683e-07 6.13559 0.0269866 6.26488 0.0758796 6.38278C0.12432 6.49986 0.195951 6.6096 0.290776 6.70498M5.29289 11.7071L0.293092 6.7073L5.29289 11.7071Z"
									  fill="#005DFF"/>
							</svg>
							<?= GetMessage("FORM_POLICY_ANOTHER") ?>
						</a>
					</div>

				</div>
			</section>

			<div class="installment__rules installment__rules--active">
				<? $APPLICATION->IncludeFile('/include/order_policy_agreement.php'); ?>

				<?= $arResult["QUESTIONS"]["AGREEMENT"]["HTML_CODE"] ?>
				<button type="submit" class="button yellow-button" name="web_form_apply"
						value="1"><?= $arResult["arForm"]["BUTTON"] ?></button>

			</div>
		</div>

	</section>
	<?= $arResult["FORM_FOOTER"] ?>
<? endif; ?>
