<?php
require 'connect.php'; 


$conn = connect();

$categoryQuery = "SELECT * FROM categories";
$categoryResult = mysqli_query($conn, $categoryQuery);

$selectedCategoryId = 1; 

if (isset($_GET['selected_category'])) {
    $selectedCategoryId = $_GET['selected_category'];
}

$subcategoryQuery = "SELECT * FROM subcategories WHERE category_id = $selectedCategoryId";
$subcategoryResult = mysqli_query($conn, $subcategoryQuery);

if (!isset($_SESSION['id'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <?php include 'partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="css/forum.css">
</head>

<body>
    <?php include 'partials/_header.php';
    ?>

    <div class="container post">
        <h2 class="text-center pb-5">Create New Post</h2>
        <form action="createPost.php" method="post">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" onchange="redirectWithCategory()">
                    <?php while ($row = mysqli_fetch_assoc($categoryResult)): ?>
                        <option value="<?php echo $row['category_id']; ?>" <?php if ($selectedCategoryId == $row['category_id'])
                               echo 'selected'; ?>><?php echo $row['category_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory">Subcategory</label>
                <select class="form-control" id="subcategory" name="subcategory" required>
                    <?php while ($row = mysqli_fetch_assoc($subcategoryResult)): ?>
                        <option value="<?php echo $row['subcategory_id']; ?>"><?php echo $row['subcategory_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <?php
    include 'partials/_footer.php';
    include 'partials/_bootstrapjs.php';
    ?>
    <script>
        function redirectWithCategory() {
            var selectedCategory = document.getElementById("category").value;
            window.location.href = "publishPost.php?selected_category=" + selectedCategory;
        }
    </script>

</body>

</html>