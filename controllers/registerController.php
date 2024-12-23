<?php

if (!isset($_SESSION['user'])){
    header('Location: /log_in');
}

$user = new App\User();

if (isset($_POST['sub'])){
    $check2 = true;

    if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pass1']) and isset($_POST['pass2'])){
        if ($_POST['pass1'] != $_POST['pass2']){
            $check2 = false;
            $_SESSION['error'] = ['Passwords do not match'];
            header('Location: /register');
        }

        $check = true;

        foreach ($user->getAllUsers() as $value){
            if ($value['email'] == $_POST['email']){
                $check = false;
            }
        }

        if (!$check){
            $_SESSION['error'] = ['Email already exists'];
            header('Location: /register');
        }

        if ($check and $check2){
            $info = $user->register($_POST['name'], $_POST['email'], $_POST['pass1']);
            unset($info['password']);
            $_SESSION['user'] = $info;
            header('location: /');
        }
    }
}