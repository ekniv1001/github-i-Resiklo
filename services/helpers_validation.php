<?php

function emptyFields(
    $first_name,
    $last_name,
    $birthday,
    $address,
    $contact_number,
    $email,
    $user_name,
    $password,
    $confirm_password) {
        
    $result;
    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($birthday) ||
        empty($address) ||
        empty($contact_number) ||
        empty($email) ||
        empty($user_name) ||
        empty($password) ||
        empty($confirm_password)
    ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($user_name) {
    $result;
    if (!preg_match("/^[a-zA-Z-0-9]*$/"), $user_name) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function matchPassword($password) {
    $result;
    if ($password !== $confirm_password) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $user_name, $email) {
    $sql = "SELECT * FROM user_login_tbl WHERE user_name = ? OR email = ?;";
}

function createUser()