<?php

namespace App\Core\Mvc;


trait TIterator
{
    private $container = [];

    public function __construct($array = [])
    {
        if (is_array($array)) {
            $this->container = $array;
        }
    }
    public function rewind()
    {
        reset($this->container);
    }

    public function current()
    {
        return current($this->container);
    }

    public function key()
    {
        return key($this->container);
    }

    public function next()
    {
        return next($this->container);
    }

    public function valid()
    {
        $key = key($this->container);
        return ($key !== NULL && $key !== FALSE) ? $key : false;
    }

}