<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

views('add_todos');