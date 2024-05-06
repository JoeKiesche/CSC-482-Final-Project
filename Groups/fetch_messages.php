<?php
require_once '../dbh.inc.php'; 

// Fetch messages for the group along with the sender's username
$sql_messages = "SELECT m.*, u.username
                 FROM group_messages m
                 JOIN userprofile u ON m.sender_id = u.user_id
                 WHERE m.group_id = ?";
$stmt_messages = $conn->prepare($sql_messages);
$stmt_messages->bind_param("i", $_GET['group_id']);
$stmt_messages->execute();
$result_messages = $stmt_messages->get_result();

// Display messages
while ($row_message = $result_messages->fetch_assoc()) {
    echo '<div class="message">';
    echo '<strong>' . $row_message['username'] . ': </strong>';
    echo $row_message['message_text'];
    echo '<span class="timestamp">' . $row_message['sent_at'] . '</span>';
    echo '</div>';
}
?>