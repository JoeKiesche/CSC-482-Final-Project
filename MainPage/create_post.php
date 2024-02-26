<?php
// Include the database connection file
require_once '../dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $game = $_POST['postGame'];
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];
    $playersNeeded = $_POST['postPlayersNeeded'];

    // Insert the post into the database
    $sql = "INSERT INTO forumpost (user_id, title, content, game, post_date, playercount) 
            VALUES (1, '$title', '$content', '$game', NOW(), $playersNeeded)";

    // Check if the query executed successfully
    if ($conn->query($sql) === TRUE) {
        // Post created successfully
        header("Location: mainhtml.php?post_created=success");
        exit();
    } else {
        // Error handling if post creation fails
        header("Location: mainhtml.php?post_created=error");
        exit();
    }
} else {
    // Redirect to main page if accessed without form submission
    header("Location: mainhtml.php");
    exit();
}
?>
