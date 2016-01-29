<?php
require __DIR__ . '/autoload.php';

$test = new \App\Db();
$result1 = $test->execute('SELECT * FROM users');
$result2 = $test->execute('SELECT * FROM users WHERE id_user = :id', [':id' => 1]);