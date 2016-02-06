<?php
use App\Models\News;
const STATUS_ACTIVE = 1;

require __DIR__ . '/../../autoload.php';
$post = $_POST;
if (!empty($post)) {
    $article = new News();
    $article->title = trim($post['title']);
    $article->description = trim($post['description']);
    $article->published = date("Y-m-d H:i:s");
    $article->status = STATUS_ACTIVE;
    $article->author_id = 1;
    $article->save();
    include __DIR__ . '/../../Views/article.php';
} else {
    header('Location: /');
}