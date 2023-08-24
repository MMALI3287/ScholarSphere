<?php
function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scholarsphere";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    return $conn;
}