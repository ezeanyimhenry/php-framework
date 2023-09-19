<?php 
namespace App\Controller;
use App\Controllers\UserController;
use App\Models\UserModel;

class baseController
{
    protected $db;
    protected $userModel;
    protected $userController;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
        $this->userModel = new UserModel($dbConnection);
        $this->userController = new UserController($dbConnection);
    }
}
