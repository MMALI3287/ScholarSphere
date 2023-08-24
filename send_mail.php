<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];


use SendGrid\Mail\Mail;

$email = new Mail();

// Replace the email address and name with your verified sender
$email->setFrom(
    'erfanali3287@gmail.com',
    'Musaddique Ali'
);

$email->setSubject('Testing sending files with Attachments');

// Replace the email address and name with your recipient
$email->addTo(
    'mahtab.sani12381@gmail.com',
    'Fakibaj'
);
// $email->addTo(
//     'ponkidagreat@gmail.com',
//     'Prokriti'
// );
// $toEmails = [
//     "tabia.cse.20200204027@aust.edu" => "Tabia",
//     "musaddique.cse.20200204049@aust.edu" => "Musaddique"
// ];
// $email->addTos($toEmails);

$email->addContent(
    'text/html',
    '<strong>Do some work.</strong>'
);

$email->setSendAt(1461775051);

$file_encoded = base64_encode(file_get_contents('assets/newsletters/template.pdf'));
$email->addAttachment(
    $file_encoded,
    "application/pdf",
    "template.pdf",
    "attachment"
);

$email->setReplyTo("erfanali3287@gmail.com", "Get Connected");

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