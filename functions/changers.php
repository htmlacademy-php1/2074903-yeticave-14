<?php

/**
 * Translate price to a beautiful view and add the mark rub
 *
 * @param array $item Array of concrete item which contains price
 *
 * @return string Update price
 */
function translate_price($item)
{
    return number_format(ceil($item['price']), 0, '', ' ') . ' ₽';
}

/**
 * Count how much time exist before expiry date of this item
 *
 * @param array $item Array of concrete item which contains this date
 *
 * @return int how much time exist
 */
function count_time($item)
{
    $diff = strtotime($item['expiry_date']) - time();
    $hours = floor($diff / 3600);
    $minutes = floor(($diff - $hours * 3600) / 60);
    return $hours . ':' . $minutes;
}
