<?php

/**
 * Show so close expiry date from current moment
 *
 * @param array $item Array of concrete item which contains this date
 *
 * @return bool true when there is 1 hour left before the expiry date
 * and false when there is more than 1 hour left before
 */
function isExpired($item)
{
    if ((strtotime($item['expiry_date']) - strtotime(date('Y-m-d'))) <= 3600) {
        return true;
    }
    return false;
}

/**
 * Show exist the result of mysqli_query or we have a mistake
 *
 * @param mysqli $result response from our database to our request
 *
 * @return array from DB
 */
function isExistResult($result)
{
    if (!$result) {
        exit('Ошибка запроса');
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/**
 * Show error if $itemId is empty or doesn't exist in the item table
 *
 * @param array $selectedItem the item which is selected by request ID,
 * if $itemId is not exist $selectedItem will be null
 *
 * @return string|null about error with code 404
 */
function showErrorItemId($selectedItem)
{
    if (!$selectedItem) {
        http_response_code(404);
        return 'Ошибка 404. Страница, которую Вы ищете, не может быть найдена';
    }
    return null;
}
