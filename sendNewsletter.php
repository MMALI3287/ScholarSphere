<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';
require 'connect.php';

require 'fpdf/fpdf.php'; // Include the FPDF library

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];


use SendGrid\Mail\Mail;

$email = new Mail();

// Create a PDF document
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Weekly Newsletter', 0, 1, 'C');

$date = date("Y-m-d");
$sql = "SELECT * FROM admission_card WHERE application_deadline > '" . $date . "'";
$conn = connect();
$result = mysqli_query($conn, $sql);

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Admission Details:', 0, 1);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Ln(6);
    $pdf->Cell(0, 10, 'University: ' . $row['varsity_name'], 0, 1);
    $pdf->Cell(0, 10, 'Application Deadline: ' . $row['application_deadline'], 0, 1);
    $pdf->Cell(0, 10, 'Admission Date: ' . $row['admission_date'], 0, 1);
    $pdf->Cell(0, 10, 'Result Publication Date: ' . $row['result_publication_date'], 0, 1);
    $pdf->Cell(0, 10, 'Offered Programs: ' . $row['offered_programs'], 0, 1);
    $pdf->Cell(0, 10, 'Requirements: ' . $row['requirements'], 0, 1);
    $pdf->Cell(0, 10, 'Quota: ' . $row['quota'], 0, 1);
    $pdf->Cell(0, 10, 'Exam Type: ' . $row['exam_type'], 0, 1);
    $pdf->Cell(0, 10, 'Additional Information: ' . $row['additional_information'], 0, 1);
    $pdf->Cell(0, 10, 'Learn More: ' . $row['notice_url'], 0, 1);
}

$lastWeekStart = date('Y-m-d', strtotime('-1 week'));
$lastWeekEnd = date('Y-m-d');
$sqlForum = "SELECT forum_posts.*, users.username
            FROM forum_posts 
            JOIN users ON forum_posts.id = users.id
            WHERE forum_posts.created_at BETWEEN '$lastWeekStart' AND '$lastWeekEnd'";
$resultForum = mysqli_query($conn, $sqlForum);

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Forum Posts from Last Week:', 0, 1);

while ($rowForum = mysqli_fetch_assoc($resultForum)) {
    $pdf->Ln(6);
    $pdf->Cell(0, 10, 'Topic: ' . $rowForum['title'], 0, 1);
    $pdf->Cell(0, 10, 'Author: ' . $rowForum['username'], 0, 1);
    $pdf->Cell(0, 10, 'Post Date: ' . $rowForum['created_at'], 0, 1);
    $pdf->Cell(0, 10, 'Content: ' . $rowForum['content'], 0, 1);
    // Add more details as needed
}

$pdfFilePath = 'assets/newsletters/Newsletter '.$date.'.pdf';
$pdf->Output($pdfFilePath, 'F');


$email->setFrom(
    'erfanali3287@gmail.com',
    'Musaddique Ali'
);

$email->setSubject('Weekly Newsletter is here');

$sql = "SELECT email, username FROM users";
$result = mysqli_query($conn, $sql);

$toEmails = [];

while ($row = mysqli_fetch_assoc($result)) {
    $emailAddress = $row['email'];
    $name = $row['username'];
    $toEmails[$emailAddress] = $name;
}

$email->addTos($toEmails);

        $email->addContent(
            'text/html',
            '
    <html>
    <body>
        <p>Hello fellow Subscriber,</p>
        <p>Here is your weekly newsletter</p>
    </body>
    </html>'
        );

$current_time = time(); // Get the current Unix timestamp
$email->setSendAt($current_time);

$file_encoded = base64_encode(file_get_contents($pdfFilePath));
$email->addAttachment(
    $file_encoded,
    "application/pdf",
    "Newsletter.pdf",
    "attachment"
);

$email->setReplyTo("erfanali3287@gmail.com", "Share Reviews");

$headers = [
    'Authorization' => 'Bearer ' . $apiKey,
    'Content-Type' => 'application/json',
];

$email->setFooter(true, "Footer", "<br><strong>Footer</strong>");

// Tracking Settings
$email->setClickTracking(true, true);
$email->setOpenTracking(true, "--sub--");
$email->setSubscriptionTracking(
    true,
    "subscribe",
    "<bold>subscribe</bold>",
    "%%sub%%"
);
$email->setGanalytics(
    true,
    "utm_source",
    "utm_medium",
    "utm_term",
    "utm_content",
    "utm_campaign"
);

// Initialize cURL options with the path to the CA certificate bundle
$curlOptions = [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => 'C:\Certificates\cacert-2023-05-30.pem', // Replace with the actual path
];

$sendgrid = new \SendGrid($apiKey);

$sendgrid->client->setCurlOptions($curlOptions); // Set cURL options for the client

try {
    $response = $sendgrid->send($email);
    printf("Response status: %d\n\n", $response->statusCode());

    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }
    echo "\nResponse Body\n";
    echo $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}

