<?php
require_once '../dbh.inc.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve game and rank from POST data
$game = $_POST['game'];
$rank = $_POST['rank'];

// Insert the new post into the database
$sql = "INSERT INTO forumpost (user_id, title, content, game) VALUES (1, 'Looking for teammates', 'Rank: $rank', '$game')";
if ($conn->query($sql) === TRUE) {
    echo "New post created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
