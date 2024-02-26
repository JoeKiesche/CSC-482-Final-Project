<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Posts</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="./mainhtml.php">
            <button type="submit" class="btn btn-secondary">Back</button>
        </a>
</div>
    <div class="container mt-5">
        <h2>Forum Posts</h2>

        <!-- Accordion to display forum posts -->
        <div class="accordion" id="accordionExample">
        <?php

            require_once '../dbh.inc.php';

            //checking if cookeie is working properly
            if (isset($_COOKIE['username_cookie'])) {
                $usernameee = $_COOKIE['username_cookie'];
                echo $usernameee; 
            } else {
                echo "Cookie not set or unavailable.";
            }
            


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Initialize the game variable
            $game = "";

            // Check if the form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['game'])) {
                // Sanitize and set the game variable
                $game = $_POST['game'];
            }
                

            // SQL query to fetch posts based on the selected game
            $sql = "SELECT * FROM forumpost WHERE game = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $game);
            $stmt->execute();
            $result = $stmt->get_result();


            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    // Output accordion for each post
                    echo '<div class="card">';
                    echo '<div class="card-header" id="heading' . $row["post_id"] . '">';
                    echo '<h2 class="mb-0">';
                    echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $row["post_id"] . '" aria-expanded="true" aria-controls="collapse' . $row["post_id"] . '">';
                    echo $row["title"];
                    echo '</button>';
                    echo '</h2>';
                    echo '</div>';
                    echo '<div id="collapse' . $row["post_id"] . '" class="collapse" aria-labelledby="heading' . $row["post_id"] . '" data-parent="#accordionExample">';
                    echo '<div class="card-body">';
                    echo '<p>' . $row["content"] . '</p>';
                    echo '<p>Game: ' . $row["game"] . '</p>' . '<p>Posted on: ' . $row["post_date"] . '</p>';


                    
                    // Join button form
                    echo '<form action="join_group.php" method="post">';
                    echo '<input type="hidden" name="post_id" value="' . $row["post_id"] . '">';
                    echo '<p>Players needed: ' . $row["playercount"] . '</p>';
                    echo '<button type="submit" class="btn btn-primary">Join Now!</button>';
                    
                    echo '</form>';
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No results found.</p>";
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
