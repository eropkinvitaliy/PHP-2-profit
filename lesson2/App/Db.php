<?php
namespace App;

use App\Config;
class Db
{
    protected $dbh;
    protected static $instance;

    protected function __construct()
    {
        $config = Config::instance();
        $this->dbh = new \PDO($config->data['db']['driver'] . ':host='.$config->data['db']['host'] .';dbname=' .
            $config->data['db']['dbname'], $config->data['db']['user'], $config->data['db']['password']);
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function execute($sql, $options = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($options);
        return $res;
    }

    public function query($sql, $class, $options = [])
    {
        $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($options);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}