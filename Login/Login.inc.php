

<?php

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



    //admin account to remove certain feattures MIGHT CHANGE LATER**
    if ($result && $result[0]['username'] === 'admin'){
        setcookie('username_cookie', $profileUser, time() + (86400 * 30), '/');
        header("Location: ../admin/adminhtml.php");
        die();
    }

    
    $_SESSION["user_id"] = $result["userid"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]);


    /*


    JOE continue here




    */
   
    setcookie('username_cookie', $profileUser, time() + (86400 * 30), '/');
          


    //might need to change
    header("Location: ../indexhtml.php?login=success");
    
}else {
    header("Location: ../indexhtml.php");
    die();
}
?>