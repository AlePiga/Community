<?php
class Database{
    private $conn;
    public function __construct(){
        require_once 'config.php';
        $this->conn = new mysqli($servername, $username, $password,$db);
        $this->conn->set_charset("utf8");

        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query){
        return $this->conn->query($query);
    }

    public function __destruct(){
        $this->conn->close();
    }
}