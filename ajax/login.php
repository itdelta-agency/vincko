<? $APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"popup",
	array(
		"REGISTER_URL"        => "register.php",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL"         => "profile.php",
		"SHOW_ERRORS"         => "Y",
		"AJAX_MODE"           => "Y"
	)
); ?>