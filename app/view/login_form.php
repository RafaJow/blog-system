<?php
include_once 'controller/LoginController.php';
$loginController = new LoginController();

$msg = "";

session_start();
if (isset($_SESSION['login_falhou']) and $_SESSION['login_falhou'] == true) {
    $msg = '<div class="alert alert-danger">Login ou senha incorreto!</div>';
    unset($_SESSION['login_falhou']);
}
session_write_close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de Login</title>
    <link href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login_form.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="?action=processLogin">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome de usuário</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                                <a id="registro" class="btn btn-success" href="view/cadastro_form.php">Não possui uma conta ? registre-se agora</a>
                                <a id="registro" class="btn btn-secondary" href="view/home.php">Entrar como visitante</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?= $msg ?>
            </div>
        </div>
    </div>
</body>

</html>