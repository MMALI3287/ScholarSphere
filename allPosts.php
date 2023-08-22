<?php require 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <?php include 'partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="css/forum.css">
</head>

<body>
    <?php
    include 'partials/_header.php'; // Include your header
    $query = "SELECT * FROM forum_posts ORDER BY post_id DESC";

    $conn = connect();
    $result = mysqli_query($conn, $query);
    ?>
    <div>
        <button class="btn btn-link">
            <a href="Forum.php" class="text-white" style="text-decoration:none;">Select Category</a>
        </button>
    </div>

    <div class="container mt-5 pt-5">
        <h1 class="text-center">All Forum Posts</h1>
        <div class="row">
            <?php
            // Display posts
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-6">
                <div class="card mb-4">
                <div class="card-body">
                <h2 class="card-title"><a href="postDetail.php?post_id=' . $row['post_id'] . '" class="text-decoration-none">' . $row['title'] . '</a></h2>
                <h4 class="card-text">' . $row['content'] . '</h4>
                </div></div></div>';
            }
            ?>
        </div>
    </div>
    <?php
    include 'partials/_footer.php';
    include 'partials/_bootstrapjs.php';
    ?>

</body>

</html>