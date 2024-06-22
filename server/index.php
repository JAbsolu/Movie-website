<?php
/**
 * When this file is ran, it will start a session, unset all session
 * variables, and destroy the session, which will keep unauthorized 
 * users from accessing the database
 */
session_start();
// Remove all session variables
session_unset();
// Destroy the session
session_destroy();
header('location: auth/login.php');
?>