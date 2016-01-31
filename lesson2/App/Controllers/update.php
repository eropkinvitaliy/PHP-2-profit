<?php
use App\Models\News;
require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if (!empty($article = News::findById($id))) {
        include __DIR__ . '/../../Views/update.php';
    } else {
        echo 'Запись с таким id отсутствует';
    }
} else {
    header('Location: /');
}