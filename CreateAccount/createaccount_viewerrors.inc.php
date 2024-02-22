<?php
declare(strict_types=1);

function createaccount_errors_check(){
    if(isset($_SESSION['errors_in_createaccount'])) {
        $errors = $_SESSION['errors_in_createaccount'];

        echo "<br>";

        foreach ($errors as $error){
            echo '<p id="form-errors">' . $error . '</p>';
        }

        unset($_SESSION['errors_in_createaccount']);
    }
}