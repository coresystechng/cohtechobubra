<?php
$hostname = "localhost";
$username = "Sean";
$pass = "sean-2005";
$database = "cohtechobubra_db";

$connect = mysqli_connect($hostname, $username, $pass,$database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 