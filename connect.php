<?php
$hostname = "localhost";
$username = "Sean"; 
$password = "sean-2005"; 
$database = "cohtechobubra_db"; 

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} 

?>