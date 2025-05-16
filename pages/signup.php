<?php

declare(strict_types=1);
require '../connect.php';
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];
$ipapikey = $_ENV['IPINFO_API_KEY'];

use SendGrid\Mail\Mail;

if (!isset($_SESSION['id'])) {
    session_start();
}

$conn = "";
$errors = 0;


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <?php include '../partials/_bootstrapcss.php'; ?>
    <link rel="stylesheet" href="../css/loginstyle.css" />
    <title>Login</title>
</head>

<body>
    <?php include '../partials/_header.php'; ?>
    <video autoplay loop muted plays-inline preload="auto" class="back-video">
        <source src="../assets/videos/rain.mp4" type="video/mp4">
    </video>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
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
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors++;
            $_SESSION['email_error_message'] = "Invalid email format";
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
                $_SESSION['password'] = $password;
            }
        }

        if (empty($type)) {
            $errors++;
            $_SESSION['type_error_message'] = "Type is not selected";
        } else {
            $_SESSION['type'] = $type;
        }

        if ($errors == 0) {
            $auth_code = mt_rand(10000000, 99999999);
            $_SESSION['auth_code'] = $auth_code;

            $email = new Mail();
            
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

            $current_time = time();
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
                CURLOPT_CAINFO => 'C:\Certificates\cacert-2023-05-30.pem', 
            ];

            $sendgrid = new \SendGrid($apiKey);

            $sendgrid->client->setCurlOptions($curlOptions); // Set cURL options for the client
    
            try {
                $response = $sendgrid->send($email);
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
        }
    } else {
        $_SESSION['type_error_message'] = "";
        $_SESSION['username_error_message'] = "";
        $_SESSION['email_error_message'] = "";
        $_SESSION['password_error_message'] = "";
        $_SESSION['registration_successful'] = "";
        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
        $_SESSION['password'] = '';
        $_SESSION['type'] = '';
        $_SESSION['auth_code'] = '';
    }

    ?>

    <div class="d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="row">
                <div class="col-md-12 login-form">
                    <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                        novalidate>
                        <?php
                        if (isset($_SESSION['registration_successful']) and !empty($_SESSION['registration_successful'])) {
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                Registration Successful.
                            </div>
                        </div>';
                        }
                        ?>
                        <div class="col-md-12 mb-4 text-white">
                            <h2 class="text-center h1 w-100">Register Now</h2>
                        </div>
                        <div class="col-md-12 mb-4">

                            <label for="inputUserName4" class="form-label">Username</label>
                            <span class="error-red">*
                                <?php
                                if (isset($_SESSION['username_error_message']) and !empty($_SESSION['username_error_message'])) {
                                    echo $_SESSION['username_error_message'];
                                }
                                ?>
                            </span>
                            <input type="text" class="form-control" id="inputUserName4" name="username">

                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <span class="error-red">*
                                <?php
                                if (isset($_SESSION['email_error_message']) and !empty($_SESSION['email_error_message'])) {
                                    echo $_SESSION['email_error_message'];
                                }
                                ?>
                            </span>
                            <input type="text" class="form-control" id="inputEmail4" name="email">

                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <span class="error-red">*
                                <?php
                                if (isset($_SESSION['password_error_message']) and !empty($_SESSION['password_error_message'])) {
                                    echo $_SESSION['password_error_message'];
                                }
                                ?>
                            </span>
                            <input type="password" class="form-control" id="inputPassword4" name="password">

                        </div>
                        <div class="col-md-12">
                            <label for="inputAccountType" class="form-label">Account Type</label>
                            <span class="error-red">*
                                <?php
                                if (isset($_SESSION['type_error_message']) and !empty($_SESSION['type_error_message'])) {
                                    echo $_SESSION['type_error_message'];
                                }
                                ?>
                            </span>
                            <select class="form-select mb-4" aria-label="Default select example" name="type">
                                <option selected value="">Select account type</option>
                                <option value="Admission Candidate">Admission Candidate</option>
                                <option value="Alumni / Current Student">Alumni / Current Student</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-12 input-group">
                            <button type="submit" class="btn btn-primary" id="showPopupBtn">Sign Up</button>
                        </div>

                        <p class="text-center pt-5 text-white h3">
                            Already have an account?
                            <a href="login.php" class="anchor">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <label style="display:none;" id="authCode">
        <?php if (isset($_SESSION['auth_code']) and !empty($_SESSION['auth_code'])) {
            echo $_SESSION['auth_code'];
        } ?>
    </label>

    <?php
    if (isset($_SESSION['auth_code']) and !empty($_SESSION['auth_code'])) {
        echo($_SESSION['auth_code']);
        echo '
        <div class="popup-container" id="popupContainer">
            <div class="popup-content">
                <h2 class="text-white text-center mt-5 pt-5 mb-5 h1">Verify Email</h2>
                <br>
                <div class="container body ml-5 ps-5">
                    <label for="verificationCode" class="text-white text-center h2">Verification Code</label>
                    <br>
                    <span id="verificationError"  style="color: red;"></span>
                    <br>
                    <input type="text" id="verificationCode" required>
                    <br>
                    <button id="verifyButton">Verify</button>
                    <button id="closePopupBtn">Close</button>
                </div>
            </div>
        </div>';
    }
    include '../partials/_bootstrapjs.php';
    ?>
    <script src="../js/signUp.js"></script>

</body>

</html>