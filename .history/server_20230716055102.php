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
    } else {
        $conn = connect();
        if ($conn) {
            $sql = "SELECT id FROM users WHERE username = '" . $username . "'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                $_SESSION['username_error_message'] =  "Username already exists";
                $errors++;
            } else {
                $_SESSION['username_error_message'] =  "";
                $_SESSION['username'] = $username;
            }
        }
    }
    if (empty($email)) {
        $errors++;
        $_SESSION['email_error_message'] = "Email is empty";
    } else {
        $conn = connect();
        if ($conn) {
            $sql = "SELECT id FROM users WHERE email = '" . $email . "'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                $_SESSION['email_error_message'] =  "Email already exists";
                $errors++;
            } else {
                $_SESSION['email_error_message'] =  "";
                $_SESSION['email'] = $email;
            }
        }
    }
    if (empty($password)) {
        $errors++;
        $_SESSION['password_error_message'] = "Password is empty";
    } else {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase ||  !$number ||  !$specialChars ||  strlen($password) < 8) {
            $_SESSION['password_error_message'] = "Password length > 8 characters, include upper case, lower case, number, special character.";
            $errors++;
        } else {
            $_SESSION['password_error_message'] = "";
        }
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
        $_SESSION['registration_succesful'] = "registration successful";
    }
    header("Location: signup.php");
}
