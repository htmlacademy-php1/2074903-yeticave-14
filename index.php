<?php

require_once 'functions/changers.php';
require_once 'functions/helpers.php';
require_once 'functions/statings.php';
require_once 'functions/toMySQL.php';
require_once 'private/init.php';

$currentCategories = currentCategories($connect);
$newItems = newItems($connect);

$page_content = include_template(
    'main.php',
    [
        'categories' => $currentCategories,
        'items' => $newItems
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'title' => 'Главная',
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $page_content,
        'categories' => $currentCategories
    ]
);

print ($layout_content);
