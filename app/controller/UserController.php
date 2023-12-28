<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../model/User.php';
include_once 'Auth.php';

class UserController
{
    private $user;
    private $auth;

    public function __construct()
    {
        $this->user = new \User();
        $this->auth = new \Auth();
    }

    // busca informações do user por id no banco
    public function getUserById($userId)
    {
        $user = $this->user->getUserById($userId);
        return $user;
    }

    // processa cadastro de user e salva no banco
    public function processCadastro($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name       = $_POST['name'];
            $lastname   = $_POST['lastname'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];

            // significa que é edição
            if ($userId != null) {
                $this->updateUser($userId, $name, $lastname, $email, $password);
                return;
            }

            $user = $this->user->createUser($name, $lastname, $email, $password);

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

    // edita informações de um user
    public function updateUser($userId, $name, $lastname, $email, $password)
    {
        $this->user->updateUser($userId, $name, $lastname, $email, $password);
        $this->showPaginaAdm();
    }

    // apaga user no banco
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];
            $this->user->deleteUser($userId);
            $this->showPaginaAdm();
        }
    }

    // redireciona para pagina de login
    public function showLogin()
    {
        header('Location:../');
    }

    // busca todos os users no banco
    public function getAllUsers()
    {
        $users = $this->user->getAllUsers();
        return $users;
    }

    // redireciona para a pagina de cadastro de user
    public function showCadastroForm()
    {
        header('Location:../view/cadastro_form.php');
        // include '../view/cadastro_form.php';
    }

    // redireciona para a pagina administrativa
    public function showPaginaAdm()
    {
        header('Location:../view/pagina_adm.php');
        // include '../view/cadastro_form.php';
    }
}
