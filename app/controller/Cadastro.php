<?php
namespace app\controller;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../model/User.php';

echo 'teste023';

class Cadastro
{
    private $user;

    public function __construct()
    {
        echo 'teste1';
        $this->user = new \User();
        echo 'teste3';
    }

    public function processCadastro()
    {
        echo 'teste2';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name       = $_POST['name'];
            $lastname   = $_POST['lastname'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];

            $user = $this->user->createUser($name, $lastname, $email, $password);

            header("Location: ../view/cadastro_form.php");
            exit();

            if ($user != null) {
                echo "Cadastro bem-sucedido!";
            } else {
                session_start();
                $_SESSION['cadastro_falhou'] = true;
                session_write_close();
                $this->showCadastroForm();
            }
        }
    }

    public function showCadastroForm()
    {
        include '../view/cadastro_form.php';
    }
}
