<?php

require_once 'functions/changers.php';
require_once 'functions/helpers.php';
require_once 'functions/statings.php';
require_once 'functions/toMySQL.php';
require_once 'init.php';

$itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
$selectedItem = selectedItem($connect, $itemId);
$currentCategories = currentCategories($connect);

$page_content = include_template(
    'lot.php',
    [
        'categories' => $currentCategories,
        'item' => $selectedItem
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'title' => $selectedItem['name'],
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $page_content,
        'categories' => $currentCategories
    ]
);

print ($layout_content);
