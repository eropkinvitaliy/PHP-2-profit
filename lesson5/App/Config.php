<?php

namespace App;

use App\Core\Mvc\TSinglton;

class Config
{
    use TSinglton;
    public $data = [];

    protected function __construct()
    {
        $this->data = include(__DIR__ . '/dbconfig.php');
    }
}