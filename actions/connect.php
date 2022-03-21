<?php
$hostname = "127.0.0.1";
$username = "root";
$password = ""; 
$dbname = "be15_cr10_sedlaczek_biglibrary";

// Create connection
$connect = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$connect) {
  die("Database Connection failed: ".mysqli_connect_error());
} else {
  // echo "Connected successfully";
}