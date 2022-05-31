<?php

require_once 'config/db.php';
date_default_timezone_set('Europe/Moscow');
$is_auth = rand(0, 1);
$user_name = 'Olga';
$minName = 2;
$maxName = 200;
$minDescription = 10;
$maxDescription = 3000;
$maxImageSize = 1024 * 1024 * 80;

$connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    $dbError = mysqli_connect_error();
    $page_content = 'Ошибка подключения: ' . $dbError;
};
