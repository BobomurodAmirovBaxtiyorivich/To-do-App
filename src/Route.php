<?php

namespace App;
class Route
{
    public string|int|array|null|false $currentRoute;

    public function __construct()
    {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getResourse($route): false|string
    {
        $resourseIndex = mb_stripos($route, '{id}');

        if (!$resourseIndex) {
            return false;
        }

        $resourseValue = substr($this->currentRoute, $resourseIndex);

        if ($limit = mb_stripos($resourseValue, '/')) {
            return substr($resourseValue, 0, $limit);
        }

        return $resourseValue ?: false;
    }

    public function getMethod($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $resourseID = $this->getResourse($route);
            if ($resourseID) {
                $route = str_replace('{id}', $resourseID, $route);
                if ($route == $this->currentRoute) {
                    $callback($resourseID);
                    exit();
                }
            }

            if ($route == $this->currentRoute) {
                $callback();
                exit();
            }
        }
    }

    public function postMethod($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resourseID = $this->getResourse($route);
            $route = str_replace('{id}', $resourseID, $route);
            if ($route == $this->currentRoute) {
                $callback();
                exit();
            }
        }
    }

    public function putMethod($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['_method'])) {
                if ($_POST['_method'] == 'PUT') {
                    $resourseID = $this->getResourse($route);
                    if ($resourseID) {
                        $route = str_replace('{id}', $resourseID, $route);
                        if ($route == $this->currentRoute) {
                            $callback($resourseID);
                            exit();
                        }
                    }
                    if ($route == $this->currentRoute) {
                        $callback($resourseID);
                        exit();
                    }
                }
            }
        }
    }

    public function deleteMethod($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $resourseID = $this->getResourse($route);
            if ($resourseID) {
                $route = str_replace('{id}', $resourseID, $route);
                if ($route == $this->currentRoute) {
                    $callback($resourseID);
                    exit();
                }
            }

            if ($route == $this->currentRoute) {
                $callback();
                exit();
            }
        }
    }

    public function isAPIcall(): bool
    {
        return mb_stripos($this->currentRoute, '/api') === 0;
    }

    public function isTelegram(): bool
    {
        return mb_stripos($this->currentRoute, '/telegram') === 0;
    }
}