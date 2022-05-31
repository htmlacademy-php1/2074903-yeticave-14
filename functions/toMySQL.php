<?php

/**
 * Take the newest and opened items
 *
 * @param mysqli $connect DB with an items table
 *
 * @return array of new and opened items
 */
function newItems(mysqli $connect)
{
    $takeNewItems = "SELECT i.id, i.name, first_price, image, DATE_FORMAT(expiry_date, '%d.%m.%Y') "
                    . "as expiry_date, c.name as category, MAX(price) as price, COUNT(price) as amount_bets "
                    . "FROM items i "
                    . "LEFT JOIN bets b ON b.item_id = i.id "
                    . "JOIN categories c ON i.category_id = c.id "
                    . "WHERE expiry_date > CURRENT_TIMESTAMP "
                    . "GROUP BY i.id "
                    . "ORDER BY expiry_date DESC";
    $newItems = mysqli_query($connect, $takeNewItems);
    return isExistResult($newItems);
}

/**
 * Take the current categories
 *
 * @param mysqli $connect DB with a categories table
 *
 * @return array of current categories
 */
function currentCategories(mysqli $connect)
{
    $takeCurrentCategories = "SELECT * FROM categories";
    $currentCategories = mysqli_query($connect, $takeCurrentCategories);
    return isExistResult($currentCategories);
}

/**
 * Take a selected item by user to look at details
 *
 * @param mysqli $connect DB with an items table
 * @param int $itemId ID of selected item
 *
 * @return array of selected item
 */
function selectedItem(mysqli $connect, $itemId)
{
    if (!empty($itemId)) {
        $takeSelectedItem = "SELECT i.id, i.name, first_price, image, DATE_FORMAT(expiry_date, '%d.%m.%Y') "
                        . "as expiry_date, c.name as category, MAX(price) as price, step_bet, description "
                        . "FROM items i "
                        . "LEFT JOIN bets b ON b.item_id = i.id "
                        . "JOIN categories c ON i.category_id = c.id "
                        . "WHERE i.id = $itemId "
                        . "GROUP BY i.id ";
        $selectedItem = mysqli_query($connect, $takeSelectedItem);
        return isExistResult($selectedItem);
    }
    return null;
}

/**
 * Add to the items table new item
 *
 * @param mysqli $connect DB with an items table
 * @param array $itemForm all valid data from item form
 *
 * @return mysqli_result $result response from DB to current request
 */
function addedItem($connect, array $itemForm)
{
    $addNewItem = "INSERT INTO items "
                . "(dt_add, name, category_id, description, first_price, step_bet, expiry_date, author_id, winner_id, image) "
                . "VALUES (NOW(), ?, ?, ?, ?, ?, ?, 1, null, ?)";
    $bindDataItem = db_get_prepare_stmt($connect, $addNewItem, $itemForm);
    return mysqli_stmt_execute($bindDataItem);
}
