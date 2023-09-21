<?php 
// Model.php

namespace App\Models;

class Model
{
    protected $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    protected function executeQuery($query, $params = [])
{
    $statement = $this->db->prepare($query);
    
    // Bind parameters if provided
    foreach ($params as $key => $value) {
        $paramName = is_string($key) ? $key : null;
        $paramValue = $value;
        
        // Bind the parameter if a name is provided, otherwise use positional binding
        if ($paramName !== null) {
            $statement->bindValue($paramName, $paramValue);
        } else {
            $statement->bindValue(++$key, $paramValue);
        }
    }
    
    // Execute the query
    $statement->execute();

    return $statement;
}


    // You can add more common database methods here
}
