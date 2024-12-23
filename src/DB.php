<?php

namespace App;

use PDO;
class DB
{
    public string $host;
    public string $dbname;
    public string $user;
    public string $password;
    public PDO $conn;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }
}