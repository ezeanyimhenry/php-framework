<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Classes\Utility;

class ProfileController extends BaseController
{
   public function displayProfile()
    {
        $userModel = $this->createUserModel();
        $userController = $this->createUserController();
        
        $user_id = $_SESSION['user_id'];
        
        
        $userDetails = $userModel->getUserById($user_id);
        $_SESSION['userDetails'] = $userDetails;

        $timezones = Utility::getAllTimezones();
        
        $contentPage = 'App/views/user/_profile.php';
        include_once 'App/views/user/_index.php';
    }

}
