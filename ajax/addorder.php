<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Sale;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");


//корзину получить для текущего юзера

$dbRes = \Bitrix\Sale\Basket::getList([
    'select' => ['NAME', 'QUANTITY'],
    'filter' => [
        '=FUSER_ID' => \Bitrix\Sale\Fuser::getId(),
        '=ORDER_ID' => null,
        '=LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
        '=CAN_BUY' => 'Y',
    ]
]);

echo 111;

while ($item = $dbRes->fetch())
{
    echo 111;
    var_dump($item);
}
$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$basketItems = $basket->getBasketItems();

if ($_SERVER['REMOTE_ADDR'] == '46.147.123.63') {
    echo '<pre>';
    print_r($basketItems);
    echo '</pre>';

    foreach ($basket as $basketItem) {
        echo $basketItem->getField('NAME') . ' - ' . $basketItem->getQuantity() . '<br />';
    }

}