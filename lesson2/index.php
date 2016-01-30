<?php
use App\Models\User;
require __DIR__ . '/autoload.php';

//$user = User::findById(18);
//$user->delete();


//$user = User::findById(18);
//?><!--<pre>--><?php //var_dump($user);?><!--</pre>--><?php
//$user->firstname = 'Петяggggggggggggggg';
//$user->save();
//$user = User::findById(18);
//?><!--<pre>--><?php //var_dump($user);?><!--</pre>--><?php

//$user = new User();
//$user->firstname = 'Vasya';
//$user->lastname = 'Pupkin';
//$user->email = 'v@pupkin.ru';
//$user->insert();
//$user = \App\Models\User::findById($user->id);
//?><!--<pre>--><?php //var_dump($user);?><!--</pre>--><?php

//$config = App\Config::instance();
//echo $config->data['db']['host'];
//
$news = \App\Models\News::findLastRecords(3);
include __DIR__ . '/Views/news.php';
