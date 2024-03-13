<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="messageroom.css">
</head>
<body>
    <div class="container">
        <h1>
            <?php require_once 'messageroom.php'; ?>
        </h1>
        <div id="message-container">
            <!-- Messages will be displayed here -->
            <?php require_once 'fetch_messages.php'; ?>
        </div>
        <form id="message-form" action="messages.php?group_id=<?php echo $_GET['group_id']; ?>" method="post">
            <textarea id="message" name="message" placeholder="Type your message here" required></textarea>
            <button type="submit">Send</button>
        </form>
        <a href="groupshtml.php" class="btn btn-primary btn-back">Back</a>
    </div>
</body>
</html>