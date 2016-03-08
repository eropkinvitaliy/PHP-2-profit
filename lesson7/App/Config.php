<?php

namespace App;

use App\Core\Mvc\TSinglton;

class Config
{
    use TSinglton;
    public $data = [];
    public $funcs = [];

    protected function __construct()
    {
        $this->data = include(__DIR__ . '/dbconfig.php');
        $this->funcs = include(__DIR__ . '/funcs.php');
    }
}
