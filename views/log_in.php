<?php
require "components/header.php"
?>
<div class="container mt-2">
    <div class="row content">
        <nav class="navbar navbar-expand-lg bg-body-tertiary mt-4">
            <div class="container-fluid">
                <a class="navbar-brand todos-app" href="/">Main</a>
            </div>
        </nav>
        <div class="card bg-light mt-4 log-in">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <form action="/log_in" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email">
                    </div>
                    <div class="form-group input-group mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="pass" placeholder="Enter password" type="password">
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {
                        ?>
                        <h6 align="center" class="wrong_pass"><?php print_r($_SESSION['error'])?></h6>
                        <?php
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="form-group">
                        <button type="submit" name="sub" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <p class="text-center">Don't have an account? <a href="/register">Sign Up</a></p>
                </form>
            </article>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<?php
require "components/footer.php"
?>