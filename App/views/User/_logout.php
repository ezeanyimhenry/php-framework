<?php 
// logout.php

use App\Controllers\UserController;

session_start();

// Create a new User object with the existing database connection
$user = new UserController($dbConnection);

// Check if the user is logged in
if ($user->isLoggedIn()) {
    // Log the user out
    $user->logout();
}

?>
