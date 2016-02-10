<?php

namespace App\Controllers;

use App\View;

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
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->title = 'Урок №4 - Статья';
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/one.php');
    }
}