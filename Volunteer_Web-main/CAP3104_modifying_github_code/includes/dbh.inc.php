<?php
// Connecting to MySQLi database

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "userdb";

// Making connection
$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

// If connection fails, end script
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}