<?php
require 'connect.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['post_id']; // Adjust this based on how you pass the post ID
    $userId = $_POST['user_id']; // Adjust this based on how you store user ID
    $comment = $_POST['comment_text'];

    $conn = connect(); // Assuming you have a connect function

    $insertQuery = "INSERT INTO comments (post_id, id, comment_text, comment_date) 
                    VALUES ('$postId', '$userId', '$comment', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
        // Comment added successfully
        header("Location: postDetail.php?post_id=$postId");
        exit();
    } else {
        // Error inserting comment
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
