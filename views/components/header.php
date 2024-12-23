<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
        .wrong_pass {
            text-align: center;
            color: red;
        }

        .todo-body {
            max-width: 800px;
            box-shadow: 0 0 5px 5px #635f5f;
            border-radius: 20px;
        }

        .todo-text {
            font-weight: bold;
        }

        .info_table {
            border-radius: 15px;
        }

        .strikethrough {
            text-decoration: line-through;
            color: red;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .truncated {
            border: 1px solid #ddd;
            padding: 8px;
            max-width: 150px;
            /* Maksimal kenglik */
            white-space: nowrap;
            /* Matnni bir qatorda saqlash */
            overflow: hidden;
            /* Chegaradan chiqmaslik uchun */
            text-overflow: ellipsis;
            /* "..." ni qo‘shadi */
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: gold;
        }

        .actions {
            width: 40%;
        }

        .status {
            width: 15%;
        }

        .todos-app {
            font-weight: bolder;
        }

        .todos-list {
            font-weight: bolder;
        }

        .log-in {
            margin-right: 5px;
        }

        .todos-app {
            font-weight: bolder;
        }

        .todos-list {
            font-weight: bolder;
        }

        .add-todos {
            font-weight: bolder;
        }

        .todo-body {
            max-width: 800px;
            box-shadow: 0 0 5px 5px #635f5f;
        }

        .todo-text {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: gold;
        }

        .log-in {
            margin-right: 5px;
        }

        .todos-app {
            font-weight: bolder;
        }

        .todos-list {
            font-weight: bolder;
        }

        .add-todos {
            font-weight: bolder;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        body {
            background-color: #008B8B;
        }

        .main-img {
            border-radius: 50px;
        }

        .navbar {
            background-color: #00FFFF;
            border-radius: 10px;
        }
        .no-bullets {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .main-info {
            text-align: left;
        }

        .main-sign-up {
            width: 50%;
            height: 30%;
        }

        .main-p {
            font-weight: 800;
            font-size: larger;
        }

        .register {
            width: 30%;
        }

        .log-in {
            width: 30%;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>