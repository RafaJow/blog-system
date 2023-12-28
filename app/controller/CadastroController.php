<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../model/User.php';

class CadastroController
{
    private $user;

    public function __construct()
    {
        $this->user = new \User();
    }

    // processa cadastro de user e salva no banco
    public function processCadastro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name       = $_POST['name'];
            $lastname   = $_POST['lastname'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];

            $user = $this->user->createUser($name, $lastname, $email, $password);

            echo "user ".json_encode($user);

            if ($user == true) {
                session_start();
                $_SESSION['cadastro_sucesso'] = true;
                session_write_close();
                $this->showCadastroForm();
            } else {
                session_start();
                $_SESSION['cadastro_falhou'] = true;
                session_write_close();
                $this->showCadastroForm();
            }
        }
    }

    // redireciona para a pagina de cadastro de user
    public function showCadastroForm()
    {
        header('Location:../view/cadastro_form.php');
        // include '../view/cadastro_form.php';
    }
}
