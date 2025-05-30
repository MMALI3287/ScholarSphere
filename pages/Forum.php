<?php require '../connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <?php include '../partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="../css/forum.css">
</head>

<body>
    <?php
    include '../partials/_header.php';
    ?>
    <div id="carouselExampleIndicators" class="carousel slide mt-5 pt-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/images/slide1.jpg" class="d-block w-100" alt="First slide" height="900" />
            </div>
            <div class="carousel-item">
                <img src="../assets/images/slide2.jpg" class="d-block w-100" alt="Second slide" height="900" />
            </div>
            <div class="carousel-item">
                <img src="../assets/images/slide3.jpg" class="d-block w-100" alt="Third slide" height="900" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-5">
        <h2 id="heading">Explore Categories</h2>
        <div class="row ">
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
                        'id' => $row['category_id'],
                        // Add category ID
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
                                'id' => $subrow['subcategory_id'],
                                // Add subcategory ID
                                'name' => $subrow['subcategory_name'],
                            );
                        }

                        $categories[] = $category;
                    }
                }

                foreach ($categories as $category) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<img class="d-block w-100" src="https://source.unsplash.com/500x300/?' . $category['name'] . ',University"
                    alt="Third slide" />';
                    echo '<h5 class="card-title">' . $category['name'] . '</h5>';
                    echo '<ul class="list-unstyled">';
                    foreach ($category['subcategories'] as $subcategory) {
                        echo '<li><a href="../pages/postList.php?category_id=' . $category['id'] . '&subcategory_id=' . $subcategory['id'] . '&category_name=' . $category['name'] . '" class="text-decoration-none">' . $subcategory['name'] . '</a></li>';
                    }
                    echo '</ul></div></div></div>';
                }
            }
            if (!isset($_SESSION['id'])) {

                session_start();
            }
            $id = $_SESSION['id'];
            $query = "SELECT type FROM users WHERE id= $id";
            $conn = connect();
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $type = $row['type'];
            $_SESSION['type'] = $type;
            $query = "SELECT verified FROM $type WHERE user_id=$id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $verified = $row['verified'];
            if ($type != "admission_candidates" && $verified) {
                echo '<a href="publishPost.php"><button type="button" class="btn btn-primary mb-5">Create Post</button></a>';
            }
            ?>
        </div>
    </div>


    <?php
    include '../partials/_footer.php';

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

</body>

</html>