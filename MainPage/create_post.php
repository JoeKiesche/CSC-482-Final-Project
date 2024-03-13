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

            //NEW insert the group into the database by taking title name of post and making it group name
            $sql_insert_group = "INSERT INTO groups (group_name) VALUES (?)";
            $stmt_insert_group = $conn->prepare($sql_insert_group);
            $stmt_insert_group->bind_param("s", $title);
            $stmt_insert_group->execute();

            // NEW get the group_id of the group just created
            $sql_get_group_id = "SELECT group_id FROM groups WHERE group_name = ?";
            $stmt_get_group_id = $conn->prepare($sql_get_group_id);
            $stmt_get_group_id->bind_param("s", $title);
            $stmt_get_group_id->execute();
            $result_group_id = $stmt_get_group_id->get_result();
            $row_group_id = $result_group_id->fetch_assoc();
            $group_id = $row_group_id['group_id'];

            // NEW Insert the user_id and group_id into the group_members table
            $sql_insert_group_members = "INSERT INTO group_members (user_id, group_id) VALUES (?, ?)";
            $stmt_insert_group_members = $conn->prepare($sql_insert_group_members);
            $stmt_insert_group_members->bind_param("ii", $userid, $group_id);
            $stmt_insert_group_members->execute();

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
