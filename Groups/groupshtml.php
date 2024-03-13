<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Groups</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="grouppage.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Your Groups</h1>
                <ul class="list-group mt-3">
                    <!-- PHP code to fetch and display user's groups -->
    
                    <?php require_once 'get_usergroups.php'; ?>
                    
                </ul>
                <a href="../Mainpage/Mainhtml.php" class="btn btn-primary btn-back">Back</a>
            </div>
        </div>
    </div>
</body>
</html>