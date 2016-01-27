<?php
namespace App\Models;

use App\Model;
use App\Db;

class User extends Model
{
    const TABLE = 'users';
    public $email;
    public $firstname;
    public $lastname;
    public $birthday;

    public static function findById($id)
    {
        $db = new Db();
        return $res =
            $db->query(
                'SELECT * FROM ' . static::TABLE . ' WHERE id_user = :id',
                static::class, [':id' => $id])
                ?: false;
    }
}