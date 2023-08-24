<?php
if (!isset($_SESSION['id'])) {
    session_start();
}
require 'connect.php';
$username = $password = "";

$conn = "";
$errors = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        $errors++;
        $_SESSION['username_error_message'] = "Username is empty";
    }

    if (empty($password)) {
        $errors++;
        $_SESSION['password_error_message'] = "Password is empty";
    }

    if ($errors == 0) {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $conn = connect();
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];
            if (isset($_POST['rememberMe'])) {
                $token = generateRememberMeToken();
                storeTokenInDatabase($row['id'], $token);
                setcookie('remember_me', $token, time() + (86400 * 30), '/'); // Set cookie for 30 days
            }
            header("Location: profile.php");
        } else {
            $_SESSION['login_error_message'] = "Invalid username or password";
            header("Location: login.php");
        }
    }
    if ($errors > 0) {
        header("Location: login.php");
    }
}

function generateRememberMeToken()
{
    return bin2hex(random_bytes(32));
}

function storeTokenInDatabase($id, $token)
{
    $conn = connect();
    $sql = "INSERT INTO remember_me_tokens (id, token) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $id, $token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function loginUser($user_id)
{
    $_SESSION['id'] = $user_id;
    $conn = connect();
    $Query = "SELECT username FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $Query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['type'] = $row['type'];
    header("Location: profile.php");
}

function getUserIdFromToken($token)
{
    // Implement your database query to retrieve the user ID
    // Example using MySQLi:
    $conn = connect(); // Implement your database connection function
    $sql = "SELECT id FROM remember_me_tokens WHERE token = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $id;
}