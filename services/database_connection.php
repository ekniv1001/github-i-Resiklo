<?php

// ob_start();

// if (isset($_SESSION)) {
//   session_start();
// }

date_default_timezone_set('Asia/Manila');
$host = "localhost";
$username = "root";
$password = "";
$database = "iresiklo";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
