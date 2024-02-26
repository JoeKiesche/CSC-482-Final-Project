<?php
require_once '../dbh.inc.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into the appropriate table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process Rainbow Six Siege data
    $username1 = $_POST['username1'];
    $rank1 = $_POST['Rank1'];
    $division1 = $_POST['Division1'];
    $sql_r6 = "INSERT INTO r6profile (gamertag, rank, game, server_region) VALUES ('$username1', '$rank1', 'Rainbow Six Siege', 'NA')";
    $conn->query($sql_r6);

    // Process Call of Duty data
    $username2 = $_POST['username2'];
    $rank2 = $_POST['Rank2'];
    $division2 = $_POST['Division2'];
    $sql_cod = "INSERT INTO codprofile (gamertag, rank, game, server_region) VALUES ('$username2', '$rank2', 'Call of Duty', 'NA')";
    $conn->query($sql_cod);

    // Process other game data in a similar manner
    $username3 = $_POST['username3'];
    $rank3 = $_POST['Rank3'];
    $division3 = $_POST['Division3'];
    $sql_csgo = "INSERT INTO csprofile (gamertag, rank, game, server_region) VALUES ('$username3', '$rank3', 'CSGO', 'NA')";
    $conn->query($sql_csgo);
    // ...

    $username4 = $_POST['username4'];
    $rank4 = $_POST['Rank4'];
    $division4 = $_POST['Division4'];
    $sql_val = "INSERT INTO valprofile (gamertag, rank, game, server_region) VALUES ('$username4', '$rank4', 'Valorant', 'NA')";
    $conn->query($sql_val);
    // ...

    $username5 = $_POST['username5'];
    $rank5 = $_POST['Rank5'];
    $division5 = $_POST['Division5'];
    $sql_apex = "INSERT INTO aplprofile (gamertag, rank, game, server_region) VALUES ('$username5', '$rank5', 'Apex Legends', 'NA')";
    $conn->query($sql_apex);

    // Redirect user to a success page
    header("Location: success.php");
} else {
    // Redirect user to an error page
    header("Location: error.php");
}

$conn->close();
?>
