<?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts based on selected game or all games
$game = $_GET['game'];
if ($game == 'all') {
    $sql = "SELECT * FROM forumpost";
} else {
    $sql = "SELECT * FROM forumpost WHERE game = '$game'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<h2>' . $row['title'] . '</h2>';
        echo '<p>' . $row['content'] . '</p>';
        echo '<p>Game: ' . $row['game'] . '</p>';
        echo '<button class="join-btn">Join</button>';
        echo '</div>';
    }
} else {
    echo "No posts found.";
}
$conn->close();
?>
