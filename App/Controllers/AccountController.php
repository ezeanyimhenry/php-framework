<?php
namespace Framework\Controllers;

use App\Controllers\BaseController;
class AccountController extends BaseController
{
    
    

    // public function deposit($amount) {
    //     if ($amount > 0) {
    //         $currentBalance = $this->getBalance();
    //         $newBalance = $currentBalance + $amount;

    //         $sql = "UPDATE accounts SET balance = ? WHERE user_id = ?";
    //         $stmt = $this->db->prepare($sql);
    //         $stmt->execute([$newBalance, $this->user_id]);

    //         return true;
    //     }

    //     return false;
    // }

    // public function withdraw($amount) {
    //     if ($amount > 0) {
    //         $currentBalance = $this->getBalance();
    //         if ($currentBalance >= $amount) {
    //             $newBalance = $currentBalance - $amount;

    //             $sql = "UPDATE accounts SET balance = ? WHERE user_id = ?";
    //             $stmt = $this->db->prepare($sql);
    //             $stmt->execute([$newBalance, $this->user_id]);

    //             return true;
    //         }
    //     }

    //     return false;
    // }
}
