<?php

/**
 * Check to exist of current cotegories sent category ID from new item form
 *
 * @param int $categoryId sent category ID from new item form
 * @param array $allowedList an ID column of current categories
 *
 * @return string|null about error
 */
function isValidCategory(int $categoryId, array $allowedList)
{
    if (!in_array($categoryId, $allowedList)) {
        return 'Выбрана несуществующая категория';
    }
    return null;
}

/**
 * Check the string to have legth between our bourders
 *
 * @param string $value our checked string
 * @param int $min min number of symbols
 * @param int $max max number of symbols
 *
 * @return string|null about error
 */
function isValidLeght(string $value, int $min, int $max)
{
    $length = strlen($value);
    if ($length < $min or $length > $max) {
        return "Некорректная длина: поле должно содержать $min - $max символов";
    }
    return null;
}

/**
 * Check size of upload image
 *
 * @param string $name - our image
 * @param int $maxImageSize our max size for upload files
 *
 * @return string|null about error
 */
function isValidImageSize(string $name, int $maxImageSize)
{
    if (filesize($name) > $maxImageSize) {
        return 'Размер изображения превышает допустимый';
    }
    return null;
}

/**
 * Check type of upload image
 *
 * @param string $type - type of added image
 *
 * @return string|null about error
 */
function isValidImageType(string $type)
{
    if ($type !== "image/png" or $type !== "image/jpeg" or $type !== "image/jpg") {
		return'Загрузите картинку в формате PNG, JPEG или JPG';
	}
    return null;
}

/**
 * Common check added current image in item form
 *
 * @param string $name - our image
 * @param int $maxImageSize our max size for upload files
 * @param string $type - type of added image
 *
 * @return string|null about error
 */
function isValidImage(string $name, int $maxImageSize, string $type)
{
    if (!empty(isValidImageSize($name, $maxImageSize))) {
        return isValidImageSize($name, $maxImageSize);
    } elseif (!empty(isValidImageType($type))) {
        return isValidImageType($type);
    } else {
        return null;
    }
}

/**
 * Check first price of item in item form
 *
 * @param int $value the value of this price from the form
 *
 * @return string|null about error
 */
function isValidPrice(int $value)
{
    if (intval($value) <= 0) {
        return 'Начальная цена должна быть больше нуля';
    }
    return null;
}

/**
 * Check expire date to added right format and to be not earlier than today
 *
 * @param string $date added expiry date of item
 *
 * @return string|null about errors
 */
function isValidDate($date)
{
    if (!is_date_valid($date)) {
        return 'Указан неверный формат даты';
    }
    $dateToday = date('Y-m-d', strtotime("now"));
    if ($date <= $dateToday) {
        return 'Указана устаревшая дата';
    }
    return null;
}
