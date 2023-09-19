<?php 
// session_start();
use Framework\Classes\Account;
use App\Models\UserModel;


$user_id = $_SESSION['user_id'];

$user = new UserModel($dbConnection);
$account = new Account($dbConnection, $user_id);

$userDetails = $user->getUserById($user_id);
$accountDetails = $account->getAccountDetails();