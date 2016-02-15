<?php
use App\Core\MultiException;
use App\Core\Mvc\Exception404;

require_once __DIR__ . '/autoload.php';

const DEFAULT_CONTROLLER = 'News';
const DEFAULT_ACTION = 'All';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = array_reverse(explode('/', $path));

switch (count($pathParts)) {
    case 2 :
        $ctrl = !empty($pathParts[0]) ? ucfirst($pathParts[0]) : DEFAULT_CONTROLLER;
        $act = DEFAULT_ACTION;
        break;
    case 3 :
        $ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : DEFAULT_CONTROLLER;
        $act = !empty($pathParts[0]) ? ucfirst($pathParts[0]) : DEFAULT_ACTION;
        break;
    default:
        $ctrl = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : DEFAULT_CONTROLLER;
        $act = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : DEFAULT_ACTION;
        break;
}
try {
    $controllerClassName = 'App\\Controllers\\' . $ctrl;
    $controller = new $controllerClassName;
}
catch (Exception404 $e) {
    $controllerClassName = 'App\\Controllers\\' . DEFAULT_CONTROLLER;
    $controller = new $controllerClassName;
    $controller->redirect('/');
}
try {
    $controller->action($act);
}
catch (MultiException $e) {
    $controller->action('Error', $e->getMessage());
}