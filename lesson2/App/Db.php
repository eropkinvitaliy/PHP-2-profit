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
        echo $config->data['db']['host'];
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=phplessons', 'root', '');
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
        ?><pre><?php
        var_dump($sth);
        var_dump($options);
        ?></pre><?php
        $res = $sth->execute($options);
        var_dump($sth->errorInfo());
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