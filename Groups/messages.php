<?php
require_once '../dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    if (isset($_GET['group_id'])) {
        $group_id = $_GET['group_id'];

        // Fetch the username from the cookie
        if (isset($_COOKIE['username_cookie'])) {
            $username = $_COOKIE['username_cookie'];
        } else {
            // Default username if cookie is not set
            $username = 'Unknown User';
        }

        $message_text = $_POST['message'];

        // Insert the message into the database
        $sql_insert_message = "INSERT INTO group_messages (group_id, sender_id, message_text, sent_at) 
                               VALUES (?, ?, ?, NOW())";
        $stmt_insert_message = $conn->prepare($sql_insert_message);
        $stmt_insert_message->bind_param("iis", $group_id, $sender_id, $message_text);

        // Fetch sender_id based on username
        $sql_fetch_sender_id = "SELECT user_id FROM userprofile WHERE username = ?";
        $stmt_fetch_sender_id = $conn->prepare($sql_fetch_sender_id);
        $stmt_fetch_sender_id->bind_param("s", $username);
        $stmt_fetch_sender_id->execute();
        $result_fetch_sender_id = $stmt_fetch_sender_id->get_result();

        if ($result_fetch_sender_id->num_rows > 0) {
            $row_fetch_sender_id = $result_fetch_sender_id->fetch_assoc();
            $sender_id = $row_fetch_sender_id['user_id'];

            // Execute the insert statement
            $stmt_insert_message->execute();

            // Redirect back to the message room
            header("Location: messageroomhtml.php?group_id=$group_id");
            exit();
        } else {
            echo "Sender not found.";
        }
    } else {
        echo "Group ID not provided.";
    }
} else {
    // Redirect to main page if accessed without form submission
    header("Location: Mainhtml.php");
    exit();
}
?>