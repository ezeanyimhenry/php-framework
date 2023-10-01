<?php
namespace App\Models;
use Framework\Classes\Utility;

use App\Models\Model;

class UserModel extends Model
{
    
    /**
     * register
     *
     * @param  mixed $firstName
     * @param  mixed $lastName
     * @param  mixed $username
     * @param  mixed $email
     * @param  mixed $password
     * @param  mixed $confirmPassword
     * @return array|null
     */
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
        $userTimezone = Utility::getUserInfo()['user_timezone'];
        $sql = "INSERT INTO users (firstName, lastName, username, email, password, timezone, create_time) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute([$firstName, $lastName, $username, $email, $hashedPassword, $userTimezone])) {
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
    
    /**
     * login
     *
     * @param  mixed $identifier
     * @param  mixed $password
     * @return bool
     */
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
    
    /**
     * isLoggedIn
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        Utility::redirect("/signin");
    }
    
    /**
     * getUserById
     *
     * @param  mixed $userId
     * @return array|null
     */
    public function getUserById($userId)
    {
        $query = "SELECT * FROM users WHERE id = :userId";
        
        $params = [
            ':userId' => $userId, 
        ];

        // Call the executeQuery method with the query and parameters
        $statement = $this->executeQuery($query, $params);
        
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    
    /**
     * getUserByEmail
     *
     * @param  mixed $email
     * @return array|null
     */
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    /**
     * isEmailAssociatedWithActiveAccount
     *
     * @param  mixed $email
     * @return bool
     */
    public function isEmailAssociatedWithActiveAccount($email)
    {
        // Define the SQL query to check if the email is associated with an active account
        $query = "SELECT COUNT(*) FROM users WHERE email = :email AND is_active = 1";
    
        // Prepare the query
        $statement = $this->db->prepare($query);
    
        // Bind the email parameter
        $statement->bindParam(':email', $email, \PDO::PARAM_STR);
    
        // Execute the query
        $statement->execute();
    
        // Fetch the result (in this case, the count of matching rows)
        $result = $statement->fetchColumn();
    
        // Close the database connection
        $this->db = null;
    
        // If the result is greater than 0, it means the email is associated with an active account
        return $result > 0;
    }
        
    /**
     * isUsernameAssociatedWithActiveAccount
     *
     * @param  mixed $username
     * @return bool
     */
    public function isUsernameAssociatedWithActiveAccount($username)
    {
        // Define the SQL query to check if the username is associated with an active account
        $query = "SELECT COUNT(*) FROM users WHERE username = :username AND is_active = 1";
    
        // Prepare the query
        $statement = $this->db->prepare($query);
    
        // Bind the username parameter
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
    
        // Execute the query
        $statement->execute();
    
        // Fetch the result (in this case, the count of matching rows)
        $result = $statement->fetchColumn();
    
        // Close the database connection
        $this->db = null;
    
        // If the result is greater than 0, it means the username is associated with an active account
        return $result > 0;
    }
    
    /**
     * setRememberMeToken
     *
     * @param  mixed $user_id
     * @param  mixed $token
     * @return array|null
     */
    public function setRememberMeToken($user_id, $token)
    {
        // Store the Remember Me token in the database for the user
        $sql = "UPDATE users SET remember_me_token = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$token, $user_id]);
    }
    
    /**
     * clearRememberMeToken
     *
     * @param  mixed $user_id
     * @return void
     */
    public function clearRememberMeToken($user_id)
    {
        // Set the cookie's expiration date in the past to expire it
        setcookie('remember_me_cookie', '', time() - 3600, '/');

        // Clear the Remember Me token in the database for the user
        $sql = "UPDATE users SET remember_me_token = NULL WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
    }
    
    /**
     * findUserByToken
     *
     * @param  mixed $token
     * @return array|null
     */
    public function findUserByToken($token)
    {
        $sql = "SELECT * FROM users WHERE remember_me_token = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    /**
     * updatePasswordByEmail
     *
     * @param  mixed $email
     * @param  mixed $newPassword
     * @return array|null
     */
    public function updatePasswordByEmail($email, $newPassword)
    {
        // Generate a new password hash
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = :password WHERE email = :email";

        $params = [
            ':password' => $hashedPassword,
            ':email' => $email,
        ];

        // Execute the update query
        $statement = $this->executeQuery($query, $params);

        return $statement->rowCount(); // Return the number of affected rows
    }
    
    /**
     * updateProfile
     *
     * @param  mixed $user_id
     * @param  mixed $profileData
     * @return array|null
     */
    public function updateProfile ($user_id, $profileData)
    {

        $query = "UPDATE users SET firstName = :first_name, lastName = :last_name, timezone= :timezone WHERE id= :userID";

        $params = [
            ':userID' => $user_id,
            ':first_name' => $profileData['firstname'],
            ':last_name' => $profileData['lastname'],
            ':timezone' => $profileData['timezone'],
        ];
        $statement = $this->executeQuery($query, $params);

        return $statement->rowCount(); 

    }


    
}
