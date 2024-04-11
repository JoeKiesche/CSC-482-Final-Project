<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="title">PartyPal's Party Finder!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="MainPage.css">
</head>
<body>

        <div class="Logo">
            <a href="../indexhtml.php">
                <img src="../pictures/controllerRed.png" height="100"/>
            </a>
        </div>


        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end">
            <button id="openForm" type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#findFriendsModal">
                Find Friends
            </button>
        </div>

        <!-- Find Friends Modal -->
        <div class="modal fade" id="findFriendsModal" tabindex="-1" role="dialog" aria-labelledby="findFriendsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="findFriendsModalLabel">Find Friends</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="close-btn">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="findFriendsForm" method="POST">
                <div class="form-group">
                    <label for="usernameInput">Enter Username:</label>
                    <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username" required>
                </div>
                <button type="submit" class="btn btn-primary">Send Request</button>
                </form>
                <div class="friend-requests mt-4">
                    <h6>Friend Requests</h6>
                    <ul id="friendRequestsList" class="list-group">

                    </ul>
                </div>

                <div class="current-friends mt-4">
                    <h6>Current Friends</h6>
                    <ul id="currentFriendsList" class="list-group">

                    </ul>
                </div>

            </div>
            </div>
        </div>
        </div>


        <div class="profile">
            <a href="">
                <button type="button" class="btn btn-primary mt-3 btn-lg">Profile</button>
            </a>
        </div>

        <div class="groups">
            <a href="../Groups/groupshtml.php">
                <button type="button" class="btn btn-primary mt-3 btn-lg">Groups</button>
            </a>
        </div>



    <div class="welcome">
        <?php 
        //checking if cookeie is working properly
        if (isset($_COOKIE['username_cookie'])) {
            $usernameee = $_COOKIE['username_cookie'];
            $usernameeee = ucfirst($usernameee);
            echo "<h1> Welcome back, \n" ; 
            echo $usernameeee;
        } else {
            echo "Cookie not set or unavailable.";
        }
        
        
        ?>
    
    
        <h2 class="PartyPal-HEADER">PartyPal's Party Finder!</h2>
        <!-- Add Post Button -->
        <button type="button" class="btn btn-primary mt-3 btn-lg" data-toggle="modal" data-target="#addPostModal">Add Post</button>
        
        <!-- Find Players Button (Modal Trigger) -->
        <button type="button" class="btn btn-primary mt-3 btn-lg" data-toggle="modal" data-target="#findPlayersModal">Find Players</button>

        <!-- Player information will be displayed here -->
        <div id="playerInfo" class="mt-3"></div>
    </div>

    <!-- Find Players Modal -->
    <div class="modal fade" id="findPlayersModal" tabindex="-1" role="dialog" aria-labelledby="findPlayersModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="findPlayersModalLabel">Select Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="findPlayersForm" method="POST" action="fetch_players.php">
                        <div class="form-group">
                            <label for="gameSelect">Select Game:</label>
                            <select class="form-control" id="gameSelect" name="game">
                                <option value="Apex">Apex</option>
                                <option value="Cod">Cod</option>
                                <option value="CS">CSGO</option>
                                <option value="val">Valorant</option>
                                <option value="R6">Rainbow six siege</option>
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Find Players</button>
                    </form>
                </div>
            </div>
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
                                <option value="cod">Cod</option>
                                <option value="cs">CSGO</option>
                                <option value="val">Valorant</option>
                                <option value="r6">Rainbow six siege</option>
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
    <!-- Script for friends list functionality -->
    <script src="../FriendsList/friends.js"></script>
</body>
</html>
