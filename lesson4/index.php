<?php

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[3]) ? ucfirst($pathParts[3]) : 'News';
$act = !empty($pathParts[4]) ? ucfirst($pathParts[4]) : 'All';

$controllerClassName = 'App\\Controllers\\' . $ctrl;
$contr = new App\Controllers\News();
$controller = new $controllerClassName;
$method = 'action';
$controller->$method($act);