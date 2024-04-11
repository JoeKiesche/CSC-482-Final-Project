<?php
require_once '../dbh.inc.php';

// Query to fetch forum posts
$sql = "SELECT post_id, title, content FROM forumpost";
$result = $conn->query($sql);

// Display the forum posts in a list
echo '<ul class="list-group mt-3">';
while ($row = $result->fetch_assoc()) {
    $postId = $row['post_id'];
    $postTitle = $row['title'];
    $postContent = $row['content'];
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . htmlspecialchars($postTitle) . '<br>' .
         wordwrap(htmlspecialchars($postContent), 50, "<br>\n", true) . '<br>' .
         '<form method="post" action="delete_post.php">' .
         '<input type="hidden" name="post_id" value="' . htmlspecialchars($postId) . '">' .
         '<button type="submit" class="btn btn-danger btn-sm">Delete</button>' .
         '</form></li>';
}
echo '</ul>';
?>