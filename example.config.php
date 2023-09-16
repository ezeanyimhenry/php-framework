<?php

//remane this file to config.php

define('WEBSITE_NAME', 'Your Website Name');
define('WEBSITE_URL', 'Your Website URL');
define('EMAIL_HOST', 'Your Email Host');
define('EMAIL_USER', 'Your Email User');
define('EMAIL_PASSWORD', 'Your Email Password');

$dsn = "mysql:host=localhost;dbname=your_database";
$username = "your_database_user";
$password = "your_database_password";

try {
    $dbConnection = new PDO($dsn, $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
