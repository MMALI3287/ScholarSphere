<?php

require '../model/Connect.php';
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
    $First_Name = test_input($_POST['firstname']);
}
