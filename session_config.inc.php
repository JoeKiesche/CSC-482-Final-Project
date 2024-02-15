<?php

ini_set('session.gc_maxlifetime', 1800); 
ini_set('session.cookie_lifetime', 0);   
ini_set('session.name', 'MySession');    
ini_set('session.cookie_secure', true);   
ini_set('session.cookie_httponly', true);

session_start();
?>