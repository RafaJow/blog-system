<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$msg = "";

session_start();
if (isset($_SESSION['cadastro_falhou']) and $_SESSION['cadastro_falhou'] == true) {
    $msg = '<div class="alert alert-danger">Esse email já foi cadastrado</div>';
    unset($_SESSION['cadastro_falhou']);
}
session_write_close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/cadastro_form.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registro</h3>
                    </div>
                    <form class="row g-3" method="post" action="../controller/Cadastro.php?action=processCadastro">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input name="name" type="name" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Sobrenome</label>
                            <input name="lastname" type="lastname" class="form-control" id="lastname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Senha</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Registrar-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?= $msg ?>
    </div>
</body>

</html>