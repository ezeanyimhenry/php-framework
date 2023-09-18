<?php
use Framework\Database\Database;
use Framework\Middleware\AuthMiddleware;

session_start();

require_once('autoload.php');
require_once('config.php');

// Create an instance of the DatabaseConnection class
$database = new Database($dsn, $username, $password);

// Get the database connection
$dbConnection = $database->getConnection();

// Use $dbConnection for database operations

$request = $_SERVER['REQUEST_URI'];
$authMiddleware = new AuthMiddleware();

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/App/views/_index.php';
        break;

    case '/signin':
        require __DIR__ . '/App/views/auth/_signin.php';
        break;

    case '/signup':
        require __DIR__ . '/App/views/auth/_signup.php';
        break;

    case '/dashboard':
    case '/logout':
        $authMiddleware->isAuthenticated($dbConnection);

        if ($request === '/dashboard') {
            $contentPage = __DIR__ . '/App/views/user/_dashboard.php';
            require __DIR__ . '/App/views/user/_index.php';
        } elseif ($request === '/logout') {
            require __DIR__ . '/App/views/user/_logout.php';
        }
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/App/views/_404.php';
        break;
}