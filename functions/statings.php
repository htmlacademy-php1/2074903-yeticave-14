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
 * @param mysqli_result $result response from DB to current request
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
function isErrorItemId($selectedItem)
{
    if (!$selectedItem) {
        http_response_code(404);
        return 'Ошибка 404. Страница, которую Вы ищете, не может быть найдена';
    }
    return null;
}

/**
 * Show values just added to a form by a user in fields of a form
 *
 * @param mixed $nameValue value name just added to a form
 *
 * @return string|null show this value in a field or null
 */
function isAddedValue($nameValue)
{
    if (!empty($name)) {
        return filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return null;
}

/**
 * Show error when required field is empty in a form
 *
 * @param array $form all reqired field of current form
 * @param array $rules to check current required fields
 * @param array $required of current required fields in current form
 *
 * @return array|null $errors about empty required fields
 */
function isEmptyRequired(array $form, array $rules, array $required)
{
    foreach ($form as $key => $value) {
        if (!empty($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }
        if (in_array($key, $required) and empty($value)) {
            $errors[$key] = "Поле $key надо заполнить";
        }
        return $errors;
    }
    if (empty($errors)) {
        return null;
    }
}

/**
 * Take current tyoe of added image from item form
 *
 * @param array $_FILES with current image
 * @param string $imageName translated name
 *
 * @return string|null $imageType current type of added image
 */
function imageType($_FILES, $imageName)
{
    if (!empty($_FILES['file']['name'])) {
        $imageInfo = finfo_open(FILEINFO_MIME_TYPE);
	    $imageType = finfo_file($imageInfo, $imageName);
        return $imageType;
    }
    return null;
}
