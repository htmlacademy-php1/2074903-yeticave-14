<?php

/**
 * Translate price to a beautiful view and add the mark rub
 *
 * @param array $good Array of concrete good which contains price for this good
 *
 * @return int Update price
 */
function translate_price($good)
{
    $update_price = ceil($good['price']);
    if ($update_price >= 1000) {
        $update_price = number_format($update_price, 0, '', ' ');
    }
    return $update_price . ' ₽';
}
