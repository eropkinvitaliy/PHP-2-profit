<?php
require __DIR__ . '/autoload.php';
$user = \App\Models\User::findById(2);

$news = \App\Models\News::findLastNews(3);
include __DIR__ . '/Views/news.php';
