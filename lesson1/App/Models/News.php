<?php

namespace App\Models;

use App\Model;
use App\Db;

class News extends Model
{
    const TABLE = 'news';
    const Pk = 'id_news';
    public $title;
    public $description;
    public $published;
    public $status;
    public $user;


    public static function findLastNews($limit)
    {
        $db = new Db();
        return $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY published DESC  LIMIT :limit ',
            static::class, [':limit' => $limit]
        ) ?: false;
    }
}