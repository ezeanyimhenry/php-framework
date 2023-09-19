<?php 
use App\Controllers\UserController;
use App\Controllers\SignupController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use Framework\Middleware\AuthMiddleware;

return [
    '' => '/App/views/_index.php',
    '/' => '/App/views/_index.php',
    '/signin' => [LoginController::class, 'showLoginForm'],
    '/login' => [LoginController::class, 'handleLogin'],
    '/signup' => [SignupController::class, 'showSignupForm'],
    '/register' => [SignupController::class, 'registerUser'],
    '/dashboard' => [
        'middleware' => AuthMiddleware::class,
        'controller' => DashboardController::class,
        'method' => 'showDashboard',
    ],
    '/logout' => [
        'middleware' => AuthMiddleware::class,
        'controller' => UserController::class,
        'method' => 'logout',
    ],
];
