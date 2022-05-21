<?php

/**
 * Translate price to a beautiful view and add the mark rub
 *
 * @param array $item Array of concrete good which contains price for this good
 *
 * @return string Update price
 */
function translate_price($item)
{
    return number_format(ceil($item['price']), 0, '', ' ') . ' ₽';
}
