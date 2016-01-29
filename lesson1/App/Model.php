<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    const Pk = '';

    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        $db = new Db();
        return $res =
            $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE ' . static::Pk . ' = :id',
                static::class, [':id' => $id])[0]
                ?: false;
    }

    public static function findLastRecords($limit)
    {
        $db = new Db();
        return $res = $db->query(
            sprintf('SELECT * FROM ' . static::TABLE . ' ORDER BY '. static::Pk .' DESC  LIMIT %u', $limit),
            static::class) ?: false;
    }
}