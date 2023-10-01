<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Classes\Utility;
use Framework\Validators\ProfileValidator;

/**
 * ProfileController
 */
class ProfileController extends BaseController
{    
    /**
     * displayProfile
     *
     * @return void
     */
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
    
    /**
     * updateProfile
     *
     * @return void
     */
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profile'])) {
            $userModel = $this->createUserModel();
            $user_id = $_SESSION['user_id'];

            $validationErrors = ProfileValidator::validateProfileData($_POST);

            if (!empty($validationErrors)) {
                foreach ($validationErrors as $fieldName => $error) {
                    $_SESSION[$fieldName . '-error'] = $error;
                }
                Utility::redirect('/profile');
            } else {

                $result = $userModel->updateProfile($user_id, $_POST);

                if ($result > 0) {
                    // Password updated successfully
                    $_SESSION['success'] = "Profile updated successfully";
                    Utility::redirect("/profile");
                } else {
                    // Password update failed
                    $_SESSION['error'] = 'Profile update failed';
                    Utility::redirect("/profile");
                }
            }
        }
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changePassword']))
        {
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
        }
    }

}