<?php

include_once '../model/Post.php';

class PostController
{
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function getAllPosts()
    {
        $posts = $this->post->getAllPosts();
        return $posts;
    }

    public function processPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title      = $_POST['title'];
            $content    = $_POST['content'];

            $this->post->createPost($title, $content);
            $this->showHome();
        }
    }

    public function showHome() {
        header('Location:../view/home.php');
    }
}
