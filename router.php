<?php

$route = new App\Route();

if ($route->isAPIcall()){
    require 'Routes/api.php';
    exit();
} elseif ($route->isTelegram()){
    require 'Routes/telegram.php';
    exit();
} else {
    require 'Routes/web.php';
}
