<?php

declare(strict_types=1);

function get_username(object $conn, string $username){
    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM userprofile WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    $resultMysqli = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $resultMysqli;
}

function get_password(object $conn, string $username) {
    // Check if the username exists
    $checkUsernameQuery = "SELECT * FROM userprofile WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    $userArray = mysqli_fetch_assoc($result);

    $password = isset($userArray['password']) ? $userArray['password'] : null;

    return $password;
}

function get_is_admin(object $conn, string $username) {
    // Check if the username exists
    $checkUsernameQuery = "SELECT * FROM userprofile WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    $userArray = mysqli_fetch_assoc($result);

    $is_admin = isset($userArray['is_admin']) ? $userArray['is_admin'] : null;

    return $is_admin;
}

