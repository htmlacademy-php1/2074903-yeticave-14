<?php

require_once 'myfunction.php';
require_once 'helpers.php';

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

$items = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => $categories['boards'],
        'price' => 10999,
        'url_image' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $categories['boards'],
        'price' => 159999,
        'url_image' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $categories['attachment'],
        'price' => 8000,
        'url_image' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $categories['boots'],
        'price' => 10999,
        'url_image' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $categories['clothing'],
        'price' => 7500,
        'url_image' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => $categories['other'],
        'price' => 5400,
        'url_image' => 'img/lot-6.jpg'
    ]
];

$page_content = include_template(
    'main.php',
    [
        'categories' => $categories,
        'items' => $items
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

?>
