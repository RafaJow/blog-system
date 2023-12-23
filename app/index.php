<?php
include 'controller/Login.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'showLoginForm';

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
?>