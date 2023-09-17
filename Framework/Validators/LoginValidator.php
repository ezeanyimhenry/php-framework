<?php
namespace Framework\Validators;
use Framework\Classes\User;

class LoginValidator extends BaseValidator
{
    public static function validateLoginData($dbConnection, $data)
    {
        $errors = [];

        $usernameOrEmail = $data['identifier'];
        $password = $data['password'];

        if (empty($usernameOrEmail)) {
            $errors[] = "Username or email is required.";
        }

        if (empty($password)) {
            $errors[] = "Password is required.";
        }

        if (empty($errors)) {
            // Check if the input is in email format
            if (self::validateEmail($usernameOrEmail)) {
                // This is an email, you can perform email-specific checks

                // Create an instance of the User class with your PDO connection
                $user = new User($dbConnection); // Replace with your actual PDO connection

                // Use the User class's method to check if the email is associated with an active account
                if (!$user->isEmailAssociatedWithActiveAccount($usernameOrEmail)) {
                    $errors[] = "The provided email is not associated with an active account.";
                }
            } else {
                // This is not an email, treat it as a username
                if (!self::validateUsername($usernameOrEmail)) {
                    $errors[] = "Invalid username format.";
                }
                // Additional checks if needed for usernames
            }

            // Additional checks if needed, e.g., verifying credentials in the database
        }

        return $errors;
    }
}
