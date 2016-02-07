<?php

namespace App;

use App\Db;

abstract class Model implements \ArrayAccess, \Countable
{
    const TABLE = '';
    const PK = '';

    protected $data;

    /**
     * Функция конструктор для использования интерфейса ArrayAccess
     * обрабатывает входящие данные при создании объекта(ов)
     *
     * @param array
     */
    public function __construct()
    {
        $argfunc = func_get_args();
        $argcount = func_num_args();

        if ($argcount == 0) {
            $this->data = [];
        }
        if ($argcount == 1 && is_array($argfunc[0])) {
            $this->data = $argfunc[0];
        } else {
            $this->data = $argfunc;
        }
    }

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
        return true;
    }

    /**
     * Метод реализующий интерфейс ArrayAccess
     *
     * @param string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Метод реализующий интерфейс ArrayAccess
     *
     * @param string $key
     * @return array или NULL
     */
    public function offsetGet($key)
    {
        return $this->offsetExists($key) ? $this->data[$key] : null;
    }

    /**
     * Метод реализующий интерфейс ArrayAccess
     *
     * @param string $key
     * @param mixed $value
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->data[] = $value;
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * Метод реализующий интерфейс ArrayAccess
     *
     * @param string $key
     */
    public function offsetUnset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * Метод реализующий интерфейс Countable
     *
     * @return integer Колличество элементов
     */
    public function count()
    {
        return count($this->data);
    }
}