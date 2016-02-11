<?php

namespace App\Controllers;

use App\Controller;
use App\View;
use App\Models\News as NewsModel;

class News extends Controller
{
    /**
     * Метод вывода всех новостей
     *
     */
    protected function actionAll()
    {
        $this->view->title = 'Урок 4 - Новости';
        $this->view->news = NewsModel::findAll();
        $this->view->display(__DIR__ . '/../templates/news/index.php');
    }

    /**
     * Метод вывода одной новости по её id
     *
     */
    protected function actionOne()
    {
        $id = (int)$_GET['id'] ?: false;
        if (empty($id)) {
            header('Location: /');
            exit(0);
        }
        if (!empty($this->view->article = NewsModel::findById($id))) {
            $this->view->title = 'Урок 4 Новости. Статья';
            $this->view->display(__DIR__ . '/../templates/news/one.php');
        } else {
            $this->view->title = 'Урок 4. Статья не найдена';
            $this->view->erroradmin = false;
            $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
            exit(0);
        }
    }
}