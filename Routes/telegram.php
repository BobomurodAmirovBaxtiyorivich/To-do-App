<?php

use App\Bot;
use App\User;
use App\Todo;

$update = json_decode(file_get_contents('php://input'));

$message = $update->message;
$chat_id = $update->message->chat->id;
$text = $update->message->text;

$bot = new Bot();
$user = new User();
$todo = new Todo();

$callback_query = $update->callback_query;
$callback_query_id = $callback_query->id;
$callback_data = $callback_query->data;
$callback_user_id = $callback_query->from->id;
$callback_chat_id = $callback_query->message->chat->id;
$callback_message_id = $callback_query->message->message_id;

if ($callback_query){
    if (mb_stripos($callback_data, 'todo_') !== false){
        $todoID = explode('todo_', $callback_data)[1];
        (new Bot())->setTodoButtons($todoID, $callback_chat_id, $callback_message_id);
    }

    if (mb_stripos($callback_data, 'in_progress_') !== false){
        $todoID = explode('in_progress_', $callback_data)[1];
        (new Todo())->Start($todoID);
        (new Bot())->setTodoButtons($todoID, $callback_chat_id, $callback_message_id);

    }

    if (mb_stripos($callback_data, 'complete_') !== false){
        $todoID = explode('complete_', $callback_data)[1];
        (new Todo())->Complete($todoID);
        (new Bot())->setTodoButtons($todoID, $callback_chat_id, $callback_message_id);
    }

    if (mb_stripos($callback_data, 'pending_') !== false){
        $todoID = explode('pending_', $callback_data)[1];
        (new Todo())->Pending($todoID);
        (new Bot())->setTodoButtons($todoID, $callback_chat_id, $callback_message_id);
    }
}

if($message){
    if ($text == '/start') {
        try {
            $bot->makeRequest('sendMessage', ["chat_id" => $chat_id, "text" => "Welcome to Todo App bot\n/todos = shows all your todos"]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
        exit();
    }

    if (mb_stripos($text, '/start') !== false) {
        $userID = explode('/start', $text)[1];

        $user->setTelegramId($chat_id, (int)$userID);

        try {
            $bot->makeRequest('sendMessage', ["chat_id" => $chat_id, "text" => "Welcome to Todo App bot\n/todos = shows all your todos"]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
    }

    if ($text == '/todos') {
        try {
            $bot->sendUserTodos($chat_id);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
    }
}