<?php
use App\Models\User;
use App\Models\News;
use App\View;
require __DIR__ . '/autoload.php';

/**
 * При создании модели передаём ей свойства - массив
 * методом getProperties() - перебираем их с использование Итератора
 */
$news = new News(['news' => 'First', 'title' => 'Экспериментальная новость',
                  'description' => 'Описание экспериментальной новости']);
$news->getProperties();
?><pre><?php var_dump($news); ?></pre><?php

/**
 * Перебор итератором объектов News
 */
$news = News::findAll();
foreach($news as $key => $value) {
   ?><pre><?php  var_dump($key, $value);?></pre><?php
}
var_dump($news[0]);

$view = new View();
$view->title = 'Урок 3';
$view->news = News::findLastRecords(3);

// Вывод колличества объектов с использованием интефейса Countable
//echo count($view); die;

$view->display(__DIR__ . '/App/templates/index.php');