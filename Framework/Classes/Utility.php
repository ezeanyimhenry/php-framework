<?php

namespace Framework\Classes;

use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('config.php');
require 'Framework/Vendors/PHPMailer/src/PHPMailer.php';
require 'Framework/Vendors/PHPMailer/src/SMTP.php';
require 'Framework/Vendors/PHPMailer/src/Exception.php';

class Utility
{
    static function generateRandomToken()
    {
        return bin2hex(random_bytes(32));
    }

    static function setRememberMeCookie($token, $identifier)
    {
        $cookieValue = $token . ':' . $identifier;
        $expiration = time() + (30 * 24 * 3600); // 30 days in seconds
        setcookie('remember_me', $cookieValue, $expiration, '/');
    }


    static function checkRememberMeCookie($dbConnection)
    {
        if (isset($_COOKIE['remember_me'])) {
            // Split the cookie value into token, username/email, and password hash
            list($token, $usernameOrEmail) = explode(':', $_COOKIE['remember_me']);
            // Check if the token exists in the database and retrieve user data
            $userModel = new UserModel($dbConnection); // You may need to inject this dependency instead of creating it here
            $userData = $userModel->findUserByToken($token);

            if ($userData) {
                // Token is valid; log the user in and return user data
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['user_role'] = $userData['role'];
                return $userData;
            }
        }
        return null; // No Remember Me cookie found
    }



    static function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    static function sendEmail($recipient, $subject, $templateName, $templateVariables = [])
    {
        $mail = new PHPMailer;

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = EMAIL_HOST; // Your SMTP server host
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_USER; // SMTP username
            $mail->Password = EMAIL_PASSWORD; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, 'ssl' is also possible
            $mail->Port = 465; // TCP port to connect to

            // Load the HTML content of the email from the template
            $emailTemplate = file_get_contents("Public/email_templates/$templateName.php");

            // Replace placeholders in the template with dynamic variables
            foreach ($templateVariables as $key => $value) {
                $placeholder = "{{" . $key . "}}";
                $emailTemplate = str_replace($placeholder, $value, $emailTemplate);
            }

            $mail->setFrom(EMAIL_USER, WEBSITE_NAME);
            $mail->addAddress($recipient);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $emailTemplate;

            $mail->send();
            return true; // Email sent successfully

        } catch (\Exception $e) {
            return $mail->ErrorInfo; // Email sending failed
        }

    }

    static function getUserInfo()
    {
        $userInfo = array();

        // Get IP address
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $userIP = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $userIP = $_SERVER['REMOTE_ADDR'];
        }
        $userInfo['ip_address'] = $userIP;

        // Get user agent (browser)
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];

            // Detect the user's operating system from the user agent string
            $os = "Unknown"; // Default value
            if (strpos($userAgent, "Windows") !== false) {
                $os = "Windows";
            } elseif (strpos($userAgent, "Macintosh") !== false) {
                $os = "Macintosh";
            } elseif (strpos($userAgent, "Linux") !== false) {
                $os = "Linux";
            }

            $userInfo['user_agent'] = $userAgent;
            $userInfo['operating_system'] = $os;
        } else {
            $userInfo['user_agent'] = '';
            $userInfo['operating_system'] = 'Unknown';
        }

        // Get user's timezone using ip-api.com (adjust the URL to your needs)
        $ipApiUrl = 'http://ip-api.com/json/';
        $ipApiData = file_get_contents($ipApiUrl);

        if ($ipApiData) {
            $ipApiResult = json_decode($ipApiData, true);
            $userTimezone = $ipApiResult['timezone'];
        } else {
            $userTimezone = 'Unknown';
        }

        $userInfo['user_timezone'] = $userTimezone;

        // Get user's host name (if available)
        $userInfo['host_name'] = gethostbyaddr($userIP);

        return $userInfo;
    }

    static function getAllTimezones()
    {
        $apiEndpoint = 'http://worldtimeapi.org/api/timezone';

        // Make the API request using file_get_contents
        $response = file_get_contents($apiEndpoint);

        // Check if the response is successful
        if ($response) {
            // Decode the JSON response
            $timezones = json_decode($response);

            // Return the timezones as an array
            if (is_array($timezones)) {
                return $timezones;
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    static function displayAlert($type, $key = null)
    {
        if ($type == 'success') {
            if ($key == null){
                $key = "success";
            }
            echo '<div class="alert alert-success solid alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            <strong>Success!</strong> ' . $_SESSION[$key] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>';
            unset($_SESSION[$key]);
        } elseif ($type == 'error') {
            if ($key == null){
                $key = "error";
            }
            echo '<div class="alert alert-danger solid alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            <strong>Error!</strong> ' . $_SESSION[$key] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>';
            unset($_SESSION[$key]);
        }

    }

}