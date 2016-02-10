<?php
use App\Models\News;
use App\View;

require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if (!empty($article = News::findById($id))) {
        $view = new View();
        $view->title = 'Страница редактирование статьи';
        $view->article = $article;
        $view->display(__DIR__ . '/../templates/update.php');
    } else {
        echo 'Запись с таким id отсутствует';
    }
} else {
    header('Location: /');
    exit(0);
}