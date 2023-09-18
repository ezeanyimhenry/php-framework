<?php 
namespace Framework\Validators;

class RegistrationValidator extends BaseValidator
{
    public static function validateRegistrationData($data)
    {
        $errors = [];

        $nameValidation = self::validateName($data['firstname']);
        if ($nameValidation !== true) {
            $errors['firstname'] = $nameValidation;
        }

        $nameValidation = self::validateName($data['lastname']);
        if ($nameValidation !== true) {
            $errors['lastname'] = $nameValidation;
        }

        $usernameValidation = self::validateUsername($data['username']);
        if ($usernameValidation !== true) {
            $errors['username'] = $usernameValidation;
        }

        $emailValidation = self::validateEmail($data['email']);
        if ($emailValidation !== true) {
            $errors['email'] = $emailValidation;
        }

        $passwordValidation = self::validatePassword($data['password']);
        if ($passwordValidation !== true) {
            $errors['password'] = $passwordValidation;
        }

        $passwordMatchValidation = self::passwordsMatch($data['password'], $data['confirm_password']);
        if ($passwordMatchValidation !== true) {
            $errors['confirm_password'] = $passwordMatchValidation;
        }

        return $errors;
    }
}
