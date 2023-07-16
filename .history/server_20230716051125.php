<?php
session_start();
require 'connect.php';
$username = $email = $password = $type = "";


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
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $type = test_input($_POST['type']);

    if (empty($username)) {
        $errors++;
        $_SESSION['username_error_message'] = "Username is empty";
    }
    if (empty($email)) {
        $errors++;
        $_SESSION['email_error_message'] = "Email is empty";
    }
    if (empty($password)) {
        $errors++;
        $_SESSION['password_error_message'] = "Password is empty";
    }
    if (empty($type)) {
        $errors++;
        $_SESSION['type_error_message'] = "Type is not selected";
    }

    if ($errors == 0) {
        $conn = connect();
        if ($conn) {
            $sql = "INSERT INTO users (id, username, email, password, type) VALUES (NULL, '" . $username . "', '" . $email . "', '" . $password . "', '" . $type . "')";
            $res = mysqli_query($conn, $sql);
        }
    }
}
