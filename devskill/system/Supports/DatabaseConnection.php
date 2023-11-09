<?php 

namespace DevSkill\Supports;
use PDO;
use PDOException;

class DatabaseConnection
{
    protected $connection = null;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $servername = "localhost";
        $dbName = "devskill";
        $username = "username";
        $password = "password";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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