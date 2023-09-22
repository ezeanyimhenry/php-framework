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
                ':type' => $type,
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

    public function createInvestment($userId, $amount, $selected_plan, $roi, $duration, $status)
    {
        $investmentID = bin2hex(random_bytes(2));
        // Insert a new investment record into the database
        $stmt = $this->db->prepare('INSERT INTO investments (user_id, investment_id,amount, plan, percent, days_gone, days_left, status, create_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $stmt->execute([$userId, $investmentID, $amount, $selected_plan, $roi, '0', $duration, $status]);

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

    public function getActiveInvestments()
    {
        $query = 'SELECT * FROM investments WHERE status = :status and days_left > 0';
        $params = [
            ':status' => 'active',
        ];
        $statement = $this->executeQuery($query, $params);

        $investmentPlans = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $investmentPlans;
    }

    public function updateInvestment($investmentId, $amount, $type)
    {
        // Update an investment record in the database
        $stmt = $this->db->prepare('UPDATE investments SET amount = ?, type = ? WHERE id = ?');
        $stmt->execute([$amount, $type, $investmentId]);

        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }

    public function updateInvestmentEarning($investmentId, $newEarnings, $nextDate, $daysLeft, $daysPassed)
    {
        $daysLeft--;
        $daysPassed++;
        $query = "UPDATE investments SET earned = :newEarnings, next_date = :nextDate, days_gone = :daysPassed, days_left = :daysLeft WHERE investment_id = :investmentId";
        $params = [
            ':newEarnings' => $newEarnings,
            ':nextDate' => $nextDate,
            ':daysPassed' => $daysPassed,
            ':daysLeft' => $daysLeft,
            ':investmentId' => $investmentId,
        ];
        $statement = $this->executeQuery($query, $params);

        return $statement;
    }

    public function markInvestmentAsCompleted($investmentId, $userId, $retunAmount)
    {
        $accountModel = new AccountModel($this->db);
        $accountBalance = $accountModel->getBalance($userId);
        $newBalance = $accountBalance + $retunAmount;

        $query = "UPDATE investments SET earned = 0, status = 'completed' WHERE investment_id = :investmentId";
        $run = "INSERT INTO accounts (user_id, balance) VALUES (:user_id, :balance) ON DUPLICATE KEY UPDATE balance = :balance";

        $params = [
            ':investmentId' => $investmentId,
        ];

        $details = [
            ':user_id' => $userId,
            ':balance' => $newBalance
        ];

        $statement = $this->executeQuery($query, $params);
        $this->executeQuery($run, $details);

        return $statement;
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