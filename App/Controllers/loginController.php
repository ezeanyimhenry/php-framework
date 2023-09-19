<?php
namespace App\Controllers;

use App\Controller\baseController;
use Framework\Classes\Utility;
use Framework\Validators\LoginValidator;

class LoginController extends baseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

    public function handleLogin()
    {
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
                    if ($this->userController->login($identifier, $password)) {
                        $user_id = $_SESSION['user_id'];

                        if (isset($_POST['remember_me']) && $_POST['remember_me'] === '1') {
                            $token = Utility::generateRandomToken();
                            $this->userModel->setRememberMeToken($user_id, $token);
                            Utility::setRememberMeCookie($token, $identifier);
                        } else {
                            $this->userModel->clearRememberMeToken($user_id);
                        }

                        Utility::redirect("/dashboard");
                    } else {
                        $loginError = "Login failed. Please check your credentials.";
                    }
                }
            }
        }
    }
}