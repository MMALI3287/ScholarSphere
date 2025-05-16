<?php
require '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Admission Portal</title>
    <?php include '../partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="../css/admissionPortal.css">
</head>

<body>
    <?php
    include '../partials/_header.php';
    ?>
    <div class="container mt-5 pt-5">
        <h1 class="text-center">University Admission Portal</h1>
        <div class="row mt-4">
            <?php
            $date = date("Y-m-d");
            $sql = "SELECT * FROM admission_card WHERE application_deadline > '" . $date . "'";
            $conn = connect();
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-center">' . $row['varsity_name'] . '</h4>
            </div>
            <div class="card-body">
                <div class="university-info">
                    <div class="container">
                    <div class="row">
                    <div class="col-md-9">
                    <p><strong>Application Deadline:</strong> ' . $row['application_deadline'] . '</p>
                    <p><strong>Admission Date:</strong> ' . $row['admission_date'] . '</p>
                    <p><strong>Result Publication Date:</strong> ' . $row['result_publication_date'] . '</p>
                    <p><strong>Offered Programs:</strong> ' . $row['offered_programs'] . '</p>
                    <p><strong>Requirements:</strong> ' . $row['requirements'] . '</p>
                    <p><strong>Quota:</strong> ' . $row['quota'] . '</p>
                    <p><strong>Exam Type:</strong> ' . $row['exam_type'] . '</p>
                    <p><strong>Additional Information:</strong> ' . $row['additional_information'] . '</p>
                    <p><strong>Learn More:</strong> <a href="' . $row['notice_url'] . '" target="_blank">Click Here</a></p>
                    </div>
                    <div class="col-md-3">
                    <img src="' . $row['image_url'] . '" alt="' . $row['varsity_name'] . '" class="img-fluid mt-3">
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }
            ?>

        </div>
    </div>

    <?php    include '../partials/_footer.php';
    include '../partials/_bootstrapjs.php';
    ?>
</body>

</html>