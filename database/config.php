<?php
$host = "localhost";
$user = "root";
$password = "";

// Establishing a connection
$conn = new mysqli($host, $user, $password);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to create the database
$sql = "CREATE DATABASE IF NOT EXISTS `natblog_db`";

// Checking successful execution of SQL statement
if($conn->query($sql)){
    echo "[Database created successfully]\n ";
}else{
    echo "Unable to create database\n ";
}
