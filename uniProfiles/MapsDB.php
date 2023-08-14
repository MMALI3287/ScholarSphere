<?php
require '../connect.php';

function getData(String $name)
{
    $sql = "SELECT * FROM unilocation Where UniversityTitle='" . $name . "'";
    $conn = connect();
    return mysqli_query($conn, $sql);
}
