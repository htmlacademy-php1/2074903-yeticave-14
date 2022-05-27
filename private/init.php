<?php

require_once 'config/db.php';
date_default_timezone_set('Europe/Moscow');
$is_auth = rand(0, 1);
$user_name = 'Olga';

$connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    $dbError = mysqli_connect_error();
    $page_content = 'Ошибка подключения: ' . $dbError;
};

