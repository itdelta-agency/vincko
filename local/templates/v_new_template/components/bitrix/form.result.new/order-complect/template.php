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
<? if (!$USER->IsAuthorized()): ?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:system.auth.authorize",
		"",
		array()
	); ?>
<? else: ?>
<? if ($arResult["isFormNote"] == "Y"): ?>

	<? include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/success.php'); ?>

<? else: ?>

	<style>
        .error_message {
            display: none
        }

        .error_message,.error {
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

        .products__payment-photo {
            float: left;
            margin: 5px;
        }

        .products__payment-name {
            margin: 5px
        }

        .products__payment-item label {
            float: left;
            margin: 5px;
        }

        .products__payment-item {
            padding: 10px 0;
            overflow: hidden;
        }
	</style>

	<?= $arResult["FORM_HEADER"] ?>
		<? // УБРАТЬ БЛОК ПРИ ПЕРЕНОСЕ НА БОЙ ?>
		<div id="test" style="cursor:pointer">Заполнить тестовыми данными</div>
	<script>
		$(document).ready(function () {
			$("#test").click(function (){
				$(".js-check-valid-field").each(function(i){
					var name = $(this).attr("name");
					if(name!== undefined) {
						if (name.indexOf("text")!=-1) {
							$(this).val($(this).attr("placeholder"));
						} else if (name.indexOf("date")!=-1) {
							$(this).val("2020-07-21");
						} else if (name.indexOf("email")!=-1) {
							$(this).val("test@test.ru");
						}
					}
				});
			});

		})
	</script>
		<?// УБРАТЬ БЛОК ПРИ ПЕРЕНОСЕ НА БОЙ?>

		<input type="hidden" name="form_hidden_<?= $arResult["QUESTIONS"]["POLICY_ID"]["STRUCTURE"][0]["ID"] ?>"
		   value="<?= $arResult["POLICY_ID"] ?>"/>
	<section class="installment insurance-policy">
		<div class="installment__left-column">
			<h2 class="installment__page-title"><?= $arParams["TITLE"] ?></h2>
			<a href="#short-rd" class="to-short-rd"><?= Loc::getMessage("FORM_POLICY_MORE") ?></a>

			<div class="forms">
				<div class="form open" id="form-1">
					<div class="h4"><?= Loc::getMessage("FORM_POLICY_STEP_ABOUT") ?></div>
					<div class="close-btn close-btn_hide"><?= Loc::getMessage("FORM_POLICY_EXPAND") ?></div>

					<div class="form__content">
						<div class="form__section">
							<div class="error_message"<?= (!empty($arResult['FORM_ERRORS']) ? " style='display:block'" : "") ?>>
								<p><?= Loc::getMessage("FORM_POLICY_ERROR_MSG") ?></p></div>
							<div class="h4"><?= Loc::getMessage("FORM_POLICY_INFORMATION") ?></div>
							<div class="form__section__content name">
								<?= $arResult["QUESTIONS"]["SURNAME"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["NAME"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["PATRONYMIC"]["HTML_CODE"] ?>
								<?= $arResult["QUESTIONS"]["EMAIL"]["HTML_CODE"] ?><br/>
								<?= $arResult["QUESTIONS"]["PHONE"]["HTML_CODE"] ?>
                                <?= $arResult["QUESTIONS"]["ORDER_COMMENT"]["HTML_CODE"] ?>
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
											<label for="<?= $arPayment["ID"] ?>"></label>
											<div class="products__payment-photo">
												<picture>
													<img src="<?= $arPayment["ICON"] ?>" width="20px">
												</picture>
											</div>
											<div class="products__payment-name">
												<?= $arPayment["NAME"] ?>
											</div>

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

					<? $APPLICATION->IncludeComponent(
						'bitrix:main.include', '',
						[
							'AREA_FILE_SHOW' => 'file',
							'EDIT_TEMPLATE'  => '',
							'PATH'           => '/include/policy_template.php',
							'POLICY'         => $arResult["POLICY"],
						]
					); ?>

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

			<div class="installment__rules installment__rules--active<?=(!empty($arResult["FORM_ERRORS"]["AGREEMENT"]) ? " error" : "")?> js-check-valid-field" data-field="AGREEMENT" >
				<? $APPLICATION->IncludeFile('/include/order_policy_agreement.php'); ?>
				<?= $arResult["QUESTIONS"]["AGREEMENT"]["HTML_CODE"] ?>
				<button type="submit" class="button yellow-button" name="web_form_apply"
						value="1"><?= $arResult["arForm"]["BUTTON"] ?></button>

			</div>
		</div>

	</section>
	<?= $arResult["FORM_FOOTER"] ?>
<? endif; ?>
<? endif; ?>