<?php

namespace App\Models;

class PlanTypeModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getPlanTypes()
    {
        try {
            $query = 'SELECT * FROM plan_types';
            $statement = $this->db->prepare($query);
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
