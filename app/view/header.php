<?php
include_once '../controller/Auth.php';

$authController = new Auth();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/header.css" rel="stylesheet">
</head>

<body>
    <header class="bg-dark text-white p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a id="home" href="home.php">
                        <h1>Blog System</h1>
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <nav>
                        <ul class="list-inline">
                            <?php
                            if ($authController->isUserLoggedIn()) { ?>
                                <li class="list-inline-item"><a href="pagina_adm.php" class="text-white">Página administrativa</a></li>
                                <li class="list-inline-item"><a href="../" class="text-white">Sair</a></li>
                            <?php } else { ?>
                                <li class="list-inline-item"><a href="../" class="text-white">Login</a></li>
                                <li class="list-inline-item"><a href="cadastro_form.php" class="text-white">Registre-se</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</body>