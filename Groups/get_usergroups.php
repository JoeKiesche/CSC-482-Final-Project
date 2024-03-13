<?php
require_once '../dbh.inc.php';
//checking if cookeie is working properly
if (isset($_COOKIE['username_cookie'])) {
    $usernameee = $_COOKIE['username_cookie'];
    $usernameeee = ucfirst($usernameee);

    // Get the user_id based on the username
    $sql_userid = "SELECT user_id FROM userprofile WHERE username = ?";
    $stmt_userid = $conn->prepare($sql_userid);
    $stmt_userid->bind_param("s", $usernameee);
    $stmt_userid->execute();
    $result_userid = $stmt_userid->get_result();
    
    if ($result_userid->num_rows > 0) {
        $row_userid = $result_userid->fetch_assoc();
        $user_id = $row_userid['user_id'];

        // Query to fetch the user's groups from the database
        $sql = "SELECT g.group_id, g.group_name 
                FROM groups g
                JOIN group_members gm ON g.group_id = gm.group_id
                WHERE gm.user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch and display the user's groups
        echo '<ul class="list-group mt-3">';
        while ($row = $result->fetch_assoc()) {
            $group_id = $row['group_id'];
            $group_name = $row['group_name'];
            echo '<li class="list-group-item"><a href="messageroomhtml.php?group_id=' . $group_id . '">' . $group_name . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo "User not found.";
    }
} else {
    echo "Cookie not set or unavailable.";
}
?>