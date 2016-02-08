<?php

namespace App\Models;

use App\Model;
use App\Db;
use App\TIterator;

class News extends Model implements \Iterator
{
    /**
     * Это модель класса для таблицы "Orders" .
     *
     * @property integer $id_news
     * @property string $title
     * @property string $description
     * @property string $published
     * @property integer $status
     * @property integer $author_id
     */

    use TIterator;

    const TABLE = 'news';
    const PK = 'id_news';
    const ACTIV_PUBLISHED = 1;
    const PASSIVE_PUBLISHED = 0;

    public $id_news;
    public $title;
    public $description;
    public $published;
    public $status;
    public $author_id;

    protected $data = [];

    /**
     * Это магический метод __set
     *
     * @param $k string Имя свойства
     * @param $v mixed Значение свойства
     */
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * Это магический метод __get, доработанный под данную модель. При запросе
     * свойства author проверяет, не пустое ли у объекта свойство $author_id, и
     * если не пустое, то возвращает объект класса Author
     *
     * @param $k string Имя свойства
     * @return mixed  Если имя свойства не равно 'author'
     * @return object Authors, если имя свойства равно author
     */
    public function __get($k)
    {
        if ('author' == $k && isset($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return $this->data[$k];
    }

    /**
     * Это магический метод проверяет свойство методом 'isset()'
     *
     * @param $k string Имя свойства
     * @return bool
     */
    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public function getProperties()
    {
        foreach ($this as $key => $value) {
            ?><pre><?php var_dump($key, $value);?></pre><?php
        }
    }
}