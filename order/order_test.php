<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<?$APPLICATION->IncludeComponent(
    "it-delta:order",
    "",
    Array()
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>