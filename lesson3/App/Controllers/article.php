<?php
use App\View;
use App\Models\News;

require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if (!empty($article = News::findById($id))) {
        $view = new View();
        $view->title = 'Страница статьи';
        $view->article = $article;
        $view->display(__DIR__ . '/../templates/article.php');
    } else {
        echo 'Запись с таким id отсутствует';
    }
} else {
    header('Location: /');
}
