
<?php
require 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $varsity_name = $_POST['varsity_name'];
    $application_deadline = $_POST['application_deadline'];
    $admission_date = $_POST['admission_date'];
    $result_publication_date = $_POST['result_publication_date'];
    $offered_programs = $_POST['offered_programs'];
    $requirements = $_POST['requirements'];
    $quota = $_POST['quota'];
    $exam_type = $_POST['exam_type'];
    $additional_information = $_POST['additional_information'];
    $notice_url = $_POST['notice_url'];

    // Handle image upload
    $image_path = 'assets/images/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    // Insert data into the database
    $sql = "INSERT INTO admission_card (varsity_name, application_deadline, admission_date, result_publication_date, offered_programs, requirements, quota, exam_type, additional_information, image_url,notice_url) VALUES ('$varsity_name', '$application_deadline', '$admission_date', '$result_publication_date', '$offered_programs', '$requirements', '$quota', '$exam_type', '$additional_information', '$image_path','$notice_url')";

    $conn = connect(); // Connect to the database
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully.";
        header('Location: admissionPortal.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>