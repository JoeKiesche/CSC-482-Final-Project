<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Forum</title>
    <link rel="stylesheet" href="MainPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="script.js" defer></script>
    
</head>
<body>
    <header>
        
        <?php 
            $user = $_COOKIE['username_cookie'];
        ?>
        
        <a href="../indexhtml.php">temp back to home</a>
        <h1>Welcome To PartyPal, </h1>
        <h2> <b> <?php echo $user ?> </b></h2>

        <!--<div id="logo"> 
                <img src="../pictures/controllerRed.png"> 
            </div>
-->

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <form action="../logout/logout.inc.php" method="post">
                <button class="btn btn-primary" type="logout" class="logout">Logout </button>
            </form> 
         
            <?php
                //added by john
                
                if ($user === 'admin') {
                    // If the user is an admin, display the user management button
                    echo '<form action="../admin/adminhtml.php" method="post">';
                    echo '<button class="btn btn-primary" type="submit">User Management</button>';
                    echo '</form>';
                } else {
                    // If the user is not an admin, display the profile button
                    echo '<form action="profile.php" method="post" id="email-corner">';
                    echo '<button class="btn btn-primary" type="profile" class="profile">Profile</button>';
                    echo '</form>';
                }
                
            ?>
                        
        </div>
          

        
    </header>
    
    <main>
        <button id="add-post-button" class="btn btn-info">Add Post</button>
        <select id="tag-selector">
            <option>Choose Category</option>
            
            <option value="ALL">All</option>
            <option value="Valorant">COD</option>
            <option value="Apex">Valorant</option>
            <option value="CSGO">CSGO</option>
            <option value="APEX">APEX</option>
            <option value="R6">RAinbow Six Siege</option>
        </select>
        <div id="post-list">
        
        </div>
        
        <script>
        document.getElementById("tag-selector").addEventListener("change", function() {
            var selectedTag = this.value;

            // send a AJAX request so that the page doesnt need to be refreshed for it to display the user post 
            var getRequest = new XMLHttpRequest();
            getRequest.open("POST", "filter_posts.php", true);
            getRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            getRequest.onreadystatechange = function() {
                if (getRequest.readyState === 4 && getRequest.status === 200) {
                    document.getElementById("post-list").innerHTML = getRequest.responseText;
        }
    };
    getRequest.send("selectedTag=" + selectedTag);
});
</script>


</main>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <section id="create-post">
                
                <form action="process_form.php" method="post">
                    <h2>Create a New Post</h2>
                    <?php require_once 'process_form.php'; ?>
                    <input type="text" name="post-title" placeholder="Title">
                    <textarea name="post-content" placeholder="Content"></textarea>
                    <label for="post-tag">Tag:</label>
                    <select id="post-tag" name="post-tag">
                        <option value="software">Software</option>
                        <option value="hardware">Hardware</option>
                        <option value="mobile">Mobile</option>
                        <option value="gaming">Gaming</option>
                        <option value="random">Random</option>
                    </select>
                    <button type="submit" id="submit-post" name="submit-post">Submit Post</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>