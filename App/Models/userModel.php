<?php
namespace App\Models;
use Framework\Classes\Utility;

use App\Models\Model;

class UserModel extends Model
{

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

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

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

    public function findUserByToken($token)
    {
        $sql = "SELECT * FROM users WHERE remember_me_token = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    
}
