<?php
namespace App\Models;

use App\Model;
use App\Db;

class User extends Model
{
    const TABLE = 'users';
    const Pk = 'id_user';
    public $email;
    public $firstname;
    public $lastname;
    public $birthday;



}