<?php
use App\Models\News;
require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if (!empty($article = News::findById($id))) {
        $article->delete();
        header('Location: /index.php');
    } else {
        echo 'Запись с таким id отсутствует';
    }
} else {
    header('Location: /');
}