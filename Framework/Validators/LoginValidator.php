<?php
namespace Framework\Validators;
use Framework\Classes\User;

class LoginValidator extends BaseValidator
{
    public static function validateLoginData($dbConnection, $data)
    {
        $errors = [];
        // Create an instance of the User class with your PDO connection
        $user = new User($dbConnection); 

        // Check if 'identifier' is provided
        if (!isset($data['identifier']) || empty($data['identifier'])) {
            $errors['identifier'] = "Please enter your username or email.";
        } else {
            // Determine whether 'identifier' is a username or an email
            if (self::validateEmail($data['identifier'])!== true) {
                // 'identifier' is a username, validate it

                // Use the User class's method to check if the username is associated with an active account
                if (!$user->isUsernameAssociatedWithActiveAccount($data['identifier'])) {
                    $errors[] = "The provided username is not associated with an active account.";
                }
            } else {
                // 'identifier' is an email,

                // Use the User class's method to check if the email is associated with an active account
                if (!$user->isEmailAssociatedWithActiveAccount($data['identifier'])) {
                    $errors[] = "The provided email is not associated with an active account.";
                }
            }
        }

        return $errors;
    }

}
