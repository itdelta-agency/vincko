<div class="wrap">
	<div class="callback">
		<div id="js-callback-form-wrap">
			<div class="callback__title">Остались вопросы?</div>
			<div class="callback__description">Закажите обратный звонок от нашего менеджера</div>
			<div class="callback__form">
				<form id="js-callback-form" action="/ajax/callback.php" method="POST">
					<div class="callback__form-flex">
						<div class="callback__form-input">
							<input type="text" class="form__input" name="phone" placeholder="Телефон">
						</div>
						<div id="js-callback-error" class="callback__form-input callback__form-input_hidden"></div>
						<div class="callback__form-submit">
							<input type="submit" class="form__submit" value="Отправить">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="js-callback-ok" class="callback__send">
			<div class="callback__title">Заявка принята!</div>
			<div class="callback__description">В ближайшее время с Вами свяжутся наши менеджеры</div>
		</div>
	</div>
</div>