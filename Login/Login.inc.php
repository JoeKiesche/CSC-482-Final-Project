

<?php
session_start();
require_once '../dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    //saving the var to another instance to use for the profile system
    $profileUser = $_POST["username"];
    
    
    require_once 'login_helperfunction.inc.php';
    require_once 'login_errors.inc.php';

    //error handling
    //array to hold errors
    $errorsArray = [];

    if (input_empty_check($username, $password)){
        $errorsArray ["input_is_empty"] = "Fill in all fields.";
    }

    $result = get_username($conn, $username);

    if (wrong_username($result)){
        $errorsArray ["wrong_username"] = "Incorrect username.";
    } 

    $resultHashedPassword = get_password($conn, $username);

    if(!wrong_username($result) && wrong_password($password, $resultHashedPassword)){
        $errorsArray ["wrong_password"] = "Incorrect login info.";
    }

    require_once '../session_config.inc.php';
    if($errorsArray) {
        $_SESSION["errors_in_login"] = $errorsArray;

        //might need to change
        header("Location: ../Login/loginhtml.php");
        die();
    }



    //admin account to remove certain features MIGHT CHANGE LATER** new
    $is_admin = get_is_admin($conn, $username);
    if ($is_admin === 1){
        setcookie('username_cookie', $profileUser, time() + (86400 * 30), '/');
        header("Location: ../indexhtml.php?login=success");
        die();
    }

    // changed since there was an accessing issue, friends_list needs the user_id and username.
    $_SESSION["user_id"] = $result[0]["user_id"];
    $_SESSION["user_username"] = htmlspecialchars($result[0]["username"]);


    /*


    JOE continue here




    */
   
    setcookie('username_cookie', $profileUser, time() + (86400 * 30), '/');

    $sql = "SELECT user_id FROM userprofile WHERE username = '$profileUser'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, set cookie
        $row = $result->fetch_assoc();
        $user_id = $row["user_id"];
        
        // Set cookie with user ID
        setcookie("user_id", $user_id, time() + (86400 * 30), "/");
          
    }

    //might need to change (john changed it)
    header("Location: ../indexhtml.php?login=success");
    
}else {
    header("Location: ../indexhtml.php");
    die();
}
?>