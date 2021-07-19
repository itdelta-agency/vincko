/*$(document).ready(function () {
	$(".js-check-valid-form").submit(function (e) {
		var $form = $("this").parents("form"),
			data = $form.serialize(),
			class_name = "error";

		e.preventDefault();
		$('.js-check-valid-field').removeClass(class_name);
		$.ajax({
			url: '/ajax/form-valid-order-policy.php',
			method: 'GET',
			data: data,
			dataType: 'json',
			success: function (res) {
				if (res.length > 0) {
					$.each(res, function (i, value) {
						$('.js-check-valid-field[data-field="' + i + '"').addClass(class_name);
					});
					return false
				}
			}
		});
		return false
	});
});
*/

$(document).ready(function () {

	var forms = document.getElementsByClassName('form');
	var btns = $('.close-btn');
	var btnns = $('.form__bottom div');

	for (var i = 0; i < btns.length; i++) {
		closeOpenBlockBtn(btns[i], forms[i]);
	}


		$(".js-check-form-valid").click(function (e) {

			var $form = $(this).parents("form"),
				$error = $(this).parents("form").find(".error_message"),
				top1 = $("#form-1").position().top,
				top2 = $("#form-2").position().top,
				data = $form.serialize(),
				class_name = "error";

			$('.js-check-valid-field').removeClass(class_name);
			console.log(data);
			$.ajax({
				url: '/ajax/form-valid-order-policy.php',
				method: 'GET',
				data: data,
				dataType: 'json',
				success: function (res) {
					if (res) {
						console.log(res);
						$('html').scrollTop(top1);
						$error.show();
						$.each(res, function (i, value) {
							$('.js-check-valid-field[data-field="' + i + '"').addClass(class_name);
						});
						return false
					} else {
						$error.hide();
						closeOpenBlockNext(forms[0], forms[1], btns[0]);


						$('.installment__rules').addClass("installment__rules--active");
					}
				}
			});

		});

	$(".to-short-rd").on("click", function () {
		$("#short-rd").removeClass("hidden");
	});
});

function closeOpenBlockNext(blockClose, blockOpen, btn) {
	blockClose.classList.add('close');
	blockOpen.classList.remove('def-close');
	btn.classList.remove('close-btn_hide');
}

function closeOpenBlockBtn(btn, block) {
	if (btn) {
		btn.addEventListener('click', function () {
			if (block.classList.contains('close')) {
				block.classList.remove('close');
				btn.innerHTML = 'Свернуть';
			} else {
				block.classList.add('close');
				btn.innerHTML = 'Развернуть';
			}
		});
	}
}