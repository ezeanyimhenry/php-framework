<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PasswordResetModel;
use Framework\Classes\Utility;
use Framework\Classes\View;
use Framework\Validators\BaseValidator;

class PasswordResetController extends BaseController
{
    public function showForgotPasswordForm()
    {
        // Display the forgot password form view
        include_once 'App/views/auth/_forgot-password.php';
    }

    public function PasswordResetEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get the raw input data
                $inputData = file_get_contents("php://input");

                // Decode the JSON data into an associative array
                $data = json_decode($inputData, true);

                // Now, you can access the data in the $data array
                $email = $data['email'];

                $userModel = new UserModel($this->db);
                $user = $userModel->getUserByEmail($email);

                // Check if plan details were found
                if ($user) {
                    $token = bin2hex(random_bytes(3)); // Generate a random token
                    $resetModel = new PasswordResetModel($this->db);
                    $resetModel->createResetToken($user['id'], $token);
                    // Send the password reset email
                    $resetModel->sendPasswordResetEmail($email, $token);

                    header('Content-Type: application/json');
                    echo json_encode(['success' => 'OTP sent to your email']);
                } else {
                    // User email not found, return an empty JSON object or an appropriate error response
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'Email not found']);
                }
            } catch (\PDOException $e) {
                // Handle database errors here, log the error, or return an error response
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(['error' => 'Internal server error']);
            }



        }
    }

    public function verifyToken()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $inputData = file_get_contents("php://input");
                $data = json_decode($inputData, true);

                // Now, you can access the data in the $data array
                $email = $data['email'];
                $token = $data['token'];

                $resetModel = new PasswordResetModel($this->db);
                if ($resetModel->validateResetToken($email, $token)) {
                    header('Content-Type: application/json');
                    echo json_encode(['success' => 'Token is Valid']);
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'Token is inalid']);
                }


            } catch (\PDOException $e) {
                // Handle database errors here, log the error, or return an error response
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(['error' => 'Internal server error']);
            }
        }
    }

    public function showResetPasswordForm()
    {
        include_once "App/views/auth/_reset-password.php";
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {

            if (!isset($_COOKIE['token'])) {
                //token expired or invalid token
                $_SESSION['error'] = "Invalid or Expired token";
            } else {
                $email = $_COOKIE['email'];
                $token = $_COOKIE['token'];
                $newPassword = $_POST['new_password'];


                $resetModel = new PasswordResetModel($this->db);
                if (!$resetModel->validateResetToken($email, $token)) {
                    //invalid token
                } else {
                    $validationErrors = BaseValidator::validatePassword($newPassword);
                    error_log($validationErrors);
                    if ($validationErrors != true) {
                            $_SESSION['error'] = $validationErrors;
                            Utility::redirect("/reset-password");
                    } else {
                    $userModel = new UserModel($this->db);
                    $result = $userModel->updatePasswordByEmail($email, $newPassword);
                    if ($result > 0) {
                        // Password updated successfully
                        $_SESSION['success'] = "Password updated successfully";
                        Utility::redirect("/signin");
                    } else {
                        // Password update failed
                        $_SESSION['error'] = 'Password update failed';
                    }
                }
                }
            

            }
            // Utility::redirect("/forgot-password");

        }

    }


}