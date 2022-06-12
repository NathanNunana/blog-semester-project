<?php
include "connect.php";

// Creating users table if it does not already exists 
$sql_users = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `role` enum('Author', 'Admin') DEFAULT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

// Creating posts table if it does not already exists
$sql_posts = "CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `user_id` INT(10) NOT NULL,
    `category` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `date`  VARCHAR(100) NOT NULL,
    `image` VARCHAR(100) NOT NULL,
    `published` TINYINT(1) DEFAULT NULL,
    `featured` TINYINT(1) NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
)";

// Checking and executing the queries for creating the tables
if ($conn->query($sql_users) && $conn->query($sql_posts)) {
    echo "[Table users and posts created successfully] \n";
} else {
    echo "[Table already exists in database] \n";
}
