<?php

include_once '../model/Post.php';

class PostController
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function getPostById($postId)
    {
        $post = $this->post->getPostById($postId);
        return $post;
    }

    public function deletePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['postId'];

            $this->post->deletePost($postId);
            $this->showPaginaAdm();
        }
    }

    public function getAllPosts()
    {
        $posts = $this->post->getAllPosts();
        return $posts;
    }

    public function processPost($postId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title      = $_POST['title'];
            $content    = $_POST['content'];

            if($postId != null){
                echo "title $title, content $content, postId $postId";

                $this->updatePost($postId, $title, $content);
                return;
            }

            $this->post->createPost($title, $content);
            $this->showHome();
        }
    }

    public function updatePost($postId, $title, $content){
        $this->post->updatePost($postId, $title, $content);
        $this->showHome();
    }

    public function showHome()
    {
        header('Location:../view/home.php');
    }

    public function showPaginaAdm()
    {
        header('Location:../view/pagina_adm.php');
    }
}
