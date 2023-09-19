<?php
namespace Framework\Classes;
use Framework\Classes\Utility;
class Account {
    private $db;
    private $user_id;

    public function __construct($dbConnection, $user_id) {
        $this->db = $dbConnection;
        $this->user_id = $user_id;
    }

    public function getAccountDetails()
    {
        try{
        $sql = "SELECT * FROM accounts WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->user_id]);
        $account = $stmt->fetch(\PDO::FETCH_ASSOC);

        // If no account is found, return a default value (e.g., an empty array)
        if (!$account) {
            return [];
        }
        return $account;
        } catch (\PDOException $e) {
            // Handle any database-related errors here
            // You can log the error, throw an exception, or return an error message
            // For simplicity, this example doesn't handle errors; it's recommended to handle them in your application
            return [
                'error' => true,
                'message' => 'An error occurred while fetching account details.',
            ];
        }
    }

    public function getBalance() {
        $sql = "SELECT balance FROM accounts WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->user_id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row ? $row['balance'] : 0;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $currentBalance = $this->getBalance();
            $newBalance = $currentBalance + $amount;

            $sql = "UPDATE accounts SET balance = ? WHERE user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$newBalance, $this->user_id]);

            return true;
        }

        return false;
    }

    public function withdraw($amount) {
        if ($amount > 0) {
            $currentBalance = $this->getBalance();
            if ($currentBalance >= $amount) {
                $newBalance = $currentBalance - $amount;

                $sql = "UPDATE accounts SET balance = ? WHERE user_id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$newBalance, $this->user_id]);

                return true;
            }
        }

        return false;
    }
}
