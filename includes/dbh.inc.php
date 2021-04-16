<?php

// Connection Variables
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystem";

// Create a Connection
$conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);

// Check Connection
if ($conn->$connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
