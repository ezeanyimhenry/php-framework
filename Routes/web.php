<?php 
use App\Controllers\UserController;
use App\Controllers\SignupController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\InvestmentController;
use App\Controllers\ActivityController;
use App\Controllers\CronController;
use App\Controllers\PasswordResetController;
use App\Controllers\WalletController;
use App\Controllers\ProfileController;

use Framework\Middleware\AuthMiddleware;

return [
    '' => '/App/views/_index.php',
    '/' => '/App/views/_index.php',
    '/signin' => [LoginController::class, 'showLoginForm'],
    '/login' => [LoginController::class, 'handleLogin'],
    '/signup' => [SignupController::class, 'showSignupForm'],
    '/register' => [SignupController::class, 'registerUser'],
    '/forgot-password' => [PasswordResetController::class, 'showForgotPasswordForm'],
    '/forgot-password/reset' => [PasswordResetController::class, 'PasswordResetEmail'],
    '/verify-token' => [PasswordResetController::class, 'verifyToken'],
    '/reset-password' => [PasswordResetController::class, 'showResetPasswordForm'],
    '/reset-password/reset' => [PasswordResetController::class, 'resetPassword'],
    '/cron' => [CronController::class, 'processDailyInvestmentEarnings'],
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
    '/wallet' => [
        'middleware' => AuthMiddleware::class,
        'controller' => WalletController::class,
        'method' => 'showWallets',
    ],
    '/wallet/fetchWalletDetails' => [
        'middleware' => AuthMiddleware::class,
        'controller' => WalletController::class,
        'method' => 'showWalletDetails',
    ],
    '/history' => [
        'middleware' => AuthMiddleware::class,
        'controller' => ActivityController::class,
        'method' => 'showAllUserActivity',
    ],
    '/profile' => [
        'middleware' => AuthMiddleware::class,
        'controller' => ProfileController::class,
        'method' => 'displayProfile',
    ],
    '/logout' => [
        'middleware' => AuthMiddleware::class,
        'controller' => UserController::class,
        'method' => 'logout',
    ],
];
