<?php
session_start();

require_once('autoload.php');
require_once('config.php');
require_once('Framework/Database/Database.php');

use Framework\Database\Database;

$database = new Database($dsn, $username, $password);
$dbConnection = $database->getConnection();

$routes = require 'Routes/web.php';

$request = $_SERVER['REQUEST_URI'];

$matched = false; // Initialize the flag as false

foreach ($routes as $pattern => $route) {
    // Replace '{id}' with '(\d+)' in the pattern
    $pattern = str_replace('{id}', '(\d+)', $pattern);

    if (preg_match("#^$pattern$#", $request, $matches)) {
        $handler = $route;

        if (is_array($handler)) {
            if (isset($handler['middleware'], $handler['controller'], $handler['method'])) {
                $middlewareClass = $handler['middleware'];
                $controllerClass = $handler['controller'];
                $method = $handler['method'];

                $middleware = new $middlewareClass();
                if ($middleware->isAuthenticated($dbConnection)) {
                    $controller = new $controllerClass($dbConnection);

                    // Check if there is a match for the '(\d+)' capture group
                    if (isset($matches[1])) {
                        // Extract the dynamic user ID from the matches
                        $userId = $matches[1];

                        // Call the controller method with the user ID
                        $controller->$method($userId);
                    } else {
                        // Handle normal routes here
                        $controller->$method();
                    }
                    $matched = true; // Set the flag to true when a route is matched
                }
            } else {
                $controllerClass = $handler[0]; // Get the controller class
                $method = $handler[1]; // Get the method

                $controller = new $controllerClass($dbConnection);
                $controller->$method();
                $matched = true; // Set the flag to true when a route is matched
            }
        } else {
            require __DIR__ . $handler;
            $matched = true; // Set the flag to true when a route is matched
        }
    }
}

// Check if no matching route was found
if (!$matched) {
    http_response_code(404);
    require __DIR__ . '/App/views/_404.php';
}


?>
