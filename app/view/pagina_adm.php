<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '../controller/PostController.php';
$postController = new PostController();
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
                            <form class="actions" method="post" action="editar.php">
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
</body>

</html>