<?php
require 'connect.php';

session_start();

$id = $_SESSION['id'];
$conn = connect();

$query = "SELECT * FROM admins WHERE verified = 0";
$result1 = mysqli_query($conn, $query);
$query = "SELECT * FROM admission_candidates WHERE verified = 0";
$result2 = mysqli_query($conn, $query);
$query = "SELECT * FROM alumni_current_students WHERE verified = 0";
$result3 = mysqli_query($conn, $query);

// Process verification requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
    $userId = $_POST['user_id'];
    $query = "SELECT type FROM users WHERE id= $userId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $type = $row['type'];
    $updateQuery = "UPDATE $type SET verified = 1 WHERE user_id = $userId";
    $_SESSION['$update_query'] = $updateQuery;
    mysqli_query($conn, $updateQuery);
    // Redirect back to the verification page
    header("Location: profileVerification.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Admin Verification</h1>
        <?php while ($row = mysqli_fetch_assoc($result3)) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                    <p class="card-text">Phone Number: <?php echo $row['phone_number']; ?></p>
                    <p class="card-text">Address: <?php echo $row['address']; ?></p>
                    <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" style="max-width: 200px;">
                    <p class="card-text">Date of Birth: <?php echo $row['date_of_birth']; ?></p>
                    <p class="card-text">Gender: <?php echo $row['gender']; ?></p>
                    <p class="card-text">Nationality: <?php echo $row['nationality']; ?></p>
                    <p class="card-text">Graduation Year: <?php echo $row['graduation_year']; ?></p>
                    <p class="card-text">Degree: <?php echo $row['degree']; ?></p>
                    <p class="card-text">Employment Status: <?php echo $row['employment_status']; ?></p>
                    <p class="card-text">Employer: <?php echo $row['employer']; ?></p>
                    <p class="card-text">Research Projects: <?php echo $row['research_projects']; ?></p>
                    <p class="card-text">Academic Interests: <?php echo $row['academic_interests']; ?></p>
                    <img src="<?php echo $row['id_card']; ?>" alt="ID Card" style="max-width: 200px;">
                    <p class="card-text">Date of Birth: <?php echo $row['date_of_birth']; ?></p>
                    <p class="card-text">Gender: <?php echo $row['gender']; ?></p>
                    <p class="card-text">Nationality: <?php echo $row['nationality']; ?></p>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <button type="submit" name="verify" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
        <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                    <p class="card-text">Phone Number: <?php echo $row['phone_number']; ?></p>
                    <p class="card-text">Address: <?php echo $row['address']; ?></p>
                    <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" style="max-width: 200px;">
                    <p class="card-text">Date of Birth: <?php echo $row['date_of_birth']; ?></p>
                    <p class="card-text">Gender: <?php echo $row['gender']; ?></p>
                    <p class="card-text">Nationality: <?php echo $row['nationality']; ?></p>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <button type="submit" name="verify" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
        <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                    <p class="card-text">Phone Number: <?php echo $row['phone_number']; ?></p>
                    <p class="card-text">Address: <?php echo $row['address']; ?></p>
                    <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" style="max-width: 200px;">
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <button type="submit" name="verify" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>