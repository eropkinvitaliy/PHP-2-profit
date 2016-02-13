<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;
use App\Models\News as NewsModel;

class News extends Controller
{
    /**
     * Метод вывода всех новостей
     *
     */
    protected function actionAll()
    {
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
            $this->redirect('/');
        }
        if (!empty($this->view->article = NewsModel::findById($id))) {
            $this->view->display(__DIR__ . '/../templates/news/one.php');
        } else {
            $this->view->erroradmin = false;
            $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
        }
    }
}