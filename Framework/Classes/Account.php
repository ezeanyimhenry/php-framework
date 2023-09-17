<?php
class Account {
    private $db;
    private $user_id;

    public function __construct($dbConnection, $user_id) {
        $this->db = $dbConnection;
        $this->user_id = $user_id;
    }

    public function getBalance() {
        $sql = "SELECT balance FROM accounts WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
