<?php
namespace Framework\Classes;
use Framework\Classes\Utility;

class User
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
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
        $sql = "SELECT id, username, email, password FROM users WHERE username = ? OR email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
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

    public function setRememberMeToken($user_id, $token)
    {
        // Store the Remember Me token in the database for the user
        $sql = "UPDATE users SET remember_me_token = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$token, $user_id]);
    }

    public function clearRememberMeToken($user_id)
    {
        // Set the cookie's expiration date in the past to expire it
        setcookie('remember_me_cookie', '', time() - 3600, '/');

        // Clear the Remember Me token in the database for the user
        $sql = "UPDATE users SET remember_me_token = NULL WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
    }

    public function getUserDetails($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $user;
    }

    public function isEmailAssociatedWithActiveAccount($email)
{

    // Define the SQL query to check if the email is associated with an active account
    $query = "SELECT COUNT(*) FROM users WHERE email = :email AND status = 'active'";

    // Prepare the query
    $statement = $this->db->prepare($query);

    // Bind the email parameter
    $statement->bindParam(':email', $email, \PDO::PARAM_STR);

    // Execute the query
    $statement->execute();

    // Fetch the result (in this case, the count of matching rows)
    $result = $statement->fetchColumn();

    // Close the database connection
    $dbConnection = null;

    // If the result is greater than 0, it means the email is associated with an active account
    return $result > 0;
}

}