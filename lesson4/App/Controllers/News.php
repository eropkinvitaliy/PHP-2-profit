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
        $id = (int)$_GET['id'];
        $this->view->title = 'Урок №4 - Статья';
        $this->view->article = NewsModel::findById($id);
        $this->view->display(__DIR__ . '/../templates/news/one.php');
    }
}