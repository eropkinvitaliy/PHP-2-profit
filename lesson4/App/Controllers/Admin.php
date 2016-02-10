<?php

namespace App\Controllers;

use App\View;
use App\Models\News as NewsModel;

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

    protected function actionAll()
    {
        $this->view->title = 'Урок 4 Админка. Все новости';
        $this->view->news = NewsModel::findAll();
        $this->view->display(__DIR__ . '/../templates/admin/index.php');
    }

    protected function actionOne()
    {
        $id = (int)$_GET['id'] ?: false;
        if (empty($id)) {
            header('Location: /');
            exit(0);
        }
        if (!empty($this->view->article = NewsModel::findById($id))) {
            $this->view->title = 'Урок 4 Админка. Статья';
            $this->view->display(__DIR__ . '/../templates/admin/one.php');
        } else {
            header('Location: /App/templates/404notnews.php');
            exit(0);
        }
    }

    protected function actionCreate()
    {
        $this->view->title = 'Страница редактирование статьи';
        $this->view->display(__DIR__ . '/../templates/admin/update.php');
    }

    protected function actionSave()
    {
        $post = $_POST;

        if (!empty($post)) {
            if (empty($post['id_news'])) {
                $article = new News();
            } else {
                $article = News::findById($post['id_news']);
            }
            $article->title = trim($post['title']);
            $article->description = trim($post['description']);
            $article->published = date("Y-m-d H:i:s");
            $article->status = STATUS_ACTIVE;
            $article->author_id = 1;
            $article->save();
            $view = new View();
            $view->title = 'Страница статьи';
            $view->article = $article;
            $view->display(__DIR__ . '/../templates/one.php');
        } else {
            header('Location: /');
            exit(0);
        }
    }

    protected function actionInsert()
    {

    }

    protected function actionUpdate($id)
    {
        $id = $_GET['id'] ?: false;
        if (!empty($id)) {
            if (!empty($article = News::findById($id))) {
                $view = new View();
                $view->title = 'Страница редактирование статьи';
                $view->article = $article;
                $view->display(__DIR__ . '/../templates/update.php');
            } else {
                echo 'Запись с таким id отсутствует';
            }
        } else {
            header('Location: /');
            exit(0);
        }
    }

    protected function actionDelete($id)
    {
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
            exit(0);
        }
    }


}