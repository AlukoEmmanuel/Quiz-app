<?php
// db_connection.php - This file handles the connection to the MySQL database

$server = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_app";

// Create connection
$connection = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
