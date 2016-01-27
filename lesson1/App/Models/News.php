<?php

namespace App\Models;

use App\Model;
use App\Db;

class News extends Model
{
    const TABLE = 'news';
    public $title;
    public $description;
    public $published;
    public $status;
    public $user;


    public static function findLastNews($num)
    {
        $db = new Db();
        return $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY published DESC  LIMIT ' . $num,
            static::class
        ) ?: false;
    }
}