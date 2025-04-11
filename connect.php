<?php
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "cohtechobubra_db";

$connect = mysqli_connect($hostname, $username, $pass,$database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 