<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'controller/LoginController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'showLoginForm';

$loginController = new LoginController();

if ($action === 'showLoginForm' || $action === 'processLogin') {
    // Rotas de login
    $loginController = new LoginController();

    switch ($action) {
        case 'showLoginForm':
            $loginController->showLoginForm();
            break;
        case 'processLogin':
            $loginController->processLogin();
            break;
        default:
            break;
    }
}

// function loadController($controllerName) {
//     include 'app/controller/' . $controllerName . '.php';
// }

// $route = isset($_GET['route']) ? $_GET['route'] : 'login';
// $routeParts = explode('/', $route);

// $controller = ucfirst($routeParts[0]) . 'Controller';
// $action = isset($routeParts[1]) ? $routeParts[1] : 'index';

// loadController($controller);

// $controllerInstance = new $controller();
// $controllerInstance->$action();