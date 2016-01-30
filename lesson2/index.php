<?php
require __DIR__ . '/autoload.php';
$user = \App\Models\User::findById(2);

$config = App\Config::instance();
var_dump($config->data['db']['host']);

$news = \App\Models\News::findLastRecords(3);
include __DIR__ . '/Views/news.php';
