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
}
