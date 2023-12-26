<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '../controller/PostController.php';

$postController = new PostController();

$postId=null;

// Verifica se é edição de um post com ID na URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $post = $postController->getPostById($postId);

    $titleValue = $post['title'] ?? '';
    $contentValue = $post['content'] ?? '';
} else {
    $titleValue = '';
    $contentValue = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/post_form.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Criar Postagem</h3>
                    </div>
                    <form class="row g-3" method="post" action="<?= $postController->processPost($postId) ?>">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Título</label>
                            <input name="title" type="title" class="form-control" id="title" value="<?= $titleValue ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="content" class="form-label">Conteúdo</label>
                            <textarea name="content" class="form-control" id="content" rows="6" required><?= $contentValue ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Postar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>