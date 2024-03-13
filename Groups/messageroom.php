<?php
// Include the database connection file
require_once '../dbh.inc.php';

// Check if the group_id is set in the URL
if (isset($_GET['group_id'])) {
    $group_id = $_GET['group_id'];

    // Fetch the group name based on the group_id
    $sql_group = "SELECT group_name FROM groups WHERE group_id = ?";
    $stmt_group = $conn->prepare($sql_group);
    $stmt_group->bind_param("i", $group_id);
    $stmt_group->execute();
    $result_group = $stmt_group->get_result();

    if ($result_group->num_rows > 0) {
        $row_group = $result_group->fetch_assoc();
        $group_name = $row_group['group_name'];

        // Display the chatroom with the group name
        echo "<h1>Messageroom for $group_name</h1>";
        // Add chatroom UI here
    } else {
        echo "Group not found.";
    }
} else {
    echo "Group ID not provided.";
}
?>