<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use App\Models\InvestmentModel;
use App\Models\UserModel;

class CronController extends BaseController
{

    public function processDailyInvestmentEarnings()
    {
        $investmentModel = new InvestmentModel($this->db);
        $activityModel = new ActivityModel($this->db);
        $userModel = new UserModel($this->db);

        $activeInvestments = $investmentModel->getActiveInvestments();


        // Loop through active investments and calculate earnings
        foreach ($activeInvestments as $investment) {
            $userId = $investment['user_id'];
            $user = $userModel->getUserById($userId);
            $investmentId = $investment['investment_id'];
            $nextDate = $investment['next_date'];
            $daysPassed = $investment['days_gone'];
            $daysLeft = $investment['days_left'];
            $investmentAmount = $investment['amount'];
            $roi = $investment['percent'];
            $earned = $investment['earned'];
            $earnings = $investmentAmount * ($roi / 100);
            $newEarnings = $earned + $earnings;
            $description = "Earnings from Investment - " . strtoupper($investmentId);


            // Current timestamp
            date_default_timezone_set($user['timezone']);
            $currentTimestamp = date('Y-m-d H:00:00');


            if ($daysLeft > 1 && $currentTimestamp == $nextDate) {

                $nextDate = date('Y-m-d H:00:00', time() + 24 * 60 * 60);
                // Add earnings
                $investmentModel->updateInvestmentEarning($investmentId, $newEarnings, $nextDate, $daysLeft, $daysPassed);
                $activityModel->addActivity("Earned", $earnings, "USD", "$description", "active");

            } elseif ($daysLeft == 1 && $currentTimestamp == $nextDate) {

                $nextDate = date('Y-m-d H:00:00', time() + 24 * 60 * 60);
                $retunAmount = $newEarnings + $investmentAmount;

                $investmentModel->updateInvestmentEarning($investmentId, $newEarnings, $nextDate, $daysLeft, $daysPassed);
                $activityModel->addActivity("Earned", $earnings, "USD", "$description", "active");
                $investmentModel->markInvestmentAsCompleted($investmentId, $userId, $retunAmount);
            }
        }
    }

}