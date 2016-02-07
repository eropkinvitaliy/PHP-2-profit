<?php
use App\Models\User;
use App\Models\News;
use App\View;
require __DIR__ . '/autoload.php';


$view = new View();
$view->title = 'Урок 3';
$view->news = News::findLastRecords(3);
//echo count($view); die;
$view->display(__DIR__ . '/App/templates/index.php');