<?php

include 'Database.php';

class User extends Database
{
    private $id;
    private $name;
    private $lastname;
    private $password;
    private $email;

    public function createUser($name, $lastname, $email, $password){
        
        echo 'teste';
        // verifica se usar já existe
        $conn = $this->connect();
        $email = $conn->real_escape_string($email);
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if($data != null){
            $stmt->close();
            $conn->close();
            return $data;
        }

        // cadastra user
        $name       = $conn->real_escape_string($name);
        $lastname   = $conn->real_escape_string($lastname);
        $email      = $conn->real_escape_string($email);
        $password   = $conn->real_escape_string($password);

        $sql = "INSERT INTO user(name, lastname, email, password) VALUES(?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $lastname, $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        return true;
    }

    public function validaLogin($name, $password)
    {
        $conn = $this->connect();
        $name = $conn->real_escape_string($name);
        $password = $conn->real_escape_string($password);
        $sql = "SELECT * FROM user WHERE name = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $data;
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
}
