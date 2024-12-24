<?php

namespace App;

use PDO;
use App\Todo;

class User
{
    public \PDO $conn;
    public string $query;
    public $stmt;

    public function __construct()
    {
        $pdo = new DB();

        $this->conn = $pdo->conn;
    }

    public function getAllUsers(): array
    {
        $this->query = "SELECT * FROM users";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($full_name, $email, $password): mixed
    {
        $this->query = "INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)";
        $this->stmt = $this->conn->prepare($this->query)->execute([
            ":full_name" => $full_name,
            ":email" => $email,
            ":password" => $password
        ]);
        return $this->getUserById($this->conn->lastInsertId());
    }

    public function login($email, $password)
    {
        $this->query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":email" => $email,
            ":password" => $password
        ]);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id)
    {
        $this->query = "SELECT * FROM users WHERE id = :id";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":id" => $id
        ]);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function setTelegramId($tgID, $userID): void
    {
        $this->query = "UPDATE users SET telegram_id = :tgID WHERE id = :userID";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":tgID" => $tgID,
            ":userID" => $userID
        ]);
    }

    public function getTodosByTelegramID($telegramID): array|string
    {
        $this->query = "SELECT id FROM users WHERE telegram_id = :telegramID";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":telegramID" => $telegramID
        ]);

        $todo = new Todo();

        $userID = $this->stmt->fetch(PDO::FETCH_ASSOC);

        if ($userID === false){
            return "Sorry, you are not registered yet.";
        }

        if (!empty($todo->getAllTodosByUserID($userID['id']))){
            return $todo->getAllTodosByUserID($userID['id']);
        } else {
            return "Sorry, but you don't have any todos";
        }
    }
}
