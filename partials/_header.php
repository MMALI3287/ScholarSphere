<?php

echo '<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center ms-2">
            <a href="#">
                <img src="assets/images/logo.webp" alt="Logo" width="50" height="50" class="d-inline-block me-4">
            </a>
            <a class="navbar-brand fs-2 align-text-center" href="index.php">
                ScholarSphere
            </a>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link fs-4 me-2" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 me-4" href="send_mail.php">Get Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 me-4" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 me-2" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav
        " aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>';
