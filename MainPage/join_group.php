<?php


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user ID of the poster and the current user (you need to implement this part)
$posterId = $_POST['poster_id'];
$currentUserId = 1; // Assuming the current user ID, you need to modify this

// Retrieve the names of the poster and the current user
$posterName = "Poster Name"; // Dummy value, you need to retrieve the name from the database
$currentUserName = "Current User Name"; // Dummy value, you need to retrieve the name from the database

// Insert into the database the action of joining the group
$sql = "INSERT INTO group_members (group_id, user_id) VALUES ('$posterId', '$currentUserId')";
if ($conn->query($sql) === TRUE) {
    echo "Joined the group successfully!";
    // Display the names of the poster and the current user who joined
    echo "<p>$currentUserName joined $posterName's group.</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
