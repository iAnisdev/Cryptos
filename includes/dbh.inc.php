<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "1234";
$dBName = "crypto";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
