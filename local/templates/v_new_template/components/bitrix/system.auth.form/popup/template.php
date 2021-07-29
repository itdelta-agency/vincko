<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

if ($request->isAjaxRequest()) {
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/ajax.php');
}
?>





<div class="popup popup--registration hidden">
	<div class="popup__wall"></div>

	<div class="popup__content">

		<div class="popup__head">
			<div class="popup__close">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.99926 7.99993L14.8713 2.12784C14.9874 1.99234 15.048 1.81804 15.0411 1.63977C15.0343 1.46149 14.9604 1.29239 14.8342 1.16624C14.7081 1.04009 14.5389 0.966185 14.3607 0.959299C14.1824 0.952413 14.0081 1.01305 13.8726 1.12909L8.00051 7.00118L2.12843 1.12201C1.99504 0.988629 1.81414 0.913696 1.62551 0.913696C1.43688 0.913696 1.25598 0.988629 1.12259 1.12201C0.989211 1.25539 0.914278 1.4363 0.914278 1.62493C0.914278 1.81356 0.989211 1.99446 1.12259 2.12784L7.00176 7.99993L1.12259 13.872C1.04844 13.9355 0.988221 14.0137 0.945705 14.1015C0.903188 14.1894 0.879296 14.2851 0.875528 14.3827C0.87176 14.4802 0.888197 14.5775 0.923808 14.6684C0.959419 14.7593 1.01344 14.8419 1.08247 14.9109C1.1515 14.9799 1.23405 15.0339 1.32495 15.0695C1.41584 15.1052 1.51312 15.1216 1.61067 15.1178C1.70822 15.1141 1.80394 15.0902 1.89182 15.0477C1.9797 15.0051 2.05784 14.9449 2.12134 14.8708L8.00051 8.99868L13.8726 14.8708C14.0081 14.9868 14.1824 15.0474 14.3607 15.0406C14.5389 15.0337 14.7081 14.9598 14.8342 14.8336C14.9604 14.7075 15.0343 14.5384 15.0411 14.3601C15.048 14.1818 14.9874 14.0075 14.8713 13.872L8.99926 7.99993Z"
						  fill="#005DFF"/>
				</svg>
			</div>
			<div class="popup__title black">
				Давайте знакомиться
			</div>

			<div class="popup__text">
				Если у вас уже есть аккаунт - нажмите кнопку <span>“Войти”</span>.
			</div>

			<p class="popup__text grey">
				Чтобы получить доступ ко всем возможностям взаимодействия с платформой <span>vincko:</span> пожалуйста,
				пройдите простую процедуру знакомства и получите временный пароль.
			</p>
		</div>
		<div class="popup__main">
			<form class="popup__form popup__dub-form">
				<div class="popup__form popup__form--name">

					<div class="popup__form-title">
						<div class="info-popup-2">
							<div class="info-popup-2__wrapper">
								<div class="info-popup-2__sign">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path d="M7.00004 0.333344C5.6815 0.333344 4.39257 0.724337 3.29624 1.45688C2.19991 2.18942 1.34543 3.23061 0.840847 4.44879C0.336263 5.66696 0.20424 7.00741 0.461475 8.30061C0.71871 9.59382 1.35365 10.7817 2.286 11.7141C3.21835 12.6464 4.40623 13.2813 5.69944 13.5386C6.99265 13.7958 8.33309 13.6638 9.55127 13.1592C10.7694 12.6546 11.8106 11.8001 12.5432 10.7038C13.2757 9.60748 13.6667 8.31855 13.6667 7.00001C13.6667 6.12453 13.4943 5.25762 13.1592 4.44879C12.8242 3.63995 12.3331 2.90502 11.7141 2.28596C11.095 1.66691 10.3601 1.17584 9.55127 0.840813C8.74243 0.505782 7.87552 0.333344 7.00004 0.333344ZM7.00004 11C6.86819 11 6.7393 10.9609 6.62966 10.8877C6.52003 10.8144 6.43458 10.7103 6.38412 10.5885C6.33367 10.4666 6.32046 10.3326 6.34619 10.2033C6.37191 10.074 6.4354 9.95517 6.52864 9.86194C6.62187 9.7687 6.74066 9.70521 6.86998 9.67949C6.9993 9.65376 7.13335 9.66697 7.25517 9.71742C7.37698 9.76788 7.4811 9.85333 7.55436 9.96296C7.62761 10.0726 7.66671 10.2015 7.66671 10.3333C7.66671 10.5102 7.59647 10.6797 7.47145 10.8047C7.34642 10.9298 7.17685 11 7.00004 11ZM7.66671 7.56001V8.33334C7.66671 8.51015 7.59647 8.67972 7.47145 8.80475C7.34642 8.92977 7.17685 9.00001 7.00004 9.00001C6.82323 9.00001 6.65366 8.92977 6.52864 8.80475C6.40361 8.67972 6.33338 8.51015 6.33338 8.33334V7.00001C6.33338 6.8232 6.40361 6.65363 6.52864 6.52861C6.65366 6.40358 6.82323 6.33334 7.00004 6.33334C7.19782 6.33334 7.39116 6.27469 7.55561 6.16481C7.72006 6.05493 7.84824 5.89875 7.92392 5.71603C7.99961 5.5333 8.01941 5.33223 7.98083 5.13825C7.94224 4.94427 7.847 4.76609 7.70715 4.62624C7.5673 4.48638 7.38911 4.39114 7.19513 4.35256C7.00115 4.31397 6.80009 4.33378 6.61736 4.40946C6.43463 4.48515 6.27846 4.61332 6.16857 4.77777C6.05869 4.94222 6.00004 5.13556 6.00004 5.33334C6.00004 5.51015 5.92981 5.67972 5.80478 5.80475C5.67976 5.92977 5.51019 6.00001 5.33338 6.00001C5.15657 6.00001 4.987 5.92977 4.86197 5.80475C4.73695 5.67972 4.66671 5.51015 4.66671 5.33334C4.66497 4.90021 4.78382 4.47514 5.00995 4.10573C5.23609 3.73631 5.56059 3.43713 5.94712 3.24168C6.33365 3.04623 6.76696 2.96223 7.19852 2.99907C7.63009 3.03592 8.04288 3.19216 8.39068 3.45031C8.73848 3.70846 9.00757 4.05832 9.16781 4.46072C9.32805 4.86313 9.37312 5.30219 9.29797 5.72876C9.22283 6.15533 9.03044 6.55256 8.74233 6.87598C8.45423 7.19941 8.08179 7.43625 7.66671 7.56001Z"
											  fill="#005DFF"/>
									</svg>

								</div>
								<div class="info-popup-2__text">
									На платформе Ваши данные будут отображаться в формате Имя Ф.
									<br><br>
									Например, “Мария С.”
								</div>
							</div>
						</div>
						Скажите, как Вас зовут?
					</div>
					<div class="inputs-wrapper">
						<input placeholder="Ваше имя" type="text" class="text-input">
						<input placeholder="Ваше имя" type="text" class="text-input">
					</div>

					<p class="popup__text grey">
						Если в дальнейшем Вы планируете участвовать в акциях и программе лояльности или совершать
						покупки на платформе <span>vincko:</span> - введите настоящие имя и фамилию.
					</p>
				</div>

				<div class="popup__form popup__form--phone">
					<div class="popup__form-title">
						<div class="info-popup-2">
							<div class="info-popup-2__wrapper">
								<div class="info-popup-2__sign">
									<svg width="14" height="14" viewBox="0 0 14 14" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path d="M7.00004 0.333344C5.6815 0.333344 4.39257 0.724337 3.29624 1.45688C2.19991 2.18942 1.34543 3.23061 0.840847 4.44879C0.336263 5.66696 0.20424 7.00741 0.461475 8.30061C0.71871 9.59382 1.35365 10.7817 2.286 11.7141C3.21835 12.6464 4.40623 13.2813 5.69944 13.5386C6.99265 13.7958 8.33309 13.6638 9.55127 13.1592C10.7694 12.6546 11.8106 11.8001 12.5432 10.7038C13.2757 9.60748 13.6667 8.31855 13.6667 7.00001C13.6667 6.12453 13.4943 5.25762 13.1592 4.44879C12.8242 3.63995 12.3331 2.90502 11.7141 2.28596C11.095 1.66691 10.3601 1.17584 9.55127 0.840813C8.74243 0.505782 7.87552 0.333344 7.00004 0.333344ZM7.00004 11C6.86819 11 6.7393 10.9609 6.62966 10.8877C6.52003 10.8144 6.43458 10.7103 6.38412 10.5885C6.33367 10.4666 6.32046 10.3326 6.34619 10.2033C6.37191 10.074 6.4354 9.95517 6.52864 9.86194C6.62187 9.7687 6.74066 9.70521 6.86998 9.67949C6.9993 9.65376 7.13335 9.66697 7.25517 9.71742C7.37698 9.76788 7.4811 9.85333 7.55436 9.96296C7.62761 10.0726 7.66671 10.2015 7.66671 10.3333C7.66671 10.5102 7.59647 10.6797 7.47145 10.8047C7.34642 10.9298 7.17685 11 7.00004 11ZM7.66671 7.56001V8.33334C7.66671 8.51015 7.59647 8.67972 7.47145 8.80475C7.34642 8.92977 7.17685 9.00001 7.00004 9.00001C6.82323 9.00001 6.65366 8.92977 6.52864 8.80475C6.40361 8.67972 6.33338 8.51015 6.33338 8.33334V7.00001C6.33338 6.8232 6.40361 6.65363 6.52864 6.52861C6.65366 6.40358 6.82323 6.33334 7.00004 6.33334C7.19782 6.33334 7.39116 6.27469 7.55561 6.16481C7.72006 6.05493 7.84824 5.89875 7.92392 5.71603C7.99961 5.5333 8.01941 5.33223 7.98083 5.13825C7.94224 4.94427 7.847 4.76609 7.70715 4.62624C7.5673 4.48638 7.38911 4.39114 7.19513 4.35256C7.00115 4.31397 6.80009 4.33378 6.61736 4.40946C6.43463 4.48515 6.27846 4.61332 6.16857 4.77777C6.05869 4.94222 6.00004 5.13556 6.00004 5.33334C6.00004 5.51015 5.92981 5.67972 5.80478 5.80475C5.67976 5.92977 5.51019 6.00001 5.33338 6.00001C5.15657 6.00001 4.987 5.92977 4.86197 5.80475C4.73695 5.67972 4.66671 5.51015 4.66671 5.33334C4.66497 4.90021 4.78382 4.47514 5.00995 4.10573C5.23609 3.73631 5.56059 3.43713 5.94712 3.24168C6.33365 3.04623 6.76696 2.96223 7.19852 2.99907C7.63009 3.03592 8.04288 3.19216 8.39068 3.45031C8.73848 3.70846 9.00757 4.05832 9.16781 4.46072C9.32805 4.86313 9.37312 5.30219 9.29797 5.72876C9.22283 6.15533 9.03044 6.55256 8.74233 6.87598C8.45423 7.19941 8.08179 7.43625 7.66671 7.56001Z"
											  fill="#005DFF"/>
									</svg>

								</div>
								<div class="info-popup-2__text">
									Это необходимо для того, чтобы мы могли удостовериться, что Вы - насятоящий человек.
									Будьте уверены: мы не будем Вас спамить сообщениями!
									<br><br>
									<div class="popup__ps">
										С уважением к Вам и Вашему личному пространству,
										Ваш <span>vincko:</span>
									</div>
								</div>
							</div>
						</div>
						Ваш номер телефона
					</div>


					<!-- unknown -->

					<div class="phone-wrapper">
						<input placeholder="Номер телефона" type="tel" class="phone-input">
						<div class="info-popup">
							<div class="info-popup__wrapper">
								<div class="info-popup__sign">
									<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<path d="M8.99996 17.3333C4.40496 17.3333 0.666626 13.595 0.666626 8.99998C0.666626 4.40498 4.40496 0.666645 8.99996 0.666645C13.595 0.666645 17.3333 4.40498 17.3333 8.99998C17.3333 13.595 13.595 17.3333 8.99996 17.3333ZM9.83329 4.83331H8.16663V9.83331H9.83329V4.83331ZM9.83329 11.5H8.16663V13.1666H9.83329V11.5Z"
											  fill="#FF3232"/>
									</svg>
								</div>
								<div class="info-popup__text">
									Извините, пользователь с таким номером телефона не зарегистрирован. Проверьте
									правильность ввода номера.
								</div>
							</div>
						</div>
					</div>


					<div class="popup__wait">
						<div class="popup__wait-time">
							Повторно через

							<span class="popup__wait-num">
                                    20
                                </span>
							сек
						</div>
						<div class="popup__wait-repeat">
							Отправить повторно
						</div>
					</div>


					<div class="grey-border-button grey-border-button--unactive">
						Отправить sms
					</div>

					<div class="popup__phone-error popup__phone-error-incorrect">
						Неверный код
					</div>


					<div class="popup__phone-error popup__phone-error-time">
						Время истекло
					</div>


					<input type="text" placeholder="Код из SMS" class="popup__code">

					<div class="popup__send-code blue-button">
						<svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M9.64018 0.731804C10.0645 1.08537 10.1218 1.71593 9.76822 2.14021L4.76822 8.14021C4.58836 8.35605 4.32599 8.48627 4.04531 8.499C3.76464 8.51173 3.49156 8.4058 3.29289 8.20713L0.292893 5.20713C-0.0976311 4.81661 -0.0976311 4.18344 0.292893 3.79292C0.683417 3.40239 1.31658 3.40239 1.70711 3.79292L3.9328 6.01861L8.23178 0.859841C8.58534 0.435564 9.21591 0.37824 9.64018 0.731804Z"
								  fill="white"/>
						</svg>

					</div>

					<div class="popup__success">
						<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
								  d="M16.1402 7.7318C16.5645 8.08537 16.6218 8.71593 16.2682 9.14021L11.2682 15.1402C11.0884 15.356 10.826 15.4863 10.5453 15.499C10.2646 15.5117 9.99156 15.4058 9.79289 15.2071L6.79289 12.2071C6.40237 11.8166 6.40237 11.1834 6.79289 10.7929C7.18342 10.4024 7.81658 10.4024 8.20711 10.7929L10.4328 13.0186L14.7318 7.85984C15.0853 7.43556 15.7159 7.37824 16.1402 7.7318Z"
								  fill="white"/>
							<path d="M11.5 21C17.0228 21 21.5 16.5228 21.5 11C21.5 5.47715 17.0228 1 11.5 1C5.97715 1 1.5 5.47715 1.5 11C1.5 16.5228 5.97715 21 11.5 21Z"
								  stroke="white" stroke-width="2"/>
						</svg>

						Успешно

					</div>
				</div>

				<input type="checkbox" id="agree">
				<label class="remember-me" for="agree">
                        <span class="box">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.64816 8.64652L2.35516 5.35352L0.941162 6.76752L5.64816 11.4745L15.3552 1.76752L13.9412 0.353516L5.64816 8.64652Z"
									  fill="#005DFF"/>
                            </svg>

                        </span>
					Нажимая кнопку «Зарегистрироваться», я даю свое согласие на обработку моих персональных данных, в
					соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и
					для целей, определенных в Согласии на обработку персональных данных
				</label>

			</form>
		</div>

		<div class="popup__bottom">
			<div class="blue-button btn-registration btn-registration--unactive">
				Зарегистрироваться
			</div>

			<div class="text-button to-login">
				Войти
			</div>
		</div>
	</div>
