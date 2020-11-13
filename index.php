<?php
require_once "config/configControllers.php";
require_once "views/header.php";

$controller = DEFAULT_CONTROLLER;

if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
}

$action = DEFAULT_ACTION;


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$fullController = CONTROLLERS_DIR . $controller . "Controller.php";

$controller = $controller . "Controller";


if (is_file($fullController)) {
    require_once($fullController);
    $printController = new $controller();
} else {
    die("<h1>Controlador no localizado - 404 Not Found</h1>");
}

if (method_exists($printController, $action)) {
    $printController->$action();
} else {
    die("<h1>Metodo no definido - 404 Not Found</h1>");
}

require_once "views/footer.php";
