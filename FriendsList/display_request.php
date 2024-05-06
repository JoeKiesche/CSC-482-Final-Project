<?php
session_start();
require_once '../dbh.inc.php'; 

header('Content-Type: application/json');

// get user id from the session
$currentUserId = $_SESSION['user_id']; 

// Prepare SQL to fetch pending friend requests
$sql = "SELECT u.username, u.user_id, f.request_date 
        FROM friendslist f
        JOIN userprofile u ON u.user_id = f.user1_id 
        WHERE f.user2_id = ? AND f.status = 'pending'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $currentUserId);
$stmt->execute();
$result = $stmt->get_result();

$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}

// Check if we got any friend requests
if (count($requests) > 0) {
    echo json_encode(['success' => true, 'requests' => $requests]);
} else {
    echo json_encode(['success' => false, 'message' => 'No friend requests.']);
}

$conn->close();
?>
