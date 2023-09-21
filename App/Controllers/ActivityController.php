<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use Framework\Classes\View;

class ActivityController extends BaseController
{
    public function showAllUserActivity()
    {
        // Create an instance of the WalletModel
        $activityModel = new ActivityModel($this->db);

        // Fetch wallet data using the model's method
        $activities = $activityModel->getAllUserActivity();

        $contentPage = 'App/views/user/_history.php';
        include_once 'App/views/user/_index.php';
    }

   
}