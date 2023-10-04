<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use App\Models\InvestmentModel;
use App\Models\PlanModel;
use Framework\Exceptions\FrameworkException;
use Framework\Exceptions\DatabaseException;
use Framework\Exceptions\NotFoundException;
use Framework\Helpers\Utility;

class InvestmentController extends BaseController
{
    public function showInvestForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['investButton'])) {
            $type = $_POST['type'];
            $investmentModel = new InvestmentModel($this->db);
            $investmentPlans = $investmentModel->getPlansByType($type);
            $contentPage = 'App/views/user/_invest.php';
            include_once 'App/views/user/_index.php';
        } else {
            Utility::redirect("/dashboard");
        }
    }

    public function fetchPlanDetails()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get the raw input data
                $inputData = file_get_contents("php://input");

                // Decode the JSON data into an associative array
                $data = json_decode($inputData, true);

                // Now, you can access the data in the $data array
                $planName = $data['planName'];
                $planType = $data['planType'];
                // Create an instance of the PlanModel
                $planModel = new PlanModel($this->db);

                // Fetch plan details using a method in your PlanModel
                $planDetails = $planModel->getPlanDetails($planName, $planType);

                // Check if plan details were found
                if ($planDetails) {
                    // Return the plan details as JSON
                    header('Content-Type: application/json');
                    echo json_encode($planDetails); // Return the plan details as JSON
                } else {
                    // Plan details not found, throw a NotFoundException
                    throw new NotFoundException('Plan details not found');
                }
            } catch (\PDOException $e) {
                // Handle database errors by throwing a DatabaseException
                throw new DatabaseException('Internal server error');
            }
        }
    }

    public function Invest()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invest'])) {
                $userID = $_SESSION['user_id'];
                $amount = $_POST['amount'];
                $selected_plan = $_POST['plan_select'];
                $roi = $_POST['roi'];
                $duration = $_POST['duration'];
                $source = $_POST['source'];
                $investmentModel = new InvestmentModel($this->db);
                $activityModel = new ActivityModel($this->db);

                if (!is_numeric($amount) || $amount <= 0) {
                    // Throw a FrameworkException for invalid investment amount
                    throw new FrameworkException(422, 'Invalid investment amount');
                }

                if ($source === 'new_deposit') {
                    $investmentModel->createInvestment($userID, $amount, $selected_plan, $roi, $duration, 'pending');
                    $activityModel->addActivity('Investment', $amount, 'USD', 'Invested From New Deposit', 'pending');
                    Utility::redirect("/wallet");
                } else {
                    $investmentModel->createInvestment($userID, $amount, $selected_plan, $roi, $duration, 'active');
                    $activityModel->addActivity('Investment', $amount, 'USD', 'Invested From Balance', 'active');
                    Utility::redirect("/history");
                }
                exit();
            }
        } catch (FrameworkException $e) {
            // The CustomException is caught here
            // You can log the error, return a response, or redirect as needed
            $response = [
                'status' => 'error',
                'status code' => $e->getStatusCode(),
                'message' => $e->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
}
