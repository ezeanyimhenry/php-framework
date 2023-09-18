<?php

namespace Framework\Validators;

class BaseValidator
{
    public static function validateName($name)
    {
        if (strlen($name) >= 2 && preg_match("/^[A-Za-z\s]+$/", $name)) {
            return true; // Valid
        }
        return "Name must be at least 2 characters long and contain only letters.";
    }

    public static function validateUsername($username)
    {
        if (strlen($username) >= 4 && preg_match("/^[A-Za-z0-9_]+$/", $username)) {
            return true; // Valid
        }
        return "Username must be at least 4 characters long and contain only letters, numbers, and underscores.";
    }

    public static function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true; // Valid
        }
        return "Invalid email address.";
    }

    public static function validatePassword($password)
    {
        // Check if the password is at least 6 characters long
        if (strlen($password) < 6) {
            return "Password must be at least 6 characters long.";
        }

        // Check if the password contains at least 1 uppercase letter
        if (!preg_match("/[A-Z]/", $password)) {
            return "Password must contain at least 1 uppercase letter.";
        }

        // Check if the password contains at least 1 lowercase letter
        if (!preg_match("/[a-z]/", $password)) {
            return "Password must contain at least 1 lowercase letter.";
        }

        // Check if the password contains at least 1 digit
        if (!preg_match("/[0-9]/", $password)) {
            return "Password must contain at least 1 digit.";
        }

        // If all checks pass, the password is valid
        return true;
    }

    public static function passwordsMatch($password, $confirmPassword)
    {
        if ($password === $confirmPassword) {
            return true;
        }
        return "Passwords doesn't match";
    }
}
