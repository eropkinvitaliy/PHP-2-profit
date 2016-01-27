<?php
require __DIR__ . '/autoload.php';
$users = \App\Models\User::findAll();
//?><!--<pre>--><?php //var_dump($users);?><!--</pre>--><?php
var_dump($users);