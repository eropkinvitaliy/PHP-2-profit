<?php
namespace App\Core\Dbase;

use App\Config;
use App\Core\Dbase\DbException;
use App\Core\Mvc\TSinglton;

class Db
{
    use TSinglton;
    /**
     * @var \App\Config
     */
    protected $config;

    /**
     * @var \PDO
     */
    protected $dbh;


    protected function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = $this->getPdoObj($config);
        } catch (\PDOException $e) {
            throw new DbException('Не удалось подключиться к БД '. '<br>' . $e->getMessage());
        }
    }

    protected function getPdoObj($config)
    {
        $driverhostname = $config->data['db']['driver'] . ':host=' . $config->data['db']['host'] . ';dbname=' .
            $config->data['db']['dbname'];
        $dbh = new \PDO($driverhostname, $config->data['db']['user'], $config->data['db']['password']);
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }


    public function execute($sql, $options = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($options);
        return $res;
    }

    public function query($sql, $class, $options = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($options);
            if (false !== $res) {
                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        } catch (\PDOException $e) {
            throw new DbException('Запрос не выполнен. Ошибка.' . '<br>' . $e->getMessage());
        }
        return [];
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }


}