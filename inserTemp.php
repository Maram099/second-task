<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "temperatures";

// Create connection
$connection = new mysqli($servername, $username, $password);


// get the temp value

$temperature = $_GET['temp'];

// Create database
$db = "CREATE DATABASE temperatures";
$connection->query($db);
$connection->close();

// sql to create temperature table
$connection = new mysqli($servername, $username, $password, $database);
$table = "CREATE TABLE temperature_sensor (
temperature int
)";
$connection->query($table);

// insert the value
// Create connection again
$connection = new mysqli($servername, $username, $password, $database);
$insert = "INSERT INTO temperature_sensor (temperature)
VALUES ($temperature)";
if ($connection->query($insert) == True) {
echo "The temperature value ".$temperature." has been added successfully to the database.";
$connection->close();
} else{
echo "The temperature value ".$temperature." has not added successfully to the database.";
$connection->close();
}
?>
