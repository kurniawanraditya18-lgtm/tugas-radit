<?php
require_once "config.php";

class Database {
    private static $instance = null;

    private $con;
    private $host = HOST;
    private $db_name = DB_NAME;
    private $username = USERNAME;
    private $password = PASSWORD;

    function __construct() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
        try {
            $this->con = new PDO($dsn, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->con;
    }
}
?>