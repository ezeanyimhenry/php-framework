-- Create a new database if it doesn't exist
CREATE DATABASE IF NOT EXISTS your_database_name;

-- Use the newly created database
USE your_database_name;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'user',
    remember_me_token VARCHAR(255),
    is_active TINYINT(1) DEFAULT 1
    create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

-- Create the accounts table (adjust the fields based on your needs)
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    balance DECIMAL(10, 2) DEFAULT 0.00,
    other_columns VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Add more table creation statements for your project's needs
-- ...

