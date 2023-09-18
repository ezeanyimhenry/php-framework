<?php
namespace Framework\Database;

class Database {
    private $dbConnection;

    public function __construct($dsn, $username, $password) {
        try {
            $this->dbConnection = new \PDO($dsn, $username, $password);
            $this->dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->dbConnection;
    }
}
