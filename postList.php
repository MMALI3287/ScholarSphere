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
    
    // Get the selected category or subcategory ID from the URL or form submission
    $selectedCategory = $_GET['category_id']; // Adjust this based on how you pass the ID
    
    // Fetch the selected category or subcategory name for display
    $selectedSubcategory = $_GET['subcategory_id']; // Adjust this based on how you pass the name
    
    $selectedCategoryName = $_GET['category_name']; // Adjust this based on how you pass the ID
    
    // Query to retrieve posts based on the selected category or subcategory ID
    $query = "SELECT * FROM forum_posts WHERE category_id = '$selectedCategory' AND subcategory_id = '$selectedSubcategory' ORDER BY post_id DESC";

    // Execute the query and fetch the posts
    $conn = connect(); // Assuming you have a connect function
    $result = mysqli_query($conn, $query);
    ?>

    <div class="container mt-5 pt-5">
        <h2 class="text-center">Posts under
            <?php echo $selectedCategoryName; ?>
        </h2>
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