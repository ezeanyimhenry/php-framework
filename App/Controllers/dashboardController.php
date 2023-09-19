<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Framework\Classes\Utility;

class DashboardController extends BaseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

    public function showDashboard()
    {
        $userModel = $this->createUserModel();
        $userController = $this->createUserController();
        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];

        // Get user details using UserModel
        $userDetails = $userModel->getUserById($user_id);
        $contentPage = 'App/views/user/_dashboard.php';
        include_once 'App/views/user/_index.php';

    }



}