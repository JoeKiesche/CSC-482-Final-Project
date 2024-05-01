<?php

session_start();

require_once '../dbh.inc.php';

header('Content-Type: application/json'); 


error_log("SESSION VARIABLE ::::: " . var_export($_SESSION, true));


if (isset($_POST['username'])) { 
    $searchUsername = $conn->real_escape_string($_POST['username']);
    $currentUserId = $_SESSION['user_id'];

    // Search for the user with an exact match instead of LIKE
    $searchQuery = "SELECT * FROM userprofile WHERE username = ? AND user_id != ?";
    $stmt = $conn->prepare($searchQuery);
    $stmt->bind_param("si", $searchUsername, $currentUserId);
    $stmt->execute();
    $searchResult = $stmt->get_result();

    if ($searchResult->num_rows > 0) {
        $user = $searchResult->fetch_assoc(); 
        $friendUserId = $user['user_id']; 

    } else {
        
        echo json_encode(['success' => false, 'message' => 'No user found with that username.']);
        exit; 
    }
    
    error_log("Search completed. Found: " . $searchResult->num_rows . " users.");
    
    error_log("Entered query entering");
    $currentUserId = $_SESSION['user_id'];

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
        error_log($stmt->error);
        $stmt->bind_param("iii", $currentUserId, $friendUserId, $currentUserId);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Friend request sent!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error sending friend request.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'There is already a friend request or friendship.']);
    }
    exit; 
}
