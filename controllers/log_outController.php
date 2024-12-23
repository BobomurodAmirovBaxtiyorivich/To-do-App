<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

session_destroy();
header('Location: /');
