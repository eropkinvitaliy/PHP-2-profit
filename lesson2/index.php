<?php
use App\Models\User;
require __DIR__ . '/autoload.php';

$user = new User();
$user->firstname = 'Vasya';
$user->lastname = 'Pupkin';
$user->email = 'v@pupkin.ru';
$user->insert();
?><pre><?php var_dump($user);?></pre><?php
//$user = \App\Models\User::findById($user->last_id);
//
//$config = App\Config::instance();
//echo $config->data['db']['host'];
//
//$news = \App\Models\News::findLastRecords(3);
//include __DIR__ . '/Views/news.php';
