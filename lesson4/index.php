<?php

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = array_reverse(explode('/', $path));

$ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'News';
$act = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'All';

$controllerClassName = 'App\\Controllers\\' . $ctrl;
$contr = new App\Controllers\News();
$controller = new $controllerClassName;
$method = 'action';
$controller->$method($act);