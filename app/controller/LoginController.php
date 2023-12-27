<?php

include_once 'model/User.php';

class LoginController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $this->showLoginForm();
    }

    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $user = $this->user->validaLogin($name, $password);

            if ($user != null) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                session_write_close();

                $this->showHome();
            } else {
                session_start();
                $_SESSION['login_falhou'] = true;
                session_write_close();
                $this->showLoginForm();
            }
        }
    }

    public function loggout(){
        session_start();
        $_SESSION['user_id']=false;
        session_write_close();
    }

    public function showLoginForm()
    {
        $this->loggout();
        include 'view/login_form.php';
    }
    public function showHome()
    {
        // include 'view/home.php';
        header('Location:view/home.php');
    }
}
