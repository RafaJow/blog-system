<?php

include '../model/Post.php';

class Home
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
}
