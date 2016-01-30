<?php
use App\Models\News;

require __DIR__ . '/../../autoload.php';
$post = $_POST ?: false;
if (!empty($post)) {
    $article = new News();
    $article->title = $post['title'];
    $article->description = $post['description'];
    $article->save();
    include __DIR__ . '/../../Views/article.php';

} else {
    header('Location: /');
}