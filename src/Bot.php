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
}