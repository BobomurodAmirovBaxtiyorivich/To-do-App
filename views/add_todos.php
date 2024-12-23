<?php

require "views/components/header.php"
?>
    <div class="container">
        <?php

        require "views/components/navbar.php";
        ?>
        <div class="row d-flex justify-content-center">
            <div class="todo-body mt-5 p-3">
                <h1 class="text-center todo-text">Todo App</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci blanditiis dicta ducimus error
                    excepturi fugit ipsum itaque labore maiores nisi praesentium quia, ratione reiciendis rem rerum totam
                    veniam
                    vero?
                </p>
                <form action="/add-todos" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="task" placeholder="Task"
                               aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <input type="datetime-local" class="form-control" name="due_date" placeholder="Task"
                               aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button class="btn btn-outline-primary" name="sub" type="submit" id="button-addon2">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
<?php

require "views/components/footer.php"
?>