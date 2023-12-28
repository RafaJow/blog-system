<?php

include_once 'Database.php';

class Post extends Database
{
    // atualiza dados do post
    public function updatePost($postId, $title, $content){
        $conn = $this->connect();

        $title      = $conn->real_escape_string($title);
        $content    = $conn->real_escape_string($content);
        $postId     = (int) $postId;

        $sql = "UPDATE post SET title = ?, content = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $postId);

        if (!$stmt->execute()) {
            echo "Erro ao inserir registro: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    // pega dados do post pelo id
    public function getPostById($postId)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM post WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        return $data;
    }

    // apaga post no banco
    public function deletePost($postId)
    {
        $conn = $this->connect();
        $postId = (int) $postId;

        $sql = "DELETE FROM post WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    // pega todos os posts
    public function getAllPosts()
    {
        $conn = $this->connect();
        $sql = "SELECT post.id, title, content, user_id, CONCAT(user.name, ' ', user.lastname) AS author FROM post join user where post.user_id = user.id ORDER BY post.id DESC";
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    // cria post
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
