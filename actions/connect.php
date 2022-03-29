<?php
// Create connection
$connect = mysqli_connect(
  $hostname = "localhost",
  $username = "root",
  $password = "", 
  $dbname = "be15_cr10_sedlaczek_biglibrary");

// Check connection
if (!$connect) {
  die("Database connection failed: ".mysqli_connect_error());
}