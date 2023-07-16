<?php
session_start();
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
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
        } else {
            $_SESSION['login_error_message'] = "Invalid username or password";
        }
    }
    header("Location: login.php");
}
