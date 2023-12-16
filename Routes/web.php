<?php 
use App\Controllers\TestController;
use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\SignupController;
use App\Controllers\ProfileController;
use App\Controllers\DashboardController;
use Framework\Middleware\AuthMiddleware;
use App\Controllers\PasswordResetController;

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
    '/test' => [TestController::class,'display'],
    '/dashboard' => [
        'middleware' => AuthMiddleware::class,
        'controller' => DashboardController::class,
        'method' => 'showDashboard',
    ],
    '/profile' => [
        'middleware' => AuthMiddleware::class,
        'controller' => ProfileController::class,
        'method' => 'displayProfile',
    ],
    '/profile/{id}' => [
        'middleware' => AuthMiddleware::class,
        'controller' => ProfileController::class,
        'method' => 'updateProfile',
    ],
    '/change-password' => [
        'middleware' => AuthMiddleware::class,
        'controller' => ProfileController::class,
        'method' => 'changePassword',
    ],
    '/logout' => [
        'middleware' => AuthMiddleware::class,
        'controller' => UserController::class,
        'method' => 'logout',
    ],
    
];
