<?php

namespace Framework\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require_once ('config.php');
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


    static function checkRememberMeCookie()
    {
        if (isset($_COOKIE['remember_me'])) {
            // Split the cookie value into token, username/email, and password hash
            list($token, $usernameOrEmail) = explode(':', $_COOKIE['remember_me']);

            return [
                'token' => $token,
                'usernameOrEmail' => $usernameOrEmail,
            ];
        }
        return null; // No Remember Me cookie found
    }

    static function findUserByToken($dbConnection, $token)
    {
        $sql = "SELECT id, username FROM users WHERE remember_me_token = ?";
        $stmt = $dbConnection->prepare($sql);
        $stmt->execute([$token]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            // Log the user in
            $_SESSION['user_id'] = $user['id'];
            return true;
        }

        return false;
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
            $emailTemplate = file_get_contents("App/template/email_templates/$templateName.php");

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

}