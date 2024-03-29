$(document).ready(function () {
$('#back_call .form__control[name=phone]').inputmask("+7 (999) 999-99-99");
$("#ajax_form_callback_btn").on('click',function(){
		$.ajax({
                url: '/ajax/callback_reg.php',
                type: "POST",
                dataType: "html",
                data: $("#ajax_form_callback").serialize(),
                success: function(response) {
                if(response=='errEnt') {
                    $('#back_call').append('<div id="js-callback-error" style="text-align: center;   color: red;margin-top: 30px; "class="">Поля не до конца заполнены, заполните их до конца и повторите снова</div>');
                    setTimeout(function() { $("#js-callback-error").hide('fast'); }, 2000);
                } else {
                let html = '<div id="js-callback-ok" class=""><div class="callback__title">Заявка принята!</div><div class="callback__description">В ближайшее время с Вами свяжутся наши менеджеры</div></div>'
                       $('#back_call').html(html);
                }

               	},
               	error: function(response) {
               	                   	let html = '<div id="js-callback-ok" class=""><div class="callback__title">Ошибка!</div><div class="callback__description">Данные не отправлены. Сообщите об этом администратору!</div></div>'
               	$('#back_call').html(html);
               	}
                });
		}
	);
	$('.ready-pack__item').each(function(){
		let currentlyPrice = Number($(this).find('.ready-pack__bottom .ready-pack__bottom-result .currently-price').html().replace(/\s/g, ''));
		$(this).find('.ready-pack__bottom .solutions__bottom_column-price').html(Math.ceil(currentlyPrice/12)+' ₽');
	})
	$('.solutions__bottom_column-select').on('change', function() {
		let currentlyPrice = Number($(this).closest('.ready-pack__bottom').find('.currently-price').html().replace(/\s/g, ''));
		$(this).closest('.ready-pack__bottom').find('.solutions__bottom_column-price').html(Math.ceil(currentlyPrice/$(this).val())+' ₽');
	})
	$('.solutions__bottom_right').each(function(){

		let currentlyPrice = Number($(this).find('.solutions__bottom_column-newprice').html().replace(/\s/g, '').replace('₽','').replace('&nbsp;', ''));
		$(this).find('.solutions__bottom_column-price').html(Math.ceil(currentlyPrice/12)+' ₽');

	})

	$(".header__top-cabinet .js-modal").click(function () {
		var thisModal = $(this).attr("data-modal-class");
		$(thisModal).removeClass("hidden");
		return false;
	});

	function timer(parent) {
		parent.find(".popup__wait-time").css("display", "block");
		parent.find(".popup__wait").css("display", "block");

		var _Seconds = 20,
			_int;

		parent.find('.popup__wait-num').text(_Seconds); // выводим получившееся значение в блок

		_int = setInterval(function () {
			// запускаем интервал
			if (_Seconds > 0) {
				_Seconds--; // вычитаем 1

				parent.find('.popup__wait-num').text(_Seconds); // выводим получившееся значение в блок
			} else {
				parent.find(".popup__wait-repeat").css("display", "block");
				parent.find(".popup__wait-time").css("display", "none");
				clearInterval(_int); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
			}
		}, 1000);
	}

	function showBtn(selector, parent, switcher) {
		if (selector.inputmask("isComplete")) {
			/* $(".popup__form--phone .grey-border-button").css("display", "none");
             $(".popup__form--phone .popup__code").css("display", "block");
               */
			parent.find(".popup__form--" + switcher + " .grey-border-button--unactive").removeClass("grey-border-button--unactive");
			parent.find(".popup__form--" + switcher + " .grey-border-button").addClass("grey-border-button--active");
			parent.find(".popup__form--" + switcher + " .grey-border-button--active").on("click", function () {
				parent.find(".popup__form--" + switcher + " .grey-border-button").css("display", "none");
				parent.find(".popup__form--" + switcher + " .popup__code").css("display", "block");
				timer(parent);
			});
		} else {
			parent.find(".popup__form--" + switcher + " .grey-border-button").addClass("grey-border-button--unactive");
			parent.find(".popup__form--" + switcher + " .grey-border-button").removeClass("grey-border-button--active");
		}
	}

	var selector = document.getElementsByClassName("phone-input");
	var popupers = $(".popup");
	popupers.each(function (index) {
		var parent = $(this);
		var phone = parent.find(".phone-input");
		var email = parent.find(".email-input");
		phone.inputmask("+7(999) 999-9999");
		showBtn(phone, parent, "phone");
		phone.keyup(function () {
			showBtn(phone, parent, "phone");
		});
		email.inputmask("email");
		showBtn(email, parent, "mail");
		email.on("keyup", function () {
			showBtn(email, parent, "mail");
		});
		parent.find(".popup__wait-repeat").on("click", function () {
			parent.find(".popup__wait-repeat").css("display", "none");
			parent.find(".popup__wait-time").css("display", "block");
			timer(parent);
		});
		parent.find(".popup__code").mask("9999", {
			completed: function completed() {
				parent.find(".popup__send-code").css("display", "grid");
			}
		});
		parent.find(".popup__send-code").on("click", function () {
			parent.find(".popup__send-code, .popup__code,  .popup__wait-repeat").css("display", "none");
			parent.find(".popup__wait-time").css("opacity", "0");
			parent.find(".popup__wait-time").css("display", "block");
			parent.find(".popup__success").css("display", "flex");
			parent.find(".popup--forget .popup__bottom .blue-button").removeClass("blue-button--unactive");
			parent.find(".popup--forget .popup__bottom .blue-button").addClass("blue-button--active");
		});
	});
	var popups = $(".popup");
	popups.each(function (index) {
		var close1 = $(this).find(".popup__close");
		var close2 = $(this).find(".popup__wall");
		var popup = $(this);
		close1.on("click", function () {
			popup.addClass("hidden");
		});
		close2.on("click", function () {
			popup.addClass("hidden");
		});
	});
	var items = $(".pass-wrapper");
	items.each(function (index) {
		var eye = $(this).children(".pass__eye");
		var input = $(this).children("input");
		var open = 0;
		eye.on("click", function () {
			if (open == 0) {
				input.attr("type", "text");
				open = 1;
			} else {
				input.attr("type", "password");
				open = 0;
			}
		});
	});
	var left = 1;
	$(".popup__switch").on("click", function () {
		if (left == 1) {
			$(this).addClass("popup__switch--right");
			$(".popup__switch-item-left").removeClass("popup__switch-item--active");
			$(".popup__switch-item-right").addClass("popup__switch-item--active");
			$(".popup__form--phone").css("display", "none");

			if (window.innerWidth > 780) {
				$(".popup__form--mail").css("display", "grid");
			} else {
				$(".popup__form--mail").css("display", "flex");
			}

			left = 0;
		} else {
			$(this).removeClass("popup__switch--right");
			$(".popup__switch-item-left").addClass("popup__switch-item--active");
			$(".popup__switch-item-right").removeClass("popup__switch-item--active");
			$(".popup__form--mail").css("display", "none");

			if (window.innerWidth > 780) {
				$(".popup__form--phone").css("display", "grid");
			} else {
				$(".popup__form--phone").css("display", "flex");
			}

			left = 1;
		}
	});
	$(".new-pass-button").on("click", function () {
		$(".popup").addClass("hidden");
		$(".popup--new-pass").removeClass("hidden");
	});
	$(".to-registration").on("click", function () {
		$(".popup").addClass("hidden");
		$(".popup--registration").removeClass("hidden");
	});
	$(".to-login").on("click", function () {
		$(".popup").addClass("hidden");
		$(".popup--login").removeClass("hidden");
	});
	$(".forget-pass").on("click", function () {
		$(".popup").addClass("hidden");
		$(".popup--forget").removeClass("hidden");
	});

	$('form').submit(function(){
		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: $(this).serialize()+'&ajax_key=Y',
			dataType: "json",
			success: function(data)
			{
				if (data.type == 'error') {
					alert(data.message);
				} else {
					alert('Вы авторизовались!');
				}
			}
		});

	});
})

