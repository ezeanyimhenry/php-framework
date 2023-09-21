<?php

namespace App\Models;

use App\Models\Model;

class PlanModel extends Model
{

    public function getPlanDetails($planName, $planType)
    {
        try {
            $query = 'SELECT * FROM plans WHERE plan_name = :name AND plan_type = :type';

            $params = [
                ':name' => $planName,
                ':type' => $planType,
            ];

            // Call the executeQuery method with the query and parameters
            $statement = $this->executeQuery($query, $params);

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