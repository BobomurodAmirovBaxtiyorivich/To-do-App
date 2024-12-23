<?php

require "views/components/header.php"
?>
    <div class="container">
        <?php

        require "views/components/navbar.php";
        ?>
        <div class="row d-flex justify-content-center">
            <div class="todo-body mt-5 p-3">
                <form action="/send_message" method="POST">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="chat_id" placeholder="Chat id"
                               aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button class="btn btn-outline-primary" name="sub" type="submit" id="button-addon2">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
<?php
require "views/components/footer.php";

?>