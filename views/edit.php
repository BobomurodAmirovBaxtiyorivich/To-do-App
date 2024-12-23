<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .todo-body {
            max-width: 800px;
            box-shadow: 0 0 5px 5px #635f5f;
            border-radius: 20px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body mt-5 p-3">
            <h1 class="text-center todo-text">Edit Task</h1>
            <?php
            /** @var TYPE_NAME $todo */
            ?>
            <form action="/update/<?= $todo['id']?>" method="POST">
                <input type="text" name="_method" value="PUT" hidden="">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $todo['title']?>">
                </div>
                <div class="mb-3">
                    <?php
                    if ($todo['status'] == 'pending'){?>
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending" selected>pending</option>
                            <option value="in_progress">in progress</option>
                            <option value="completed">completed</option>
                        </select>
                    <?php } elseif ($todo['status'] == 'in_progress'){?>
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="in_progress" selected>in progress</option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                    <?php }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="due_date">Due date</label>
                    <input type="datetime-local" class="form-control" name="due_date" id="due_date" value="<?= $todo['due_date']?>">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="sub" class="btn btn-primary">Save Changes</button>
                    <a href="/todos-list" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>