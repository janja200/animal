-- Create a database if it doesn't exist
CREATE DATABASE IF NOT EXISTS animal;

-- Use the created database
USE animal;

-- Create a table to store user information
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create a table to store animal records
-- Create a table to store animal records
CREATE TABLE IF NOT EXISTS animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    species VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    type VARCHAR(255) NOT NULL,
    size VARCHAR(50) NOT NULL,
    place_found VARCHAR(255) NOT NULL,
    `condition` VARCHAR(255) NOT NULL,
    admission_time DATETIME NOT NULL,
    treatment TEXT NOT NULL
);


