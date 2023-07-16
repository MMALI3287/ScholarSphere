<?php require "server.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/loginstyle.css" />
    <title>Login</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="row">
                <div class="col-md-7">
                    <img class="loginimage" src="https://www.owatroldirect.co.uk/wp-content/uploads/2019/08/decorators-tools.jpg" alt="" height="100%">
                </div>
                <div class="col-md-5 login-form">
                    <form class="row" action="server.php" method="POST" novalidate>
                        <div class="col-md-12 mb-4">
                            <label for="inputUserName4" class="form-label">Username</label>
                            <input type="username" class="form-control" id="inputUserName4" value="<?php echo $username; ?>" name="username">
                            <span id="eml" style="color: red">*
                                <?php
                                if (isset($_SESSION['emailErrMsg']) and !empty($_SESSION['emailErrMsg'])) {
                                    echo $_SESSION['emailErrMsg'];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" value="<?php echo $email; ?>" name="email">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="password">
                        </div>
                        <div class="col-md-12">
                            <select class="form-select mb-4" aria-label="Default select example" name="type">
                                <option selected>Select account type</option>
                                <option value="Admission Candidate">Admission Candidate</option>
                                <option value="Alumni / Current Student">Alumni / Current Student</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-12 input-group">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
</body>

</html>