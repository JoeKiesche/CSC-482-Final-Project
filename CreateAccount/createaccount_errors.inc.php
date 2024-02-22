<?php
declare(strict_types=1);

function input_empty_check(string $username, string $password, string $email){
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function email_invalid_check(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function username_taken_check(object $conn, string $username){
    if (get_username($conn, $username)){
        return true;
    } else {
        return false;
    }
}

function email_taken_check(object $conn, string $email){
    if (get_email($conn, $email)){
        return true;
    } else {
        return false;
    }
}
?>