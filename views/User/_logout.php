<?php 
// logout.php

require_once('classes/User.php');
require_once('functions.php');
session_start();

// Create a new User object with the existing database connection
$user = new User($dbConnection);

// Check if the user is logged in
if ($user->isLoggedIn()) {
    // Log the user out
    $user->logout();
}

?>
