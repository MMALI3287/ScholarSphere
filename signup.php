<?php
require 'signupAction.php'
?>

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
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>

    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="row">
                <div class="col-md-7">
                    <img class="loginimage" src="https://www.owatroldirect.co.uk/wp-content/uploads/2019/08/decorators-tools.jpg" alt="" height="100%">
                </div>
                <div class="col-md-5 login-form">
                    <form class="row" action="signupAction.php" method="POST" novalidate>
                        <?php
                        if (isset($_SESSION['registration_successful']) and !empty($_SESSION['registration_successful'])) {
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                Registration Successful.
                            </div>
                        </div>';
                        }
                        ?>
                        <div class="col-md-12 mb-4">
                            <label for="inputUserName4" class="form-label">Username</label>
                            <span style="color: red">*
                                <?php
                                if (isset($_SESSION['username_error_message']) and !empty($_SESSION['username_error_message'])) {
                                    echo $_SESSION['username_error_message'];
                                }
                                ?>
                            </span>
                            <input type="text" class="form-control" id="inputUserName4" name="username">

                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <span style="color: red">*
                                <?php
                                if (isset($_SESSION['email_error_message']) and !empty($_SESSION['email_error_message'])) {
                                    echo $_SESSION['email_error_message'];
                                }
                                ?>
                            </span>
                            <input type="text" class="form-control" id="inputEmail4" name="email">

                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <span style="color: red">*
                                <?php
                                if (isset($_SESSION['password_error_message']) and !empty($_SESSION['password_error_message'])) {
                                    echo $_SESSION['password_error_message'];
                                }
                                ?>
                            </span>
                            <input type="password" class="form-control" id="inputPassword4" name="password">

                        </div>
                        <div class="col-md-12">
                            <label for="inputAccountType" class="form-label">Account Type</label>
                            <span style="color:red">*
                                <?php
                                if (isset($_SESSION['type_error_message']) and !empty($_SESSION['type_error_message'])) {
                                    echo $_SESSION['type_error_message'];
                                }
                                ?>
                            </span>
                            <select class="form-select mb-4" aria-label="Default select example" name="type">
                                <option selected value="">Select account type</option>
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

<?php
$_SESSION['type_error_message'] = "";
$_SESSION['username_error_message'] = "";
$_SESSION['email_error_message'] = "";
$_SESSION['password_error_message'] = "";
$_SESSION['registration_successful'] = "";
?>