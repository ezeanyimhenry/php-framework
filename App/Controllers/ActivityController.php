<?php
namespace App\Controllers;

use Framework\Template\TemplateEngine;
use App\Models\ActivityModel;

class ActivityController extends BaseController
{
    public function showAllUserActivity()
    {
        $template = new TemplateEngine();
        // Create an instance of the ActivityModel
        $activityModel = new ActivityModel($this->db);

        // Fetch wallet data using the model's method
        $activities = $activityModel->getAllUserActivity();

        $contentPage = 'App/views/user/_history.php';
        $data = [
            'activities' => $activities,
            'userDetails' => $_SESSION['userDetails'],
        ];
        echo $template->render('App/views/user/_index.php', $contentPage ,$data);
    }

   
}