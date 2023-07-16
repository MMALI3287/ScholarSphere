<?php
function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scholarshpere";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    return $conn;
}

$conn = connect();

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
