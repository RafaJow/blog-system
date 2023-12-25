<?php

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
}
?>