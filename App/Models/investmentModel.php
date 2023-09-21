<?php

namespace App\Models;

use App\Models\Model;

class InvestmentModel extends Model
{

    public function getPlans()
    {
        try {
            $query = 'SELECT * FROM plans';
            $statement = $this->executeQuery($query);

            // Fetch all plan types as an associative array
            $planTypes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $planTypes;
        } catch (\PDOException $e) {
            // Handle any database errors here
            // For example, log the error or return an empty array
            return [];
        }
    }
    public function getPlansByType($type)
    {
        try {
            // Prepare the SQL query
            $query = "SELECT * FROM plans WHERE plan_type = :type";

            // Bind the parameter using its name and value
            $params = [
                ['name' => ':type', 'value' => $type],
            ];

            // Call the executeQuery method with the query and parameters
            $statement = $this->executeQuery($query, $params);

            // Fetch all rows as an associative array
            $investmentPlans = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $investmentPlans;
        } catch (\PDOException $e) {
            // Handle database errors, e.g., log or display an error message
            die("Database error: " . $e->getMessage());
        }
    }

    public function createInvestment($userId, $amount, $selected_plan, $roi, $duration)
    {
        $investmentID = bin2hex(random_bytes(2));
        // Insert a new investment record into the database
        $stmt = $this->db->prepare('INSERT INTO investments (user_id, investment_id,amount, plan, percent, days_gone, days_left, create_time) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $stmt->execute([$userId, $investmentID, $amount, $selected_plan, $roi, '0', $duration]);

        // Return the ID of the newly created investment
        return $this->db->lastInsertId();
    }

    public function getInvestment($investmentId)
    {
        // Retrieve an investment record by ID from the database
        $stmt = $this->db->prepare('SELECT * FROM investments WHERE id = ?');
        $stmt->execute([$investmentId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateInvestment($investmentId, $amount, $type)
    {
        // Update an investment record in the database
        $stmt = $this->db->prepare('UPDATE investments SET amount = ?, type = ? WHERE id = ?');
        $stmt->execute([$amount, $type, $investmentId]);

        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }

    public function deleteInvestment($investmentId)
    {
        // Delete an investment record from the database
        $stmt = $this->db->prepare('DELETE FROM investments WHERE id = ?');
        $stmt->execute([$investmentId]);

        // Check if the deletion was successful
        return $stmt->rowCount() > 0;
    }

}