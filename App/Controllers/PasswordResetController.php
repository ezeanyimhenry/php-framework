<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PasswordResetModel;
use Framework\Classes\View;

class PasswordResetController extends BaseController
{
    public function showForgotPasswordForm()
    {
        // Display the forgot password form view
        include_once 'App/views/auth/_forgot-password.php';
    }

    public function sendPasswordResetEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Validate the email address submitted in the form
        $email = $_POST['email'];

        // Check if the email exists in the database
        $userModel = new UserModel($this->db);
        $user = $userModel->getUserByEmail($email);

        if ($user) {
            // Generate a reset token and send a password reset email
            $token = bin2hex(random_bytes(3)); // Generate a random token
            $resetModel = new PasswordResetModel($this->db);
            $resetModel->createResetToken($user['id'], $token);

            // Send the password reset email
            $resetModel->sendPasswordResetEmail($email, $token);

            // Display a success message
            $success = "Password reset email sent successfully";
            include_once 'App/views/auth/_forgot-password.php';
            // return View::render('password_reset_email_sent');
        } else {
            // Display an error message (email not found)
            $error = "User Email not found";
            include_once 'App/views/auth/_forgot-password.php';
        }
    }
    }

    public function showResetPasswordForm()
    {
        // Display the password reset form view
        include_once 'App/views/auth/_reset-password.php';
    }

    public function resetPassword()
    {
        // Validate the token and email, then update the password
        $email = $_POST['email'];
        $token = $_POST['token'];
        $newPassword = $_POST['new_password'];

        $resetModel = new PasswordResetModel($this->db);

        if ($resetModel->validateResetToken($email, $token)) {
            // Update the user's password
            $userModel = new UserModel($this->db);
            // $userModel->updatePasswordByEmail($email, $newPassword);

            // Display a success message
            // return View::render('password_reset_success');
        } else {
            // Display an error message (invalid token or email)
            // return View::render('password_reset_error');
        }
    }

    
}
