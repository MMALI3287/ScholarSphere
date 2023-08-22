<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Admission Form</title>
    <?php include 'partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="css/inputAdmissionData.css">
</head>

<body class="bg-secondary">
    <?php include 'partials/_header.php'; ?>
    <div class="container mt-5 pt-5">
        <h1 class="text-center">University Admission Form</h1>
        <form action="process_form.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <label for="varsity_name">University Name</label>
                <input type="text" class="form-control" id="varsity_name" name="varsity_name" required>
            </div>
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
            </div>

            <div class="form-group">
                <label for="admission_date">Admission Date</label>
                <input type="date" class="form-control" id="admission_date" name="admission_date" required>
            </div>

            <div class="form-group">
                <label for="result_publication_date">Result Publication Date</label>
                <input type="date" class="form-control" id="result_publication_date" name="result_publication_date"
                    required>
            </div>

            <div class="form-group">
                <label for="offered_programs">Offered Programs</label>
                <textarea class="form-control" id="offered_programs" name="offered_programs" rows="3"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="requirements">Requirements</label>
                <textarea class="form-control" id="requirements" name="requirements" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="quota">Quota</label>
                <input type="text" class="form-control" id="quota" name="quota" required>
            </div>

            <div class="form-group">
                <label for="exam_type">Exam Type</label>
                <input type="text" class="form-control" id="exam_type" name="exam_type" required>
            </div>

            <div class="form-group">
                <label for="additional_information">Additional Information</label>
                <textarea class="form-control" id="additional_information" name="additional_information" rows="3"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="notice_url">Notice URL</label>
                <textarea class="form-control" id="notice_url" name="notice_url" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">University Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    include 'partials/_footer.php';
    include 'partials/_bootstrapjs.php';
    ?>
</body>

</html>