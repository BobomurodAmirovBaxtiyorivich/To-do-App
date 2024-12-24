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
        $todo = (new Todo())->getTodo($todoID);
        try {
            $bot->makeRequest('editMessageText', [
                'chat_id' => $callback_chat_id,
                'message_id' => $callback_message_id,
                'text' => "Todo number: " . $todoID . "\n\n" . "Title = " . $todo['title'] . "\n" . "Status = " . $todo['status'] . "\n" . "Due date = " . $todo['due_date'],
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['callback_data' => 'complete_' . $todoID, 'text' => 'Complete'],
                            ['callback_data' => 'in_progress_' . $todoID, 'text' => 'In progress'],
                            ['callback_data' => 'pending_' . $todoID, 'text' => 'Pending']
                        ]
                    ]
                ])
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
    }

    if (mb_stripos($callback_data, 'in_progress_') !== false){
        $todoID = explode('in_progress_', $callback_data)[1];
        (new Todo())->Start($todoID);
        $todo = (new Todo())->getTodo($todoID);
        try {
            $bot->makeRequest('editMessageText', [
                'chat_id' => $callback_chat_id,
                'message_id' => $callback_message_id,
                'text' => "Todo number: " . $todoID . "\n\n" . "Title = " . $todo['title'] . "\n" . "Status = " . $todo['status'] . "\n" . "Due date = " . $todo['due_date']
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }

    }

    if (mb_stripos($callback_data, 'complete_') !== false){
        $todoID = explode('complete_', $callback_data)[1];
        (new Todo())->Complete($todoID);
        $todo = (new Todo())->getTodo($todoID);
        try {
            $bot->makeRequest('editMessageText', [
                'chat_id' => $callback_chat_id,
                'message_id' => $callback_message_id,
                'text' => "Todo number: " . $todoID . "\n\n" . "Title = " . $todo['title'] . "\n" . "Status = " . $todo['status'] . "\n" . "Due date = " . $todo['due_date']
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
    }

    if (mb_stripos($callback_data, 'pending_') !== false){
        $todoID = explode('pending_', $callback_data)[1];
        (new Todo())->Pending($todoID);
        $todo = (new Todo())->getTodo($todoID);
        try {
            $bot->makeRequest('editMessageText', [
                'chat_id' => $callback_chat_id,
                'message_id' => $callback_message_id,
                'text' => "Todo number: " . $todoID . "\n\n" . "Title = " . $todo['title'] . "\n" . "Status = " . $todo['status'] . "\n" . "Due date = " . $todo['due_date']
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

        }
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