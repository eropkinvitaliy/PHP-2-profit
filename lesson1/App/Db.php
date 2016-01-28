<?php
namespace App;
class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=phplessons', 'root', '');
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
        if (array_key_exists(':limit', $options)) {
            $sth->bindParam(':limit', $options[':limit'], \PDO::PARAM_INT);
            $res = $sth->execute();
        } else {
            $res = $sth->execute($options);
        }
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}