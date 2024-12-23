<nav class="navbar navbar-expand-lg bg-body-tertiary mt-4">
    <div class="container-fluid">
        <a class="navbar-brand todos-app" href="/">Main</a>
        <?php
        if (isset($_SESSION['user'])): ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active todos-list" aria-current="page" href="/todos-list">Todos list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active add-todos" aria-current="page" href="/add-todos">Add todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active add-todos" aria-current="page" href="/telegram">Telegram bot</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="dropdown">
                        <a href="/todos" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                 class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/todos">To-do List</a></li>
                            <li><a class="dropdown-item" href="/todos"><?= $_SESSION['user']['full_name'] ?? '' ?></a></li>
                            <li><a class="dropdown-item" href="/todos"><?= $_SESSION['user']['email'] ?? '' ?></a></li>
                            <li><a class="dropdown-item" href="/log_out">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        <?php else: ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/log_in">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="/register">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif;
        ?>
    </div>
</nav>