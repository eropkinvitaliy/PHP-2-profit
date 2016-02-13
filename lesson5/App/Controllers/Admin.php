<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;
use App\Models\News as NewsModel;

class Admin extends Controller
{
    /**
     * Метод вывода всех новостей
     *
     */
    protected function actionAll()
    {
        $this->view->news = NewsModel::findAll();
        $this->view->display(__DIR__ . '/../templates/admin/index.php');
    }

    /**
     * Метод вывода одной новости по её id
     *
     */
    protected function actionOne()
    {
        $id = (int)$_GET['id'] ?: false;
        if (empty($id)) {
            header('Location: /admin/');
            exit(0);
        }
        if (!empty($this->view->article = NewsModel::findById($id))) {
            $this->view->display(__DIR__ . '/../templates/admin/one.php');
        } else {
            $this->view->erroradmin = true;
            $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
        }
    }

    /**
     * Метод вывода формы для написания новой статьи
     *
     */
    protected function actionCreate()
    {
        $this->view->display(__DIR__ . '/../templates/admin/form.php');
    }

    /**
     * Метод для вывода формы редактирования выбранной статьи по её id
     *
     */
    protected function actionUpdate()
    {
        $id = (int)$_GET['id'] ?: false;
        if (empty($id)) {
            header('Location: /admin/');
            exit(0);
        }
        if (!empty($id)) {
            if (!empty($article = NewsModel::findById($id))) {
                $this->view->article = $article;
                $this->view->display(__DIR__ . '/../templates/admin/form.php');
            } else {
                $this->view->erroradmin = true;
                $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
            }
        }
    }

    /**
     * Метод сохранения новой статьи или после внесения изменений в статью
     *
     */
    protected function actionSave()
    {
        $post = $_POST;
        if (empty($post)) {
            header('Location: /admin/');
            exit(0);
        }
        if (empty($post['id_news'])) {
            $article = new NewsModel();
        } else {
            $article = NewsModel::findById($post['id_news']);
        }
        $article->fill($post)->save();
        header('Location: /admin/one/?id=' . $article->id_news);
    }

    /**
     * Метод удаления статьи по её id
     *
     */
    protected function actionDelete()
    {
        $id = (int)$_GET['id'] ?: false;
        if (!empty($article = NewsModel::findById($id))) {
            $article->delete();
        } else {
            $this->view->erroradmin = true;
            $this->view->display(__DIR__ . '/../templates/errors/404notnews.php');
            exit(0);
        }
        header('Location: /admin/');
        exit(0);
    }
}