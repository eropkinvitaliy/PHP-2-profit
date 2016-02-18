<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;
use App\Core\Mvc\Exception404;
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
            throw new Exception404('Страница с такой новостью не найдена');
        }
    }
}