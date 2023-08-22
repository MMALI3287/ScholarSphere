<nav class="navbar navbar-expand">
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center ms-2">
            <a href="index.php">
                <img src="assets/images/logo.webp" alt="Logo" width="50" height="50" class="d-inline-block me-4">
            </a>
            <a class="navbar-brand fs-2 align-text-center" href="welcome.php">
                ScholarSphere
            </a>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (session_status() != PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                    if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Your Profile</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Get Started</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>