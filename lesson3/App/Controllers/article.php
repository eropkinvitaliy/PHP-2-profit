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
        $view->display(__DIR__ . '/../templates/one.php');
    } else {
        header('Location: /App/templates/404notnews.php');
        exit(0);
    }
} else {
    header('Location: /');
    exit(0);
}
