<?php
require __DIR__ . '/autoload.php';

$test = new \App\Db();
$result1 = $test->execute('SELECT * FROM users');
$result2 = $test->execute('SELECT * FROM users WHERE id_user = :id', [':id' => 1]);
if ($result1) {
    echo 'Тест метода execute класса Db : SELECT * FROM users; - пройден успешно <br>';
} else {
    echo 'Тест метода execute класса Db : SELECT * FROM users; - не пройден <br>';
}
if ($result2) {
    echo 'Тест метода execute класса Db : SELECT * FROM users WHERE id_user = :id;
          с подстановкой параметров - пройден успешно <br>';
} else {
    echo 'Тест метода execute класса Db : SELECT * FROM users WHERE id_user = :id;
          с подстановкой параметров - не пройден <br>';
}
$result3 = $test->query('SELECT * FROM users WHERE id_user = :id', \App\Models\User::class,[':id' => 1]);
if ($result3) {
    echo 'Тест метода query класса Db : SELECT * FROM users WHERE id_user = :id;
          с подстановкой параметров - пройден успешно <br>';
} else {
    echo 'Тест метода query класса Db : SELECT * FROM users WHERE id_user = :id;
          с подстановкой параметров - не пройден <br>';
}

