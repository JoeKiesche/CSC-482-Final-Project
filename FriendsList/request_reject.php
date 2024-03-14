<?php
session_start();
require_once '../dbh.inc.php';

header('Content-Type: application/json');

if (isset($_POST['user_id'])) {
    $currentUserId = $_SESSION['user_id'];
    $friendUserId = $_POST['user_id'];

    // SQL to reject a friend request
    $sql = "DELETE FROM friendslist WHERE user1_id = ? AND user2_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $friendUserId, $currentUserId);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Friend request rejected.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to reject friend request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No user ID provided.']);
}
?>
