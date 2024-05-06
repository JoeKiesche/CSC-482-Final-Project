<?php
require_once '../dbh.inc.php';

// Checking if the user_id is set in the cookie
if (isset($_COOKIE['user_id'])) {
    $CookiedUserid = $_COOKIE['user_id'];
} else {
    echo "Cookie not set or unavailable.";
    // Handle the case where the user is not logged in
    exit(); 
}

// Process form data and insert or update the appropriate table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //R6
    $username1 = $_POST['username1'];
    $rank1 = $_POST['Rank1'];
    $division1 = $_POST['Division1'];
    
    // Check if a profile for R6 already exists for the user
    $existing_r6_profile = $conn->query("SELECT * FROM r6profile WHERE user_id = '$CookiedUserid'");
    if ($existing_r6_profile && $existing_r6_profile->num_rows > 0) {
        // If profile exists, update it
        $sql_r6 = "UPDATE r6profile SET gamertag = '$username1', rank = '$rank1' WHERE user_id = '$CookiedUserid'";
    } else {
        // If profile doesn't exist, insert a new record
        $sql_r6 = "INSERT INTO r6profile (gamertag, user_id, rank, game, server_region) VALUES ('$username1', '$CookiedUserid', '$rank1', 'Rainbow Six Siege', 'NA')";
    }
    $conn->query($sql_r6);

    //COD
    $username2 = $_POST['username2'];
    $rank2 = $_POST['Rank2'];
    $division2 = $_POST['Division2'];
    
    // Check if a profile for COD already exists for the user
    $existing_cod_profile = $conn->query("SELECT * FROM codprofile WHERE user_id = '$CookiedUserid'");
    if ($existing_cod_profile && $existing_cod_profile->num_rows > 0) {
        // If profile exists, update it
        $sql_cod = "UPDATE codprofile SET gamertag = '$username2', rank = '$rank2' WHERE user_id = '$CookiedUserid'";
    } else {
        // If profile doesn't exist, insert a new record
        $sql_cod = "INSERT INTO codprofile (gamertag, user_id, rank, game, server_region) VALUES ('$username2', '$CookiedUserid', '$rank2', 'Call of Duty', 'NA')";
    }
    $conn->query($sql_cod);

    //CSGO
    $username3 = $_POST['username3'];
    $rank3 = $_POST['Rank3'];
    
    // Check if a profile for CSGO already exists for the user
    $existing_csgo_profile = $conn->query("SELECT * FROM csprofile WHERE user_id = '$CookiedUserid'");
    if ($existing_csgo_profile && $existing_csgo_profile->num_rows > 0) {
        // If profile exists, update it
        $sql_csgo = "UPDATE csprofile SET gamertag = '$username3', rank = '$rank3' WHERE user_id = '$CookiedUserid'";
    } else {
        // If profile doesn't exist, insert a new record
        $sql_csgo = "INSERT INTO csprofile (gamertag, user_id, rank, game, server_region) VALUES ('$username3', '$CookiedUserid', '$rank3', 'CSGO', 'NA')";
    }
    $conn->query($sql_csgo);

    //VAL
    $username4 = $_POST['username4'];
    $rank4 = $_POST['Rank4'];
    
    // Check if a profile for Valorant already exists for the user
    $existing_val_profile = $conn->query("SELECT * FROM valprofile WHERE user_id = '$CookiedUserid'");
    if ($existing_val_profile && $existing_val_profile->num_rows > 0) {
        // If profile exists, update it
        $sql_val = "UPDATE valprofile SET gamertag = '$username4', rank = '$rank4' WHERE user_id = '$CookiedUserid'";
    } else {
        // If profile doesn't exist, insert a new record
        $sql_val = "INSERT INTO valprofile (gamertag, user_id, rank, game, server_region) VALUES ('$username4', '$CookiedUserid', '$rank4', 'Valorant', 'NA')";
    }
    $conn->query($sql_val);

    //APEX
    $username5 = $_POST['username5'];
    $rank5 = $_POST['Rank5'];
    
    // Check if a profile for Apex Legends already exists for the user
    $existing_apex_profile = $conn->query("SELECT * FROM aplprofile WHERE user_id = '$CookiedUserid'");
    if ($existing_apex_profile && $existing_apex_profile->num_rows > 0) {
        // If profile exists, update it
        $sql_apex = "UPDATE aplprofile SET gamertag = '$username5', rank = '$rank5' WHERE user_id = '$CookiedUserid'";
    } else {
        // If profile doesn't exist, insert a new record
        $sql_apex = "INSERT INTO aplprofile (gamertag, user_id, rank, game, server_region) VALUES ('$username5', '$CookiedUserid', '$rank5', 'Apex Legends', 'NA')";
    }
    $conn->query($sql_apex);

    // Redirect user to a success page
    header("Location: ../indexhtml.php");
    exit(); 

    // might have to update - should be wokring though
}

$conn->close();
?>
