<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'controller/Login.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'showLoginForm';

$loginController = new Login();

if ($action === 'showLoginForm' || $action === 'processLogin') {
    // Rotas de login
    $loginController = new Login();

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
