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
 * Check the string to have length between set bourders
 *
 * @param string $value checked string
 * @param int $min min number of symbols
 * @param int $max max number of symbols
 *
 * @return string|null about error
 */
function isValidLength(string $value, int $min, int $max)
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
 * @param string $tmpImageName added image
 * @param int $maxImageSize our max size for upload files
 *
 * @return string about error
 */
function isValidImageSize(string $tmpImageName, int $maxImageSize)
{
    if (filesize($tmpImageName) > $maxImageSize) {
        return 'Размер изображения превышает допустимый';
    }
}

/**
 * Check type of upload image
 *
 *
 * @param string $tmpImageName added image
 *
 * @return string about error
 */
function isValidImageType(string $tmpImageName)
{
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
	$imageType = finfo_file($finfo, $tmpImageName);
    if ($imageType !== "image/png" and $imageType !== "image/jpeg" and $imageType !== "image/jpg") {
		return'Загрузите картинку в формате PNG, JPEG или JPG';
	}
}

/**
 * Common check added current image in item form
 *
 * @param string $tmpImageName added image
 * @param int $maxImageSize our max size for upload files
 *
 * @return string|null about error
 */
function isValidImage(string $tmpImageName, int $maxImageSize)
{
    $error = isValidImageSize($tmpImageName, $maxImageSize);
    if (empty($error)) {
        $error = isValidImageType($tmpImageName);
    }
    return $error;
}

/**
 * Check first price of item in item form
 *
 * @param int $value the value of this price from the form
 *
 * @return string|null about error
 */
function isValidPrice($value)
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
        return 'Указан неверный формат даты, укажите в формате ГГГГ-ММ-ДД';
    }
    $dateToday = date('Y-m-d', strtotime("now"));
    if ($date <= $dateToday) {
        return 'Указана устаревшая дата, дата должна быть больше текущей хотя бы на 1 день';
    }
    return null;
}
