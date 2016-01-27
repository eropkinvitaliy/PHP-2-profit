<?php
namespace App;
class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=phplessons', 'root', '');
    }

    public function execute($sql, $parametrs = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($parametrs);
        return $res;
    }

    public function query($sql, $class, $parametrs = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($parametrs);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}