<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Classes\Utility;
use Framework\Validators\LoginValidator;

class LoginController extends BaseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

    public function showLoginForm()
    {
        // Display the signup form view
        // You can load your signup form HTML here
        include_once 'App/views/auth/_signin.php';
    }

    public function handleLogin()
    {
        $userModel = $this->createUserModel();
        $userController = $this->createUserController();
        // Check if there is a valid "Remember Me" token and password hash
        $rememberMeData = Utility::checkRememberMeCookie($this->db);

        if ($rememberMeData !== null) {
            Utility::redirect('/dashboard');
        } else {
            // Proceed with the regular login process
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                $identifier = $_POST['identifier']; // This should be either the email or username entered by the user
                $password = $_POST['password'];

                $validationErrors = LoginValidator::validateLoginData($this->db, $_POST);

                if (!empty($validationErrors)) {
                    foreach ($validationErrors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    if ($userController->login($identifier, $password)) {
                        $user_id = $_SESSION['user_id'];

                        if (isset($_POST['remember_me']) && $_POST['remember_me'] === '1') {
                            $token = Utility::generateRandomToken();
                            $userModel->setRememberMeToken($user_id, $token);
                            Utility::setRememberMeCookie($token, $identifier);
                        } else {
                            $userModel->clearRememberMeToken($user_id);
                        }

                        Utility::redirect("/dashboard");
                    } else {
                        $loginError = "Login failed. Please check your credentials.";
                    }
                }
            }else{
                Utility::redirect("/signin");
            }
        }
    }
}