</div>


<div class="popup popup--login hidden">
	<div class="popup__wall"></div>

	<div class="popup__content">

		<div class="popup__head">
			<div class="popup__close">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.99926 7.99993L14.8713 2.12784C14.9874 1.99234 15.048 1.81804 15.0411 1.63977C15.0343 1.46149 14.9604 1.29239 14.8342 1.16624C14.7081 1.04009 14.5389 0.966185 14.3607 0.959299C14.1824 0.952413 14.0081 1.01305 13.8726 1.12909L8.00051 7.00118L2.12843 1.12201C1.99504 0.988629 1.81414 0.913696 1.62551 0.913696C1.43688 0.913696 1.25598 0.988629 1.12259 1.12201C0.989211 1.25539 0.914278 1.4363 0.914278 1.62493C0.914278 1.81356 0.989211 1.99446 1.12259 2.12784L7.00176 7.99993L1.12259 13.872C1.04844 13.9355 0.988221 14.0137 0.945705 14.1015C0.903188 14.1894 0.879296 14.2851 0.875528 14.3827C0.87176 14.4802 0.888197 14.5775 0.923808 14.6684C0.959419 14.7593 1.01344 14.8419 1.08247 14.9109C1.1515 14.9799 1.23405 15.0339 1.32495 15.0695C1.41584 15.1052 1.51312 15.1216 1.61067 15.1178C1.70822 15.1141 1.80394 15.0902 1.89182 15.0477C1.9797 15.0051 2.05784 14.9449 2.12134 14.8708L8.00051 8.99868L13.8726 14.8708C14.0081 14.9868 14.1824 15.0474 14.3607 15.0406C14.5389 15.0337 14.7081 14.9598 14.8342 14.8336C14.9604 14.7075 15.0343 14.5384 15.0411 14.3601C15.048 14.1818 14.9874 14.0075 14.8713 13.872L8.99926 7.99993Z"
						  fill="#005DFF"/>
				</svg>
			</div>
			<div class="popup__title">
				Мы уже знакомы ?
			</div>

			<div class="popup__text">
				Войдите в свой аккаунт <span>vincko:</span> или зарегистрируйтесь
			</div>
		</div>
		<form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
			<? if ($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
			<? endif ?>
			<input type="hidden" name="AUTH_FORM" value="Y"/>
			<input type="hidden" name="TYPE" value="AUTH"/>

			<div class="popup__main">
				<div class="popup__form">
					<div class="popup__form-title">
						Данные для входа
					</div>
					<input type="tel" name="USER_LOGIN" class="phone-input" placeholder="Номер телефона"/>
					<div class="pass-wrapper">
						<input type="password" name="USER_PASSWORD" placeholder="Пароль" class="pass-input"/>
						<div class="pass__eye">
							<svg width="16" height="12" viewBox="0 0 16 12" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
								<path d="M16 6C16 6 13 0.5 8 0.5C3 0.5 0 6 0 6C0 6 3 11.5 8 11.5C13 11.5 16 6 16 6ZM1.173 6C1.65651 5.26512 2.21264 4.58069 2.833 3.957C4.12 2.668 5.88 1.5 8 1.5C10.12 1.5 11.879 2.668 13.168 3.957C13.7884 4.58069 14.3445 5.26512 14.828 6C14.77 6.087 14.706 6.183 14.633 6.288C14.298 6.768 13.803 7.408 13.168 8.043C11.879 9.332 10.119 10.5 8 10.5C5.88 10.5 4.121 9.332 2.832 8.043C2.21165 7.41931 1.65552 6.73487 1.172 6H1.173Z"
									  fill="black"/>
								<path d="M8 3.5C7.33696 3.5 6.70107 3.76339 6.23223 4.23223C5.76339 4.70107 5.5 5.33696 5.5 6C5.5 6.66304 5.76339 7.29893 6.23223 7.76777C6.70107 8.23661 7.33696 8.5 8 8.5C8.66304 8.5 9.29893 8.23661 9.76777 7.76777C10.2366 7.29893 10.5 6.66304 10.5 6C10.5 5.33696 10.2366 4.70107 9.76777 4.23223C9.29893 3.76339 8.66304 3.5 8 3.5ZM4.5 6C4.5 5.07174 4.86875 4.1815 5.52513 3.52513C6.1815 2.86875 7.07174 2.5 8 2.5C8.92826 2.5 9.8185 2.86875 10.4749 3.52513C11.1313 4.1815 11.5 5.07174 11.5 6C11.5 6.92826 11.1313 7.8185 10.4749 8.47487C9.8185 9.13125 8.92826 9.5 8 9.5C7.07174 9.5 6.1815 9.13125 5.52513 8.47487C4.86875 7.8185 4.5 6.92826 4.5 6Z"
									  fill="black"/>
							</svg>
						</div>
					</div>

					<div class="forget-pass">
						<noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
									rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
					</div>

					<input type="checkbox" id="remember-me">
					<label class="remember-me" for="remember-me">
                        <span class="box">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.64816 8.64652L2.35516 5.35352L0.941162 6.76752L5.64816 11.4745L15.3552 1.76752L13.9412 0.353516L5.64816 8.64652Z"
									  fill="#005DFF"/>
                            </svg>

                        </span>
						Запомнить меня
					</label>

				</div>
			</div>

			<div class="popup__bottom">
					<input type="submit"   class="blue-button" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>


				<div class="text-button to-registration">
					<noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
								rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
				</div>
			</div>
		</form>
	</div>
</div>


<div class="popup popup--forget hidden">
	<div class="popup__wall"></div>

	<div class="popup__content">

		<div class="popup__head">
			<div class="popup__close">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.99926 7.99993L14.8713 2.12784C14.9874 1.99234 15.048 1.81804 15.0411 1.63977C15.0343 1.46149 14.9604 1.29239 14.8342 1.16624C14.7081 1.04009 14.5389 0.966185 14.3607 0.959299C14.1824 0.952413 14.0081 1.01305 13.8726 1.12909L8.00051 7.00118L2.12843 1.12201C1.99504 0.988629 1.81414 0.913696 1.62551 0.913696C1.43688 0.913696 1.25598 0.988629 1.12259 1.12201C0.989211 1.25539 0.914278 1.4363 0.914278 1.62493C0.914278 1.81356 0.989211 1.99446 1.12259 2.12784L7.00176 7.99993L1.12259 13.872C1.04844 13.9355 0.988221 14.0137 0.945705 14.1015C0.903188 14.1894 0.879296 14.2851 0.875528 14.3827C0.87176 14.4802 0.888197 14.5775 0.923808 14.6684C0.959419 14.7593 1.01344 14.8419 1.08247 14.9109C1.1515 14.9799 1.23405 15.0339 1.32495 15.0695C1.41584 15.1052 1.51312 15.1216 1.61067 15.1178C1.70822 15.1141 1.80394 15.0902 1.89182 15.0477C1.9797 15.0051 2.05784 14.9449 2.12134 14.8708L8.00051 8.99868L13.8726 14.8708C14.0081 14.9868 14.1824 15.0474 14.3607 15.0406C14.5389 15.0337 14.7081 14.9598 14.8342 14.8336C14.9604 14.7075 15.0343 14.5384 15.0411 14.3601C15.048 14.1818 14.9874 14.0075 14.8713 13.872L8.99926 7.99993Z"
						  fill="#005DFF"/>
				</svg>
			</div>
			<div class="popup__title">
				Восстановление пароля
			</div>

			<div class="popup__switch">
				<div class="popup__switch-item popup__switch-item-left popup__switch-item--active">По номеру телефона
				</div>

				<div class="popup__switch-choice">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="1" y="1" width="22" height="22" rx="11" fill="#93B6FF"/>
						<rect x="1" y="1" width="22" height="22" rx="11" stroke="white" stroke-width="2"/>
					</svg>
				</div>

				<div class="popup__switch-item popup__switch-item-right ">По эл. почте</div>

			</div>
			<div class="popup__text">
				Введите свой номер телефона <br> на который мы отправим код подтверждения
			</div>
		</div>
		<div class="popup__main">
			<form class="popup__form popup__form--phone">
				<div class="popup__form-title">
					Ваш номер телефона
				</div>


				<!-- unknown -->

				<div class="phone-wrapper">
					<input placeholder="Номер телефона" type="tel" class="phone-input">
					<div class="info-popup">
						<div class="info-popup__wrapper">
							<div class="info-popup__sign">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99996 17.3333C4.40496 17.3333 0.666626 13.595 0.666626 8.99998C0.666626 4.40498 4.40496 0.666645 8.99996 0.666645C13.595 0.666645 17.3333 4.40498 17.3333 8.99998C17.3333 13.595 13.595 17.3333 8.99996 17.3333ZM9.83329 4.83331H8.16663V9.83331H9.83329V4.83331ZM9.83329 11.5H8.16663V13.1666H9.83329V11.5Z"
										  fill="#FF3232"/>
								</svg>
							</div>
							<div class="info-popup__text">
								Извините, пользователь с таким номером телефона не зарегистрирован. Проверьте
								правильность ввода номера.
							</div>
						</div>
					</div>
				</div>


				<div class="popup__wait">
					<div class="popup__wait-time">
						Повторно через

						<span class="popup__wait-num">
                                20
                            </span>
						сек
					</div>
					<div class="popup__wait-repeat">
						Отправить повторно
					</div>
				</div>


				<div class="grey-border-button grey-border-button--unactive">
					Отправить sms
				</div>

				<input type="text" placeholder="Код из SMS" class="popup__code">

				<div class="popup__send-code blue-button">
					<svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							  d="M9.64018 0.731804C10.0645 1.08537 10.1218 1.71593 9.76822 2.14021L4.76822 8.14021C4.58836 8.35605 4.32599 8.48627 4.04531 8.499C3.76464 8.51173 3.49156 8.4058 3.29289 8.20713L0.292893 5.20713C-0.0976311 4.81661 -0.0976311 4.18344 0.292893 3.79292C0.683417 3.40239 1.31658 3.40239 1.70711 3.79292L3.9328 6.01861L8.23178 0.859841C8.58534 0.435564 9.21591 0.37824 9.64018 0.731804Z"
							  fill="white"/>
					</svg>

				</div>

				<div class="popup__success">
					<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							  d="M16.1402 7.7318C16.5645 8.08537 16.6218 8.71593 16.2682 9.14021L11.2682 15.1402C11.0884 15.356 10.826 15.4863 10.5453 15.499C10.2646 15.5117 9.99156 15.4058 9.79289 15.2071L6.79289 12.2071C6.40237 11.8166 6.40237 11.1834 6.79289 10.7929C7.18342 10.4024 7.81658 10.4024 8.20711 10.7929L10.4328 13.0186L14.7318 7.85984C15.0853 7.43556 15.7159 7.37824 16.1402 7.7318Z"
							  fill="white"/>
						<path d="M11.5 21C17.0228 21 21.5 16.5228 21.5 11C21.5 5.47715 17.0228 1 11.5 1C5.97715 1 1.5 5.47715 1.5 11C1.5 16.5228 5.97715 21 11.5 21Z"
							  stroke="white" stroke-width="2"/>
					</svg>

					Успешно

				</div>
			</form>

			<form class="popup__form popup__form--mail">
				<div class="popup__form-title">
					Адрес эл. почты
				</div>

				<div class="popup__wait">
				</div>
				<!-- unknown -->
				<div class="phone-wrapper">
					<input placeholder="e-mail" type="text" class="email-input">
					<div class="info-popup">
						<div class="info-popup__wrapper">
							<div class="info-popup__sign">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99996 17.3333C4.40496 17.3333 0.666626 13.595 0.666626 8.99998C0.666626 4.40498 4.40496 0.666645 8.99996 0.666645C13.595 0.666645 17.3333 4.40498 17.3333 8.99998C17.3333 13.595 13.595 17.3333 8.99996 17.3333ZM9.83329 4.83331H8.16663V9.83331H9.83329V4.83331ZM9.83329 11.5H8.16663V13.1666H9.83329V11.5Z"
										  fill="#FF3232"/>
								</svg>
							</div>
							<div class="info-popup__text">
								Извините, пользователь с таким почтовым адресом не зарегистрирован. Проверьте
								правильность ввода почты.
							</div>
						</div>
					</div>
				</div>

				<div class="grey-border-button grey-border-button--unactive">
					Отправить письмо
				</div>

				<input type="text" placeholder="Код из SMS" class="popup__code">


				<div class="popup__success">
					<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							  d="M16.1402 7.7318C16.5645 8.08537 16.6218 8.71593 16.2682 9.14021L11.2682 15.1402C11.0884 15.356 10.826 15.4863 10.5453 15.499C10.2646 15.5117 9.99156 15.4058 9.79289 15.2071L6.79289 12.2071C6.40237 11.8166 6.40237 11.1834 6.79289 10.7929C7.18342 10.4024 7.81658 10.4024 8.20711 10.7929L10.4328 13.0186L14.7318 7.85984C15.0853 7.43556 15.7159 7.37824 16.1402 7.7318Z"
							  fill="white"/>
						<path d="M11.5 21C17.0228 21 21.5 16.5228 21.5 11C21.5 5.47715 17.0228 1 11.5 1C5.97715 1 1.5 5.47715 1.5 11C1.5 16.5228 5.97715 21 11.5 21Z"
							  stroke="white" stroke-width="2"/>
					</svg>

					Отправлено

				</div>
			</form>
		</div>

		<div class="popup__bottom">
			<div class="new-pass-button blue-button blue-button--unactive">
				Обновить пароль
			</div>

			<div class="popup__bottom-b">
				<div class="text-button to-login">
					Войти
				</div>

				<div class="text-button to-registration">
					Зарегистрироваться
				</div>
			</div>
		</div>
	</div>
</div>


<div class="popup popup--new-pass hidden">
	<div class="popup__wall"></div>

	<div class="popup__content">

		<div class="popup__head">
			<div class="popup__close">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.99926 7.99993L14.8713 2.12784C14.9874 1.99234 15.048 1.81804 15.0411 1.63977C15.0343 1.46149 14.9604 1.29239 14.8342 1.16624C14.7081 1.04009 14.5389 0.966185 14.3607 0.959299C14.1824 0.952413 14.0081 1.01305 13.8726 1.12909L8.00051 7.00118L2.12843 1.12201C1.99504 0.988629 1.81414 0.913696 1.62551 0.913696C1.43688 0.913696 1.25598 0.988629 1.12259 1.12201C0.989211 1.25539 0.914278 1.4363 0.914278 1.62493C0.914278 1.81356 0.989211 1.99446 1.12259 2.12784L7.00176 7.99993L1.12259 13.872C1.04844 13.9355 0.988221 14.0137 0.945705 14.1015C0.903188 14.1894 0.879296 14.2851 0.875528 14.3827C0.87176 14.4802 0.888197 14.5775 0.923808 14.6684C0.959419 14.7593 1.01344 14.8419 1.08247 14.9109C1.1515 14.9799 1.23405 15.0339 1.32495 15.0695C1.41584 15.1052 1.51312 15.1216 1.61067 15.1178C1.70822 15.1141 1.80394 15.0902 1.89182 15.0477C1.9797 15.0051 2.05784 14.9449 2.12134 14.8708L8.00051 8.99868L13.8726 14.8708C14.0081 14.9868 14.1824 15.0474 14.3607 15.0406C14.5389 15.0337 14.7081 14.9598 14.8342 14.8336C14.9604 14.7075 15.0343 14.5384 15.0411 14.3601C15.048 14.1818 14.9874 14.0075 14.8713 13.872L8.99926 7.99993Z"
						  fill="#005DFF"/>
				</svg>
			</div>
			<div class="popup__title">
				Восстановление пароля
			</div>

			<div class="popup__subtitle">
				Здравствуйте, Александр!
			</div>

			<div class="popup__text">
				Придумайте новый, надежный пароль состоящий минимум из 8 символов.
			</div>
		</div>
		<div class="popup__main">
			<form class="popup__form">
				<div class="popup__form-title">
					Новый пароль
				</div>

				<div class="pass-wrapper">
					<input placeholder="Пароль" type="password" class="pass-input">
					<div class="pass__eye">
						<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16 6C16 6 13 0.5 8 0.5C3 0.5 0 6 0 6C0 6 3 11.5 8 11.5C13 11.5 16 6 16 6ZM1.173 6C1.65651 5.26512 2.21264 4.58069 2.833 3.957C4.12 2.668 5.88 1.5 8 1.5C10.12 1.5 11.879 2.668 13.168 3.957C13.7884 4.58069 14.3445 5.26512 14.828 6C14.77 6.087 14.706 6.183 14.633 6.288C14.298 6.768 13.803 7.408 13.168 8.043C11.879 9.332 10.119 10.5 8 10.5C5.88 10.5 4.121 9.332 2.832 8.043C2.21165 7.41931 1.65552 6.73487 1.172 6H1.173Z"
								  fill="black"/>
							<path d="M8 3.5C7.33696 3.5 6.70107 3.76339 6.23223 4.23223C5.76339 4.70107 5.5 5.33696 5.5 6C5.5 6.66304 5.76339 7.29893 6.23223 7.76777C6.70107 8.23661 7.33696 8.5 8 8.5C8.66304 8.5 9.29893 8.23661 9.76777 7.76777C10.2366 7.29893 10.5 6.66304 10.5 6C10.5 5.33696 10.2366 4.70107 9.76777 4.23223C9.29893 3.76339 8.66304 3.5 8 3.5ZM4.5 6C4.5 5.07174 4.86875 4.1815 5.52513 3.52513C6.1815 2.86875 7.07174 2.5 8 2.5C8.92826 2.5 9.8185 2.86875 10.4749 3.52513C11.1313 4.1815 11.5 5.07174 11.5 6C11.5 6.92826 11.1313 7.8185 10.4749 8.47487C9.8185 9.13125 8.92826 9.5 8 9.5C7.07174 9.5 6.1815 9.13125 5.52513 8.47487C4.86875 7.8185 4.5 6.92826 4.5 6Z"
								  fill="black"/>
						</svg>
					</div>
				</div>

				<div class="pass-wrapper">
					<input placeholder="Повторите пароль" type="password" class="pass-input">
					<div class="pass__eye">
						<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16 6C16 6 13 0.5 8 0.5C3 0.5 0 6 0 6C0 6 3 11.5 8 11.5C13 11.5 16 6 16 6ZM1.173 6C1.65651 5.26512 2.21264 4.58069 2.833 3.957C4.12 2.668 5.88 1.5 8 1.5C10.12 1.5 11.879 2.668 13.168 3.957C13.7884 4.58069 14.3445 5.26512 14.828 6C14.77 6.087 14.706 6.183 14.633 6.288C14.298 6.768 13.803 7.408 13.168 8.043C11.879 9.332 10.119 10.5 8 10.5C5.88 10.5 4.121 9.332 2.832 8.043C2.21165 7.41931 1.65552 6.73487 1.172 6H1.173Z"
								  fill="black"/>
							<path d="M8 3.5C7.33696 3.5 6.70107 3.76339 6.23223 4.23223C5.76339 4.70107 5.5 5.33696 5.5 6C5.5 6.66304 5.76339 7.29893 6.23223 7.76777C6.70107 8.23661 7.33696 8.5 8 8.5C8.66304 8.5 9.29893 8.23661 9.76777 7.76777C10.2366 7.29893 10.5 6.66304 10.5 6C10.5 5.33696 10.2366 4.70107 9.76777 4.23223C9.29893 3.76339 8.66304 3.5 8 3.5ZM4.5 6C4.5 5.07174 4.86875 4.1815 5.52513 3.52513C6.1815 2.86875 7.07174 2.5 8 2.5C8.92826 2.5 9.8185 2.86875 10.4749 3.52513C11.1313 4.1815 11.5 5.07174 11.5 6C11.5 6.92826 11.1313 7.8185 10.4749 8.47487C9.8185 9.13125 8.92826 9.5 8 9.5C7.07174 9.5 6.1815 9.13125 5.52513 8.47487C4.86875 7.8185 4.5 6.92826 4.5 6Z"
								  fill="black"/>
						</svg>
					</div>
				</div>

				<input type="checkbox" id="remember-me-2">
				<label class="remember-me" for="remember-me-2">
                        <span class="box">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.64816 8.64652L2.35516 5.35352L0.941162 6.76752L5.64816 11.4745L15.3552 1.76752L13.9412 0.353516L5.64816 8.64652Z"
									  fill="#005DFF"/>
                            </svg>

                        </span>
					Запомнить меня
				</label>

			</form>
		</div>

		<div class="popup__bottom">
			<div class="blue-button to-login">
				сохранить и войти
			</div>

		</div>
	</div>
</div>

<div class="bx-system-auth-form">

	<?
	if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
		ShowMessage($arResult['ERROR_MESSAGE']);
	?>

	<? if ($arResult["FORM_TYPE"] == "login"): ?>

		<form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
			  action="<?= $arResult["AUTH_URL"] ?>">
			<? if ($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
			<? endif ?>
			<? foreach ($arResult["POST"] as $key => $value): ?>
				<input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
			<? endforeach ?>
			<input type="hidden" name="AUTH_FORM" value="Y"/>
			<input type="hidden" name="TYPE" value="AUTH"/>
			<table width="95%">
				<tr>
					<td colspan="2">
						<?= GetMessage("AUTH_LOGIN") ?>:<br/>
						<input type="text" name="USER_LOGIN" maxlength="50" value="" size="17"/>
						<script>
							BX.ready(function () {
								var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
								if (loginCookie) {
									var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
									var loginInput = form.elements["USER_LOGIN"];
									loginInput.value = loginCookie;
								}
							});
						</script>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?= GetMessage("AUTH_PASSWORD") ?>:<br/>
						<input type="password" name="USER_PASSWORD" maxlength="255" size="17" autocomplete="off"/>
						<? if ($arResult["SECURE_AUTH"]): ?>
							<span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>"
								  title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
							<noscript>
				<span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
							</noscript>
							<script type="text/javascript">
								document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
							</script>
						<? endif ?>
					</td>
				</tr>
				<? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
					<tr>
						<td valign="top"><input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"/>
						</td>
						<td width="100%"><label for="USER_REMEMBER_frm"
												title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></label>
						</td>
					</tr>
				<? endif ?>
				<? if ($arResult["CAPTCHA_CODE"]): ?>
					<tr>
						<td colspan="2">
							<? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
							<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
							<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
								 width="180" height="40" alt="CAPTCHA"/><br/><br/>
							<input type="text" name="captcha_word" maxlength="50" value=""/></td>
					</tr>
				<? endif ?>
				<tr>
					<td colspan="2"><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
					</td>
				</tr>
				<? if ($arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
					<tr>
						<td colspan="2">
							<noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
										rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
							<br/></td>
					</tr>
				<? endif ?>

				<tr>
					<td colspan="2">
						<noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
									rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
					</td>
				</tr>
				<? if ($arResult["AUTH_SERVICES"]): ?>
					<tr>
						<td colspan="2">
							<div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
							<?
							$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
								array(
									"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
									"SUFFIX"        => "form",
								),
								$component,
								array("HIDE_ICONS" => "Y")
							);
							?>
						</td>
					</tr>
				<? endif ?>
			</table>
		</form>

		<? if ($arResult["AUTH_SERVICES"]): ?>
			<?
			$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
				array(
					"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
					"AUTH_URL"      => $arResult["AUTH_URL"],
					"POST"          => $arResult["POST"],
					"POPUP"         => "Y",
					"SUFFIX"        => "form",
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
		<? endif ?>

	<?
	elseif ($arResult["FORM_TYPE"] == "otp"):
		?>

		<form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
			  action="<?= $arResult["AUTH_URL"] ?>">
			<? if ($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
			<? endif ?>
			<input type="hidden" name="AUTH_FORM" value="Y"/>
			<input type="hidden" name="TYPE" value="OTP"/>
			<table width="95%">
				<tr>
					<td colspan="2">
						<? echo GetMessage("auth_form_comp_otp") ?><br/>
						<input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off"/></td>
				</tr>
				<? if ($arResult["CAPTCHA_CODE"]): ?>
					<tr>
						<td colspan="2">
							<? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
							<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
							<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
								 width="180" height="40" alt="CAPTCHA"/><br/><br/>
							<input type="text" name="captcha_word" maxlength="50" value=""/></td>
					</tr>
				<? endif ?>
				<? if ($arResult["REMEMBER_OTP"] == "Y"): ?>
					<tr>
						<td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y"/>
						</td>
						<td width="100%"><label for="OTP_REMEMBER_frm"
												title="<? echo GetMessage("auth_form_comp_otp_remember_title") ?>"><? echo GetMessage("auth_form_comp_otp_remember") ?></label>
						</td>
					</tr>
				<? endif ?>
				<tr>
					<td colspan="2"><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<noindex><a href="<?= $arResult["AUTH_LOGIN_URL"] ?>"
									rel="nofollow"><? echo GetMessage("auth_form_comp_auth") ?></a></noindex>
						<br/></td>
				</tr>
			</table>
		</form>

	<?
	else:
		?>

		<form action="<?= $arResult["AUTH_URL"] ?>">
			<table width="95%">
				<tr>
					<td align="center">
						<?= $arResult["USER_NAME"] ?><br/>
						[<?= $arResult["USER_LOGIN"] ?>]<br/>
						<a href="<?= $arResult["PROFILE_URL"] ?>"
						   title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
					</td>
				</tr>
				<tr>
					<td align="center">
						<? foreach ($arResult["GET"] as $key => $value): ?>
							<input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
						<? endforeach ?>
						<?= bitrix_sessid_post() ?>
						<input type="hidden" name="logout" value="yes"/>
						<input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
					</td>
				</tr>
			</table>
		</form>
	<? endif ?>
</div>
