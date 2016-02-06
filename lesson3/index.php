<?php
use App\Models\User;
use App\Models\News;
require __DIR__ . '/autoload.php';

$news = News::findLastRecords(3);
include __DIR__ . '/Views/news.php';
