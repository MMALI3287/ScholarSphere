<?php require 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/forum.css">
</head>

<body>
    <?php
    include 'partials/_header.php';
    ?>

    <div class="container mt-5">
        <!-- Display post details -->
        <?php
        $postId = $_GET['post_id']; // Adjust this based on how you pass the post ID
        $conn = connect(); // Assuming you have a connect function

        $postQuery = "SELECT p.*, u.username, TIMESTAMPDIFF(SECOND, p.created_at, NOW()) AS time_elapsed
                  FROM forum_posts AS p
                  JOIN users AS u ON p.id = u.id
                  WHERE p.post_id = $postId";
        $postResult = mysqli_query($conn, $postQuery);

        if ($postResult && mysqli_num_rows($postResult) > 0) {
            $post = mysqli_fetch_assoc($postResult);

            // Calculate time elapsed
            $timeElapsed = calculateTimeElapsed($post['time_elapsed']); // You need to implement the calculateTimeElapsed function

            echo '<h2>' . $post['title'] . '</h2>';
            echo '<p>Posted by: ' . $post['username'] . '  ' . $timeElapsed . '</p>';
            echo '<p>Posted on: ' . $post['created_at'] . '</p>';

            echo '<br><h5>' . $post['content'] . '</h5><br><hr>';
        }
        ?>

        <?php
        // Function to calculate time elapsed in a human-readable format
        function calculateTimeElapsed($seconds)
        {
            if ($seconds < 60) {
                return $seconds . ' seconds';
            } elseif ($seconds < 3600) {
                return floor($seconds / 60) . ' minutes';
            } elseif ($seconds < 86400) {
                return floor($seconds / 3600) . ' hours';
            } else {
                return floor($seconds / 86400) . ' days';
            }
        }
        ?>



        <!-- Display comments -->
        <h3>Comments</h3>
        <?php
        $commentsQuery = "SELECT * FROM comments WHERE post_id = $postId ORDER BY comment_date DESC";
        $commentsResult = mysqli_query($conn, $commentsQuery);

        if ($commentsResult && mysqli_num_rows($commentsResult) > 0) {
            while ($comment = mysqli_fetch_assoc($commentsResult)) {
                echo '<div class="card mb-2">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . getUsernameById($comment['id']) . '</h5>';
                echo '<p>' . $comment['comment_text'] . '</p>';
                echo '<small class="text-muted">' . $comment['comment_date'] . '</small>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments yet.</p>';
        }
        function getUsernameById($userId)
        {
            $conn = connect();
            $query = "SELECT username FROM users WHERE id = $userId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['username'];
            } else {
                return "Unknown User";
            }
        }

        ?>

        <!-- Comment form -->
        <h3>Add a Comment</h3>
        <form action="addComment.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
            <input type="hidden" name="user_id" value="<?php
                                                        session_start();
                                                        $userId = $_SESSION['id'];
                                                        echo $userId; ?>">
            <textarea name="comment_text" class="form-control" placeholder="Add your comment" rows="4" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
        </form>
    </div>

    <?php
    include 'partials/_footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>