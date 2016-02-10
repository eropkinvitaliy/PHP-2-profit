<?php

namespace App\Controllers;

use App\View;
use App\Models\News as NewsModel;

class News
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function action($action)
    {
        $methodName = 'action' . $action;
        return $this->$methodName();
    }

    protected function actionAll()
    {
        $this->view->title = 'Урок 4 - Новости';
        $this->view->news = NewsModel::findAll();
        $this->view->display(__DIR__ . '/../templates/news/index.php');
    }
    protected function actionOne()
    {
        $id = (int)$_GET['id'] ?: false;
        if (empty($id)) {
            $this->actionAll();
            exit(0);
        }
        if (!empty($this->view->article = NewsModel::findById($id))) {
            $this->view->title = 'Урок 4 Новости. Статья';
            $this->view->display(__DIR__ . '/../templates/news/one.php');
        } else {
            $this->view->title = 'Урок 4. Статья не найдена';
            $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
            exit(0);
        }
    }
}