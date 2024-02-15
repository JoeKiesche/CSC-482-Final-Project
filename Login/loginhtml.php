
<?php
    require_once 'login_viewerrors.inc.php';
    require_once '../session_config.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PartyPal</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>
</head>
<body>
    <header>
        <h1>PartyPal Hub User Login</h1>
        <a href="../indexhtml.php">

    <div id="logo"> 
        <a href="../indexhtml.php">
            <img src="../Pictures/controllerRed.png"> 
        </a>
    </div> 
        </a>
    </header>
    <main>
        <section id="login-form">
            <h2 class ="title">Login</h2>
            <form action="login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button class="submit">Submit</button>
                <button class="cancel">Cancel</button>
            </form>
            <a href="../createaccount/CreateAccounthtml.php"> <button class="createaccount"> CreateAccount</button></a>
            <?php
            login_errors_check();
            ?>
        </section>
    </main>
</body>
</html>
