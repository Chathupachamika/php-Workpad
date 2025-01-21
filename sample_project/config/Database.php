<?php
// config/Database.php
namespace Config;

class Database {
    private $host = "localhost";
    private $dbname = "notes_app";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect() {
        try {
            $this->conn = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(\PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            return null;
        }
    }
}