<?php

if (isset($_POST["submit"])) {

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once 'database_connection.php';
    require_once 'helpers_validation.php';

    if (emptyFields(
        $first_name,
        $last_name,
        $birthday,
        $address,
        $contact_number,
        $email,
        $user_name,
        $password,
        $confirm_password
    ) !== false) {
        header("location: ../signup.php?error=Please fill up empty fields");
        exit();
    }
    if (invalidUsername($user_name) !== false) {
        header("location: ../signup.php?error=Invalid username");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=Please enter a valid Email Address");
        exit();
    }
    if (matchPassword($password, $confirm_password) !== false) {
        header("location: ../signup.php?error=Password Dont Match");
        exit();
    }
    if (usernameExists($conn, $user_name) !== false) {
        header("location: ../signup.php?error=Username already taken");
        exit();
    }

    if (password_verify())
    createUser(
        $conn,
        $first_name,
        $last_name,
        $birthday,
        $address,
        $contact_number,
        $email,
        $user_name,
        $password
    );
} else {
    header("location: ../signup.php");
    exit();
}
