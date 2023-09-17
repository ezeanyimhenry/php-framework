<?php 
use Framework\Classes\User;

session_start();

$user = new User($dbConnection);

$user_id = $_SESSION['user_id'];
$userDetails = $user->getUserDetails($user_id);