<?php
session_start();
require 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = connect();
    $userId = $_SESSION['id']; // Get the user ID from the session
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category'];
    $subcategoryId = $_POST['subcategory'];

    // Escape the data to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);
    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);
    $categoryId = mysqli_real_escape_string($conn, $categoryId);
    $subcategoryId = mysqli_real_escape_string($conn, $subcategoryId);

    $conn = connect(); // Assuming you have a function named 'connect' in your connect.php

    $insertQuery = "INSERT INTO forum_posts (id, title, content, category_id, subcategory_id, created_at) VALUES ('$userId', '$title', '$content', '$categoryId', '$subcategoryId', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
        // Post added successfully
        header("Location: forum.php"); // Redirect to the forum page
        exit();
    } else {
        // Error inserting post
        echo "Error: " . mysqli_error($conn);
    }
}
