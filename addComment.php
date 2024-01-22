<?php
require 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['post_id']; 
    $userId = $_POST['user_id']; 
    $comment = $_POST['comment_text'];

    $conn = connect(); 

    $insertQuery = "INSERT INTO comments (post_id, id, comment_text, comment_date) 
                    VALUES ('$postId', '$userId', '$comment', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
       
        header("Location: postDetail.php?post_id=$postId");
        exit();
    } else {
        
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}