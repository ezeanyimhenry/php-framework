<?php
use Middleware\AuthMiddleware;
use Middleware\isAdmin;

require_once('autoload.php');
require_once('config.php');

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