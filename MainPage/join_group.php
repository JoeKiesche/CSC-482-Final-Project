<?php
require_once '../dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    // Get the post_id from the form
    $post_id = $_POST['post_id'];

    // Get the user_id based on the username cookie
    if (isset($_COOKIE['username_cookie'])) {
        $usernameee = $_COOKIE['username_cookie'];

        $sql_userid = "SELECT user_id FROM userprofile WHERE username = ?";
        $stmt_userid = $conn->prepare($sql_userid);
        $stmt_userid->bind_param("s", $usernameee);
        $stmt_userid->execute();
        $result_userid = $stmt_userid->get_result();

        if ($result_userid->num_rows > 0) {
            $row_userid = $result_userid->fetch_assoc();
            $user_id = $row_userid['user_id'];

            // Get the title of the post_id
            $sql_post_title = "SELECT title FROM forumpost WHERE post_id = ?";
            $stmt_post_title = $conn->prepare($sql_post_title);
            $stmt_post_title->bind_param("i", $post_id);
            $stmt_post_title->execute();
            $result_post_title = $stmt_post_title->get_result();

            if ($result_post_title->num_rows > 0) {
                $row_post_title = $result_post_title->fetch_assoc();
                $title = $row_post_title['title'];

                // Get the group_id based on the title
                $sql_group_id = "SELECT group_id FROM groups WHERE group_name = ?";
                $stmt_group_id = $conn->prepare($sql_group_id);
                $stmt_group_id->bind_param("s", $title);
                $stmt_group_id->execute();
                $result_group_id = $stmt_group_id->get_result();
        
                if ($result_group_id->num_rows > 0) {
                    $row_group_id = $result_group_id->fetch_assoc();
                    $group_id = $row_group_id['group_id'];

                    // Check if the user is already a member of the group
                    $sql_check_member = "SELECT * FROM group_members WHERE group_id = ? AND user_id = ?";
                    $stmt_check_member = $conn->prepare($sql_check_member);
                    $stmt_check_member->bind_param("ii", $group_id, $user_id);
                    $stmt_check_member->execute();
                    $result_check_member = $stmt_check_member->get_result();

                    if ($result_check_member->num_rows > 0) {
                        // User is already a member, redirect back
                        header("Location: fetch_players.php");
                        exit();
                    } else {
                        // Insert the user_id into the group_members table
                        $sql_insert_member = "INSERT INTO group_members (group_id, user_id) VALUES (?, ?)";
                        $stmt_insert_member = $conn->prepare($sql_insert_member);
                        $stmt_insert_member->bind_param("ii", $group_id, $user_id);
                        $stmt_insert_member->execute();

                        // Decrement the playercount for the corresponding post_id
                        $sql_decrement_playercount = "UPDATE forumpost SET playercount = playercount - 1 WHERE post_id = ?";
                        $stmt_decrement_playercount = $conn->prepare($sql_decrement_playercount);
                        $stmt_decrement_playercount->bind_param("i", $post_id);
                        $stmt_decrement_playercount->execute();

                        // Check if playercount has reached 0, and delete the forum post if so
                        $sql_check_playercount = "SELECT playercount FROM forumpost WHERE post_id = ?";
                        $stmt_check_playercount = $conn->prepare($sql_check_playercount);
                        $stmt_check_playercount->bind_param("i", $post_id);
                        $stmt_check_playercount->execute();
                        $result_check_playercount = $stmt_check_playercount->get_result();

                        if ($result_check_playercount->num_rows > 0) {
                            $row_check_playercount = $result_check_playercount->fetch_assoc();
                            $playercount = $row_check_playercount['playercount'];

                            if ($playercount == 0) {
                                // Delete the forum post if playercount is 0
                                $sql_delete_post = "DELETE FROM forumpost WHERE post_id = ?";
                                $stmt_delete_post = $conn->prepare($sql_delete_post);
                                $stmt_delete_post->bind_param("i", $post_id);
                                $stmt_delete_post->execute();
                            }
                        }

                        // Redirect back to fetch_players.php
                        header("Location: fetch_players.php");
                        exit();
                    }
                } else {
                    echo "Group not found.";
                }
            } else {
                echo "Post title not found.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "Cookie not set or unavailable.";
    }
} else {
    echo "Form not submitted.";
}
?>