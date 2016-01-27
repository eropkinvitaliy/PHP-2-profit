<?php
require __DIR__ . '/autoload.php';
$users = \App\Models\User::findById(2);

$news = \App\Models\News::findLastNews(6);
?> <pre><?php
    var_dump($news);?>
    </pre>