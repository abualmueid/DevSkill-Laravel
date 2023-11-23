<?php

namespace System\Support;

use PDO;
use PDOException;

class DatabaseConnection
{
    protected $connection = null;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void 
    {
        $servername = "localhost";
        $dbName = "devskill";
        $username = "root";
        $password = "";

        try {
            $connection = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}