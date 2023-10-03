<?php
namespace Framework\Helpers;

use App\Models\PlanTypeModel;
use App\Models\UserModel;

// GlobalHelper.php
class GlobalHelpers
{
    public static function getPlanTypes($dbConnection)
    {
        if (!isset($_SESSION['planTypes'])) {
            // Fetch the plan types and store them in the session
            $planTypeModel = new PlanTypeModel($dbConnection); // Adjust this to your needs
            $_SESSION['planTypes'] = $planTypeModel->getPlanTypes();
        }

        return $_SESSION['planTypes'];
    }

    public static function getUserDetails($dbConnection)
    {
        if (!isset($_SESSION['userDetails'])) {
            $userModel = new UserModel($dbConnection);
            $userDetails = $userModel->getUserById($_SESSION['user_id']);
            $_SESSION['userDetails'] = $userDetails;
        }

        return $_SESSION['userDetails'];
    }
}