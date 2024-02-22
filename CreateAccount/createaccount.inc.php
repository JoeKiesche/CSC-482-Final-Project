<?php
require_once '../dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];  
    $region = $_POST["region"];  

    require_once 'createaccount_helperfunctions.inc.php';
    require_once 'createaccount_errors.inc.php';

    //error handling
    //array to hold errors
    $errorsArray = [];

    if (input_empty_check($username, $password, $email)){
        $errorsArray ["input_is_empty"] = "Fill in all fields.";
    }
    if (email_invalid_check($email)){
        $errorsArray ["email_is_invalid"] = "Invalid email address used.";
    }
    if (username_taken_check($conn, $username)){
        $errorsArray ["username_is_taken"] = "Username is already in use by another user.";
    }
    if (email_taken_check($conn, $email)){
        $errorsArray ["email_is_taken"] = "Email is already in use by another user.";
    }

    if(empty($errorsArray)){
        //creating account if no errors thrown

        $insertQuery = "INSERT INTO userprofile (username, password, email, region) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertStmt->bind_param("ssss", $username, $hashedPassword, $email, $region);

        $insertStmt->execute();

        header("Location: ../indexhtml.php");

        $conn->close();
        $insertStmt->close();

        die();
    } else {
        require_once '../session_config.inc.php';
        $_SESSION["errors_in_createaccount"] = $errorsArray;

        header("Location: ../CreateAccount/createAccounthtml.php");
        die();
    }
} else {
    header("Location: ../indexhtml.php");
    die();
}
?>