<?php
namespace App\Controllers;

use App\Controllers\UserController;
use App\Models\UserModel;

class BaseController
{
    protected $db;
    protected $userModel;
    protected $userController;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    protected function createUserModel()
    {
        return new UserModel($this->db);
    }

    protected function createUserController()
    {
        return new UserController($this->db);
    }
}