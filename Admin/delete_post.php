<?php
require_once '../dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    // Query to fetch the title of the forum post
    $sqlTitle = "SELECT title FROM forumpost WHERE post_id = ?";
    $stmtTitle = $conn->prepare($sqlTitle);
    $stmtTitle->bind_param("i", $postId);
    $stmtTitle->execute();
    $resultTitle = $stmtTitle->get_result();
    $rowTitle = $resultTitle->fetch_assoc();
    $postTitle = $rowTitle['title'];

    // Get the group_id associated with the forum post
    $sqlGroup = "SELECT group_id FROM groups WHERE group_name = ?";
    $stmtGroup = $conn->prepare($sqlGroup);
    $stmtGroup->bind_param("s", $postTitle);
    $stmtGroup->execute();
    $resultGroup = $stmtGroup->get_result();
    $rowGroup = $resultGroup->fetch_assoc();
    $groupId = $rowGroup['group_id'];

    // Query to delete the forum post ??
    $sqlDeletePost = "DELETE FROM forumpost WHERE post_id = ?";
    $stmtDeletePost = $conn->prepare($sqlDeletePost);
    $stmtDeletePost->bind_param("i", $postId);

    // Query to delete the group associated with the forum post
    $sqlDeleteGroup = "DELETE FROM groups WHERE group_id = ?";
    $stmtDeleteGroup = $conn->prepare($sqlDeleteGroup);
    $stmtDeleteGroup->bind_param("i", $groupId);
    
    // Execute the queries
    $success = $stmtDeletePost->execute() && $stmtDeleteGroup->execute();
    if ($success) {
        // Redirect to the forum page after deleting porperly
        header("Location: forumlisthtml.php");
        exit();
    } else {
        // Handle deletion failure error message
        echo "Failed to delete post.";
    }
} else {
    // Handle invalid request (error message)
    echo "Invalid request.";
}
?>