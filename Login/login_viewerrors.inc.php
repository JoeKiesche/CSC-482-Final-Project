<?php
declare(strict_types=1);

function login_errors_check(){
    if(isset($_SESSION['errors_in_login'])) {
        $errors = $_SESSION['errors_in_login'];

        echo "<br>";

        foreach ($errors as $error){
            echo '<p id="form-errors">' . $error . '</p>';
        }

        unset($_SESSION['errors_in_login']);
    }
}