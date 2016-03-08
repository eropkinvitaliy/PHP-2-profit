<?php

namespace App\Core;

class AdminDataTable
{

    public $rows;
    public $funcs;
    public $data = [];

    public function __construct($rows, $funcs)
    {
        $this->rows = $rows;
        $this->funcs = $funcs;
    }

    public function render()
    {
        foreach ($this->rows as $row) {
            foreach ($this->funcs as $key => $func) {
                $this->data[$key][$row] = $func($row);
            }
        }
    }

}