<?php

namespace App;

use App\DB;
use PDO;

class Todo
{
    public $conn;
    public string $query;
    public $stmt;

    public function __construct()
    {
        $pdo = new DB();

        $this->conn = $pdo->conn;
    }

    public function store($title, $due_date, $user_id): void
    {
        $this->query = "INSERT INTO table_name (title, status, due_date, created_at, updated_at, user_id) VALUES (:title, :status, :due_date, NOW(), NOW(), :user_id)";

        $this->conn->prepare($this->query)->execute([
            ":title" => $title,
            ":status" => "pending",
            ":due_date" => $due_date,
            ":user_id" => $user_id
        ]);
    }

    public function getAllTodosByID($user_id): array
    {
        $this->query = "SELECT * FROM table_name WHERE user_id = :user_id";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":user_id" => $user_id
        ]);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTodos(): array
    {
        $this->query = "SELECT * FROM table_name";
        $this->stmt = $this->conn->query($this->query);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Start($id): bool
    {
        $this->query = "UPDATE table_name
                        SET status = 'in_progress', updated_at = NOW()
                        WHERE id = :id";
        return $this->conn->prepare($this->query)->execute([
            ":id" => $id
        ]);
    }

    public function Complete($id): bool
    {
        $this->query = "UPDATE table_name
                        SET status = 'completed', updated_at = NOW()
                        WHERE id = :id";
        return $this->conn->prepare($this->query)->execute([
            ":id" => $id
        ]);
    }

    public function Pending($id): bool
    {
        $this->query = "UPDATE table_name
                        SET status = 'pending', updated_at = NOW()
                        WHERE id = :id";
        return $this->conn->prepare($this->query)->execute([
            ":id" => $id
        ]);
    }
    public function Delete($id): bool
    {
        $this->query = "DELETE FROM table_name
                        WHERE id = :id";
        return $this->conn->prepare($this->query)->execute([
            ":id" => $id
        ]);
    }

    public function full_title($id): array
    {
        $this->query = "SELECT title FROM todos WHERE id = {$id}";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTodo(int $id)
    {
        $this->query = "SELECT * FROM table_name WHERE id = :id";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":id" => $id
        ]);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $title, string $status, string $due_date): void
    {
        $this->query = "UPDATE table_name
                        SET title = :title, status = :status, due_date = :due_date
                        WHERE id = :id";
        $this->conn->prepare($this->query)->execute([
            ":id" => $id,
            ":title" => $title,
            ":status" => $status,
            ":due_date" => $due_date
        ]);
    }

    public function getAllTodosByUserID(mixed $user_id): array
    {
        $this->query = "SELECT * FROM table_name WHERE user_id = :user_id";
        $this->stmt = $this->conn->prepare($this->query);
        $this->stmt->execute([
            ":user_id" => $user_id
        ]);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}