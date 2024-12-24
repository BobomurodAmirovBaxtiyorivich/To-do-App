<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Bot{

    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.telegram.org/bot' . $_ENV['TG_TOKEN'] . '/',
            'timeout'  => 2.0,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function makeRequest($method, $params): void
    {
        $this->client->post($method, [
            'form_params' => $params
        ]);
    }

    public function getUserTodos(int $chat_id): array|string
    {
        $user = new User();

        return $user->getTodosByTelegramID($chat_id);
    }

    public function prepareTodos(int $chat_id): array|string
    {
        $result = $this->getUserTodos($chat_id);

        if (gettype($result) == 'array') {
            $todosList = "";

            $i = 0;

            foreach ($result as $value) {
                $i++;
                $todosList .= "Todo number " . $i . "\n\n" . "Title = " . $value['title'] . "\n" . "Status = " . $value['status'] . "\n" . "Due date = " . $value['due_date'] . "\n" . "---------------------------------------------------------------------" . "\n";
            }

            return $todosList;

        } else {
            return $result;
        }
    }

    public function prepareButtons(int $chat_id): array
    {
        $result = $this->getUserTodos($chat_id);
        $buttons = [];
        $i = 0;
        foreach ($result as $value) {
            $i++;
            $buttons[] = [
                    'text' => 'Todo number ' .$i,
                    'callback_data' => 'todo_' . $value['id']
            ];
        }
        return array_chunk($buttons, 2);
    }

    /**
     * @throws GuzzleException
     */
    public function sendUserTodos(int $chat_id): void
    {
        $result = $this->prepareTodos($chat_id);

        if (!$result) {
            error_log('prepareTodos funksiyasi bo‘sh natija qaytardi.');
            return;
        }

        try {
            $this->makeRequest('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $result,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $this->prepareButtons($chat_id)
                ])
            ]);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            error_log('GuzzleException: ' . $e->getMessage());
        }
    }

}