<?php
use App\Models\News;
use App\View;

require __DIR__ . '/../../autoload.php';

$view = new View();
$view->title = 'Страница редактирование статьи';
$view->display(__DIR__ . '/../templates/update.php');
