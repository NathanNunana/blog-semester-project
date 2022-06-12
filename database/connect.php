<?php
$host = "localhost";
$user = "root";
$dbname = "natblog_db";
$password = "";

// Creating a connection 
$conn = new mysqli($host, $user, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Starting session
session_start();
