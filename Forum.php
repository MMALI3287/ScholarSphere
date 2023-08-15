<?php require 'connect.php' ?>

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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/1920x500/?Forum,Education" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1920x500/?Blog,Education" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1920x500/?Discussion,Education" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Explore Categories</h2>
        <div class="row">
            <?php

            $conn = connect();
            $query = "SELECT * FROM categories";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "Error fetching categories: " . mysqli_error($conn);
            } else {
                $categories = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $category = array(
                        'id' => $row['category_id'], // Add category ID
                        'name' => $row['category_name'],
                        'subcategories' => array(),
                    );

                    // Fetch subcategories for the current category
                    $subcategoryQuery = "SELECT * FROM subcategories WHERE category_id = " . $row['category_id'];
                    $subcategoryResult = mysqli_query($conn, $subcategoryQuery);

                    if (!$subcategoryResult) {
                        echo "Error fetching subcategories: " . mysqli_error($conn);
                    } else {
                        while ($subrow = mysqli_fetch_assoc($subcategoryResult)) {
                            $category['subcategories'][] = array(
                                'id' => $subrow['subcategory_id'], // Add subcategory ID
                                'name' => $subrow['subcategory_name'],
                            );
                        }

                        $categories[] = $category;
                    }
                }

                foreach ($categories as $category) {
                    echo '<div class="col-md-6">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $category['name'] . '</h5>';
                    echo '<ul class="list-unstyled">';
                    foreach ($category['subcategories'] as $subcategory) {
                        echo '<li><a href="postList.php?category_id=' . $category['id'] . '&subcategory_id=' . $subcategory['id'] . '&category_name=' . $category['name'] . '" class="text-decoration-none">' . $subcategory['name'] . '</a></li>';
                    }
                    echo '</ul></div></div></div>';
                }
            }
            ?>
            <a href="publishPost.php"><button type="submit" class="btn btn-primary">Create Post</button></a>
        </div>
    </div>


    <?php
    include 'partials/_footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>