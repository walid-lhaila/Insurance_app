<?php 
require("../config/config.php");

class Database {
    protected $db;

    public function connect() {
        try {
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;  // Return the PDO object
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>