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
        // Display the signup form view
        // You can load your signup form HTML here
        include_once 'App/views/auth/_signup.php';
    }

    public function registerUser()
    {
        $userController = $this->createUserController();
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
                foreach ($validationErrors as $error) {
                    echo $error . "<br>";
                }
            } else {
                // No validation errors, proceed with registration
                $result = $userController->register($firstName, $lastName, $username, $email, $password, $confirmPassword);

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
                        echo 'Email sent successfully.';
                    } else {
                        echo 'Email sending failed.';
                    }

                    echo "Registration successful. " . $result['message'];
                } else {
                    // Registration failed
                    echo "Registration failed. " . $result['message'];
                }
            }
        }else{
            Utility::redirect("/signup");
        }
    }
}
