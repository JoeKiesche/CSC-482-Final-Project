<?php
session_start();
require_once 'Login/login_helperfunction.inc.php';
require_once 'dbh.inc.php';
$user = isset($_COOKIE['username_cookie']) ? $_COOKIE['username_cookie'] : null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PartyPal Landing Page</title>
    <link rel="stylesheet" href="./LandingPage/LandingPage.css">
</head>
<body>
    <header>
        <nav>
            <div class="Logo">
                <a href="./indexhtml.php">
                    <img src="./Pictures/controllerRed.png" height="100"/>
                </a>
            </div>

            <div class="menu">
                <a href="./indexhtml.php">Home</a>
                <a href="./FAQ/FAQ.html">FAQ</a>
                <a href="./AboutUs/about.html ">About us</a>
                <a href="Contact">Contact</a>
            </div>
            
            <div class="adminbutton">
                <?php
                if ($user){
                        $is_admin = get_is_admin($conn, $user);
                        //checks to see if the user is admin and adds new button if so
                        if ($is_admin === 1) {
                            echo '<a href="admin/adminhtml.php" class="Admin">Admin</a>';
                        }
                    }
                ?>
            </div>
            
            <div class="userLogin">
                <?php
                    if ($user){
                        echo '<a href="Logout/logout.inc.php" class="Logout">Logout</a> <br>';
                        
                        
                    } else {
                        echo '<a href="Login/loginhtml.php">Login</a>';
                    }
                ?>
            </div>


            <div class="Info">
                <?php
                    if ($user){
                        echo '<div><a href="playerInfo/playerInfohtml.php" class="Info">Change game info</a></div> <br>';
                        
                    }
                ?>
            </div>

        </nav>
        <section class="Text">
            <span>welcome</span>
            <h1>Find Your Party, Seamlessly</h1>
            <?php
                    $userr = isset($_COOKIE['username_cookie']) ? $_COOKIE['username_cookie'] : null;

                    if ($userr){
                        echo '<a href="./MainPage/Mainhtml.php" class="FindTeam">Find Teamates Now!</a> <br>';
                        
                    } else {
                        echo 'Log In to try now!';
                    }
                ?>

        </section>
    </header>
</body>
<footer>
    
</footer>
</html>