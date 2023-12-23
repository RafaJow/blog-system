<?php

include 'model/User.php';

class Login{
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $user = $this->user->validaLogin($name, $password);
            echo json_encode($user);

            if ($user != null) {
                echo "Login bem-sucedido!";
            } else {
                session_start();
                $_SESSION['login_falhou'] = true;
                session_write_close();
                $this->showLoginForm();
            }
        }
    }

    public function showLoginForm() {
        include 'view/login_form.php';
    }
}
