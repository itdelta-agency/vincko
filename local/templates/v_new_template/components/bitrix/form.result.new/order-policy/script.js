$(document).ready(function () {


	var forms = document.getElementsByClassName('form');
	var btns = $('.close-btn');
	var btnns = $('.form__bottom div');

	for (var i = 0; i < btns.length; i++) {
		closeOpenBlockBtn(btns[i], forms[i]);
	}

	var value = $('input[name="radio"]:checked').val();

	$('input[type=radio][name=form_radio_POLICY_ADDRESS]').change(function () {
		if (this.value == '30') {
			$(".address-installment-other").show();
		} else {
			$(".address-installment-other").hide();
		}
	});

	$(".js-check-form-valid").click(function (e) {

		var $form = $(this).parents("form"),
			$error = $(this).parents("form").find(".error_message"),
			top1 = $("#form-1").position().top,
			data = "?sessid=d18f45664b6323d1226668598f681a51&WEB_FORM_ID=1&form_hidden_41=782&form_radio_GENDER=1&form_text_3=Test&form_text_4=Test&form_text_5=Test&form_date_6=2021-07-08&form_text_7=Тест%20Тестов&form_email_8=test%40test.ru&form_text_9=%2B79123456789&form_text_10=123123&form_date_11=2021-07-14&form_text_12=qwe&form_text_13=qwe&form_text_14=Москва&form_text_15=qwe&form_text_16=qwe&form_text_17=12&form_text_18=12&form_date_19=2021-07-15&form_text_20=123123&form_text_22=Москва&form_text_23=qwe&form_text_24=qwe&form_text_25=&form_text_38=&form_date_26=2021-07-16&form_text_27=12323&form_radio_POLICY_ADDRESS=30&form_text_31=Москва&form_text_33=qwe&form_text_32=test&form_text_34=&form_text_39=&form_date_35=2021-07-07&form_text_36=123";//$form.serialize(),
		class_name = "error";

		$('.js-check-valid-field').removeClass(class_name);

		$.ajax({
			url: '/ajax/form-valid-order-policy.php',
			method: 'GET',
			data: data,
			dataType: 'json',
			success: function (res) {
				console.log(res);
				$.each(res.value, function (i, value) {
					$('input[name="'+i+'"]').val(value);
				});
				if (res.count > 0) {
					$('html').scrollTop(top1);
					$error.show();
					$.each(res.error, function (i, value) {
						$('.js-check-valid-field[data-field="' + i + '"').addClass(class_name);
					});
				} else {
					$error.hide();
					closeOpenBlockNext(forms[0], forms[1], btns[0]);
					$('html').scrollTop($("#form-2").position().top);
					$('.installment__rules').addClass("installment__rules--active");
				}
			},
			fail: function (e) {
				console.log(e);
			}
		});

	});

	$(".to-short-rd").on("click", function () {
		$("#short-rd").removeClass("hidden");
	});

	function closeOpenBlockNext(blockClose, blockOpen, btn) {
		blockClose.classList.add('close');
		blockOpen.classList.remove('def-close');
		btn.classList.remove('close-btn_hide');
	}

	function closeOpenBlockBtn(btn, block) {
		if (btn) {
			btn.addEventListener('click', function () {
				if (block.hasClass('close')) {
					block.removeClass('close');
					btn.innerHTML = 'Свернуть';
				} else {
					block.addClass('close');
					btn.innerHTML = 'Развернуть';
				}
			});
		}
	}
});
