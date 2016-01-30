<?php

namespace App;


class Config
{
    public $data = [];
    protected static $instance;

    protected function __construct()
    {
        $dbconfig = explode(PHP_EOL, file_get_contents(__DIR__ . '/dbconfig.txt'));
        foreach ($dbconfig as $value) {
            $dbstring = explode('=', $value);
            $this->data['db'][$dbstring[0]] = $dbstring[1];
        }
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;


        }
        return static::$instance;
    }
}