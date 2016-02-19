<?php

namespace App\Controllers;

use App\Core\Mvc\Controller;

class Error extends Controller
{

    public function actionError404($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../templates/errors/error404.php');
    }

    public function actionError($errors)
    {
        $this->view->errors = $errors;
        $this->view->display(__DIR__ . '/../templates/errors/errors.php');
    }
}