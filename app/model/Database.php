<?php

// conexão com o banco é feita aqui
class Database {
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "blog";

    protected function connect() {

        $conn = new \mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Exception: " . $conn->connect_error);
        }
        return $conn;
    }
    
    /**
     * Get the value of host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the value of host
     */
    public function setHost($host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername($username): self
    {
        $this->username = $username;

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
     * Get the value of dbname
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Set the value of dbname
     */
    public function setDbname($dbname): self
    {
        $this->dbname = $dbname;

        return $this;
    }
}
?>