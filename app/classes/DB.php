<?php
class DB {
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "srps";

    private function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("DB Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance->conn;
    }

    public function __clone() {}
    public function __wakeup() {}
}
