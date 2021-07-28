
$( document ).ready(function() {
    $("#ajax_form_callback_btn").click(
		function(){
		$.ajax({
                url: '/ajax/callback_reg.php',
                type: "POST",
                dataType: "html",
                data: $("#ajax_form_callback").serialize(),
                success: function(response) {
                   	let html = '<div id="js-callback-ok" class=""><div class="callback__title">Заявка принята!</div><div class="callback__description">В ближайшее время с Вами свяжутся наши менеджеры</div></div>'
                   	$('#back_call').html(html);
               	},
               	error: function(response) {
               	                   	let html = '<div id="js-callback-ok" class=""><div class="callback__title">Ошибка!</div><div class="callback__description">Данные не отправлены.</div></div>'
               	$('#back_call').html(html);
               	}
                });

		}
	);
});
