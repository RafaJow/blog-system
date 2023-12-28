<?php

include_once '../model/Post.php';

class PostController
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    // busca informações do post por id no banco
    public function getPostById($postId)
    {
        $post = $this->post->getPostById($postId);
        return $post;
    }

    // apaga post no banco
    public function deletePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['postId'];

            $this->post->deletePost($postId);
            $this->showPaginaAdm();
        }
    }

    // busca todos os posts no banco
    public function getAllPosts()
    {
        $posts = $this->post->getAllPosts();
        return $posts;
    }

    // processa cadastro de post e salva no banco
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
            $this->showPaginaAdm();
        }
    }

    // edita informações de um post
    public function updatePost($postId, $title, $content){
        $this->post->updatePost($postId, $title, $content);
        $this->showPaginaAdm();
    }

    // redireciona para home
    public function showHome()
    {
        header('Location:../view/home.php');
    }

    // redireciona para página administrativa
    public function showPaginaAdm()
    {
        header('Location:../view/pagina_adm.php');
    }
}
