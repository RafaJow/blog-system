<!-- Página administrativa -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '../controller/PostController.php';
include_once '../controller/Auth.php';
include_once '../controller/DumpController.php';
include_once '../controller/UserController.php';

$postController = new PostController();
$authController = new Auth();
$dumpController = new DumpController();
$userController = new UserController();
$userLogadoId = $authController->getLoggedUserId();

if (!$authController->isUserLoggedIn()) {
    header("Location: acesso_negado.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/pagina_adm.css" rel="stylesheet">
</head>

<?php include 'header.php'; ?>

<body>
    <div class="container mt-5">
        <div class="superior">
            <h2>Listagem de posts</h2>
            <form class="actions" method="post" action="<?= $dumpController->geraDump() ?>">
                <button id="gera-dump" type="submit" class="btn btn-dark">Gerar Dump</button>
            </form>
            <a class="btn btn-success" href="post_form.php">Fazer novo Post</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posts = $postController->getAllPosts();
                foreach ($posts as $post) { ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['content'] ?></td>
                        <td class="botoes">
                            <form class="actions" method="post">
                                <input type="hidden" name="postId" value="<?= $post['id'] ?>">
                                <a href="post_form.php?id=<?= $post['id'] ?>" class="btn btn-primary">Editar</a>
                            </form>
                            <form class="actions" method="post" action="<?= $postController->deletePost() ?>">
                                <input type="hidden" name="postId" value="<?= $post['id'] ?>">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- _______________ LISTA DE USERS _______________ -->

    <div class="container mt-5">
        <div class="superior">
            <h2>Listagem de Usuários</h2>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $userController->getAllUsers();
                foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td class="botoes">
                            <form class="actions" method="post">
                                <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                <a href="cadastro_form.php?id=<?= $user['id'] ?>" class="btn btn-primary">Editar</a>
                            </form>
                            <form class="actions" method="post" action="<?= $userController->deleteUser() ?>">
                                <?php if ($user['id'] == $userLogadoId) { ?>
                                    <a class='btn btn-warning'>Não pode deletar a si mesmo</a>
                                <?php } else { ?>
                                    <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                <?php } ?>
                            </form>
                        </td>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>