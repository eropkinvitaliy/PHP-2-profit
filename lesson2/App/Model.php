<?php

namespace App;

use App\Db;

abstract class Model
{
    const TABLE = '';
    const PK = '';

    public function isNew()
    {
        return empty($this->{static::PK});
    }

    public function getPk()
    {
        return $this->{static::PK};
    }

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        $db = Db::instance();
        return $res =
            $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE ' . static::PK . ' = :id',
                static::class, [':id' => $id])[0]
                ?: false;
    }

    public static function findLastRecords($limit)
    {
        $db = Db::instance();
        return $res = $db->query(
            sprintf('SELECT * FROM ' . static::TABLE . ' ORDER BY ' . static::PK . ' DESC  LIMIT %u', $limit),
            static::class) ?: false;
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if (static::PK == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ')
                VALUES(' . implode(',', array_keys($values)) . ')
        ';
        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if (static::PK == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = $v;
        }
        $sql = 'UPDATE ' . static::TABLE .
            ' SET ' . implode(', ', $columns) .
            ' WHERE ' . static::PK . ' = ' . $this->getPk();
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    public function delete()
    {
        if ($this->isNew()) {
            return false;
        }
        $sql = 'DELETE FROM ' . static::TABLE .
            ' WHERE ' . static::PK . ' = ' . $this->getPk();
        $db = Db::instance();
        $db->execute($sql);
    }
}