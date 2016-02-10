<?php

namespace App\Controllers;

use App\View;

class Admin
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

    protected function actionIndex()
    {
        $this->view->title = 'Урок 4 Админка. Все новости';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/admin/index.php');
    }

    protected function actionUpdate($id)
    {

    }

    protected function actionSave()
    {

    }


    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->title = 'Урок 4 Админка. Статья';
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/admin/one.php');
    }
}