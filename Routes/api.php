<?php

$todo = new App\Todo();

$route = new App\Route();

$route->getMethod('/api/todos', function () use($todo){
    APIresponse($todo->getAllTodos());
});

$route->getMethod('/api/todos/{id}', function ($todoID) use($todo){
    APIresponse($todo->getTodo($todoID));
});

$route->postMethod('/api/todos', function () use($todo){
    $todo->store($_POST['title'], $_POST['due_date'], 1);
    APIresponse([
        "ok" => true,
        "message" => "Todo created successfully"
    ]);
});

$route->putMethod('/api/todos/{id}', function ($todoID) use($todo){
    $todo->update($todoID, $_POST['title'], $_POST['status'], $_POST['due_date']);
    APIresponse([
        "ok" => true,
        "message" => "Todo updated successfully"
    ]);
});

$route->deleteMethod('/api/todos/{id}', function ($todoID) use($todo){
    $todo->Delete($todoID);
    APIresponse([
        "ok" => true,
        "message" => "Todo deleted successfully"
    ]);
});