<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

/** @var TYPE_NAME $todoID */

$todo = new App\Todo();

$todo->Pending($todoID);
header('Location: /todos-list');