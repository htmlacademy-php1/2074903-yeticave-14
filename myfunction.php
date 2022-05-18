<?php

/**
 * Translate price to a beautiful view and add the mark rub
 *
 * @param array $goods Array of goods which contains price for goods
 *
 * @return int Update price
 */
function translate_price(array $goods)
{
    foreach ($goods as $good) {
        $update_price = ceil($good['price']);
        if ($update_price >= 1000) {
            $update_price = numfmt_format($update_price, 0, ' ');
        }
        return $update_price . ' ₽';
    }
}
