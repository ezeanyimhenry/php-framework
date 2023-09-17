<?php
namespace Framework\Validators;

class BaseValidator
{
    public static function validateName($name)
    {
        return strlen($name) >= 2 && preg_match("/^[A-Za-z]+$/", $name);
    }

    public static function validateUsername($username)
    {
        return strlen($username) >= 4 && preg_match("/^[A-Za-z0-9_]+$/", $username);
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePassword($password)
    {
        return strlen($password) >= 6;
    }

    public static function passwordsMatch($password, $confirmPassword)
    {
        return $password === $confirmPassword;
    }
}
