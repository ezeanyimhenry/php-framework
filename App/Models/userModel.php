<?php
namespace App\Models;
use Framework\Classes\Utility;

use App\Models\Model;

class UserModel extends Model
{
    
    /**
     * getUserById
     *
     * @param  mixed $userId
     * @return void
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
     * @return void
     */
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
    
    /**
     * setRememberMeToken
     *
     * @param  mixed $user_id
     * @param  mixed $token
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
