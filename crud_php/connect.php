<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'crudoperation';
    private $conn;

    public function connect() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            $this->conn->set_charset("utf8");
            return $this->conn;
        } catch (Exception $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
}

$db = new Database();
$con = $db->connect();
?>