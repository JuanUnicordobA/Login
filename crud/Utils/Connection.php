<?php

namespace Utils;

use PDO;
use PDOException;

class Connection
{

    private PDO $conn;

    private $password = "";
    private $username = "root";
    private $dbname = "usuarios";
    private $servername = "localhost";

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}