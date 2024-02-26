<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Players</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="MainPage.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Find Players</h2>
        <form id="findPlayersForm" method="POST" action="fetch_players.php">
            <div class="form-group">
                <label for="gameSelect">Select Game:</label>
                <select class="form-control" id="gameSelect" name="game">
                    <option value="Apex">Apex</option>
                    <option value="Cod">Cod</option>
                    <option value="CS">CSGO</option>
                    <option value="val">Valorant</option>
                    <option value="R6">Rainbow six siege</option>
                    <!-- Add other games here -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Find Players</button>
        </form>

        <!-- Add Post Button -->
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addPostModal">Add Post</button>

        <!-- Player information will be displayed here -->
        <div id="playerInfo" class="mt-3">
        
        </div>
    </div>

    <!-- Add Post Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addPostForm" method="POST" action="create_post.php">
                        <div class="form-group">
                            <label for="postGame">Game:</label>
                            <select class="form-control" id="postGame" name="postGame">
                                <option value="Apex">Apex</option>
                                <option value="codprofile">Cod</option>
                                <option value="csprofile">CSGO</option>
                                <option value="valprofile">Valorant</option>
                                <option value="r6profile">Rainbow six siege</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="postTitle">Title:</label>
                            <input type="text" class="form-control" id="postTitle" name="postTitle">
                        </div>
                        <div class="form-group">
                            <label for="postContent">Content:</label>
                            <textarea class="form-control" id="postContent" name="postContent" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="postPlayersNeeded">Players Needed:</label>
                            <input type="number" class="form-control" id="postPlayersNeeded" name="postPlayersNeeded" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
