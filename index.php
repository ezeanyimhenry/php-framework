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

if (isset($routes[$request])) {
    $handler = $routes[$request];

    if (is_array($handler)) {
        if(isset($handler['middleware'], $handler['controller'], $handler['method'])){
            $middlewareClass = $handler['middleware'];
            $controllerClass = $handler['controller'];
            $method = $handler['method'];
    
            $middleware = new $middlewareClass();
            if ($middleware->isAuthenticated($dbConnection)) {
                $controller = new $controllerClass($dbConnection);
                $controller->$method();
            }
        }else{
            $controllerClass = $handler[0]; // Get the controller class
            $method = $handler[1]; // Get the method
        
            $controller = new $controllerClass($dbConnection);
            $controller->$method();
        }    
        
    }else {
        require __DIR__ . $handler;
    }
} else {
    http_response_code(404);
    require __DIR__ . '/App/views/_404.php';
}
