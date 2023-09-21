<?php 
use App\Controllers\UserController;
use App\Controllers\SignupController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\InvestmentController;
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
    '/investment' => [
        'middleware' => AuthMiddleware::class,
        'controller' => InvestmentController::class,
        'method' => 'showInvestForm',
    ],
    '/investment/fetchPlanDetails/' => [
        'middleware' => AuthMiddleware::class,
        'controller' => InvestmentController::class,
        'method' => 'fetchPlanDetails',
    ],
    '/invest' => [
        'middleware' => AuthMiddleware::class,
        'controller' => InvestmentController::class,
        'method' => 'Invest',
    ],
    '/logout' => [
        'middleware' => AuthMiddleware::class,
        'controller' => UserController::class,
        'method' => 'logout',
    ],
];
