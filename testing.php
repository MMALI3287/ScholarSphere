<?php

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];
$ipapikey = $_ENV['IPINFO_API_KEY'];

// echo '' . $ipapikey;

//$ip = $_SERVER['REMOTE_ADDR']; // User's IP address

$response = file_get_contents("http://ipinfo.io/{$ip}/json?token={$ipapikey}");
$data = json_decode($response, true);

$location = $data['city'] . ', ' . $data['region'] . ', ' . $data['country'];

echo "Location: " . $location;