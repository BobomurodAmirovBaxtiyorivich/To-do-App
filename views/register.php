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
        <div class="card bg-light mt-4 register">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <form action="/register" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" class="form-control" placeholder="Full name" type="text" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="pass1" placeholder="Create password" type="password" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="pass2" placeholder="Repeat password" type="password" required>
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                        <h6 align="center" class="wrong_pass"><?= $_SESSION['error'][0]?></h6>
                    <?php
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="form-group">
                        <button type="submit" name="sub" class="btn btn-primary btn-block"> Create Account</button>
                    </div>
                    <p class="text-center">Have an account? <a href="/log_in">Log In</a></p>
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