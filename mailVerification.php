<?php

declare(strict_types=1);

require 'connect.php';
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];
$ipapikey = $_ENV['IPINFO_API_KEY'];

use SendGrid\Mail\Mail;

if (!isset($_SESSION['id'])) {
    session_start();
}

$conn = "";
$errors = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST" && !isset($_SESSION['auth_code'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $type = test_input($_POST['type']);

    if (empty($username)) {
        $errors++;
        $_SESSION['username_error_message'] = "Username is empty";
    } else {
        $conn = connect();
        if ($conn) {
            $sql = "SELECT id FROM users WHERE username = '" . $username . "'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                $_SESSION['username_error_message'] = "Username already exists";
                $errors++;
            } else {
                $_SESSION['username_error_message'] = "";
                $_SESSION['username'] = $username;
            }
        }
    }
    if (empty($email)) {
        $errors++;
        $_SESSION['email_error_message'] = "Email is empty";
    } else {
        $conn = connect();
        if ($conn) {
            $sql = "SELECT id FROM users WHERE email = '" . $email . "'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                $_SESSION['email_error_message'] = "Email already exists";
                $errors++;
            } else {
                $_SESSION['email_error_message'] = "";
                $_SESSION['email'] = $email;
            }
        }
    }
    if (empty($password)) {
        $errors++;
        $_SESSION['password_error_message'] = "Password is empty";
    } else {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $_SESSION['password_error_message'] = "Password length > 8 characters, include upper case, lower case, number, special character.";
            $errors++;
        } else {
            $_SESSION['password_error_message'] = "";
        }
    }

    if (empty($type)) {
        $errors++;
        $_SESSION['type_error_message'] = "Type is not selected";
    }

    if ($errors == 0) {
        $auth_code = mt_rand(10000000, 99999999);
        echo 'console.log(' . json_encode($_SESSION) . ');';
        $_SESSION['auth_code'] = $auth_code;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        $email = new Mail();
        // Replace the email address and name with your verified sender
        $email->setFrom(
            'erfanali3287@gmail.com',
            'ScholarSphere Authentication'
        );

        $email->setSubject('Verify your email for ScholarSphere');

        $email->addTo(
            $_SESSION['email'],
            $_SESSION['username']
        );

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($userAgent, 'MSIE') !== false) {
            $browser = 'Internet Explorer';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            $browser = 'Mozilla Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            $browser = 'Google Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            $browser = 'Apple Safari';
        } elseif (strpos($userAgent, 'Opera') !== false) {
            $browser = 'Opera';
        } else {
            $browser = 'Unknown';
        }

        if ($_SERVER['HTTP_HOST'] === 'localhost' || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {
            $response = file_get_contents("http://ipinfo.io/json?token={$ipapikey}");
        } else {
            $ip = $_SERVER['REMOTE_ADDR']; // User's IP address
            $response = file_get_contents("http://ipinfo.io/{$ip}/json?token={$ipapikey}");
        }

        $data = json_decode($response, true);

        $location = $data['city'] . ', ' . $data['region'] . ', ' . $data['country'];

        $emailContent = '
    <html>
    <body>
        <p>Hi ' . $_SESSION['username'] . ',</p>
        <p>Enter this code to complete the registration process:</p>
        <h3><strong>' . $_SESSION['auth_code'] . '</strong></h3>
        <p>If you didn’t ask to verify this address, you can ignore this email. Thanks for helping us keep your account secure.</p>
        <p>The ScholarShpere Team</p>
        <p>When and where this happened</p>
        <p>Date: ' . date("F j, Y, g:i A T") . '</p>
        <p>Operating System: ' . php_uname('s') . '</p>
        <p>Browser: ' . $browser . '</p>
        <p>Approximate Location: ' . $location . '</p>
    </body>
    </html>';

        $email->addContent(
            'text/html',
            $emailContent
        );

        $current_time = time(); // Get the current Unix timestamp
        $email->setSendAt($current_time);

        $email->setReplyTo("erfanali3287@gmail.com", "Get Help");

        $headers = [
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ];

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
            CURLOPT_CAINFO => 'Certificates/cacert-2023-05-30.pem', // Replace with the actual path
        ];

        $sendgrid = new \SendGrid($apiKey);

        $sendgrid->client->setCurlOptions($curlOptions); // Set cURL options for the client

        try {
            $response = $sendgrid->send($email);
            header("Location: signup.php#verifyModal");
            exit();
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
    $_SESSION['type_error_message'] = "";
    $_SESSION['username_error_message'] = "";
    $_SESSION['email_error_message'] = "";
    $_SESSION['password_error_message'] = "";
    $_SESSION['registration_successful'] = "";
    exit();
}