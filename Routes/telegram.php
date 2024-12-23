<?php

use App\Bot;

$update = json_decode(file_get_contents('php://input'), true);

$chat_id = $update['message']['chat']['id'];
$text = $update['message']['text'];

$bot = new App\Bot();

$bot->makeRequest('sendMessage', ["chat_id" => $chat_id, "text" => $text]);