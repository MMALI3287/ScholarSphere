<?php
if (!isset($_SESSION['id'])) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['id'])) {    header("Location: ../pages/login.php");
    exit();
}

require '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ScholarSphere</title>    <?php include '../partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
    <?php include '../partials/_header.php'; ?>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="display-4 mt-5 pt-5">Welcome to ScholarSphere</h1>
                    <p class="h5">Your One-Stop Solution for University Admissions</p>
                </div>
                <div class="mt-5 text-center">
                    <h2>Discover Key Features</h2>
                </div>
                <div class="row mt-4">
                    <?php
                    if (!isset($_SESSION['type'])) {
                        session_start();
                    }
                    $conn = connect();
                    $id = $_SESSION['id'];
                    $type = $_SESSION['type'];
                    if ($id === '') {
                        header("Location: login.php");
                    }
                    $query = "SELECT verified FROM $type WHERE user_id=$id";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    if ($row > 0) {
                        $verified = $row['verified'];
                    } else {
                        $verified = 0;
                    }
                    if ($type === 'admins' && $verified) {
                        echo '<div class="row mt-4">';
                        echo '<div class="col-md-6">';
                        echo '<div class="feature-card">';
                        echo '<a href="inputAdmissionData.php" style="text-decoration:none;">'; // Link to the admission input page
                        echo '<div class="feature-icon">';
                        echo '<i class="fas fa-pencil-alt"></i>'; // Use a pencil icon (or any other suitable icon)
                        echo '</div>';
                        echo '<h2>Input to Admission Portal</h2>';
                        echo '</a>';
                        echo '<h3>Contribute to the Admission Portal with your valuable insights.</h3>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<img src="../assets/images/AdmissionInput.jpg" alt="Admission Portal Input">';
                        echo '</div>';
                        echo '</div>';
                        echo '
                        <div class="col-md-6 mt-4">
                        <img src="../assets/images/Trust2.jpg" alt="Image 1">
                                </div>
                           ';
                        echo '<div class="col-md-6 mt-4">';
                        echo '<div class="feature-card">';
                        echo '<a href="profileVerification.php" style="text-decoration:none;">';
                        echo '<div class="feature-icon">';
                        echo '<i class="fas fa-check-circle"></i>';
                        echo '</div>';
                        echo '<h2>Trusted Profile Validation</h2>';
                        echo '</a>';
                        echo '<h3>Validate and approve trusted profiles for authenticity.</h3>';
                        echo '</div>
                        </div>';

                    }
                    ?>
                </div>

                <div class="row mt-4">

                    <div class="col-md-6">
                        <div class="feature-card">
                            <a href="admissionPortal.php" style="text-decoration:none;">
                                <div class="feature-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h2>Live Admissions Tracker</h2>
                            </a>
                            <h3>Stay updated with universities currently accepting admissions and important dates.</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/images/img1.png" alt="Image 1">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 order-md-2">
                        <div class="feature-card">
                            <a href="uniProfiles.php" style="text-decoration:none;">
                                <div class="feature-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h2>Comprehensive Profiles</h2>
                            </a>
                            <h3>Explore detailed profiles of universities, programs, and admission processes.</h3>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <img src="../assets/images/img2.jpg" alt="Image 2">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="feature-card">
                            <a href="allPosts.php" style="text-decoration:none;">
                                <div class="feature-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h2>Academic Discussion Community</h2>
                            </a>
                            <h3>Efficiently search and filter your queries based on preferences.</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/images/img3.jpg" alt="Image 3">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php    include '../partials/_footer.php';
    include '../partials/_bootstrapjs.php';
    ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>