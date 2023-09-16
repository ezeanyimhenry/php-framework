<?php 
require_once('classes/User.php');
require_once('functions.php');

session_start();

$user = new User($dbConnection);

$user_id = $_SESSION['user_id'];
$userDetails = $user->getUserDetails($user_id);