<!-- Página de home do blog -->
<?php
include_once '../controller/PostController.php';

$postController = new PostController();
$posts = $postController->getAllPosts();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog system home</title>
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/home.css" rel="stylesheet">
</head>

<?php include 'header.php'; ?>

<body>
    <section class="container">
        <?php foreach ($posts as $post) { ?>
            <article>
                <h2><?= $post['title'] ?></h2>
                <p><?= $post['content'] ?></p>
                <h5><?= $post['author'] ?></h5>
            </article>
        <?php } ?>
    </section>
</body>

</html>