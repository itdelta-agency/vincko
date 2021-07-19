$(document).ready(function () {
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

	});
});
