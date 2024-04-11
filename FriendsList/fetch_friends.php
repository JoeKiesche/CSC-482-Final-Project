<?php

session_start();

require_once '../dbh.inc.php';

header('Content-Type: application/json');

$currentUserId = $_SESSION['user_id'];



// Query to select friends. This example assumes a symmetrical friendship relationship
$query = "
SELECT 
    CASE
        WHEN f.user1_id = ? THEN up2.username
        ELSE up1.username
    END AS friend_username
FROM 
    friendslist f
JOIN 
    userprofile up1 ON f.user1_id = up1.user_id
JOIN 
    userprofile up2 ON f.user2_id = up2.user_id
WHERE 
    f.status = 'accepted' 
    AND (f.user1_id = ? OR f.user2_id = ?);
";

$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $currentUserId, $currentUserId, $currentUserId);
$stmt->execute();
$result = $stmt->get_result();

$friends = [];

error_log(print_r($friends, true));


while ($row = $result->fetch_assoc()) {
    $friends[] = $row;
}

echo json_encode(['success' => true, 'friends' => $friends]);

?>

