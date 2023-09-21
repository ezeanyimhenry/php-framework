<?php

namespace App\Models;

use App\Models\Model;

class ActivityModel extends Model
{

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