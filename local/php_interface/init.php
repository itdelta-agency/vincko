<?
if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/libs/event_handlers.php"))
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/libs/event_handlers.php");
require_once __DIR__ . '/lib/autoload.php';
AddEventHandler("form", "onAfterResultAdd", ["Vincko\\Events", "afterResultAdd"]);
AddEventHandler("form", "onBeforeResultAdd", ["Vincko\\Events", "onBeforeResultAdd"]);
AddEventHandler("sale" , "OnSaleOrderPaid" ,  ["Vincko\\Events", "OnSaleOrderPaid"] );