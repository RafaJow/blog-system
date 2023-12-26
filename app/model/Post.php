<?php

include_once 'Database.php';

class Post extends Database
{
    public function getAllPosts()
    {
        $conn = $this->connect();
        $sql = "SELECT post.id, title, content, user_id, CONCAT(user.name, ' ', user.lastname) AS author FROM post join user where post.user_id = user.id ORDER BY post.id DESC";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    public function createPost($title, $content)
    {
        $conn = $this->connect();

        $title      = $conn->real_escape_string($title);
        $content    = $conn->real_escape_string($content);

        $sql = "INSERT INTO post(title, content, user_id) VALUES(?, ?, 1)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $content);

        if (!$stmt->execute()) {
            echo "Erro ao inserir registro: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
