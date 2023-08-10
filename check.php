<?php

require __DIR__ . '/vendor/autoload.php';

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];


if ($apiKey === false) {
    echo 'Error: Could not retrieve SENDGRID_API_KEY environment variable';
} else {
    echo $apiKey;
}
