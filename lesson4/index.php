<?php

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = array_reverse(explode('/', $path));

switch (count($pathParts)) {
    case 2 :
        $ctrl = !empty($pathParts[0]) ? ucfirst($pathParts[0]) : 'News';
        $act = 'All';
        break;
    case 3 :
        $ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
        $act = !empty($pathParts[0]) ? ucfirst($pathParts[0]) : 'All';
        break;
    default:
        $ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'News';
        $act = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'All';
        break;
}
$controllerClassName = 'App\\Controllers\\' . $ctrl;
$contr = new App\Controllers\News();
$controller = new $controllerClassName;
$method = 'action';
$controller->$method($act);