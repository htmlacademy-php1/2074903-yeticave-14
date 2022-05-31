<?php

require_once 'functions/changers.php';
require_once 'functions/helpers.php';
require_once 'functions/statings.php';
require_once 'functions/toMySQL.php';
require_once 'private/init.php';

$itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
$selectedItem = selectedItem($connect, $itemId);
$currentCategories = currentCategories($connect);

$page_content = isErrorItemId($selectedItem);
$title = isErrorItemId($selectedItem);
if (empty($page_content)) {
    $title = $selectedItem[0]['name'];
    $page_content = include_template(
        'lot.php',
        [
            'categories' => $currentCategories,
            'item' => $selectedItem[0]
        ]
    );
}

$layout_content = include_template(
    'layout.php',
    [
        'title' => $title,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $page_content,
        'categories' => $currentCategories
    ]
);

print ($layout_content);
