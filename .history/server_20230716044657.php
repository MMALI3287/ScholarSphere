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
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $type = test_input($_POST['type']);

    $conn = connect();
    if ($conn) {
        $sql = "INSERT INTO data (id, firstname, lastname, email, gender, mobile, address, country, password, username, image, bio, dob, nationality, blood, nid) VALUES (NULL, '" . $First_Name . "', '" . $Last_Name . "', '" . $Email . "', '" . $Gender . "', '" . $Mobile_no . "', '" . $SHR . "', '" . $Country . "', '" . $Password . "', '" . $Username . "', '" . $Image . "', NULL, NULL, NULL, NULL, NULL)";
        $res = mysqli_query($conn, $sql);
    }
}
