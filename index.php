<?php

require_once 'functions/changers.php';
require_once 'functions/helpers.php';
require_once 'functions/statings.php';
require_once 'functions/toMySQL.php';
require_once 'init.php';

$is_auth = rand(0, 1);
$user_name = 'Olga'; // укажите здесь ваше имя
$categories = [
    'boards' =>'Доски и лыжи',
    'attachment' => 'Крепления',
    'boots' => 'Ботинки',
    'clothing' => 'Одежда',
    'tools' => 'Инструменты',
    'other' => 'Разное'
];

$newItems = newItems($connect);

$page_content = include_template(
    'main.php',
    [
        'categories' => $categories,
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
        'categories' => $categories
    ]
);

print ($layout_content);
