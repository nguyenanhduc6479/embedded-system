<?php
// Connect to database
$server = "localhost";
$user = "dan"; 
$pass = "654183";
$dbname = "kt";

$conn = mysqli_connect($server,$user,$pass,$dbname);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>