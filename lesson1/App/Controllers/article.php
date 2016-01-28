<?php
require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if ($id) {
    $articles = App\Models\News::findById($id);
    include __DIR__ . '/../../Views/article.php';
} else {
    echo 'Параметр id не передан';
}