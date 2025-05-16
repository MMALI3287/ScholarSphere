<?php
require './loginAction.php';

$_SESSION['id'] = '';
$_SESSION['username'] = '';
$_SESSION['type'] = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include '../partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="../css/loginstyle.css" />
    <title>Login</title>
</head>

<body>
    <?php include '../partials/_header.php';?>
    <video autoplay loop muted plays-inline preload="auto" class="back-video">
        <source src="assets/videos/rain.mp4" type="video/mp4">
    </video>
    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="row">

                <div class="col-md-12 mb-4 text-white">
                    <h2 class="text-center h1 w-100 pt-5">Sign In Now</h2>
                </div>
                <div class="col-md-12 login-form">
                    <form class="row" action="./loginAction.php" method="POST" novalidate>
                        <?php
                        if (isset($_SESSION['login_error_message']) and !empty($_SESSION['login_error_message'])) {
                            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                              Login Failed. Check your Username and Password.
                            </div>
                          </div>';
                        }
                        ?>
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <span style="color: red">*
                                <?php
                                if (isset($_SESSION['username_error_message']) and !empty($_SESSION['username_error_message'])) {
                                    echo $_SESSION['username_error_message'];
                                }
                                ?>
                            </span>
                            <input type="text" class="form-control" id="inputUserName" name='username'>
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
                            <input type="password" class="form-control" id="inputPassword4" name='password'>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form-check">
                                <input class="form-check-input h5" type="checkbox" id="rememberMe" name="rememberMe">
                                <label class="form-check-label text-white h4" for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                        <div class="col-12">
                            <p class="text-center pt-3 text-white h3">Don't have an account? <a href="signup.php"
                                    class="anchor">Sign
                                    up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../partials/_bootstrapjs.php';
    ?>
    <script src="../js/index.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php
            if (isset($_COOKIE['remember_me'])) {
                $token = $_COOKIE['remember_me'];
                $user_id = getUserIdFromToken($token);
                if ($user_id) {
                    $conn = connect();
                    $sql = "SELECT username, password FROM users WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 'i', $user_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $username, $password);
                    mysqli_stmt_fetch($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    ?>
                    const usernameInput = document.getElementById("inputUserName");
                    const passwordInput = document.getElementById("inputPassword4");

                    usernameInput.value = "<?php echo $username; ?>";
                    passwordInput.value = "<?php echo $password; ?>";
                    <?php
                }
            }
            ?>
        });
    </script>
</body>

</html>

<?php
$_SESSION['username_error_message'] = "";
$_SESSION['password_error_message'] = "";
$_SESSION['login_error_message'] = "";
?>