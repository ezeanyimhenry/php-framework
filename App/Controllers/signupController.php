<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Classes\Utility;
use Framework\Validators\RegistrationValidator;

class SignupController extends BaseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

    public function showSignupForm()
    {
        include_once 'App/views/auth/_signup.php';
    }

    public function registerUser()
    {
        $userModel = $this->createUserModel();
        if (isset($_POST['register'])) {

            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Validate the registration data using the RegistrationValidator class
            $validationErrors = RegistrationValidator::validateRegistrationData($_POST);

            // Check if there are validation errors
            if (!empty($validationErrors)) {
                foreach ($validationErrors as $fieldName => $error) {
                    $_SESSION[$fieldName.'-error'] = $error;
                }
                Utility::redirect('/signup');
            } else {
                // No validation errors, proceed with registration
                $result = $userModel->register($firstName, $lastName, $username, $email, $password, $confirmPassword);

                if ($result['success']) {
                    // Registration successful
                    $recipient = $email;
                    $subject = 'Registration Successful';
                    $templateName = 'auth';

                    // Define variables to populate in the template
                    $templateVariables = [
                        'websiteName' => WEBSITE_NAME,
                        'websiteURL' => WEBSITE_URL,
                        'emailTitle' => $subject,
                        'recipientName' => $firstName,
                        'body' => 'Thank you for registering with us.',
                        // Add more variables as needed
                    ];

                    if (Utility::sendEmail($recipient, $subject, $templateName, $templateVariables)) {
                        $_SESSION['success'] = 'Email sent successfully.';
                    } else {
                        $_SESSION['error'] = 'Email sending failed.';
                    }

                    $_SESSION['success'] = "Registration successful. " . $result['message'];
                } else {
                    // Registration failed
                    $_SESSION['error'] = "Registration failed. " . $result['message'];
                }
                Utility::redirect("/signup");
            }
        }else{
            Utility::redirect("/signup");
        }
    }
}
