<?php 
// logout.php

use App\Models\UserModel;

session_start();

// Create a new User object with the existing database connection
$user = new UserModel($dbConnection);

// Check if the user is logged in
if ($user->isLoggedIn()) {
    // Log the user out
    $user->logout();
}

?>
