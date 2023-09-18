<?php 
// session_start();
use Framework\Classes\User;


$user = new User($dbConnection);

$user_id = $_SESSION['user_id'];
$userDetails = $user->getUserDetails($user_id);