<?php
use App\Models\News;

require __DIR__ . '/../../autoload.php';
$post = $_POST;
if (!empty($post)) {
    $article = new News();
    $article->title = trim($post['title']);
    $article->description = trim($post['description']);
    $article->save();
    include __DIR__ . '/../../Views/article.php';
} else {
    header('Location: /');
}