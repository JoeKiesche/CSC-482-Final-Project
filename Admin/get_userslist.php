<?php
require_once '../dbh.inc.php';

// Get the admin's username
$adminUsername = 'admin'; // Update this with the actual admin's username

// Query to fetch usernames of all users except the admin
$sql = "SELECT username FROM userprofile WHERE username != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $adminUsername);
$stmt->execute();
$result = $stmt->get_result();

// Display the usernames
echo '<ul class="list-group mt-3">';
while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . htmlspecialchars($username) . '
    <form method="post" action="remove_user.php">
        <input type="hidden" name="username" value="' . htmlspecialchars($username) . '">
        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
    </form></li>';
}
echo '</ul>';
?>