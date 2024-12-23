<?php

require "views/components/header.php";
?>
    <div class="container">
        <?php

        require "views/components/navbar.php";
        ?>
        <div class="row d-flex justify-content-center">
            <div class="todo-body mt-5 p-3">
                <h1 class="text-center todo-text">Todo App</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci blanditiis dicta ducimus error
                    excepturi fugit ipsum itaque labore maiores nisi praesentium quia, ratione reiciendis rem rerum
                    totam
                    veniam
                    vero?
                </p>
                <table class="table table-primary info_table" border="1">
                    <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Due date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /** @var TYPE_NAME $todos */

                    foreach ($todos as $task) { ?>
                        <tr>
                            <?php
                            if ($task['status'] == 'completed') { ?>
                                <td class="strikethrough truncated"><a
                                            href="/full_title/<?= $task['id'] ?>"><?= $task['title'] ?></a></td>
                            <?php } else { ?>
                                <td class="truncated"><a
                                            href="/full_title/<?= $task['id'] ?>"><?= $task['title'] ?></a></td>
                            <?php }
                            if ($task['status'] == 'in_progress') {
                                ?>
                                <td><?php $task['status'] = "in progress";
                                    echo $task['status']; ?></td>
                            <?php } else {
                                ?>
                                <td class="status"><?= $task['status'] ?></td>
                            <?php }
                            ?>
                            <td><?= $task['due_date'] ?></td>
                            <td class="actions">
                                <?php
                                if ($task['status'] == 'completed') {
                                    ?>
                                    <a href="/pending/<?= $task['id'] ?>" type="button"
                                       class="btn btn-primary">Restart</a>
                                    <a href="/delete/<?= $task['id'] ?>" type="button" class="btn btn-danger">Delete</a>
                                <?php } elseif ($task['status'] == 'in progress') {
                                    ?>
                                    <a href="/pending/<?= $task['id'] ?>" type="button"
                                       class="btn btn-primary">Restart</a>
                                    <a href="/complete/<?= $task['id'] ?>" type="button"
                                       class="btn btn-success">Done</a>
                                    <a href="/edit/<?= $task['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/delete/<?= $task['id'] ?>" class="btn btn-danger">Delete</a>
                                <?php } else { ?>
                                    <a href="/start/<?= $task['id'] ?>" type="button" class="btn btn-primary">Start</a>
                                    <a href="/complete/<?= $task['id'] ?>" type="button"
                                       class="btn btn-success">Done</a>
                                    <a href="/edit/<?= $task['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                                    <a href="/delete/<?= $task['id'] ?>" class="btn btn-danger">Delete</a>
                                <?php }
                                ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
<?php
require "views/components/footer.php";
?>