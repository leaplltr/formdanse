<?php

// Database configuration 
$host = "localhost:3308";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */
$dbname = "projettut";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>