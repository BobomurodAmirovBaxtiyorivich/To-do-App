<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .full-title {
            max-width: 100%;
            box-shadow: 0 0 5px 5px #635f5f;
            text-align: center;
            border-radius: 15px;
        }

        .title {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
/** @var TYPE_NAME $full */
?>
<div class="container">
    <div class="row mt-5">
        <div class="full-title">
            <h1 class="title"><?= $full[0]['title'] ?></h1>
            <a href="/todos-list" class="btn btn-primary mb-2">Back</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>