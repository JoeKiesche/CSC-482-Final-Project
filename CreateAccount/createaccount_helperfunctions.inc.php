<?php

declare(strict_types=1);

function get_username(object $conn, string $username){
    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM userprofile WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    return $result->num_rows > 0;
}

function get_email(object $conn, string $email){
    // Check if the email is already in use
    $checkEmailQuery = "SELECT * FROM userprofile WHERE email = ?";
    $checkEmailStmt = $conn->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $emailResult = $checkEmailStmt->get_result();

    return $emailResult->num_rows > 0;
}
?>