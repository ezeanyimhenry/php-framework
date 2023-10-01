<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Helpers\Utility;

class UserController extends BaseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

  
    
    /**
     * isLoggedIn
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        Utility::redirect("/signin");
    }
    
}
