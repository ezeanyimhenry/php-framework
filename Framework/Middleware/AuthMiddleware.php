<?php
namespace Framework\Middleware;

use Framework\Helpers\Utility;

class AuthMiddleware
{
    public function isAuthenticated($dbConnection)
    {
        // Check if the user is logged in using your authentication mechanism
        // For example, you can check if a session variable is set or validate a token
        if (isset($_SESSION['user_id'])) {
            // User is authenticated, so allow access to the route
            return true;
        } else {
            // User is not authenticated, redirect to the login page
            Utility::redirect('/signin');
            return false;
        }
    }

    function isAdmin()
    {
        // Check if the user has admin privileges
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            return true;
        } else {
            Utility::redirect('/signin');
            return false;
        }
    }
}