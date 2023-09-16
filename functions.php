<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';
require 'vendors/PHPMailer/src/Exception.php';


function generateRandomToken()
{
    return bin2hex(random_bytes(32));
}

function setRememberMeCookie($token, $identifier)
{
    $cookieValue = $token . ':' . $identifier;
    $expiration = time() + (30 * 24 * 3600); // 30 days in seconds
    setcookie('remember_me', $cookieValue, $expiration, '/');
}


function checkRememberMeCookie() {
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

function findUserByToken($dbConnection, $token)
{
    $sql = "SELECT id, username FROM users WHERE remember_me_token = ?";
    $stmt = $dbConnection->prepare($sql);
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Log the user in
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    return false;
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

function sendEmail($recipient, $subject, $templateName, $templateVariables = []) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = EMAIL_HOST; // Your SMTP server host
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_USER; // SMTP username
    $mail->Password = EMAIL_PASSWORD; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' is also possible
    $mail->Port = 587; // TCP port to connect to

    // Load the HTML content of the email from the template
    $emailTemplate = file_get_contents("template/email_templates/$templateName.php");

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

    if ($mail->send()) {
        return true; // Email sent successfully
    } else {
        return false; // Email sending failed
    }
}
