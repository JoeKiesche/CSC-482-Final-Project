<?php

session_start();

require_once '../dbh.inc.php';

header('Content-Type: application/json'); // Declare the content type as JSON


error_log(print_r($_SESSION, true));
// Assuming a database connection is already established and user session is started

if (isset($_POST['username'])) { // Assuming you're using 'username' directly for AJAX call
    $searchUsername = $conn->real_escape_string($_POST['username']);
    $currentUserId = $_SESSION['user_id']; // Get the current logged-in user's ID from the session

    // Search for users based on the username but exclude the current user
    $searchQuery = "SELECT * FROM userprofile WHERE username LIKE ? AND user_id != ?";
    $stmt = $conn->prepare($searchQuery);
    $likeUsername = "%$searchUsername%";
    $stmt->bind_param("si", $likeUsername, $currentUserId);
    $stmt->execute();
    $searchResult = $stmt->get_result();

    if ($searchResult->num_rows > 0) {
        // Assuming you want to send back user details or a success message
        $users = $searchResult->fetch_all(MYSQLI_ASSOC); // Fetch all results as an associative array
        echo json_encode(['success' => true, 'users' => $users]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No users found.']);
    }
    exit; // Stop script execution after handling this request
}

// Assuming 'add_friend' action is called directly via AJAX now
if (isset($_POST['add_friend'])) {
    $currentUserId = $_SESSION['user_id'];
    $friendUserId = $_POST['user_id']; // Adjust according to how you're passing the friend's user ID

    // Check if there's already a friend request or friendship
    $checkQuery = "SELECT * FROM friendslist WHERE 
                   (user1_id = ? AND user2_id = ?) OR 
                   (user1_id = ? AND user2_id = ?)";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("iiii", $currentUserId, $friendUserId, $friendUserId, $currentUserId);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows == 0) {
        // No existing request or friendship, proceed to insert the friend request
        $insertQuery = "INSERT INTO friendslist (user1_id, user2_id, status, request_user_id) VALUES (?, ?, 'pending', ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iii", $currentUserId, $friendUserId, $currentUserId);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Friend request sent!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error sending friend request.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'There is already a friend request or friendship.']);
    }
    exit; // Stop script execution after handling this request
}
