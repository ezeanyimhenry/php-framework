<?php
// WalletModel.php

namespace App\Models;

use App\Models\Model;

class WalletModel extends Model
{
    public function getAllWallets()
    {
        $query = 'SELECT * FROM wallets';

        $statement = $this->executeQuery($query);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllWalletsByCurrency($currency)
    {
        $query = 'SELECT * FROM wallets WHERE currency = :currency';
        $params = [':currency' => $currency];

        $statement = $this->executeQuery($query, $params);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    // You can add more wallet-specific methods here
}
