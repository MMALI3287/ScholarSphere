<?php
if (!isset($_SESSION['id'])) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

require 'connect.php'; // Include your database connection code here

// Get user's account type
$id = $_SESSION['id'];
$query = "SELECT type FROM users WHERE id= $id";
$conn = connect();
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$type = $row['type'];

// Get user's profile data based on account type
$query = "SELECT * FROM $type WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


switch ($type) {
    case 'admins':
        $profile_data = array(
            'first_name' => isset($row['first_name']) ? $row['first_name'] : '',
            'last_name' => isset($row['last_name']) ? $row['last_name'] : '',
            'phone_number' => isset($row['phone_number']) ? $row['phone_number'] : '',
            'address' => isset($row['address']) ? $row['address'] : '',
            'profile_picture' => isset($row['profile_picture']) ? $row['profile_picture'] : ''
        );
        break;
    case 'admission_candidates':
        $profile_data = array(
            'first_name' => isset($row['first_name']) ? $row['first_name'] : '',
            'last_name' => isset($row['last_name']) ? $row['last_name'] : '',
            'phone_number' => isset($row['phone_number']) ? $row['phone_number'] : '',
            'address' => isset($row['address']) ? $row['address'] : '',
            'profile_picture' => isset($row['profile_picture']) ? $row['profile_picture'] : '',
            'date_of_birth' => isset($row['date_of_birth']) ? $row['date_of_birth'] : '',
            'gender' => isset($row['gender']) ? $row['gender'] : '',
            'nationality' => isset($row['nationality']) ? $row['nationality'] : ''
        );
        break;
    case 'alumni_current_students':
        $profile_data = array(
            'first_name' => isset($row['first_name']) ? $row['first_name'] : '',
            'last_name' => isset($row['last_name']) ? $row['last_name'] : '',
            'phone_number' => isset($row['phone_number']) ? $row['phone_number'] : '',
            'address' => isset($row['address']) ? $row['address'] : '',
            'profile_picture' => isset($row['profile_picture']) ? $row['profile_picture'] : '',
            'date_of_birth' => isset($row['date_of_birth']) ? $row['date_of_birth'] : '',
            'gender' => isset($row['gender']) ? $row['gender'] : '',
            'nationality' => isset($row['nationality']) ? $row['nationality'] : '',
            'graduation_year' => isset($row['graduation_year']) ? $row['graduation_year'] : '',
            'degree' => isset($row['degree']) ? $row['degree'] : '',
            'employment_status' => isset($row['employment_status']) ? $row['employment_status'] : '',
            'employer' => isset($row['employer']) ? $row['employer'] : '',
            'academic_interests' => isset($row['academic_interests']) ? $row['academic_interests'] : '',
            'research_projects' => isset($row['research_projects']) ? $row['research_projects'] : '',
            'id_card' => isset($row['id_card']) ? $row['id_card'] : ''
        );
        break;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $select_query = "SELECT * FROM $type WHERE user_id = $id";
    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result) === 0) {
        $insert_query = "INSERT INTO $type (user_id ) VALUES ($id)";
        mysqli_query($conn, $insert_query);
    }

    // Update the fields based on account type
    $update_query = "UPDATE $type SET ";
    switch ($type) {
        case 'admins':
            $update_query .= "first_name = '{$_POST['first_name']}', last_name = '{$_POST['last_name']}', ";
            $update_query .= "phone_number = '{$_POST['phone_number']}', address = '{$_POST['address']}', ";
            $update_query .= "date_of_birth = '{$_POST['date_of_birth']}' ";
            break;
        case 'admission_candidates':
            $update_query .= "first_name = '{$_POST['first_name']}', last_name = '{$_POST['last_name']}', ";
            $update_query .= "phone_number = '{$_POST['phone_number']}', address = '{$_POST['address']}', ";
            $update_query .= "date_of_birth = '{$_POST['date_of_birth']}', gender = '{$_POST['gender']}', ";
            $update_query .= "nationality = '{$_POST['nationality']}'";
            break;
        case 'alumni_current_students':
            $update_query .= "first_name = '{$_POST['first_name']}', last_name = '{$_POST['last_name']}', ";
            $update_query .= "phone_number = '{$_POST['phone_number']}', address = '{$_POST['address']}', ";
            $update_query .= " date_of_birth = '{$_POST['date_of_birth']}', ";
            $update_query .= "gender = '{$_POST['gender']}', nationality = '{$_POST['nationality']}', ";
            $update_query .= "graduation_year = '{$_POST['graduation_year']}', degree = '{$_POST['degree']}', ";
            $update_query .= "employment_status = '{$_POST['employment_status']}', employer = '{$_POST['employer']}', ";
            $update_query .= "academic_interests = '{$_POST['academic_interests']}', research_projects = '{$_POST['research_projects']}'";
            break;
    }

    if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $profile_picture_path = 'assets/images/profilepictures/' . $_FILES['profile_picture']['name'];
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture_path);
        $update_query .= ", profile_picture = '$profile_picture_path'";
    }

    // Handle ID card upload for alumni/current students
    if ($type === 'alumni_current_students' && $_FILES['id_card']['error'] === UPLOAD_ERR_OK) {
        $id_card_path = 'assets/images/idcards/' . $_FILES['id_card']['name'];
        move_uploaded_file($_FILES['id_card']['tmp_name'], $id_card_path);
        $update_query .= ", id_card = '$id_card_path'";
    }
    $update_query .= " WHERE user_id = $id";




    // Debugging: Print the uploaded files information
    var_dump($_FILES);

    // Debugging: Print the update query
    echo $update_query;




    // Execute the update query
    mysqli_query($conn, $update_query);

    // Check for MySQL errors
    if (mysqli_error($conn)) {
        echo "MySQL Error: " . mysqli_error($conn);
    }


    // Redirect to the same page to show updated information
    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php include 'partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="css/profilestyle.css">
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <div class="container mt-5">
        <button type="button" class="btn btn-link edit-all-button mb-2">Edit All</button>
        <h1 class="text-center mt-5 pt-5">My Profile</h1>
        <form method="post" enctype="multipart/form-data">
            <?php foreach ($profile_data as $field_name => $field_value): ?>
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="fieldName">
                            <?php echo ucwords(str_replace('_', ' ', $field_name)); ?>:
                        </label>
                    </div>
                    <?php if ($field_name === 'profile_picture'): ?>
                        <img src="<?php echo $field_value; ?>" alt="Profile Picture" class="mb-2" style="max-width: 200px;"
                            id="profile-picture-preview-<?php echo $id; ?>">
                        <input type="file" class="form-control-file d-none" name="<?php echo $field_name; ?>"
                            data-id="<?php echo $id; ?>">
                    <?php elseif ($field_name === 'id_card'): ?>
                        <img src="<?php echo $field_value; ?>" alt="ID Card" class="mb-2" style="max-width: 200px;"
                            id="id-card-preview-<?php echo $id; ?>">
                        <input type="file" class="form-control-file d-none" name="<?php echo $field_name; ?>"
                            data-id="<?php echo $id; ?>">
                    <?php elseif ($field_name === 'date_of_birth'): ?>
                        <input type="date" class="form-control d-none" name="<?php echo $field_name; ?>"
                            value="<?php echo $field_value; ?>">
                    <?php elseif ($field_name === 'gender'): ?>
                        <select class="form-control d-none" name="<?php echo $field_name; ?>">
                            <option value="male" <?php if ($field_value === 'male')
                                echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if ($field_value === 'female')
                                echo 'selected'; ?>>Female</option>
                            <option value="other" <?php if ($field_value === 'other')
                                echo 'selected'; ?>>Other</option>
                        </select>
                    <?php elseif ($field_name === 'employment_status'): ?>
                        <select class="form-control d-none" name="<?php echo $field_name; ?>">
                            <option value="employed" <?php if ($field_value === 'employed')
                                echo 'selected'; ?>>Employed</option>
                            <option value="unemployed" <?php if ($field_value === 'unemployed')
                                echo 'selected'; ?>>Unemployed
                            </option>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control d-none" name="<?php echo $field_name; ?>"
                            value="<?php echo $field_value; ?>">
                    <?php endif; ?>
                    <span id="spanfield" class="h3">
                        <?php
                        if ($field_name != 'profile_picture' && $field_name != 'id_card') {
                            echo $field_value;
                        }
                        ?>
                    </span>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary d-none" id="save-button">Save</button>
        </form>
    </div>
    <div class="mt-4 container mb-5">
        <a href="login.php"><button type="button" class="buton">Sign Out</button></a>
    </div>
    <?php
    include 'partials/_footer.php';
    include 'partials/_bootstrapjs.php';
    ?>
    <script>
        const saveButton = document.getElementById('save-button');
        const editAllButton = document.querySelector('.edit-all-button');

        editAllButton.addEventListener('click', () => {
            const inputFields = document.querySelectorAll('.form-control');
            const spanFields = document.querySelectorAll('.form-group span'); // Select all <span> elements

            inputFields.forEach(field => {
                field.classList.remove('d-none');
            });

            spanFields.forEach(span => {
                span.classList.add('d-none'); // Hide the <span> elements
            });

            saveButton.classList.remove('d-none');
        });
    </script>


</body>

</html>