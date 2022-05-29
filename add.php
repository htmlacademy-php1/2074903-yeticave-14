<?php

require_once 'functions/changers.php';
require_once 'functions/helpers.php';
require_once 'functions/statings.php';
require_once 'functions/toMySQL.php';
require_once 'private/init.php';

$currentCategories = currentCategories($connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requiredFields = [
        'name', 'category_id', 'description', 'image', 'first_price', 'step_bet', 'expiry_date'
    ];
    $errorsAddItems = [];
    $rulesAddItem = [
        'name' => function () {
            return validate();
        },
        'category_id' => function () {
            return validate();
        },
        'description' => function () {
            return ;
        },
        'image' => function () {
            return ;
        },
        'first_price' => function () {
            return ;
        },
        'step_bet' => function () {
            return ;
        },
        'expiry_date' => function () {
            return ;
        }
    ];

    $itemForm = filter_input_array(
        INPUT_POST,
        [
            'name' => FILTER_DEFAULT,
            'category_id' => FILTER_DEFAULT,
            'description' => FILTER_DEFAULT,
            'image' => FILTER_DEFAULT,
            'first_price' => FILTER_DEFAULT,
            'step_bet' => FILTER_DEFAULT,
            'expiry_date' => FILTER_DEFAULT
        ],
        true
    );

    $errorsAddItems = isEmptyRequired($itemForm, $rulesAddItem, $requiredFields);
    $errorsAddItems = array_filter($errorsAddItems);

    if (count($errorsAddItems)) {
        $page_content = include_template(
            'add-lot.php',
            [
                'categories' => $currentCategories,
                'errors' => $errorsAddItems
            ]
        );
    } else {
        $isAddedItem = addedItem($connect, $itemForm);
        if ($isAddedItem) {
            $itemId = mysqli_insert_id($connect);
            header("Location: lot.php?itemId=$itemId");
        }
    }
} else {
    $page_content = include_template('add-lot.php', ['categories' => $currentCategories]);
}

$layout_content = include_template(
    'layout.php',
    [
        'title' => 'Добавление лота',
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'content' => $page_content,
        'categories' => $currentCategories
    ]
);

print ($layout_content);
