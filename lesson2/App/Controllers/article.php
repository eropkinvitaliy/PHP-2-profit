<?php
require __DIR__ . '/../../autoload.php';
$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if ($article = App\Models\News::findById($id)) {
        include __DIR__ . '/../../Views/article.php';
    } else {
        echo 'Запись с таким id отсутствует';
    }

} else {
    header('Location: /');
}