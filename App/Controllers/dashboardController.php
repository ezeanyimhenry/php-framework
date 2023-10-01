<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\PlanTypeModel;

class DashboardController extends BaseController
{
   public function showDashboard()
    {
        $userModel = $this->createUserModel();
        $accountModel = new AccountModel($this->db);
        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];
        
        
        $userDetails = $userModel->getUserById($user_id);
        $_SESSION['userDetails'] = $userDetails;
        
        $planTypes = $this->showPlanTypeModal();
        $accountBalance = $accountModel->getBalance();
        $contentPage = 'App/views/user/_dashboard.php';
        include_once 'App/views/user/_index.php';
    }

    public function showPlanTypeModal()
    {
        // Use the model to get plan types
        $planTypeModel = new PlanTypeModel($this->db); // Pass the dbConnection

        $planTypes = $planTypeModel->getPlanTypes();

        $_SESSION['planTypes'] = $planTypes;

        return $planTypes;

    }
}
