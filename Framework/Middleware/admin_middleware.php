<?php 
namespace Middleware;
use Framework\Classes\Utility;

class AuthMiddleware {

    function isAdmin() {
        // Check if the user has admin privileges
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            return true;
        } else {
            Utility::redirect('/signin');
            return false;
        }
    }

}
