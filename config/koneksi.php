<?php
// Connection to database
$server = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db_catalogue_film"; 

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else echo '';
?>
