<?php

use JetBrains\PhpStorm\NoReturn;

function views(string $file, array $data = []): void
{
    extract($data);
    require "views/" . $file . ".php";
}

#[NoReturn] function APIresponse($date): void
{
    header('Content-Type: application/json');
    echo json_encode($date);
    exit;
}
