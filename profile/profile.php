<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body {
    background-color: #115579;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    color: white;
}
</style>
</head>
<body>
    
</body>
</html>
<?php

require_once '../dbh.inc.php';
session_start();

// Check if the username cookie is set
if (!isset($_COOKIE['username_cookie'])) {
    echo "Username cookie not set.";
    exit();
}

if (!isset($_COOKIE['user_id'])) {
    echo "Username cookie not set.";
    exit();
}



// Retrieve the username from the cookie
$username = $_COOKIE['username_cookie'];
$username_id = $_COOKIE['user_id'];



// Query to retrieve user information based on the username
$query = "SELECT username, email FROM userprofile WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    echo "Username: " . $row['username'] . "<br>";
    echo "Email: " . $email . "<br>";
    echo  "User id: " . $username_id . "<br>";
} else {
    // Handle the case if the user does not exist
    echo "User not found.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
