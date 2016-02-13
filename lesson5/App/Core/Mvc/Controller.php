<?php

namespace App\Core\Mvc;


abstract class Controller
{
    /**
     * Контроллер новостей
     *
     * @var View Объект класса App/View
     */
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Метод для администрирование запуска экшенов этого класса
     *
     * @param $action string Название экшена
     * @return string
     */
    public function action($action)
    {
        $methodName = 'action' . $action;
        return $this->$methodName();
    }

    public function actionError($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../templates/errors/error.php');
    }
}