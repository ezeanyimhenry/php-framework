<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Framework\Classes\Utility;

class UserController extends BaseController
{
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
    }

    public function register($firstName, $lastName, $username, $email, $password, $confirmPassword)
    {

        if ($password !== $confirmPassword) {
            return [
                'success' => false,
                'message' => "Password and Confirm Password do not match. Please try again."
            ];
        }
        // Check if the email or username already exists
        $sql = "SELECT COUNT(*) FROM users WHERE email = ? OR username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email, $username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return [
                'success' => false,
                'message' => "Email or username already exists. Please choose a different one."
            ];
        }
        // Proceed with user registration
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstName, lastName, username, email, password, create_time) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute([$firstName, $lastName, $username, $email, $hashedPassword])) {
            return [
                'success' => true,
                'message' => "Registration successful."
            ];
        } else {
            return [
                'success' => false,
                'message' => "Registration failed. Please try again later."
            ];
        }


    }

    public function login($identifier, $password)
    {
        $sql = "SELECT id, username, email, password, role FROM users WHERE username = ? OR email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }

        return false;
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function logout()
    {
        session_destroy();
        Utility::redirect("/signin");
    }
    
}
