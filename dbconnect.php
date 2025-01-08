<?php

$servername = "localhost";
$username = "root";
$password = "";

$database = "m241_eintagesfliegen"; // mysql over XAMPP


$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Database connection error!". mysqli_connect_error());
}

?>