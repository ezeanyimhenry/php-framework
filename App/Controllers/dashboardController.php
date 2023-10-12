<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use Framework\Template\TemplateEngine;

class DashboardController extends BaseController
{
   public function showDashboard()
    {
        $template = new TemplateEngine();
        $accountModel = new AccountModel($this->db);
        
        $accountBalance = $accountModel->getBalance();
        
        $data = [
            'accountBalance' => number_format($accountBalance),
            'userDetails' => $_SESSION['userDetails'],
        ];

        echo $template->render('user/_dashboar', $data);
    }
}
