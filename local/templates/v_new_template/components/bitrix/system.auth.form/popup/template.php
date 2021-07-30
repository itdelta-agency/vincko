<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
$request = Application::getInstance()->getContext()->getRequest();

if ($request->isAjaxRequest()) {
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/ajax.php');
}

if (!$GLOBALS["USER"]->IsAuthorized()) {
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/login.php');
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/registration.php');
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/forget.php');
} else{
	include(Bitrix\Main\Application::getDocumentRoot() . $templateFolder . '/change-pass.php');
}

?>