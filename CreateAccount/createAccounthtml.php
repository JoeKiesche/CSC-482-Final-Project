<?php
    require_once 'createaccount_viewerrors.inc.php';
    require_once '../session_config.inc.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Party Pal</title>
    <link rel="stylesheet" href="createaccount.css">
</head>
<body>
    <header>
        <h1>PartyPal Create Account</h1>
        <a href="../Login/loginhtml.php">
            <button class="home">Sign in</button>
        </a>
    <div id="logo"> 
        <img src="../Pictures/controllerRed.png"> 
    </div> 
    </header>
    <main>
        <section id="createaccount-form">
            <h2>Create account</h2>
            <form action="createaccount.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="email" name="email" placeholder="Email">
                <select name="region"> 
                    <option value="NA"> NA </option>
                    <option value="EU"> EU </option>
                    <option value="Asia and Oceania"> Asia and Oceania </option>
                    <option value="Russia"> Russia </option>
                    <option value="China"> China </option>
                    </select>

                
                <button type="submit" class="signup"> Signup </button>

                <!-- 
                    
                -->
            </form>
            
            <?php
            createaccount_errors_check();
            ?>

        </section>
    </main>
</body>
</html>