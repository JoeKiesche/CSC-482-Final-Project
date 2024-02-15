<?php
declare(strict_types=1);

function input_empty_check(string $username, string $password){
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function wrong_username(bool|array $data){
    if(!$data){
        return true;
    } else {
        return false;
    }
}

function wrong_password(string $password, string $hashedPassword){
    if(!password_verify($password, $hashedPassword)){
        return true;
    } else {
        return false;
    }
}