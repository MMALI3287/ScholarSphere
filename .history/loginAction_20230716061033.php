<?php
session_start();
require 'connect.php';
$username = $password = "";

$conn = "";
$errors = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
}
