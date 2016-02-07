<?php
use App\Models\News;
use App\View;

const STATUS_ACTIVE = 1;

require __DIR__ . '/../../autoload.php';
$post = $_POST;

if (!empty($post)) {
    if (empty($post['id_news'])) {
        $article = new News();
    }else {
        $article = News::findById($post['id_news']);
    }
    $article->title = trim($post['title']);
    $article->description = trim($post['description']);
    $article->published = date("Y-m-d H:i:s");
    $article->status = STATUS_ACTIVE;
    $article->author_id = 1;
    $article->save();
    $view = new View();
    $view->title = 'Страница статьи';
    $view->article = $article;
    $view->display(__DIR__ . '/../templates/article.php');
} else {
    header('Location: /');
    exit(0);
}