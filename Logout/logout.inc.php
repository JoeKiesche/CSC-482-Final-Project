<?php

session_start();
session_unset();
session_destroy();

setcookie('username_cookie', '', time() - 3600, '/');

header("Location: ../indexhtml.php");
die();
