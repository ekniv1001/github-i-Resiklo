<?php
include "database_connection.php";

$first_name = "";
$last_name = "";
$birthday = "";
$address = "";
$contact_number = "";
$email = "";
$user_name = "";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $defaultimage   = "defaultimg.png";
    $first_name     = $_POST["first_name"];
    $last_name      = $_POST["last_name"];
    $birthday       = $_POST["birthday"];
    $address        = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $email          = $_POST["email"];
    $user_name      = $_POST["user_name"];
    $password       = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
}
