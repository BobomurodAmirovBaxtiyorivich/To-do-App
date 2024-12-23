<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

$user = new App\User();

if (isset($_POST['sub'])){
    if (!empty($_POST['email']) or !empty($_POST['pass'])){

        $check = false;

        foreach ($user->getAllUsers() as $value){
            if ($value['email'] == $_POST['email'] and $value['password'] == $_POST['pass']){
                $check = true;
            }
        }

        if (!$check){
            $_SESSION['error'] = ['Email or password is incorrect'];
            header('Location: /log_in');
        } else {
            $info = $user->login($_POST['email'], $_POST['pass']);
            unset($info['password']);
            $_SESSION['user'] = $info;
            header('Location: /');
        }
    }
}
