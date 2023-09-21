<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestmentModel;
use App\Models\PlanModel;
use App\Models\PlanTypeModel;
use App\Models\UserModel;
use Framework\Classes\Utility;

class InvestmentController extends BaseController
{
    private $dbConnection;
    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection);
        $this->dbConnection = $dbConnection;
    }

    public function showInvestForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['investButton'])) {
            $type = $_POST['type'];
            $investmentModel = new InvestmentModel($this->dbConnection);
            $investmentPlans = $investmentModel->getPlansByType($type);
            // var_dump($type);
            // die();
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
                $planModel = new PlanModel($this->dbConnection);

                // Fetch plan details using a method in your PlanModel
                $planDetails = $planModel->getPlanDetails($planName, $planType);

                // Check if plan details were found
                if ($planDetails) {
                    // Return the plan details as JSON
                    header('Content-Type: application/json');
                    echo json_encode($planDetails); // Return the plan details as JSON
                } else {
                    // Plan details not found, return an empty JSON object or an appropriate error response
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(['error' => 'Plan details not found']);
                }
            } catch (\PDOException $e) {
                // Handle database errors here, log the error, or return an error response
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(['error' => 'Internal server error']);
            }
        }
    }




    public function Invest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invest'])) {
        $userID = $_SESSION['user_id'];
        $amount = $_POST['amount'];
        $selected_plan = $_POST['plan_select'];
        $roi = $_POST['roi'];
        $duration = $_POST['duration'];
        $investmentModel = new InvestmentModel($this->dbConnection);
        $investmentModel->createInvestment($userID, $amount, $selected_plan, $roi, $duration);
        Utility::redirect("/wallet");
        exit();
        }

    }
}