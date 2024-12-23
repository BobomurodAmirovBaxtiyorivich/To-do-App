<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Bot;
use App\Todo;
use App\Route;
use App\User;

$route = new Route();

$route->getMethod('/', fn() => require "controllers/homeController.php");

$route->getMethod('/register', fn() => require "controllers/registerHtmlController.php");
$route->postMethod('/register', fn() => require "controllers/registerController.php");

$route->getMethod('/log_in', fn() => require "controllers/log_inHtmlController.php");
$route->postMethod('/log_in', fn() => require "controllers/log_inController.php");

$route->getMethod('/log_out', fn() => require "controllers/log_outController.php");

$route->getMethod('/telegram', fn() => require "controllers/telegramController.php");

$route->postMethod('/send_message', fn() => require "controllers/sendmessagefrombotController.php");

$route->putMethod('/update/{id}', fn($todoID) => require "controllers/editTodoController.php");

$route->getMethod('/edit/{id}', fn($todoID) => require "controllers/showTodoController.php");

$route->getMethod('/add-todos', fn() => require "controllers/showAddTodosPageController.php");

$route->postMethod('/add-todos', fn() => require "controllers/addTodosController.php");

$route->getMethod('/todos-list', fn() => require "controllers/showTodosListController.php");

$route->getMethod('/delete/{id}', fn($todoID) => require 'controllers/deleteTodoController.php');

$route->getMethod('/start/{id}', fn($todoID) => require "controllers/startTodoController.php");

$route->getMethod('/complete/{id}', fn($todoID) => require "controllers/completeTodoController.php");

$route->getMethod('/pending/{id}', fn($todoID) => require "controllers/restartTodoController.php");

$route->getMethod("/full_title/{id}", fn($todoID) => require "controllers/getFullTitleController.php");

echo '<h1 align="center">404 not found</h1>';