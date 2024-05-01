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
.btn-back {
    position: absolute;
    top: 20px;
    left: 20px;
    margin-right: 10px; 
}
</style>
</head>
<body>
    <a href="../Mainpage/Mainhtml.php" class="btn btn-primary btn-back">Back</a>
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
    echo  "User id: " . $username_id . "<br>" . "<br>";
} else {
    // Handle the case if the user does not exist
    echo "User not found.";
}

// Query to retrieve user information based on the userid for Apex Legends
$query_apex = "SELECT game, gamertag, rank, server_region FROM aplprofile WHERE user_id = ?";
$stmt_apex = $conn->prepare($query_apex);
$stmt_apex->bind_param("i", $username_id);
$stmt_apex->execute();
$result_apex = $stmt_apex->get_result();

// Check if the Apex Legends profile exists
if ($result_apex->num_rows > 0) {
    echo "Apex Legends Profile:" . "<br>";
    while ($row_apex = $result_apex->fetch_assoc()) {
        echo "Gamertag: " . $row_apex['gamertag'] . "<br>";
        echo "Rank: " . $row_apex['rank'] . "<br>";
        echo "Server Region: " . $row_apex['server_region'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle the case if the Apex Legends profile does not exist
    echo "Apex Legends profile not found.";
}

// Query to retrieve user information based on the userid for COD
$query_cod = "SELECT game, gamertag, rank, server_region FROM codprofile WHERE user_id = ?";
$stmt_cod  = $conn->prepare($query_cod);
$stmt_cod ->bind_param("i", $username_id);
$stmt_cod ->execute();
$result_cod  = $stmt_cod ->get_result();

// Check if the COD profile exists
if ($result_cod ->num_rows > 0) {
    echo "Call Of Duty Profile:" . "<br>";
    while ($row_cod  = $result_cod ->fetch_assoc()) {
        echo "Gamertag: " . $row_cod ['gamertag'] . "<br>";
        echo "Rank: " . $row_cod ['rank'] . "<br>";
        echo "Server Region: " . $row_cod ['server_region'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle the case if the cod profile does not exist
    echo "cod  profile not found.";
}

// Query to retrieve user information based on the userid for csprofile
$query_cs = "SELECT game, gamertag, rank, server_region FROM csprofile WHERE user_id = ?";
$stmt_cs = $conn->prepare($query_cs);
$stmt_cs ->bind_param("i", $username_id);
$stmt_cs ->execute();
$result_cs  = $stmt_cs ->get_result();

// Check if the csprofile profile exists
if ($result_cs ->num_rows > 0) {
    echo "CounterStrike Profile:" . "<br>";
    while ($row_cs = $result_cs ->fetch_assoc()) {
        echo "Gamertag: " . $row_cs ['gamertag'] . "<br>";
        echo "Rank: " . $row_cs ['rank'] . "<br>";
        echo "Server Region: " . $row_cs ['server_region'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle the case if the csprofile profile does not exist
    echo "cs profile not found.";
}

// Query to retrieve user information based on the userid for r6profile
$query_r6 = "SELECT game, gamertag, rank, server_region FROM r6profile WHERE user_id = ?";
$stmt_r6 = $conn->prepare($query_r6);
$stmt_r6 ->bind_param("i", $username_id);
$stmt_r6 ->execute();
$result_r6  = $stmt_r6 ->get_result();

// Check if the r6profile profile exists
if ($result_r6 ->num_rows > 0) {
    echo "Rainbow 6 Seige Profile:" . "<br>";
    while ($row_r6 = $result_r6 ->fetch_assoc()) {
        echo "Gamertag: " . $row_r6 ['gamertag'] . "<br>";
        echo "Rank: " . $row_r6 ['rank'] . "<br>";
        echo "Server Region: " . $row_r6 ['server_region'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle the case if the r6profile profile does not exist
    echo "r6 profile not found.";
}

// Query to retrieve user information based on the userid for valprofile
$query_val = "SELECT game, gamertag, rank, server_region FROM valprofile WHERE user_id = ?";
$stmt_val = $conn->prepare($query_r6);
$stmt_val ->bind_param("i", $username_id);
$stmt_val ->execute();
$result_val  = $stmt_val ->get_result();

// Check if the valprofile profile exists
if ($result_val ->num_rows > 0) {
    echo "Valorant Profile:" . "<br>";
    while ($row_val = $result_val->fetch_assoc()) {
        echo "Gamertag: " . $row_val ['gamertag'] . "<br>";
        echo "Rank: " . $row_val ['rank'] . "<br>";
        echo "Server Region: " . $row_val ['server_region'] . "<br>";
        echo "<br>";
    }
} else {
    // Handle the case if the valprofile profile does not exist
    echo "valprofile not found.";
}



// Close the database connection
$stmt->close();
$conn->close();
?>
