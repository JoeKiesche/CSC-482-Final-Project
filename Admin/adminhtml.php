<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="adminpage.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Users</h1>
                <ul class="list-group mt-3">
                    <?php
                        require_once 'get_userslist.php';
                    ?>
                </ul>
                <a href="../indexhtml.php" class="btn btn-primary btn-back">Back</a>
                <a href="forumlisthtml.php" class="btn btn-primary btn-forum">Forum Posts</a>
            </div>
        </div>
    </div>
</body>
</html>