<?php
require_once '../dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];

    // Query to delete the user
    $sql = "DELETE FROM userprofile WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        // Redirect to the admin page after successful deletion
        header("Location: adminhtml.php");
        exit();
    } else {
        // Handle deletion failure (e.g., display an error message)
        echo "Failed to remove user.";
    }
} else {
    // Handle invalid request (e.g., display an error message)
    echo "Invalid request.";
}
?>