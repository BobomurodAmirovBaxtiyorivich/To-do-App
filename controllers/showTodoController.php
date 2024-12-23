<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

/** @var TYPE_NAME $todoID */

$todo = new App\Todo();

$getTodo = $todo->getTodo($todoID);
views('edit', ['todo' => $getTodo]);