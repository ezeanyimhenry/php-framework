<?php

namespace App\Models;

use App\Models\Model;

class AccountModel extends Model
{

    public function getBalance($userID = null) {
        if ($userID === null) {$userID = $_SESSION['user_id'];}
        $query = "SELECT balance FROM accounts WHERE user_id = :user_id";
        
        $params = [
            ':user_id' => $userID
        ];
        
        $statement = $this->executeQuery($query, $params);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row ? $row['balance'] : 0;
    }

    public function getAllUserActivity(){
        try {
            $query = 'SELECT * FROM activities WHERE user_id = :userID ORDER BY create_time DESC';

            $params = [
                ':userID' => $_SESSION['user_id'],
            ];

            // Call the executeQuery method with the query and parameters
            $statement = $this->executeQuery($query, $params);

            // Fetch all plan types as an associative array
            $activities = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $activities;
        } catch (\PDOException $e) {
            // Handle any database errors here
            // For example, log the error or return an empty array
            return [];
        }
    }

    public function getActivitiesByType($activityType)
    {
        try {
            $query = 'SELECT * FROM activities WHERE activity_type = :activity';

            $params = [
                ':name' => $activityType,
            ];

            // Call the executeQuery method with the query and parameters
            $statement = $this->executeQuery($query, $params);

            // Fetch all plan types as an associative array
            $activities = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $activities;
        } catch (\PDOException $e) {
            // Handle any database errors here
            // For example, log the error or return an empty array
            return [];
        }
    }

    public function addActivity($activityType, $amount, $fiat, $description, $status)
    {
        try {
            $query = 'INSERT into activities (user_id, activity_type, amount, fiat, description, status, create_time) VALUES (:userID, :activity, :amount, :fiat, :description, :status, NOW())';

            $params = [
                ':userID' => $_SESSION['user_id'],
                ':activity' => $activityType,
                ':amount' => $amount,
                ':fiat' => $fiat,
                ':description' => $description,
                ':status' => $status,
            ];

            // Call the executeQuery method with the query and parameters
            $statement = $this->executeQuery($query, $params);

            // Fetch all plan types as an associative array
            // $activity = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            // Handle any database errors here
            // For example, log the error or return an empty array
            return [];
        }
    }

    
}