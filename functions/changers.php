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
 * Translate user image name to inside random name
 *
 * @param array $_FILES with current image
 *
 * @return string|null of new image name
 */
function newNameImage($_FILES)
{
    if (!empty($_FILES['file']['name'])) {
        $newNameImage = $_FILES['file']['tmp_name'];
        return $newNameImage;
    }
    return null;
}

/**
 * Form input image to common array of added item
 *
 * @param string $imageType of current image
 *
 * @return string inside unique name of current image
 */
function insideImageName(string $imageType)
{
    $cutType = stristr($imageType, '/');
    $endPartName = substr($cutType, 1);
    $insideImageName = uniqid() . ".$endPartName";
    return $insideImageName;
}
