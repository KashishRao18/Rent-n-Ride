<?php

error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentnride";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

