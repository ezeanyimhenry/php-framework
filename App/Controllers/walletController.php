<?php
// WalletController.php

namespace App\Controllers;

use App\Models\WalletModel;
use Framework\Classes\View;

class WalletController extends BaseController
{
    public function showWallets()
    {
        // Create an instance of the WalletModel
        $walletModel = new WalletModel($this->db);

        // Fetch wallet data using the model's method
        $wallets = $walletModel->getAllWallets();

        $contentPage = 'App/views/user/_wallets.php';
        include_once 'App/views/user/_index.php';
    }

    public function showWalletDetails()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get the raw input data
                $inputData = file_get_contents("php://input");

                // Decode the JSON data into an associative array
                $data = json_decode($inputData, true);

                // Now, you can access the data in the $data array
                $currency = $data['currency'];

                // Create an instance of the WalletModel
                $walletModel = new WalletModel($this->db);

                // Fetch wallet data using the model's method
                $wallets = $walletModel->getAllWalletsByCurrency($currency);

                // Check if wallet details were found
                if ($wallets) {
                    // Return the wallet details as JSON
                    header('Content-Type: application/json');
                    echo json_encode($wallets); // Return the wallet details as JSON
                } else {
                    // wallet details not found, return an empty JSON object or an appropriate error response
                    header('HTTP/1.1 404 Not Found');
                    echo json_encode(['error' => 'Wallet details not found']);
                }
            } catch (\PDOException $e) {
                // Handle database errors here, log the error, or return an error response
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(['error' => 'Internal server error']);
            }

        }
    }
}