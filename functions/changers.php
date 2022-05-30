<?php

/**
 * Translate price to a beautiful view and add the mark rub
 *
 * @param array $item Array of concrete item which contains price
 *
 * @return string Update price
 */
function changeFormatPrice(array $item)
{
    $showPrice = $item['first_price'];
    if (!empty($item['price'])) {
        $showPrice = $item['price'];
    }
    return number_format(ceil($showPrice), 0, '', ' ') . ' ₽';
}

/**
 * Count how much time exist before expiry date of this item
 *
 * @param array $item Array of concrete item which contains this date
 *
 * @return int how much time exist
 */
function countLeftTime(array $item)
{
    $diffToday = strtotime($item['expiry_date']) - time();
    $leftHours = floor($diffToday / 3600);
    $leftMinutes = floor(($diffToday - $leftHours * 3600) / 60);
    return $leftHours . ':' . $leftMinutes;
}

/**
 * Count min bet for current item
 *
 * @param array $item array of current item
 *
 * @return int min bet for current item
 */
function countMinBet(array $item)
{
    $currentPrice = $item['first_price'];
    if (!empty($item['price'])) {
        $currentPrice = $item['price'];
    }
    $minBet = $currentPrice + $item['step_bet'];
    return number_format(ceil($minBet), 0, '', ' ') . ' ₽';
}

/**
 * Form input image to common array of added item
 *
 * @param string $tmpImageName added image
 *
 * @return string inside unique name of current image
 */
function insideImageName(string $tmpImageName)
{
    $imageType = mime_content_type($tmpImageName);
    $cutType = stristr($imageType, '/');
    $endPartName = substr($cutType, 1);
    return uniqid() . ".$endPartName";
}
