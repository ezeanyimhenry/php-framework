<?php 
// logout.php

use Framework\Classes\User;

session_start();

// Create a new User object with the existing database connection
$user = new User($dbConnection);

// Check if the user is logged in
if ($user->isLoggedIn()) {
    // Log the user out
    $user->logout();
}

?>
