<?php
use App\Models\User;
require __DIR__ . '/autoload.php';

$news = \App\Models\News::findLastRecords(3);
include __DIR__ . '/Views/news.php';
