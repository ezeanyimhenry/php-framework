<?php
namespace Framework\Validators;

class RegistrationValidator extends BaseValidator
{
    public static function validateRegistrationData($data)
    {
        $errors = [];

        if (!self::validateName($data['firstname'])) {
            $errors[] = "Invalid first name.";
        }

        if (!self::validateName($data['lastname'])) {
            $errors[] = "Invalid last name.";
        }

        if (!self::validateUsername($data['username'])) {
            $errors[] = "Invalid username.";
        }

        if (!self::validateEmail($data['email'])) {
            $errors[] = "Invalid email address.";
        }

        if (!self::validatePassword($data['password'])) {
            $errors[] = "Invalid password.";
        }

        if (!self::passwordsMatch($data['password'], $data['confirm_password'])) {
            $errors[] = "Passwords do not match.";
        }

        return $errors;
    }
}
