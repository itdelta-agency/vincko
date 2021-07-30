<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var customOrderComponent $component */

echo '<pre>';
print_r($arResult['BASKET']);
echo '</pre>';
die();
?>
<table>
    <?
    $counter = 1;
    foreach ($arResult['BASKET'] as $item):
        /**
         * @var $item \Local\Sale\BasketItem
         */
        ?>
        <tr class="basket-data__tr">
            <td class="basket-data__td basket-data__td-number">
                <span class="basket-data__number"><?= $counter++ ?></span>
            </td>
            <td class="basket-data__td basket-data__td-img">
            </td>
            <td class="basket-data__td">
                <span class="basket-data__product-title"><?= $item->getField('NAME') ?></span>
            </td>
            <td class="basket-data__td">
				<span class="basket-data__count-products">
					<?= $item->getQuantity() ?>
                    <?= $item->getField('MEASURE_NAME') ?>
				</span>
            </td>
            <td class="basket-data__td">
				<span class="basket-data__product-price">
					<?= \SaleFormatCurrency(
                        $item->getQuantity() * $item->getPrice(),
                        $item->getCurrency()
                    ) ?>
				</span>
            </td>
        </tr>
    <? endforeach; ?>
</table>

Выберите службу доставки:<br>
<?foreach ($arResult['DELIVERY'] as $obDelivery):?>
    <label>
        <input type="radio" name="delivery_id" value=<?=$obDelivery->getId()?>>
        <?=$obDelivery->getName()?>
    </label>
<? endforeach; ?>
<br>
Выберите платежную систему:<br>
<?foreach ($arResult['PAYMENT'] as $arPaySystem):?>
    <label>
        <input type="radio" name="payment_id" value=<?=$arPaySystem['ID']?>>
        <?=$arPaySystem['NAME']?>
    </label>
<? endforeach; ?>

