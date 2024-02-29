<?php
// Include the database connection file
require_once '../dbh.inc.php';

        //checking if cookeie is working properly
        if (isset($_COOKIE['username_cookie'])) {
            $usernameee = $_COOKIE['username_cookie'];
        } else {
            echo "Cookie not set or unavailable.";
        }

        
        


// Check if the form is submitted
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $game = $_POST['postGame'];
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];
    $playersNeeded = $_POST['postPlayersNeeded'];

    // Get the user_id based on the username
    $sql_userid = "SELECT user_id FROM userprofile WHERE username = ?";
    $stmt_userid = $conn->prepare($sql_userid);
    $stmt_userid->bind_param("s", $usernameee);
    $stmt_userid->execute();
    $result_userid = $stmt_userid->get_result();

    if ($result_userid->num_rows > 0) {
        // Fetch the user_id
        $row_userid = $result_userid->fetch_assoc();
        $userid = $row_userid['user_id'];

        // Insert the post into the database
        $sql_insert = "INSERT INTO forumpost (user_id, title, content, game, post_date, playercount) 
                       VALUES (?, ?, ?, ?, NOW(), ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("isssi", $userid, $title, $content, $game, $playersNeeded);

        if ($stmt_insert->execute()) {
            // Post created successfully
            header("Location: mainhtml.php?post_created=success");
            exit();
        } else {
            // Error handling if post creation fails
            header("Location: mainhtml.php?post_created=error");
            exit();
        }
    } else {
        // Error handling if username not found
        header("Location: mainhtml.php?username_not_found=true");
        exit();
    }
} else {
    // Redirect to main page if accessed without form submission
    header("Location: mainhtml.php");
    exit();
}

?>
