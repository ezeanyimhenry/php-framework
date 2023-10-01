<?php
namespace App\Models;

use Framework\Helpers\Utility;
use PDO;

class PasswordResetModel extends Model
{
    public function createResetToken($userId, $token)
    {
        // Create a new password reset token record in the database
        $query = "INSERT INTO password_resets (user_id, token, created_at) VALUES (:user_id, :token, NOW())";
        $params = [':user_id' => $userId, ':token' => $token];

        $this->executeQuery($query, $params);
    }

    public function sendPasswordResetEmail($email, $token)
    {
        $subject = "Reset Password";
        $templateVariables = [
            'websiteName' => WEBSITE_NAME,
            'websiteURL' => WEBSITE_URL,
            'emailTitle' => $subject,
            'token' => $token,
            // Add more variables as needed
        ];
        Utility::sendEmail($email,$subject,'reset', $templateVariables);
    }

    public function validateResetToken($email, $token)
    {
        // Check if the provided email and token combination is valid
        $query = "SELECT * FROM password_resets pr
                  INNER JOIN users u ON pr.user_id = u.id
                  WHERE u.email = :email AND pr.token = :token
                  AND TIMESTAMPDIFF(HOUR, pr.created_at, NOW()) <= :token_expiration_hours";

        $params = [
            ':email' => $email,
            ':token' => $token,
            ':token_expiration_hours' => 24, // Adjust the token expiration as needed
        ];

        $statement = $this->executeQuery($query, $params);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true; // Valid token
        }

        return false; // Invalid token or expired
    }

    public function deleteResetToken($email)
    {
        // Delete the password reset token record after it has been used
        $query = "DELETE FROM password_resets WHERE user_id = (SELECT id FROM users WHERE email = :email)";
        $params = [':email' => $email];

        $this->executeQuery($query, $params);
    }
}
