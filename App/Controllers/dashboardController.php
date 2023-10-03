<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class DashboardController extends BaseController
{
   public function showDashboard()
    {
        $userModel = $this->createUserModel();
        $accountModel = new AccountModel($this->db);
        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];
        

        $accountBalance = $accountModel->getBalance();
        $contentPage = 'App/views/user/_dashboard.php';
        include_once 'App/views/user/_index.php';
    }
}
