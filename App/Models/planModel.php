<?php

namespace App\Models;

class PlanModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getPlanDetails($planName, $planType)
    {
        try {
            $query = 'SELECT * FROM plans WHERE plan_name = :name AND plan_type = :type';
            $statement = $this->db->prepare($query);
            $statement->bindParam(':name', $planName, \PDO::PARAM_STR);
            $statement->bindParam(':type', $planType, \PDO::PARAM_STR);
            $statement->execute();
            
            // Fetch all plan types as an associative array
            $planTypes = $statement->fetchAll(\PDO::FETCH_ASSOC);
            
            return $planTypes;
        } catch (\PDOException $e) {
            // Handle any database errors here
            // For example, log the error or return an empty array
            return [];
        }
    }
}
