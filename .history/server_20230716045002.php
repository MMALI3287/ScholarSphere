<?php

require 'connect.php';
$username = $email = $password = $type = "";


$conn = "";

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

    $conn = connect();
    if ($conn) {
        $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES (NULL, $username, $email, $password, $type);";
        $res = mysqli_query($conn, $sql);
    }
}
