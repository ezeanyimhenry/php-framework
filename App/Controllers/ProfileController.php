<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Helpers\Utility;
use Framework\Validators\BaseValidator;
use Framework\Validators\ProfileValidator;
use Framework\Template\TemplateEngine;

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
        $template = new TemplateEngine();
        $userModel = $this->createUserModel();
        $userController = $this->createUserController();

        $timezones = Utility::getAllTimezones();

        $data = [
            'timezones' => $timezones,
            'userDetails' => $_SESSION['userDetails'],
        ];

        $template->render('user/_profile', $data);
    }

    /**
     * updateProfile
     *
     * @return void
     */
    public function updateProfile($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profile'])) {
            $userModel = $this->createUserModel();
            // $user_id = $_SESSION['user_id'];

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
    
    /**
     * changePassword
     *
     * @return void
     */
    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changePassword'])) {
            $oldPassword = $_POST['old_password'];
            $user_id = $_SESSION['user_id'];
            $newPassword = $_POST['new_password'];

            $userModel = $this->createUserModel();
            if (!$userModel->validateOldPassword($user_id, $oldPassword)) {
                $_SESSION['error'] = 'Incorrect Password';
            } else {
                $validationErrors = BaseValidator::validatePassword($newPassword);
                error_log($validationErrors);
                if ($validationErrors !== true) {
                    $_SESSION['error'] = $validationErrors;
                } else {
                    $result = $userModel->updatePasswordByID($user_id, $newPassword);
                    if ($result > 0) {
                        // Password updated successfully
                        $_SESSION['success'] = "Password updated successfully";
                    } else {
                        // Password update failed
                        $_SESSION['error'] = 'Password update failed';
                    }
                }
            }
            Utility::redirect("/profile");
        }
    }

}