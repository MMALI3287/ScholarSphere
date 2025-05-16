<?php

declare(strict_types=1);

if (!isset($_SESSION['id'])) {
    session_start();
}
require '../connect.php';

$conn = connect();

$_SESSION['auth_code'] = '';
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if ($_SESSION['type'] === 'Admin') {
    $type = 'admins';
} else if ($_SESSION['type'] === "Admission Candidate") {
    $type = 'admission_candidates';
} else if ($_SESSION['type'] === "Alumni / Current Student") {
    $type = 'alumni_current_students';
}

$sql = "INSERT INTO users (id, username, email, password, type) VALUES (NULL, '$username', '$email', '$password', '$type')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['registration_successful'] = "Registration successful";
    $_SESSION['type_error_message'] = "";
    $_SESSION['username_error_message'] = "";
    $_SESSION['email_error_message'] = "";
    $_SESSION['password_error_message'] = "";
    $_SESSION['registration_successful'] = "";
    $_SESSION['username'] = '';
    $_SESSION['email'] = '';    header("Location: ../pages/login.php");
} else {
    // Handle database insertion error
    $_SESSION['registration_error_message'] = "An error occurred during registration. Please try again.";
    header("Location: ../pages/signup.php");
}