<?php

include 'Database.php';

class Post extends Database
{
    private $id;
    private $title;
    private $content;
    private $author;

    public function getAllPosts()
    {
        $conn = $this->connect();
        $sql = "SELECT post.id, title, content, user_id, CONCAT(user.name, ' ', user.lastname) AS author FROM post join user where post.user_id = user.id";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     */
    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     */
    public function setAuthor($author): self
    {
        $this->author = $author;

        return $this;
    }
}
